# Digifair.ir - مدل دیجی‌کالای نمایشگاه - fa-IR پیش‌فرض

© شرکت گواه گستر جهان‌نما - نسخه 2.1 - رنگ #EF4056 کپی‌رایت سیف

## فقط 2 فولدر اصلی برای هاست (بدون فولدر اضافه)

### 1. FOR_VERCEL/ → برای هاست Vercel
- Node + Python هر دو روی یک پروژه - هر دو runtime
- index.html (لندینگ فارسی کپی‌رایت سیف #EF4056)
- api/index.js (Node) + api/python/ot_scrape.py (Python) + vercel.json
- DB: Vercel Postgres - بدون تغییر متغیر - مقادیر پیش‌فرض POSTGRES_URL... Vercel auto می‌سازه
- آپلود: `cd FOR_VERCEL && vercel --prod`

### 2. FOR_CLOUDFLARE/ → برای هاست Cloudflare
- فقط Node (چون Python ندارد) - برای AI proxy به Vercel
- index.html + src/index.ts (Hono) + wrangler.toml کامل (D1 + Hyperdrive + KV + R2 + Vars + Cron)
- DB: Hyperdrive localConnectionString = همون POSTGRES_URL Vercel - پس DB ها به هم وصله
- آپلود: `cd FOR_CLOUDFLARE && wrangler deploy`

### 3. FOR_WORDPRESS/ → تم وردپرسی کامل
- مدل دیجی‌کالای نمایشگاه برای افراد و غرفه‌داران - fa-IR RTL - ووکامرس
- digifair-digikala-wp/ -> بریز تو wp-content/themes/

### 4. PLATFORM_5PAGES_IMPROVED/ → 5 صفحه اصلی بهبود یافته + همه ماژول‌ها
- 01-home, 02-about, 03-contact, 04-exhibitions (هر کدام یک AI Page), 05-product (Mindmap Amazon/Alibaba)

## زبان پیش‌فرض: فارسی fa-IR RTL - Vazirmatn
## رنگ: #EF4056 مشابه دیجی‌فیر/دیجی‌کالا ولی دیزاین کپی‌رایت سیف (bento + pill header)
## پایین سمت راست: Enamad DF-ENM-1404-8821 + ساماندهی

## تست اتصال DB بدون تغییر متغیر
- پنل ادمین: FOR_VERCEL/api/db-test.js + FOR_VERCEL/api/python/ot_scrape.py
- هر دو به یک Postgres مشترک - بدون تغییر متغیر - فقط Storage > Create > Postgres

## دیپلوی جدا برای تست و مقایسه
- Vercel Full: Node+Python dual runtime
- Cloudflare Full: Node Only (Python ندارد) - proxy به Vercel Python - DB مشترک via Hyperdrive

© 1404 گواه گستر جهان‌نما
