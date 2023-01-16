<?php

/**
 * miniboxys Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
 $id = 'mini-boxes-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'mini-boxes ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= 'text-' . $block['align'];
 }
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container-fluid">
    <?php if( have_rows('boxes') ): $i = 1 ?>
        <ul>
            <?php while( have_rows('boxes') ): the_row(); 
                $image = get_sub_field('img');
                $title = get_sub_field('title');
                ?>
                
                <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $i++ ; ?>00">
                <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                <p><?php echo $title; ?></p>
                </li>
            <?php endwhile; $i++ ?>
        </ul>
    <?php endif; ?>
    </div>
</section>
