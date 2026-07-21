تنظیمات کامل Cloudflare - باید باشه - fa-IR پیش‌فرض

این فولدر FOR_CLOUDFLARE شامل تنظیمات کامل Cloudflare هست:

1. wrangler.toml کامل:
   - [site] bucket = "./" -> public/index.html (لندینگ فارسی #EF4056)
   - [[d1_databases]] DB_D1 -> SQLite Edge کش سریع fa = digifair-fa-db
   - [[hyperdrive]] HYPERDRIVE_PG -> localConnectionString = همون POSTGRES_URL که Vercel auto می‌سازه
     اینجوری Vercel Node+Python و Cloudflare Node هر سه به یک Neon Postgres مشترک وصله - پس DB ها به هم وصله
   - [[kv_namespaces]] KV_FA -> کش فارسی OT 6 ساعته
   - [[r2_buckets]] R2_ASSETS -> تصاویر webp
   - [vars] DEFAULT_LANG=fa-IR, COMPANY, ENAMAD_CODE, PYTHON_AI_URL, RUNTIME=cloudflare-full-node-only-fa
   - [triggers] crons = ["0 */6 * * *"] -> OT scrape هر 6 ساعت Asia/Tehran

2. package.json:
   - hono + wrangler + scripts: dev, deploy, d1:create, d1:migrate, kv:create, r2:create, hyperdrive:create

3. src/index.ts:
   - Hono Node Only - چون Cloudflare Workers Python native ندارد
   - برای AI باید proxy کنه به Vercel Python: /api/ai-match-proxy -> fetch PYTHON_AI_URL
   - Content-Language: fa-IR

4. d1/schema.sql:
   - SQLite fa-IR - فقط کش Edge

نحوه نصب Cloudflare با تنظیمات کامل:
1. wrangler d1 create digifair-fa-db -> id رو بذار تو wrangler.toml database_id
2. wrangler kv:namespace create KV_FA -> id رو بذار
3. wrangler r2 bucket create digifair-assets-fa
4. wrangler hyperdrive create digifair-hyperdrive --connection-string="postgres://default:xxx@ep-xxx.neon.tech/verceldb?sslmode=require"
   -> همون POSTGRES_URL که Vercel ساخته - اینجوری DB ها به هم وصله - بدون تغییر متغیر
5. wrangler d1 execute digifair-fa-db --file=d1/schema.sql
6. wrangler deploy -> لینک https://digifair-cloudflare-full-fa.workers.dev

تست:
- / -> لندینگ فارسی کپی‌رایت سیف
- /api/exhibitions?lang=fa-IR -> اول D1، بعد Hyperdrive PG (همون DB Vercel) - count باید با Vercel یکسان باشه چون DB مشترک
- /api/ai-match-proxy -> proxy به Vercel Python AI (چون Cloudflare Python ندارد)

© گواه گستر جهان‌نما - تنظیمات کامل Cloudflare باید باشه - fa-IR
