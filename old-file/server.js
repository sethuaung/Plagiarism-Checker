// server.js
require('dotenv').config();
const express = require('express');
const fetch = require('node-fetch');
const rateLimit = require('express-rate-limit');

const app = express();
const PORT = process.env.PORT || 3000;
const NEWS_API_KEY = process.env.NEWSDATA_API_KEY;

if (!NEWS_API_KEY) {
  console.error('ERROR: NEWSDATA_API_KEY not set in environment.');
  process.exit(1);
}

// Basic rate limiter to protect the NewsData API key
const limiter = rateLimit({
  windowMs: 60 * 1000, // 1 minute
  max: 30, // max requests per IP per window
  standardHeaders: true,
  legacyHeaders: false,
});
app.use(limiter);

// Simple in-memory cache (key -> { ts, data })
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

// Proxy endpoint: /api/news?q=...
app.get('/api/news', async (req, res) => {
  try {
    const q = (req.query.q || '').trim();
    if (!q) return res.status(400).json({ error: 'Missing query parameter q' });

    const cacheKey = `news:${q}`;
    const cached = getCached(cacheKey);
    if (cached) return res.json(cached);

    const base = 'https://newsdata.io/api/1/news';
    const params = new URLSearchParams({
      apikey: NEWS_API_KEY,
      q,
      language: req.query.language || 'en',
      page: req.query.page || '1'
    });
    const url = `${base}?${params.toString()}`;

    const r = await fetch(url, { method: 'GET' });
    const json = await r.json();

    // Forward status and body for transparency
    setCached(cacheKey, json);
    res.status(r.status).json(json);
  } catch (err) {
    console.error('Proxy error:', err);
    res.status(500).json({ error: 'Proxy error' });
  }
});

// Optional health endpoint
app.get('/health', (req, res) => res.json({ status: 'ok' }));

app.listen(PORT, () => {
  console.log(`Proxy server listening on port ${PORT}`);
});
