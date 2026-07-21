<?php
/**
 * Front Page - صفحه اصلی بهبود یافته - 5 صفحه اصلی + همه ماژول‌ها - مدل دیجی‌کالای نمایشگاه
 * fa-IR پیش‌فرض
 */
get_header();
?>
<div class="grid grid-cols-12 gap-4">
  <div class="col-span-12 lg:col-span-8 rounded-[32px] bg-white border p-8 min-h-[440px] flex flex-col justify-between">
    <div>
      <span class="px-3 py-1 rounded-full bg-[#EF4056]/10 border border-[#EF4056]/20 text-[#EF4056] text-[11px] font-bold">نسخه وردپرسی - مدل دیجی‌کالای نمایشگاه - برای افراد و غرفه‌داران - fa-IR</span>
      <h1 class="mt-5 text-[36px] font-black leading-[0.9]">هرچی برای<br><span class="text-[#EF4056]">رویدادت لازمه</span><br>همینجاست</h1>
      <p class="mt-4 text-[13px] leading-7 text-zinc-600 max-w-[460px]">دیجی‌فیر وردپرسی - الهام گرفته از دیجی‌کالا ولی با ووکامرس + نمایشگاه + پنل AI هر نمایشگاه (8 بخش پیش‌فرض فارسی) + Mindmap Amazon/Alibaba + Content Studio 12 مهارت - برای افراد (بازدیدکننده) و غرفه‌داران (تامین‌کننده) با نقش جدا.</p>
      <div class="mt-6 flex gap-2">
        <a href="<?php echo home_url('/exhibition'); ?>" class="h-11 px-6 rounded-full bg-[#EF4056] text-white font-bold text-[13px]">نمایشگاه‌ها + AI Panel</a>
        <a href="<?php echo home_url('/offers'); ?>" class="h-11 px-6 rounded-full bg-zinc-900 text-white font-bold text-[13px]">همه Offer ها 147</a>
      </div>
    </div>
    <div class="grid grid-cols-3 gap-2 max-w-[340px] mt-8">
      <div class="rounded-2xl bg-[#F7F5F0] border p-3"><p class="font-black">۱۴۷</p><p class="text-[11px] text-zinc-500">Offer</p></div>
      <div class="rounded-2xl bg-[#F7F5F0] border p-3"><p class="font-black">۲۴</p><p class="text-[11px] text-zinc-500">ماژول</p></div>
      <div class="rounded-2xl bg-[#F7F5F0] border p-3"><p class="font-black">fa-IR</p><p class="text-[11px] text-zinc-500">پیش‌فرض</p></div>
    </div>
  </div>
  <div class="col-span-12 lg:col-span-4 grid grid-rows-2 gap-4 h-[440px]">
    <div class="rounded-[28px] bg-zinc-900 text-white p-6 flex flex-col justify-between"><p class="text-[11px] px-2.5 py-1 rounded-full bg-white/10 w-fit">برای افراد</p><h3 class="font-black text-[16px]">بازدیدکننده هستی؟<br>بلیط بخر، خدمات ببین</h3><a href="<?php echo home_url('/ticket'); ?>" class="mt-4 h-9 px-4 rounded-full bg-white text-zinc-900 font-bold text-[12px] w-fit">خرید بلیط</a></div>
    <div class="rounded-[28px] bg-[#EF4056] text-white p-6 flex flex-col justify-between"><p class="text-[11px] bg-white/20 w-fit px-2.5 py-1 rounded-full">برای غرفه‌داران</p><h3 class="font-black text-[16px]">غرفه‌دار هستی؟<br>پنل AI مخصوص خودت</h3><a href="<?php echo home_url('/panel'); ?>" class="mt-4 h-9 px-4 rounded-full bg-white text-[#EF4056] font-bold text-[12px] w-fit">ورود به پنل AI</a></div>
  </div>
</div>

<div class="mt-6">
  <h3 class="font-black text-[16px]">پرفروش‌ترین خدمات نمایشگاهی - ووکامرس - برای افراد و غرفه‌داران</h3>
  <?php echo do_shortcode('[digifair_offers count="8"]'); ?>
</div>

<div class="mt-8 grid lg:grid-cols-12 gap-4">
  <div class="lg:col-span-8 bg-white rounded-[24px] border p-6">
    <h3 class="font-black">هر نمایشگاه یک صفحه AI + Mindmap Amazon - نمونه</h3>
    <?php echo do_shortcode('[digifair_ai_page exhibition_id="EX-ELC-1404"]'); ?>
  </div>
  <div class="lg:col-span-4 space-y-4">
    <div class="bg-white rounded-[24px] border p-5"><h4 class="font-bold text-[13px]">نقش‌ها - افراد و غرفه‌داران</h4><ul class="mt-3 text-[12px] leading-7 list-disc pr-5"><li>بازدیدکننده (Visitor) - فرد عادی - بلیط، خدمات</li><li>غرفه‌دار (Exhibitor) - غرفه ثبت، خدمات فروش، پنل AI</li><li>تامین‌کننده (Vendor) - خدمات ارائه، مچینگ AI</li></ul></div>
    <div class="bg-zinc-900 text-white rounded-[24px] p-5"><h4 class="font-bold text-[13px]">ساختار وردپرسی - 5 صفحه اصلی</h4><p class="mt-2 text-[11px] leading-6 text-zinc-400">1. خانه (front-page.php) - بهبود یافته - bento<br>2. درباره ما - سفیر تحول<br>3. تماس - 021-32805<br>4. نمایشگاه‌ها (archive-exhibition.php) - هر کدام یک AI Page 8 بخشی<br>5. جزئیات خدمت (single-product.php / single-service.php) + Mindmap Amazon/Alibaba + تست DB بدون تغییر متغیر</p></div>
  </div>
</div>

<?php get_footer(); ?>
