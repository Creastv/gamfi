<?php get_header(); ?>
<article id="page-<?php the_ID(); ?>" class="page-content col-md-12 hentry" data-aos="fade-up" data-aos-duration="1200">
    <?php
    // $page_id=8546;
        $page_id=8458; // Add id of the page
        $post = get_post($page_id);
        $content = apply_filters('the_content', $post->post_content);
        echo $content;
    ?>
</article>

<?php get_footer(); ?>