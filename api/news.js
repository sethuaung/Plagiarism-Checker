// api/news.js
const fetch = require('node-fetch');

module.exports = async (req, res) => {
  try {
    const q = (req.query.q || '').trim();
    if (!q) return res.status(400).json({ error: 'Missing query parameter q' });

    const NEWS_API_KEY = process.env.NEWSDATA_API_KEY;
    if (!NEWS_API_KEY) return res.status(500).json({ error: 'Missing API key' });

    const params = new URLSearchParams({
      apikey: NEWS_API_KEY,
      q,
      language: req.query.language || 'en',
      page: req.query.page || '1'
    });
    const url = `https://newsdata.io/api/1/news?${params.toString()}`;

    const r = await fetch(url);
    const json = await r.json();
    return res.status(r.status).json(json);
  } catch (err) {
    console.error('api/news error', err);
    return res.status(500).json({ error: 'Internal server error' });
  }
};

