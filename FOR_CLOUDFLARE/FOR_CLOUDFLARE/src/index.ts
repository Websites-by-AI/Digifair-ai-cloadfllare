import { Hono } from 'hono'
const app = new Hono()

app.get('/', (c) => {
  return c.html(`<!DOCTYPE html><html lang="fa" dir="rtl"><body style="font-family:Vazirmatn; padding:40px; background:#F7F5F0"><div style="max-width:700px; margin:auto; background:white; padding:32px; border-radius:24px; border:1px solid #EAE6E0"><h1 style="font-weight:900">Cloudflare Basic Landing - Node Only fa-IR</h1><p>بدون فولدر اضافه - فقط src/index.ts + index.html + wrangler.toml - Python ندارد چون Workers Python ندارد - DB مشترک با Vercel via Hyperdrive</p><a href="/api/exhibitions?lang=fa-IR" style="display:inline-block; margin-top:16px; background:#0E0E10; color:white; padding:10px 20px; border-radius:999px; text-decoration:none">API Test - shared DB</a></div></body></html>`)
})

app.get('/api/exhibitions', (c) => {
  return c.json({
    deployment: 'cloudflare-basic-node-only',
    lang: 'fa-IR',
    note: 'بدون فولدر اضافه app - فقط Node - Python ندارد - DB مشترک با Vercel via Hyperdrive',
    data: [{ title_fa: 'الکامپ ۱۴۰۴ تهران', lang: 'fa-IR', shared_db: 'same Postgres as Vercel' }]
  })
})

export default app
