# RAG with OpenRouter API - Vercel Python Only - Single App merging two Vercel apps
# API Key must be set as env var OPENROUTER_API_KEY in Vercel Dashboard - NOT hardcoded (public GitHub unsafe)
# Provided key: sk-or-v1-REDACTED (user gave) - should be revoked after and set via env

from http.server import BaseHTTPRequestHandler
import json, os
from urllib.parse import parse_qs, urlparse

# OpenRouter config - از env می‌خونه - امن
OPENROUTER_API_KEY = os.getenv("OPENROUTER_API_KEY", "")  # باید تو Vercel Dashboard > Environment Variables بذاری
OPENROUTER_BASE_URL = os.getenv("OPENROUTER_BASE_URL", "https://openrouter.ai/api/v1")
OPENROUTER_MODEL = os.getenv("OPENROUTER_MODEL", "openai/gpt-4o-mini")  # یا google/gemini-flash-1.5, anthropic/claude-3-haiku

class handler(BaseHTTPRequestHandler):
    def do_GET(self):
        # Query param: ?q=غرفه 12 متری برای الکامپ چی نیاز دارم؟
        parsed = urlparse(self.path)
        qs = parse_qs(parsed.query)
        question = qs.get('q', ['غرفه ۱۲ متری برای الکامپ چی نیاز دارم؟'])[0]

        # 1. Retrieval - از DB مشترک (Postgres) - mock fa data - بدون تغییر متغیر
        # در واقعیت: SELECT * FROM needs WHERE lang='fa-IR' ORDER BY embedding
        retrieved = [
            {"title_fa": "الکامپ ۱۴۰۴ تهران - نیاز AI: غرفه ۱۲م، ویدئو وال P2.5، ۲ هاست EN", "score": 0.94, "source": "exhibition needs fa-IR"},
            {"title_fa": "Amazon.de - فروش سرور €12k/mo - No A+ Content - پیشنهاد ترجمه DE به فارسی", "score": 0.88, "source": "trade Amazon"},
            {"title_fa": "غرفه ۱۲ متری اکونومی - ۱۸.۵M تومان - ۱۲۴ سفارش - Enamad تایید", "score": 0.91, "source": "service"}
        ]
        context_fa = "\n".join([f"- {r['title_fa']} (score {r['score']}, source {r['source']})" for r in retrieved])

        # 2. Generation via OpenRouter API - اگر کلید ست شده باشه
        answer_fa = ""
        openrouter_used = False
        openrouter_error = None

        if OPENROUTER_API_KEY:
            try:
                # Use OpenAI SDK compatible with OpenRouter
                from openai import OpenAI
                client = OpenAI(
                    base_url=OPENROUTER_BASE_URL,
                    api_key=OPENROUTER_API_KEY,
                )
                
                # Prompt فارسی برای دیجی‌فیر
                system_prompt = """تو دستیار هوشمند دیجی‌فیر هستی - وب سایت تخصصی تامین خدمات نمایشگاهی - زبان پیش‌فرض فارسی fa-IR.
- کلیه حقوق متعلق به شرکت گواه گستر جهان‌نما
- رنگ برند #EF4056
- Enamad DF-ENM-1404-8821 پایین راست
- باید جواب فارسی بدی با اطلاعات بازیابی شده.
- حتما Mindmap و Amazon/Alibaba تحلیل و پیشنهاد گرنت و میتینگ بده.
"""

                user_prompt = f"""سوال کاربر (فارسی): {question}

اطلاعات بازیابی شده (Retrieved) از دیتابیس مشترک Postgres (بدون تغییر متغیر - POSTGRES_URL پیش‌فرض Vercel):
{context_fa}

لطفا پاسخ کامل فارسی بده با:
1. نیازهای AI برای نمایشگاه
2. تجارت بین‌الملل Amazon/Alibaba
3. Mindmap لینک
4. میتینگ و گرنت پیشنهادی
5. زبان fa-IR پیش‌فرض

جواب فارسی:"""

                completion = client.chat.completions.create(
                    model=OPENROUTER_MODEL,
                    messages=[
                        {"role": "system", "content": system_prompt},
                        {"role": "user", "content": user_prompt}
                    ],
                    max_tokens=800,
                    temperature=0.7
                )
                answer_fa = completion.choices[0].message.content
                openrouter_used = True
            except Exception as e:
                openrouter_error = str(e)
                # Fallback mock answer fa if OpenRouter fails
                answer_fa = f"""برای سوال شما: {question}
پاسخ RAG فارسی (Fallback چون OpenRouter خطا داد: {openrouter_error}):

1. نمایشگاه الکامپ 1404 تهران - 7 مرداد - سالن 35،38:
   - نیاز AI: غرفه 12م² دو طرف باز، ویدئو وال P2.5، 2 هاست انگلیسی مسلط، پذیرایی VIP 100 نفر
   - بر اساس 124 سفارش موفق - قیمت 18.5M تومان - ارسال در محل نمایشگاه - Enamad تایید

2. تجارت بین‌الملل:
   - اگر مثل پیشران فناوری رایا تو Amazon.de €12k/mo می‌فروشی، ریتینگ 4.3، 3 رقیب آلمانی
   - مشکل: No A+ Content - پیشنهاد AI فارسی: ترجمه DE + A+ Content + قیمت €549

3. Mindmap: /mindmap.html?expo=ELC
4. میتینگ: Siemens AG Hall 38 score 0.92 - گرنت: Horizon Europe €25k برای غرفه سبز

زبان پیش‌فرض fa-IR - DB مشترک Node+Python - بدون تغییر متغیر - POSTGRES_URL پیش‌فرض Vercel
© گواه گستر - DF-ENM-1404-8821
"""
        else:
            # No API key set - fallback mock - چون کلید رو نباید تو گیت‌هاب عمومی هاردکد کنیم
            answer_fa = f"""برای سوال شما: {question}

⚠️ OpenRouter API Key ست نشده - این چون کلید شما sk-or-v1-... رو نباید تو گیت‌هاب عمومی هاردکد کنیم (امن نیست) - باید تو Vercel Dashboard > Settings > Environment Variables > OPENROUTER_API_KEY اضافه کنی.

پاسخ Mock RAG فارسی (بدون OpenRouter):

1. الکامپ 1404 - نیاز: غرفه 12م، ویدئو وال، 2 هاست EN
2. Amazon.de €12k - No A+ Content
3. Mindmap + Meeting Siemens 0.92 + Grant €25k

لطفا کلید OpenRouter رو تو Vercel Env Vars بذار تا جواب واقعی LLM بیاد.

نکته امنیتی: کلیدی که دادی sk-or-v1-a453... رو بعد از تست Revoke کن چون تو چت لو رفته و گیت‌هاب عمومی ناامنه.
"""

        self.send_response(200)
        self.send_header('Content-type', 'application/json; charset=utf-8')
        self.send_header('Content-Language', 'fa-IR')
        self.send_header('X-Runtime', 'python3.9 @ Vercel - OpenRouter RAG - Single Python App merging two Vercel apps')
        self.end_headers()
        self.wfile.write(json.dumps({
            "ok": True,
            "deployment": "vercel-python-only-single-app - merging two vercel apps into one by python",
            "runtime": "python3.9 @ Vercel - OpenRouter",
            "default_lang": "fa-IR",
            "question": question,
            "retrieved": retrieved,
            "answer_fa": answer_fa,
            "openrouter": {
                "used": openrouter_used,
                "model": OPENROUTER_MODEL,
                "base_url": OPENROUTER_BASE_URL,
                "api_key_present": bool(OPENROUTER_API_KEY),
                "api_key_env": "OPENROUTER_API_KEY - باید تو Vercel Dashboard ست بشه - کلید شما sk-or-v1-... رو مستقیم تو کد نذاشتم چون گیت‌هاب عمومی ناامنه",
                "error": openrouter_error
            },
            "db": {
                "provider": "Vercel Postgres Neon - shared",
                "env_var": "POSTGRES_URL پیش‌فرض - بدون تغییر متغیر",
                "shared": "Single Python app merging two Vercel apps - Node+Python قبل - الان فقط Python"
            },
            "note": "دو Vercel اپ = یکی شد با پایتون - Single Python App - با OpenRouter API - کلید sk-or-v1-... از env می‌خونه - امن - بعد از تست Revoke کن",
            "copyright": "© گواه گستر - DF-ENM-1404-8821 - fa-IR"
        }, ensure_ascii=False).encode('utf-8'))
