<?php
/**
 * Container Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'container-animation-' . $block['id'];
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
?>
<div class="animate-block <?php echo esc_attr($classes); ?>" data-aos="fade-up" data-aos-duration="1000" >

    <?php if( get_field('container') == 0 ) { ?>
    <div id="<?php echo $id; ?>" class="full-width" style="background-color: <?php the_field('background_color_c_animation')?>">
        <div class="container">
           <InnerBlocks />
        </div>
        </div>
    <?php } else { ?>
    <div id="<?php echo $id; ?>" style="background-color: <?php the_field('background_color_c_animation')?>">
        <div class="container-fluid">
           <InnerBlocks />
        </div>
        </div>
    <?php } ?>
        
    

    <style type="text/css">
        #<?php echo $id; ?> {
            padding-top: <?php the_field('padding_top_c_anomation') ?>px;
            padding-bottom: <?php the_field('padding_bottom_c_animation') ?>px;
        }
    </style>
</div>