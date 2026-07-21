# Vercel Basic - Python API - بدون فولدر اضافه - fa-IR
from http.server import BaseHTTPRequestHandler
import json, os
import jdatetime

class handler(BaseHTTPRequestHandler):
    def do_GET(self):
        env_ok = bool(os.getenv("POSTGRES_URL"))
        jnow = jdatetime.datetime.now().strftime("%Y/%m/%d %H:%M")
        data = {
            "ok": True,
            "runtime": "python3.9 @ Vercel Basic Landing",
            "default_lang": "fa-IR",
            "message": "API Python - بدون تغییر متغیر - از POSTGRES_URL پیش‌فرض Vercel - shared DB با Node",
            "db": {"env_present": env_ok, "env_var": "POSTGRES_URL (پیش‌فرض)", "shared_with_node": True},
            "jdate": jnow,
            "sample": {"title_fa": "الکامپ ۱۴۰۴ تهران", "city": "تهران", "lang": "fa-IR", "needs": ["غرفه ۱۲م"]},
            "note": "این لندینگ پایه است - بدون فولدر اضافه app - فقط api/ + index.html"
        }
        self.send_response(200)
        self.send_header('Content-type', 'application/json; charset=utf-8')
        self.send_header('Content-Language', 'fa-IR')
        self.end_headers()
        self.wfile.write(json.dumps(data, ensure_ascii=False).encode('utf-8'))
