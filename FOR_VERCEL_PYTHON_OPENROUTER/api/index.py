# Vercel Python Only - Single App merging two Vercel apps - fa-IR default - with OpenRouter API
# این یک اپ پایتون تنها هست که دو تا Vercel اپ قبلی رو یکی می‌کنه
# برای Digifair.ir - مدل دیجی‌کالای نمایشگاه - زبان فارسی پیش‌فرض
from http.server import BaseHTTPRequestHandler
import json, os

class handler(BaseHTTPRequestHandler):
    def do_GET(self):
        # Root landing like digifair.ir - for Python only app
        html = """
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>دیجی‌فیر - Vercel Python Only - با OpenRouter API - fa پیش‌فرض</title>
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700;900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="font-family:Vazirmatn; background:#F7F5F0; padding:24px">
<div style="max-width:900px; margin:auto; background:white; border-radius:32px; padding:32px; border:1px solid #EAE6E0">
<div style="display:flex; gap:12px; align-items:center"><div style="width:36px; height:36px; background:#EF4056; border-radius:50%; color:white; display:flex; align-items:center; justify-content:center; font-weight:900">D</div><div><p style="font-weight:900">دیجی‌فیر - Vercel Python Only - با OpenRouter</p><p style="font-size:11px; color:#888">2 Vercel app -> 1 Python app - fa-IR - #EF4056 کپی‌رایت سیف</p></div></div>
<h1 style="margin-top:20px; font-size:32px; font-weight:900; line-height:1">سایت مثل digifair.ir<br/><span style="color:#EF4056">یک اپ پایتون تنها</span><br/>با OpenRouter API</h1>
<p style="margin-top:12px; font-size:13px; color:#666">این نسخه دو تا Vercel اپ قبلی (Node+Python dual) رو یکی کرده به یک اپ Python تنها - با OpenRouter API که دادی - برای RAG فارسی - بدون تغییر متغیر DB - POSTGRES_URL پیش‌فرض Vercel</p>
<div style="margin-top:20px; display:flex; gap:8px; flex-wrap:wrap">
<a href="/api/rag_openrouter?q=غرفه 12 متری برای الکامپ چی نیاز دارم؟" style="background:#0E0E10; color:white; padding:10px 20px; border-radius:999px; text-decoration:none; font-size:13px">تست RAG با OpenRouter - fa</a>
<a href="/api/db-test" style="border:1px solid #EAE6E0; padding:10px 20px; border-radius:999px; text-decoration:none; font-size:13px">تست DB بدون تغییر</a>
<a href="/api/ot_scrape" style="border:1px solid #EAE6E0; padding:10px 20px; border-radius:999px; text-decoration:none; font-size:13px">OT Scraper Python</a>
</div>
<div style="margin-top:20px; padding:16px; background:#F7F5F0; border-radius:16px; font-size:11px; line-height:1.8">
<b>دو Vercel اپ → یک Python اپ:</b><br/>
• قبل: FOR_VERCEL (Node+Python) + deploy-vercel-full (Node+Python) - دو تا<br/>
• الان: FOR_VERCEL_PYTHON_OPENROUTER - یک اپ Python تنها - هر دو رو مچ کرده<br/>
• OpenRouter API: از env OPENROUTER_API_KEY می‌خونه - کلید شما sk-or-v1-... رو باید تو Vercel Dashboard > Env Vars بذاری - مستقیم تو کد نمی‌ذاریم چون گیت‌هاب عمومیه و امن نیست<br/>
• DB: POSTGRES_URL پیش‌فرض Vercel - بدون تغییر متغیر - مشترک<br/>
• زبان: fa-IR پیش‌فرض - Enamad DF-ENM-1404-8821
</div>
</div>
</body></html>
        """
        self.send_response(200)
        self.send_header('Content-type', 'text/html; charset=utf-8')
        self.send_header('Content-Language', 'fa-IR')
        self.end_headers()
        self.wfile.write(html.encode('utf-8'))
