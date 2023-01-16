<?php
/**
*
* Template name: Page with out title page
* Template Post Type: page, use-case
*/
get_header(); ?>

<article class="col-md-12 ">
    <?php if (have_posts()) :
        while ( have_posts() ) : the_post();
        ?>
           <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</article>
<?php get_footer(); ?>
