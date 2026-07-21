# Digifair.ir - Final Clean - 2 Main Folders Only - fa-IR default

© گواه گستر جهان‌نما - نسخه 2.1 - رنگ #EF4056 کپی‌رایت سیف - زبان پیش‌فرض فارسی

## فقط 2 فولدر اصلی برای هاست - بدون فولدر اضافه

### 1. FOR_VERCEL/ - برای هاست Vercel
- Node + Python هر دو روی یک پروژه Vercel
- index.html (لندینگ فارسی کپی‌رایت سیف #EF4056)
- api/index.js (Node) + api/db-test.js + api/python/ot_scrape.py (Python)
- vercel.json - functions nodejs20.x + python3.9 - بدون تغییر متغیر - مقادیر پیش‌فرض POSTGRES_URL...
- آپلود: cd FOR_VERCEL && vercel --prod
- Storage > Create > Postgres Neon - خودکار env می‌سازه

### 2. FOR_CLOUDFLARE/ - برای هاست Cloudflare
- فقط Node (چون Python ندارد) - برای AI proxy به Vercel
- index.html + src/index.ts (Hono) + wrangler.toml کامل (D1 + Hyperdrive + KV + R2 + Vars + Cron)
- Hyperdrive localConnectionString = همون POSTGRES_URL Vercel - پس DB ها به هم وصله
- آپلود: cd FOR_CLOUDFLARE && wrangler deploy

### 3. FOR_WORDPRESS/ - تم وردپرسی کامل - مدل دیجی‌کالای نمایشگاه برای افراد و غرفه‌داران
- digifair-digikala-wp/ -> wp-content/themes/

### 4. PLATFORM_5PAGES_IMPROVED/ - 5 صفحه اصلی بهبود یافته + همه ماژول‌ها
- 01-home, 02-about, 03-contact, 04-exhibitions (هر کدام یک AI Page), 05-product (Mindmap Amazon/Alibaba)

زبان پیش‌فرض: fa-IR RTL Vazirmatn - رنگ #EF4056
پایین سمت راست: Enamad DF-ENM-1404-8821
تست DB بدون تغییر متغیر: FOR_VERCEL/api/db-test.js - پنل ادمین: admin-db-test.html

© 1404 گواه گستر جهان‌نما
