<?php
$id = 'posts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'proponowane-usecase ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php $featured_posts = get_field('proponowane_usecase');
    if( $featured_posts ): ?>
    <ul>
        <?php foreach( $featured_posts as $featured_post ): 
        $permalink = get_permalink( $featured_post->ID );
        $title = get_the_title( $featured_post->ID );
        ?>
        <li>
            <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>
