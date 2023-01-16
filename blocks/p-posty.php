<?php
$id = 'p-posts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'proponowane-posty ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php $featured_posts = get_field('proponowane_posty');
    if( $featured_posts ): ?>
    <ul>
        <?php foreach( $featured_posts as $featured_post ): 
		 setup_postdata($featured_post->ID);
        $permalink = get_permalink( $featured_post->ID );
        $title = get_the_title( $featured_post->ID );
        ?>
        <li>
            <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
        </li>
        <?php wp_reset_postdata(); endforeach; ?>
		<?php wp_reset_postdata(); ?>
    </ul>
    <?php endif; ?>
</div>
