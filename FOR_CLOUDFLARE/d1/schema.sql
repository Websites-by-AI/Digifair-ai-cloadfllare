-- D1 SQLite - fa-IR default - برای Cloudflare - کش Edge
CREATE TABLE IF NOT EXISTS exhibitions (
  id TEXT PRIMARY KEY,
  title_fa TEXT NOT NULL,
  slug_fa TEXT UNIQUE,
  city TEXT DEFAULT 'تهران',
  lang TEXT DEFAULT 'fa-IR',
  source TEXT,
  created_at TEXT DEFAULT (datetime('now'))
);
CREATE INDEX IF NOT EXISTS idx_lang ON exhibitions(lang);

CREATE TABLE IF NOT EXISTS needs (
  id TEXT PRIMARY KEY,
  exhibition_id TEXT,
  need_type TEXT,
  details_json_fa TEXT,
  lang TEXT DEFAULT 'fa-IR'
);

-- D1 فقط کش Edge هست - دیتای اصلی تو Postgres مشترک (Neon) که Vercel و Cloudflare هر دو می‌خونن via Hyperdrive
