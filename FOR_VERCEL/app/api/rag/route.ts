import { NextRequest } from 'next/server'
export async function POST(req: NextRequest) {
  const { question } = await req.json()
  return Response.json({
    lang: 'fa-IR',
    runtime: 'nodejs20.x @ Vercel - RAG',
    question,
    retrieved: [{ title_fa: 'الکامپ 1404 - غرفه 12م', score: 0.94 }],
    answer_fa: `برای ${question} - پاسخ RAG فارسی - Vercel Node+Python Dual - DB مشترک POSTGRES_PRISMA_URL پیش‌فرض بدون تغییر متغیر - fa-IR`,
    deployment: 'vercel-full-node-python-fa - RAG putting in - yes this kind'
  }, { headers: { 'Content-Language': 'fa-IR' } })
}
