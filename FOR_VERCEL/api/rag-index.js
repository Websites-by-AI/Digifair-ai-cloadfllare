export default function handler(req, res) {
  res.setHeader('Content-Language', 'fa-IR');
  res.status(200).json({
    ok: true,
    runtime: 'nodejs @ Vercel - Basic Landing - RAG ready',
    message: 'RAG Model Node - برای Vercel نسخه همین مدلیه؟ بله - Node+Python هر دو',
    endpoints: {
      node_rag: '/api/rag (Node)',
      python_rag: '/api/python/rag_model.py (Python) - هر دو یک DB مشترک'
    },
    question_example: { question: 'غرفه 12 متری برای الکامپ چی نیاز دارم؟' },
    default_lang: 'fa-IR'
  });
}
