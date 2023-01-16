<article id="post-<?php the_ID(); ?>" class="post-article col-md-6 col-lg-4" >
    <div class="content-post">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium'); ?>
        </a>
        <div class="content">

            <div class="entry-post-categories">
				<?php the_category( ', ' ); ?>
            </div>

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
           
            <div class="entry-post-meta">
                <div class="entry-author-meta">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                        <?php the_author(); ?>
                    </a>
                </div>
                <div class="post-date">
                    <span class="far fa-calendar meta-icon"></span>
                    <?php echo get_the_date(); ?>
                </div>
            </div>
        </div>
    </div>
</article>

