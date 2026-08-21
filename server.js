require('dotenv').config();
const express = require('express');
const fetch = require('node-fetch');
const rateLimit = require('express-rate-limit');
const path = require('path');

const app = express();
const PORT = process.env.PORT || 3000;
const NEWS_API_KEY = process.env.NEWSDATA_API_KEY;

if (!NEWS_API_KEY) {
  console.error('WARNING: NEWSDATA_API_KEY not set in environment. Proxy endpoints will return 500 until key is set.');
}

const limiter = rateLimit({
  windowMs: 60 * 1000,
  max: 30,
  standardHeaders: true,
  legacyHeaders: false,
});
app.use(limiter);

// Simple in-memory cache
const cache = new Map();
const CACHE_TTL_MS = 1000 * 60 * 5; // 5 minutes

function getCached(key) {
  const entry = cache.get(key);
  if (!entry) return null;
  if (Date.now() - entry.ts > CACHE_TTL_MS) {
    cache.delete(key);
    return null;
  }
  return entry.data;
}
function setCached(key, data) {
  cache.set(key, { ts: Date.now(), data });
}

// Serve static frontend
app.use(express.static(path.join(__dirname, 'public')));

// Proxy endpoint for NewsData.io
app.get('/api/news', async (req, res) => {
  try {
    const q = (req.query.q || '').trim();
    if (!q) return res.status(400).json({ error: 'Missing query parameter q' });

    const NEWS_API_KEY_LOCAL = process.env.NEWSDATA_API_KEY;
    if (!NEWS_API_KEY_LOCAL) return res.status(500).json({ error: 'Missing API key on server' });

    const cacheKey = `news:${q}:${req.query.language || 'en'}:${req.query.page || '1'}`;
    const cached = getCached(cacheKey);
    if (cached) return res.json(cached);

    const base = 'https://newsdata.io/api/1/news';
    const params = new URLSearchParams({
      apikey: NEWS_API_KEY_LOCAL,
      q,
      language: req.query.language || 'en',
      page: req.query.page || '1'
    });
    const url = `${base}?${params.toString()}`;

    const r = await fetch(url, { method: 'GET' });
    const json = await r.json();

    setCached(cacheKey, json);
    res.status(r.status).json(json);
  } catch (err) {
    console.error('Proxy error:', err);
    res.status(500).json({ error: 'Proxy error' });
  }
});

// Health endpoint
app.get('/health', (req, res) => res.json({ status: 'ok' }));

const port = process.env.PORT || PORT;
app.listen(port, () => {
  console.log(`Server listening on port ${port}`);
});
