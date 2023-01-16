<?php
/**
*
* Template name: Case study full width
* Template Post Type: case-study
*/
get_header(); ?>

<article class="col-md-12 " data-aos="fade-up" data-aos-duration="1200">
    <?php if (have_posts()) :
        while ( have_posts() ) : the_post();
        ?>
           <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</article>
<?php get_footer(); ?>
