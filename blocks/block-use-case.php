<?php
$id = 'usecase-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'usecase-block ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="wraper_usecase">
<?php if(get_field('model_wyswietlania_usecasow') == "Wszystkie") { ?>

    <?php $args = array(
            'post_type' => 'use-case',
            'post_status' => "publish",
            'posts_per_page' => -1,
            'order' => 'DSC',  
        ); $loop = new WP_Query($args);
        if($loop->have_posts() ) : ?>
    <?php  while ($loop->have_posts()) : $loop->the_post(); ?>
                
        <article id="post-<?php the_ID(); ?>">
            <div class="content-pod">
                <div class="content">
                <h2 class="title-pod"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Dowiedz się więcej</a>
                </div>
            </div>
        </article>

    <?php  endwhile; ?>
    <?php endif; wp_reset_query(); ?>

<?php } elseif(get_field('model_wyswietlania_usecasow') == "Wybrane") { ?>
    <?php $news = get_field('wybrane_newsy');
        if( $news ): ?>
            <?php foreach( $news as $new ): 
                $permalink = get_the_permalink($new->ID);
                $cont = get_the_excerpt($new->ID);
                $title = get_the_title( $new->ID );
                ?>
                <article id="post-<?php the_ID(); ?>">
                    <div class="content-pod">
                        <div class="content">
                            <h2 class="title-pod"><a href="<?php echo esc_html( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h2>
                            <p><?php echo $cont; ?></p>
                            <a href="<?php echo esc_html( $permalink ); ?>" >Dowiedz się więcej</a>
                        </div>
                    </div>
                </article>
        <?php endforeach; ?>
        <?php endif; ?>
<?php } else { ?> 
    <?php $terms = get_field('kategorie_us', $post->ID);
    if( $terms ): ?>
        <?php foreach( $terms as $term ): ?>
            <?php $categories[] = $term->slug;
             $cat = $categories;
            ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php 
    $postPerPage = get_field('ilosc_postow');
    $p = $postPerPage;
    if(!empty($postPerPage) && $postPerPage == 0) { $n = '-1'; };
    $displayField = get_field('sposob_wyswietlania');
    $display = ($displayField == "Randomowo") ? "rand" : "date" ;
    $args = array(
            'post_type' => 'use-case',
            'post_status' => "publish",
            'posts_per_page' => $p,
            'order' => 'DSC', 
            'orderby' => $display,
            'tax_query' => array(
                array(
                    'taxonomy' => 'use-cases',
                    'field'    => 'slug', // term_id, slug  
                    'terms'    => $cat,
                ),
            ), 
        ); $loop = new WP_Query($args);
        if($loop->have_posts() ) : ?>
    <?php  while ($loop->have_posts()) : $loop->the_post(); ?>
                
        <article id="post-<?php the_ID(); ?>">
            <div class="content-pod">
                <div class="content">
                <h2 class="title-pod"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Dowiedz się więcej</a>
                </div>
            </div>
        </article>
       

    <?php  endwhile; ?>
    <?php endif; wp_reset_query(); ?>

<?php } ?>
</div>
</section>