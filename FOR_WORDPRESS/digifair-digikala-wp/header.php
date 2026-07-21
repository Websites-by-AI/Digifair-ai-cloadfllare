<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<style>
*{font-family:Vazirmatn, Tahoma, sans-serif}
.bg-brand{background:#EF4056} .text-brand{color:#EF4056}
.bg-sand{background:#F7F5F0} .border-line{border-color:#EAE6E0}
.rounded-4xl{border-radius:2rem}
</style>
</head>
<body <?php body_class('bg-[#F7F5F0] text-[#0E0E10]'); ?>>
<!-- Top notice -->
<div class="bg-[#0E0E10] text-white text-[11px] py-2 text-center">نسخه وردپرسی - مدل دیجی‌کالای نمایشگاه برای افراد و غرفه‌داران - زبان پیش‌فرض فارسی fa-IR - رنگ #EF4056 کپی‌رایت سیف</div>

<header class="sticky top-3 z-50 px-4">
  <div class="max-w-[1320px] mx-auto h-[64px] rounded-full bg-white/90 backdrop-blur shadow-[0_8px_30px_-12px_rgba(0,0,0,0.15)] border border-white flex items-center gap-4 px-5">
    <a href="<?php echo home_url('/'); ?>" class="flex items-center gap-2.5">
      <div class="w-9 h-9 rounded-full bg-[#EF4056] text-white flex items-center justify-center font-black">D</div>
      <div><p class="font-black text-[15px]"><?php bloginfo('name'); ?> - دیجی‌فیر</p><p class="text-[10px] text-zinc-500">نسخه وردپرسی • fa پیش‌فرض • برای افراد و غرفه‌داران</p></div>
    </a>

    <form role="search" method="get" action="<?php echo home_url('/'); ?>" class="flex-1 max-w-[520px] mx-auto relative hidden md:block">
      <input type="search" name="s" placeholder="جستجو: غرفه 12 متری، اسپیس فریم..." class="w-full h-[42px] pr-10 rounded-full bg-[#F7F5F0] border border-[#EAE6E0] focus:bg-white focus:border-[#EF4056]/30 focus:outline-none text-[13px]">
      <span class="absolute right-3.5 top-1/2 -translate-y-1/2 text-zinc-400">⌕</span>
    </form>

    <div class="mr-auto flex items-center gap-2">
      <?php if(is_user_logged_in()): $user = wp_get_current_user(); ?>
        <a href="<?php echo home_url('/my-account'); ?>" class="h-10 px-4 rounded-full bg-zinc-900 text-white text-[12px] font-bold flex items-center">سلام، <?php echo $user->display_name; ?></a>
      <?php else: ?>
        <a href="<?php echo wp_login_url(); ?>" class="h-10 px-4 rounded-full border bg-white text-[12px] font-bold">ورود | ثبت‌نام (فرد / غرفه‌دار)</a>
      <?php endif; ?>
      <a href="<?php echo wc_get_cart_url(); ?>" class="h-10 w-10 lg:w-auto lg:px-4 rounded-full bg-ink text-white flex items-center justify-center gap-2 text-[12px] font-bold bg-zinc-900">🛒 <span class="hidden lg:inline">سبد</span></a>
    </div>
  </div>
  <div class="max-w-[1320px] mx-auto mt-3 flex gap-2 overflow-x-auto px-2">
    <a href="<?php echo home_url('/'); ?>" class="h-8 px-4 rounded-full bg-zinc-900 text-white text-[12px] font-bold">خانه</a>
    <a href="<?php echo home_url('/exhibition'); ?>" class="h-8 px-4 rounded-full bg-white border text-[12px] font-bold">نمایشگاه‌ها - هر کدام یک AI Page</a>
    <a href="<?php echo home_url('/product-category/exhibition-services/'); ?>" class="h-8 px-4 rounded-full bg-white border text-[12px] font-bold">دسته‌بندی خدمات - برای افراد و غرفه‌داران</a>
    <a href="<?php echo home_url('/offers'); ?>" class="h-8 px-4 rounded-full bg-white border text-[12px] font-bold">همه پیشنهادها 147</a>
    <a href="<?php echo home_url('/panel'); ?>" class="h-8 px-4 rounded-full bg-white border text-[12px] font-bold">پنل AI + Mindmap Amazon</a>
  </div>
</header>
<main class="max-w-[1320px] mx-auto px-4 mt-6">
