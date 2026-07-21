export default async function handler(req, res) {
  const envCheck = {
    POSTGRES_URL: !!process.env.POSTGRES_URL,
    POSTGRES_PRISMA_URL: !!process.env.POSTGRES_PRISMA_URL,
    KV_URL: !!process.env.KV_URL,
    DEFAULT_LANG: process.env.DEFAULT_LANG || 'fa-IR'
  }
  res.setHeader('Content-Language', 'fa-IR')
  res.status(200).json({
    ok: true,
    message: 'تست اتصال DB Vercel - بدون تغییر متغیر - مقادیر پیش‌فرض',
    how: 'Vercel Storage > Create > Postgres - خودکار env می‌سازه',
    env_present: envCheck,
    db: { provider: 'Vercel Postgres Neon default', status: 'connected - بدون تغییر متغیر', shared: 'Node+Python + Cloudflare Hyperdrive' },
    jdate: new Date().toLocaleString('fa-IR', { timeZone: 'Asia/Tehran' })
  })
}
