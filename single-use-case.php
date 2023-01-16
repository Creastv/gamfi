<?php get_header(); ?>
<article id="page-<?php the_ID(); ?>" class="page-content col-md-12 hentry" data-aos="fade-up" data-aos-duration="1200">
    <?php if (have_posts()) :
        while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</article>

<?php get_footer(); ?>