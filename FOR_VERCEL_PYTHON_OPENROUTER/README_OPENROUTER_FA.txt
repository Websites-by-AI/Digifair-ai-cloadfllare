Vercel Single Python App - merging two Vercel apps into one by Python + OpenRouter API

دو Vercel اپ قبلی رو یکی کردیم به یک اپ Python تنها

فایل‌ها:
- vercel.json
- api/index.py
- api/rag_openrouter.py -> RAG با OpenRouter API از env OPENROUTER_API_KEY

OpenRouter API Key:
باید تو Vercel Dashboard > Settings > Environment Variables > OPENROUTER_API_KEY اضافه کنی
مقدار: sk-or-v1-... خودت (جدید بساز چون قبلی لو رفته و باید Revoke بشه)
OPENROUTER_MODEL = openai/gpt-4o-mini

تست:
/api/rag_openrouter?q=غرفه 12 متری برای الکامپ چی نیاز دارم؟

DB: POSTGRES_URL پیش‌فرض Vercel - بدون تغییر متغیر
زبان: fa-IR پیش‌فرض
