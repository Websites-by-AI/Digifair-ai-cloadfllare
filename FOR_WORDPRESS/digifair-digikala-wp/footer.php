</main>
<footer class="mt-12 bg-white border-t border-[#EAE6E0]">
  <div class="max-w-[1320px] mx-auto px-4 py-10 grid lg:grid-cols-12 gap-8">
    <div class="lg:col-span-5">
      <div class="flex items-center gap-3"><div class="w-9 h-9 rounded-full bg-[#EF4056] text-white flex items-center justify-center font-black">D</div><div><p class="font-black">دیجی‌فیر - نسخه وردپرسی</p><p class="text-[11px] text-zinc-500">مدل دیجی‌کالای نمایشگاه برای افراد و غرفه‌داران - fa-IR پیش‌فرض - رنگ #EF4056 کپی‌رایت سیف</p></div></div>
      <p class="mt-4 text-[12px] leading-7 text-zinc-600">وب سایت تخصصی تامین خدمات نمایشگاهی - کلیه حقوق متعلق به شرکت گواه گستر جهان‌نما - نسخه وردپرسی کامل با ووکامرس + نمایشگاه + پنل AI هر نمایشگاه + Mindmap Amazon/Alibaba + Content Studio 12 مهارت + Enamad پایین راست. ساختار: افراد (بازدیدکننده) و غرفه‌داران (تامین‌کننده) با نقش‌های جدا.</p>
      <div class="mt-4 p-3 rounded-2xl bg-[#F7F5F0] border text-[11px] leading-5"><b>ساختار وردپرسی برای افراد و غرفه‌داران:</b><br>• نقش Visitor (فرد) - می‌تونه بلیط بخره، خدمات ببینه<br>• نقش Exhibitor (غرفه‌دار) - می‌تونه غرفه ثبت کنه، خدمات بفروشه، پنل AI مخصوص خودش<br>• نقش Vendor - تامین‌کننده خدمات<br>• همه با زبان پیش‌فرض فارسی</div>
    </div>
    <div class="lg:col-span-3">
      <p class="font-bold text-[13px]">دسترسی سریع - 5 صفحه اصلی</p>
      <div class="mt-4 grid grid-cols-2 gap-2 text-[12px] text-zinc-600">
        <a href="<?php echo home_url('/'); ?>">خانه - بهبود یافته</a>
        <a href="<?php echo home_url('/about-us'); ?>">درباره ما - سفیر تحول</a>
        <a href="<?php echo home_url('/contact-us'); ?>">تماس ۰۲۱-۳۲۸۰۵</a>
        <a href="<?php echo home_url('/exhibition'); ?>">نمایشگاه‌ها + AI Page</a>
        <a href="<?php echo home_url('/offers'); ?>">همه پیشنهادها ۱۴۷</a>
        <a href="<?php echo home_url('/panel'); ?>">پنل AI + Mindmap Amazon</a>
      </div>
      <p class="mt-6 font-bold text-[13px]">ماژول‌ها (شورتکد وردپرسی)</p>
      <ul class="mt-2 text-[11px] text-zinc-500 leading-6 mono">
        <li>[digifair_offers count="8"]</li>
        <li>[digifair_ai_page exhibition_id="EX-ELC-1404"]</li>
        <li>[digifair_mindmap company="رایا"]</li>
        <li>[digifair_db_test]</li>
      </ul>
    </div>
    <div class="lg:col-span-4 lg:border-r lg:pr-8 border-[#EAE6E0]">
      <p class="font-bold text-[13px]">مجوزها - پایین سمت راست (مثل دیجی‌کالا)</p>
      <div class="mt-4 grid grid-cols-3 gap-2">
        <div class="rounded-[20px] border bg-[#F7F5F0] p-3 text-center"><div class="w-full aspect-[0.9] rounded-[14px] bg-white border flex items-center justify-center font-bold text-[10px]">اینماد<br>DF-ENM</div><span class="text-[10px] font-bold">Enamad تایید</span></div>
        <div class="rounded-[20px] border bg-[#F7F5F0] p-3 text-center"><div class="w-full aspect-[0.9] rounded-[14px] bg-white border flex items-center justify-center">🏢</div><span class="text-[10px] font-bold">ساماندهی</span></div>
        <div class="rounded-[20px] border border-emerald-200 bg-emerald-50/40 p-3 text-center"><div class="w-full aspect-[0.9] rounded-[14px] bg-white border border-emerald-100 flex flex-col items-center justify-center"><span class="text-emerald-600">✓</span><span class="text-[9px] font-bold">SSL</span></div><span class="text-[10px] font-bold">پرداخت امن</span></div>
      </div>
      <div class="mt-4 p-3 rounded-xl bg-zinc-900 text-white mono text-[10px] leading-5">
        WP DB: <?php global $wpdb; echo DB_HOST.' / '.DB_NAME; ?> - بدون تغییر متغیر - مقادیر پیش‌فرض wp-config.php<br>
        Lang: fa-IR پیش‌فرض - © گواه گستر - DF-ENM-1404-8821
      </div>
      <?php echo do_shortcode('[digifair_db_test]'); ?>
    </div>
  </div>
  <div class="border-t py-4 text-center text-[11px] text-zinc-500">© ۱۴۰۴ گواه گستر جهان‌نما - نسخه وردپرسی - مدل دیجی‌کالای نمایشگاه برای افراد و غرفه‌داران - lang fa-IR - رنگ #EF4056 کپی‌رایت سیف - <?php echo get_num_queries(); ?> queries</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
