<?php
$id = 'posts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'posts-block ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="wraper_posts">
<?php if(get_field('model_wyswietlania_wpisy') == "Wszystkie") { ?>

    <?php $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'ASC',  
        ); $loop = new WP_Query($args);
        if($loop->have_posts() ) : ?>
    <?php  while ($loop->have_posts()) : $loop->the_post(); ?>
          <?php if(!get_field('ukryj_post', get_the_ID()) == true) { ?>      
         <?php get_template_part( 'templates/content-post-block', get_post_format() ); ?>
	<?php } ?>

    <?php  endwhile; ?>
    <?php endif; wp_reset_query(); ?>

<?php } elseif(get_field('model_wyswietlania_wpisy') == "Wybrane") { ?>
    <?php $wpisy = get_field('wybrane_wpisy');
        if( $wpisy ): ?>
            <?php foreach( $wpisy as $wpis ): 
                $permalink = get_permalink( $wpis->ID );
                $thumb = get_the_post_thumbnail( $wpis->ID, 'medium');
                $title = get_the_title( $wpis->ID );
                $catt = get_the_category( ', ',  $wpis->ID);
				$data = get_the_date('', $wpis->ID); 
                $author_id = $wpis->post_author;

                ?>
                
                <article id="post-<?php the_ID(); ?>" class="post-article col-md-6 col-lg-4" >
                    <div class="content-post">
                        <a href="<?php echo $permalink; ?>">
                           <?php echo $thumb; ?>
                        </a>
                        <div class="content">
                            <div class="entry-post-categories">
                                 <?php $terms = wp_get_post_terms($wpis->ID, 'category'); ?>
                                    <?php foreach($terms as $term):?>
                                        <a href="<?php echo get_term_link( $term )?>"><?php echo($term->name); ?></a>
                                    <?php endforeach; ?>
                            </div>

                            <p class="h2"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></p>
                        
                            <div class="entry-post-meta">
                                <div class="entry-author-meta">
                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                        <?php the_author_meta( 'display_name' , $author_id ); ?>
                                    </a>
                                </div>
                                <div class="post-date">
                                    <span class="far fa-calendar meta-icon"></span>
                                    <?php echo $data; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

        <?php endforeach; ?>
        <?php endif; ?>
  
<?php } elseif(get_field('model_wyswietlania_wpisy') == "Trzy ostatnie wpisy") { ?> 
        
        <?php  $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'meta_query' => array(
                array(
                    'key' => 'ukryj_post',
                    'value' => true,
                    'compare' => 'NOT LIKE'
                ),
            )
        ); $loop = new WP_Query($args);

        if($loop->have_posts() ) : ?>
        <?php  while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php get_template_part( 'templates/content-post-block', get_post_format() ); ?>
        <?php  endwhile; ?>
        <?php endif; wp_reset_query(); ?>

<?php } else { ?> 
    <?php $terms = get_field('kategorie', $post->ID);
    $cate = '';
    if( $terms ): ?>
        <?php foreach( $terms as $term ): ?>
            <?php
              $cate .= $term->slug . ', ';
            ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php 
    $postPerPage = get_field('ilosc_postow');
    $nr = $postPerPage;
    if(!empty($postPerPage) && $postPerPage == 0) { $nr = '-1'; };
    $displayField = get_field('sposob_wyswietlania');
    $display = ($displayField == "Randomowo") ? "rand" : "title" ;
    $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $nr,
            'order' => 'ASC', 
            'orderby' => $display,
            'category_name' => $cate,
        ); $loop = new WP_Query($args);
        if($loop->have_posts() ) : ?>

    <?php  while ($loop->have_posts()) : $loop->the_post(); ?>
	    <?php if(!get_field('ukryj_post', get_the_ID()) == true) { ?>
        <?php get_template_part( 'templates/content-post-block', get_post_format() ); ?>
	    <?php } ?>
    <?php  endwhile; ?>
    <?php endif; wp_reset_query(); ?>

<?php } ?>
</div>
</section>