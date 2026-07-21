// Vercel Basic - Node API - بدون فولدر اضافه app - fa-IR پیش‌فرض - DB مشترک با Python
export default function handler(req, res) {
  // از مقادیر پیش‌فرض Vercel استفاده می‌کنه - بدون تغییر متغیر
  const hasPostgres = !!process.env.POSTGRES_URL
  res.setHeader('Content-Language', 'fa-IR')
  res.setHeader('X-Default-Lang', 'fa-IR')
  res.status(200).json({
    ok: true,
    runtime: 'nodejs @ Vercel - Basic Landing',
    deployment: 'vercel-basic-landing-fa',
    default_lang: 'fa-IR',
    message: 'API Node - بدون تغییر متغیر - از POSTGRES_URL پیش‌فرض Vercel',
    db: {
      env_present: hasPostgres,
      env_var: 'POSTGRES_URL (پیش‌فرض Vercel)',
      shared_with_python: true,
      note: 'هر دو Node و Python یک Postgres مشترک - بدون تغییر متغیر'
    },
    python_api: '/api/python/ot_scrape - همون DB',
    copyright: '© گواه گستر - DF-ENM-1404-8821 - fa-IR'
  })
}
