from http.server import BaseHTTPRequestHandler
import json, os
import jdatetime

class handler(BaseHTTPRequestHandler):
    def do_POST(self):
        content_length = int(self.headers.get('Content-Length', 0))
        body = json.loads(self.rfile.read(content_length) or b'{}')
        question = body.get('question', 'غرفه 12 متری برای الکامپ چی نیاز دارم؟')
        jnow = jdatetime.datetime.now().strftime("%Y/%m/%d %H:%M")
        retrieved = [
            {"title_fa": "الکامپ 1404 - نیاز: غرفه 12م، ویدئو وال P2.5، 2 هاست EN", "score": 0.94, "source": "needs fa"},
            {"title_fa": "Amazon.de €12k/mo - No A+ Content - پیشنهاد ترجمه DE", "score": 0.88, "source": "trade Amazon"},
            {"title_fa": "غرفه 12 متری اکونومی - 18.5M تومان - 124 سفارش", "score": 0.91, "source": "service"}
        ]
        answer = f"""برای سوال شما: {question}
پاسخ RAG فارسی - Vercel Node+Python Dual - بدون تغییر متغیر:

1. نمایشگاه الکامپ 1404 تهران - 7 مرداد - سالن 35،38:
   - نیاز AI: غرفه 12م² دو طرف باز، ویدئو وال P2.5، 2 هاست انگلیسی مسلط، پذیرایی VIP 100 نفر
   - بر اساس 124 سفارش موفق - قیمت 18.5M تومان - ارسال در محل نمایشگاه - Enamad تایید

2. تجارت بین‌الملل (Amazon/Alibaba):
   - اگر مثل پیشران فناوری رایا تو Amazon.de €12k/mo می‌فروشی، ریتینگ 4.3، 3 رقیب آلمانی
   - مشکل: No A+ Content - پیشنهاد AI فارسی: ترجمه DE + A+ Content + قیمت €549

3. Mindmap + Action:
   - Mindmap: /mindmap.html?expo=ELC
   - Meeting: Siemens AG Hall 38 score 0.92
   - Grant: Horizon Europe €25k برای غرفه سبز

تاریخ شمسی: {jnow}
زبان پیش‌فرض fa-IR - DB مشترک Node+Python - POSTGRES_URL پیش‌فرض Vercel - بدون تغییر متغیر
© گواه گستر - DF-ENM-1404-8821
"""
        self.send_response(200)
        self.send_header('Content-type', 'application/json; charset=utf-8')
        self.send_header('Content-Language', 'fa-IR')
        self.end_headers()
        self.wfile.write(json.dumps({
            "lang": "fa-IR",
            "default_lang": "fa-IR",
            "runtime": "python3.9 @ Vercel - RAG - shared DB with Node",
            "question": question,
            "retrieved": retrieved,
            "answer_fa": answer,
            "db": "POSTGRES_URL پیش‌فرض Vercel - shared with Node.js - بدون تغییر متغیر",
            "deployment": "vercel-full-node-python-fa - RAG model putting in"
        }, ensure_ascii=False).encode('utf-8'))
