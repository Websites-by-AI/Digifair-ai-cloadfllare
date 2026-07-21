فقط ۲ فولدر اصلی - برای آپلود هاست

1) FOR_VERCEL/ → برای هاست Vercel
   - شامل: index.html + api/index.js (Node) + api/python/ot_scrape.py (Python) + vercel.json
   - هر دو runtime (Node+Python) هر دو روی یک پروژه Vercel بالا میاد
   - DB: Vercel Postgres - بدون تغییر متغیر - مقادیر پیش‌فرض POSTGRES_URL... Vercel خودش می‌سازه
   - زبان پیش‌فرض: فارسی fa-IR - رنگ #EF4056 کپی‌رایت سیف
   - نحوه آپلود: 
     cd FOR_VERCEL
     vercel --prod
     یا در سایت vercel.com > New Project > Import این فولدر
     سپس Storage > Create > Postgres (Neon) - خودکار env می‌سازه - نیازی به تغییر نیست

2) FOR_CLOUDFLARE/ → برای هاست Cloudflare
   - شامل: index.html + src/index.ts (Hono Node) + wrangler.toml
   - فقط Node (چون Cloudflare Workers Python native ندارد) - برای AI باید proxy به Vercel کنه
   - DB: D1 + Hyperdrive -> همون Postgres Vercel - پس DB ها به هم وصله
   - زبان پیش‌فرض: فارسی fa-IR
   - نحوه آپلود:
     cd FOR_CLOUDFLARE
     wrangler deploy
     یا Cloudflare Dashboard > Pages > Create > Upload این فولدر

مقایسه:
- Vercel: Node+Python هر دو دارد ✅
- Cloudflare: فقط Node (Python ندارد) ❌ - باید proxy به Vercel Python کند
- هر دو به یک Neon Postgres مشترک وصله - پس دیتابیس‌ها به هم وصله
- هر دو جدا برای تست و مقایسه

© گواه گستر جهان‌نما - Enamad DF-ENM-1404-8821 - 2 فولدر اصلی
