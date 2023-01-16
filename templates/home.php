<?php
/**
*
* Template name: Home
* Template Post Type: page, use-case
*/
get_header(); ?>
<article id="page-<?php the_ID(); ?>" class="col-md-12 hentry">
    <?php if (have_posts()) :
        while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</article>
<?php get_footer(); ?>