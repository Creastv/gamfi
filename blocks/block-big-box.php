<?php

/**
 * Bigboxes Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
 $id = 'big-boxes-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'big-boxes ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= 'text-' . $block['align'];
 }
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
    <?php if( have_rows('boxes_big') ): $i = 1 ?>
        <ul>
            <?php while( have_rows('boxes_big') ): the_row(); 
                $image = get_sub_field('img');
                ?>
                <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $i++ ; ?>00">
                   <div class="wraper">
                    <?php echo wp_get_attachment_image( $image, '' ); ?>
                    <div class="desc">
                        <?php the_sub_field('tresc'); ?>
                    </div>
                    </div>
                </li>
            <?php endwhile; $i++ ?>
        </ul>
    <?php endif; ?>
    </div>
    <svg id="w" version="1.1" xmlns="http://www.w3.org/2000/svg"><path id="wave" d=""/></svg>
    <!-- <svg  id="top" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="none" viewBox="0 0 4 0.266661"><polygon points="4,0 4,0.266661 -0,0.266661"></polygon></svg> -->
</section>
