<?php
/**
*
* Template name: Restict content by cookie
* Template Post Type: page, use-case
*/
get_header(); ?>

<article class="col-md-12 ">
    <?php if (have_posts()) :
        while ( have_posts() ) : the_post();
        $co = get_field('cookies_restriction');
        ?>
        <?php if(isset( $_COOKIE[$co])) { ?>
           <?php the_content(); ?>
	    <?php } elseif ( is_user_logged_in() ) { ?>
	        <?php the_content(); ?>
        <?php }?>
        <?php endwhile; ?>
    <?php endif; ?>
</article>
<?php get_footer(); ?>
