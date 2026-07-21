<?php get_header(); the_post(); ?>
<div class="max-w-[1200px] mx-auto grid lg:grid-cols-12 gap-6"><div class="lg:col-span-8 bg-white rounded-[28px] border p-7"><h1 class="text-[24px] font-black"><?php the_title(); ?> - AI Page</h1><div class="mt-4"><?php the_content(); ?></div><?php echo do_shortcode('[digifair_ai_page exhibition_id="'.get_the_ID().'"]'); ?></div><div class="lg:col-span-4"><?php echo do_shortcode('[digifair_mindmap company="پیشران رایا"]'); ?></div></div>
<?php get_footer(); ?>
