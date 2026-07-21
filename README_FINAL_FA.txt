فقط 2 فولدر اصلی - برای آپلود هاست - بدون فولدر اضافه

- FOR_VERCEL/ : برای هاست Vercel - Node + Python هر دو روی یک پروژه - DB بدون تغییر متغیر
  فایل‌ها: index.html + vercel.json + api/index.js + api/db-test.js + api/python/ot_scrape.py
  آپلود: cd FOR_VERCEL && vercel --prod

- FOR_CLOUDFLARE/ : برای هاست Cloudflare - فقط Node (چون Python ندارد) - DB مشترک با Vercel via Hyperdrive
  فایل‌ها: index.html + src/index.ts + wrangler.toml
  آپلود: cd FOR_CLOUDFLARE && wrangler deploy

هر دو زبان پیش‌فرض فارسی fa-IR، رنگ #EF4056 کپی‌رایت سیف، Enamad پایین راست

© گواه گستر جهان‌نما - 2 فولدر اصلی فقط
