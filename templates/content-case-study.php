<article id="post-<?php the_ID(); ?>" class=" col-md-6 col-lg-4" >
    <div class="content-post content-case-study">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium'); ?>
        </a>
        <div class="content">
           
            <div class="entry-post-categories">
                <?php the_terms($post->ID, 'case-studies') ?>
            </div>
            
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        
        </div>
    </div>
</article>

