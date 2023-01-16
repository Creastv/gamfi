<?php get_header(); ?>
<div class="page-content case-study-content-single" data-aos="fade-up" data-aos-duration="1200">
    
    <div class="case-study-sidebar">
        <div class="entry-post-feature">
            <?php the_post_thumbnail('medium_large'); ?>
        </div>
    </div>
    <div class="case-study-main-content">
        <div class="entry-post-categories">
        <?php the_terms($post->ID, 'case-studies') ?>
        </div>
        <article id="page-<?php the_ID(); ?>" class="hentry">
            <?php if (have_posts()) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="entry-post-categories">
                        <?php the_category( ', ' ); ?>
                    </div>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </article>
    </div>
</div>
<section class="sy-cs" data-aos="fade-up" data-aos-duration="1200">
    <div class="wraper">
    <?php $args = array('post_type' => 'case-study', 'posts_per_page' => 6, 'post__not_in' => array( get_the_ID() ));
        $post_query = new WP_Query($args); 
        if($post_query->have_posts() ) : ?>
        <div class="swiper-container cs-carousel">
            <div class="swiper-wrapper">
        <?php while($post_query->have_posts() ) :  $post_query->the_post(); ?>
               <div class="swiper-slide">
               <?php get_template_part( 'templates/content-case-study', get_post_format() ); ?>
               </div>
        <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>