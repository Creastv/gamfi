<?php get_header(); ?>
<?php if (($post->post_type == 'case-study') || is_author()) { ?>
<?php } else { ?>
	<?php
			$categories = get_categories( array(
				'orderby' => 'name',
				'order'   => 'ASC'
			) );
			echo '<div class="blog-cats" data-aos="fade-up" data-aos-duration="1000"><ul>';
			foreach( $categories as $category ) {
			 echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';   
			}
			echo '</ul></div>';
	?>
<?php } ?>
    <div class=" row page-content " data-aos="fade-up" data-aos-duration="1200">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php if ($post->post_type == 'case-study') { ?>
                <?php get_template_part( 'templates/content-case-study', get_post_format() ); ?>
            <?php } else { ?>
		        <?php //if(!get_field('ukryj_post') == true) { ?>
                <?php get_template_part( 'templates/content-post', get_post_format() ); ?>
		        <?php //} ?>
            <?php } ?>
            <?php endwhile; ?>
		 <div class="container">
                <div class="row">
                    <div class="col-md-12">
		            <?php  wp_pagenavi(); ?>
					</div>
			 </div>
		</div>
        <?php else : ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <h1 class="text-center">Nic nie znaleziono</h1>
                    <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
           
        <?php endif; ?>
    </div>

<?php get_footer(); ?>
