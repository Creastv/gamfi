<?php

/**
 * logotypy Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
 $id = 'logotypy-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'logotypy ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= 'text-' . $block['align'];
 }
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( have_rows('logotypy') ): ?>
    <div class=" logotypy-carousel">

        <?php while( have_rows('logotypy') ): the_row(); 
                $image = get_sub_field('logotyp');
                $link = get_sub_field('link');
                ?>
        <div class="logo">
            <?php if (!empty($link)) { ?>
            <a href="<?php echo $link; ?>" target="_blank">
                <?php } ?>
                <?php echo wp_get_attachment_image( $image, 'logo' ); ?>
                <?php if (!empty($link)) { ?>
            </a>
            <?php } ?>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <section>