<?php get_header(); ?>
<div class="max-w-[1200px] mx-auto grid lg:grid-cols-12 gap-6"><div class="lg:col-span-7 bg-white rounded-[28px] border p-7"><h1 class="text-[24px] font-black"><?php the_title(); ?> - جزئیات خدمت + Mindmap Amazon</h1><?php the_content(); echo do_shortcode('[digifair_offers count="4"]'); ?></div><div class="lg:col-span-5"><div class="bg-zinc-900 text-white rounded-[24px] p-6"><h3>تحلیل Amazon/Alibaba</h3><p class="text-[11px] mt-2">Amazon.de €12k - Alibaba $450 - Mindmap</p></div><?php echo do_shortcode('[digifair_db_test]'); ?></div></div>
<?php get_footer(); ?>
