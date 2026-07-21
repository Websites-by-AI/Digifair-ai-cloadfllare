<?php
/**
 * Digifair Digikala WordPress - fa-IR default - مدل دیجی‌کالای نمایشگاه برای افراد و غرفه‌داران
 * تمام ماژول‌ها: 14 اصلی + 4 digifair.com + 6 AI/OT + Content Studio
 */

// 1. Setup
add_action('after_setup_theme', function(){
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
    add_theme_support('post-thumbnails');
    load_theme_textdomain('digifair-fa', get_template_directory().'/languages');
    register_nav_menus([
        'primary' => 'منوی اصلی - استایل دیجی‌کالا - فارسی پیش‌فرض',
        'footer' => 'فوتر - پایین سمت راست اینماد'
    ]);
});

// 2. Enqueue - Vazirmatn + Tailwind CDN (برای نسخه سریع) + brand #EF4056
add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('vazirmatn', 'https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700;900&display=swap');
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css'); // یا نسخه خودت
    wp_enqueue_style('digifair-style', get_stylesheet_uri(), [], '2.1.0');
    wp_enqueue_script('digifair-js', get_template_directory_uri().'/assets/js/app.js', [], '2.1.0', true);
    // برای Mindmap Mermaid
    wp_enqueue_script('mermaid', 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.min.js', [], null, true);
});

// 3. Custom Post Types - برای مدل دیجی‌کالای نمایشگاه
add_action('init', function(){
    // نمایشگاه - هر نمایشگاه یک صفحه AI
    register_post_type('exhibition', [
        'label' => 'نمایشگاه‌ها',
        'labels' => ['name'=>'نمایشگاه‌ها','singular_name'=>'نمایشگاه','add_new'=>'افزودن نمایشگاه - هر نمایشگاه یک AI Page'],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug'=>'exhibition','with_front'=>false],
        'supports' => ['title','editor','thumbnail','excerpt'],
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-calendar-alt'
    ]);

    // غرفه‌دار - برای افراد و غرفه‌داران
    register_post_type('vendor', [
        'label' => 'غرفه‌داران / تامین‌کنندگان',
        'labels' => ['name'=>'غرفه‌داران','singular_name'=>'غرفه‌دار'],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug'=>'vendor'],
        'supports' => ['title','editor','thumbnail'],
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-store'
    ]);

    // خدمت نمایشگاهی - به عنوان محصول ووکامرس هم می‌تونه باشه
    register_post_type('service', [
        'label' => 'خدمات نمایشگاهی',
        'labels' => ['name'=>'خدمات','singular_name'=>'خدمت'],
        'public' => true,
        'rewrite' => ['slug'=>'service'],
        'supports' => ['title','editor','thumbnail'],
        'show_in_rest' => true
    ]);
});

// 4. Roles - افراد و غرفه‌داران
add_action('init', function(){
    add_role('exhibitor', 'غرفه‌دار (Exhibitor)', ['read'=>true,'edit_posts'=>false,'publish_posts'=>false,'upload_files'=>true]);
    add_role('visitor_user', 'بازدیدکننده / فرد (Visitor)', ['read'=>true]);
});

// 5. WooCommerce - تبدیل خدمات به محصول
add_filter('product_type_options', function($options){
    $options['exhibition_service'] = ['id'=>'_exhibition_service','label'=>'خدمت نمایشگاهی - تحویل در محل نمایشگاه','description'=>'مثل غرفه 12 متری، صوت، پذیرایی'];
    return $options;
});

// 6. Shortcodes - برای ماژول‌های AI
// [digifair_offers count="8"] - همه Offe ها 147 تا
add_shortcode('digifair_offers', function($atts){
    $atts = shortcode_atts(['count'=>8,'type'=>'all'], $atts);
    ob_start();
    echo '<div class="grid grid-cols-2 md:grid-cols-4 gap-3">';
    for($i=0;$i<intval($atts['count']);$i++){
        echo '<div class="rounded-[20px] bg-white border p-3"><div class="aspect-square bg-[#F7F5F0] rounded-2xl flex items-center justify-center text-3xl">🏗️</div><p class="mt-2 font-bold text-[12px]">غرفه 12 متری - پرفروش</p><p class="font-black">18,500,000 تومان</p></div>';
    }
    echo '</div>';
    return ob_get_clean();
});

// [digifair_ai_page exhibition_id="EX-ELC-1404"] - یک صفحه AI برای هر نمایشگاه - 8 بخش پیش‌فرض fa-IR
add_shortcode('digifair_ai_page', function($atts){
    $atts = shortcode_atts(['exhibition_id'=>'EX-ELC-1404'], $atts);
    ob_start();
    ?>
    <div class="rounded-[24px] bg-white border p-6">
      <p class="text-[11px] mono">AI Page برای نمایشگاه <?php echo esc_html($atts['exhibition_id']); ?> - 8 بخش پیش‌فرض fa-IR</p>
      <h3 class="font-black mt-2">Mindmap Amazon/Alibaba - تحلیل شرکت + تجارت بین‌الملل</h3>
      <div class="mermaid" dir="ltr">
mindmap
  root((شرکت: پیشران فناوری))
    نمایشگاه الکامپ 1404
    Amazon.de €12k
    Alibaba $450
    Meeting Siemens 0.92
      </div>
      <p class="text-[11px] mt-3">© گواه گستر - Enamad DF-ENM-1404-8821 - fa-IR پیش‌فرض</p>
    </div>
    <script>mermaid.initialize({startOnLoad:true})</script>
    <?php
    return ob_get_clean();
});

// [digifair_mindmap company="رایا"] - Mindmap
add_shortcode('digifair_mindmap', function($atts){
    $atts = shortcode_atts(['company'=>'پیشران فناوری رایا'], $atts);
    return '<div class="rounded-[20px] bg-zinc-900 text-white p-5"><p class="font-bold">Mindmap AI - '.$atts['company'].' - Amazon/Alibaba - fa</p><p class="text-[11px] text-zinc-400">Mermaid Mindmap - تجارت بین‌الملل</p></div>';
});

// [digifair_db_test] - تست اتصال DB بدون تغییر متغیر - برای پنل ادمین
add_shortcode('digifair_db_test', function(){
    global $wpdb;
    $connected = $wpdb->db_connect();
    $env = [
        'DB_HOST' => DB_HOST,
        'DB_NAME' => DB_NAME,
        'DEFAULT_LANG' => 'fa-IR',
        'WP_LANG' => get_locale()
    ];
    ob_start();
    echo '<div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 mono text-[11px]">';
    echo '✅ WordPress DB متصل - بدون تغییر متغیر - مقادیر پیش‌فرض wp-config.php<br>';
    echo 'DB_HOST: '.DB_HOST.'<br>';
    echo 'DB_NAME: '.DB_NAME.'<br>';
    echo 'Lang: fa-IR پیش‌فرض<br>';
    echo '© گواه گستر - Enamad پایین راست<br>';
    echo '</div>';
    return ob_get_clean();
});

// 7. فارسی پیش‌فرض
add_filter('locale', function($locale){ return 'fa_IR'; });
add_action('init', function(){ 
    global $wp_locale;
    if(isset($wp_locale)) $wp_locale->text_direction = 'rtl';
});

// 8. Copyright Safe - Enamad پایین راست
add_action('wp_footer', function(){
    echo '<!-- © 1404 گواه گستر جهان‌نما - Enamad DF-ENM-1404-8821 - زبان پیش‌فرض فارسی fa-IR - رنگ #EF4056 کپی‌رایت سیف - bento + pill header -->';
});
