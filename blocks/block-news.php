<?php
$id = 'news-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'news-block ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="wraper_news">
<?php if(get_field('model_wyswietlania_newsow') == "Wszystkie") { ?>

    <?php $args = array(
            'post_type' => 'news',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'ASC',  
        ); $loop = new WP_Query($args);
        if($loop->have_posts() ) : ?>
    <?php  while ($loop->have_posts()) : $loop->the_post(); ?>
                
        <article id="post-<?php the_ID(); ?>">
            <div class="content-pod">
                <?php if (has_post_thumbnail( $post->ID ) ) { ?>
                    <div class="img">
                    <?php the_post_thumbnail('medium'); ?>
                        <div class=" meta-data">
                           <?php echo get_the_date( 'j M Y', $new->ID ); //the_time('j M Y'); ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="content">
                    <h3 class="title-pod"><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
            </div>
        </article>

    <?php  endwhile; ?>
    <?php endif; wp_reset_query(); ?>

<?php } elseif(get_field('model_wyswietlania_newsow') == "Wybrane") { ?>
    <?php $news = get_field('wybrane_newsy');
        if( $news ): ?>
            <?php foreach( $news as $new ): 
                $cont = get_the_excerpt($new->ID);
                $thumb = get_the_post_thumbnail( $new->ID, 'medium');
                $title = get_the_title( $new->ID );

                ?>
                <article id="post-<?php the_ID(); ?>">
                    <div class="content-pod">
                        <?php if (has_post_thumbnail( $new->ID ) ) { ?>
                            <div class="img">
                            <?php echo $thumb; ?>
                            <div class=" meta-data">
                              <?php echo get_the_date( 'j M Y', $new->ID ); //the_time('j M Y'); ?>
                            </div>
                            </div>
                        <?php } ?>
                        <div class="content">
                            <h3 class="title-pod"><?php echo esc_html( $title ); ?></h3>
                            <?php echo $cont; ?>
                        </div>
                    </div>
                </article>

        <?php endforeach; ?>
        <?php endif; ?>
  
<?php } else { ?> 
    <?php $terms = get_field('kategorie', $post->ID);
    if( $terms ): ?>
        <?php foreach( $terms as $term ): ?>
            <?php $categories[] = $term->slug; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php 
    $postPerPage = get_field('ilosc_postow');
    $nr = $postPerPage;
    if(!empty($postPerPage) && $postPerPage == 0) { $nr = '-1'; };
    $displayField = get_field('sposob_wyswietlania');
    $display = ($displayField == "Randomowo") ? "rand" : "title" ;
    $args = array(
            'post_type' => 'news',
            'post_status' => 'publish',
            'posts_per_page' => $nr,
            'order' => 'ASC', 
            'orderby' => $display,
            'tax_query' => array(
                array(
                    'taxonomy' => 'cat-news',
                    'field'    => 'slug', // term_id, slug  
                    'terms'    => $categories,
                ),
            ), 
        ); $loop = new WP_Query($args);
        if($loop->have_posts() ) : ?>
    <?php  while ($loop->have_posts()) : $loop->the_post(); ?>
                
        <article id="post-<?php the_ID(); ?>">
            <div class="content-pod">
                <?php if (has_post_thumbnail( $post->ID ) ) { ?>
                    <div class="img">
                    <?php the_post_thumbnail('medium'); ?>
                    <div class=" meta-data">
                           <?php echo get_the_date( 'j M Y', $new->ID ); //the_time('j M Y'); ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="content">
                    <h3 class="title-pod"><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
       

    <?php  endwhile; ?>
    <?php endif; wp_reset_query(); ?>

<?php } ?>
</div>
</section>