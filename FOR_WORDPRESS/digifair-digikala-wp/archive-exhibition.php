<?php get_header(); ?>
<div class="bg-white rounded-[24px] border p-6"><h1 class="font-black text-[20px]">نمایشگاه‌ها - هر کدام یک AI Page</h1><div class="mt-6 grid md:grid-cols-3 gap-4"><?php if(have_posts()): while(have_posts()): the_post(); ?><div class="rounded-[24px] border p-5"><h3 class="font-black"><?php the_title(); ?></h3><a href="<?php the_permalink(); ?>" class="mt-3 inline-flex h-9 px-4 rounded-full bg-brand text-white text-[12px]">رفتن به AI Page 8 بخشی</a></div><?php endwhile; endif; ?></div></div>
<?php get_footer(); ?>
