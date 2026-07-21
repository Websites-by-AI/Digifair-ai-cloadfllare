<?php
// ساختار کامل وردپرسی - 5 صفحه اصلی + برای افراد و غرفه‌داران
/*
ساختار پیشنهادی برای وردپرس - مدل دیجی‌کالای نمایشگاه:

1. افراد (Individuals / Visitors):
   - نقش: visitor_user
   - می‌تونه: بلیط بخره، خدمات رو ببینه، به سبد اضافه کنه، نظر بده
   - پنل: /my-account - سفارشات، بلیط‌ها

2. غرفه‌داران (Exhibitors):
   - نقش: exhibitor
   - می‌تونه: نمایشگاه ثبت کنه (exhibition CPT)، غرفه درخواست بده، پنل AI مخصوص خودش رو ببینه
   - پنل: /exhibitor-panel -> هر نمایشگاه یک AI Page 8 بخشی فارسی + Mindmap Amazon/Alibaba + Meeting + Grant

3. تامین‌کنندگان (Vendors):
   - نقش: vendor (یا shop_manager ووکامرس)
   - می‌تونه: خدمات (service CPT / product) اضافه کنه، قیمت بذاره، سفارش بگیره

صفحات اصلی (5 صفحه):
- front-page.php -> خانه بهبود یافته (bento + pill header #EF4056 کپی‌رایت سیف)
- page-about.php -> درباره ما (سفیر تحول)
- page-contact.php -> تماس 021-32805
- archive-exhibition.php -> لیست نمایشگاه‌ها + هر کدام یک AI Page لینک
- single-exhibition.php -> جزئیات نمایشگاه + 8 بخش AI fa-IR + Mindmap + Amazon/Alibaba + تست DB

- archive-service.php / archive-product.php -> دسته‌بندی خدمات (برای افراد و غرفه‌داران)
- single-product.php -> جزئیات خدمت (غرفه 12 متری) + Mindmap + تحلیل Amazon + Content Studio 12 مهارت

ماژول‌ها به صورت شورتکد:
- [digifair_offers] -> همه Offe ها 147 تا
- [digifair_ai_page exhibition_id="EX-ELC-1404"] -> 8 بخش فارسی
- [digifair_mindmap company="رایا"] -> Mindmap Mermaid
- [digifair_db_test] -> تست اتصال DB بدون تغییر متغیر - پنل ادمین

دیتابیس وردپرس روی مقادیر پیش‌فرض:
- wp-config.php -> DB_HOST, DB_NAME, DB_USER, DB_PASSWORD - پیش‌فرض هاست - بدون تغییر متغیر کار می‌کنه
- برای Vercel DB (Neon) و Cloudflare D1 هم می‌تونی Hyperdrive وصل کنی - پس DB ها به هم وصله
- شورتکد [digifair_db_test] تست می‌کنه

رنگ: #EF4056 مشابه دیجی‌کالا/دیجی‌فیر ولی دیزاین bento + pill header + radius 24-32 متفاوت برای کپی‌رایت سیف
زبان: fa-IR پیش‌فرض RTL Vazirmatn
کپی‌رایت: © گواه گستر جهان‌نما - Enamad DF-ENM-1404-8821 پایین راست
*/
