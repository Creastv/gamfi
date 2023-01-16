<?php
/**
 * Restricted Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'restricted-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$classes = '';
if( !empty($block['className']) ) {
    $classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
    $classes .= sprintf( ' align%s', $block['align'] );
}

$cookie = get_field('cookie_name');

?>


    
<div id="<?php echo $id; ?>" class="restricted <?php echo esc_attr($classes); ?>" data-aos="fade-up" data-aos-duration="1000" >
    

        <h1>test front</h1>
      
        
        <InnerBlocks />
        
</div>


