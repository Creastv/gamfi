<?php

/**
 * Testimonial Block Hero.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$head = get_field('headline');
$subhead = get_field('subhead');
$text = get_field('text_button');
$link = get_field('link_button');
$styl = get_field('style_buttona');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" >
   <h1 data-aos="fade-up" data-aos-duration="1000"><?php echo $head; ?></h1>
   <p data-aos="fade-up" data-aos-duration="1200"><?php echo $subhead; ?></p>
   <a  class="btn <?php echo $styl; ?> btn-md" data-aos="fade-up" data-aos-duration="1400" href="<?php echo $link; ?>"><?php echo $text; ?></a>
</section>