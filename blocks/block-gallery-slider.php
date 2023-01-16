<?php 
/**
 * Gallery slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
$id = 'gallery-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'gallery-slider ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" >
<?php $images = get_field('galeria'); if( $images ): ?>
    <div class="gallery">
    <div class="swiper-container gallery-carousel">
        <div class="swiper-wrapper">
            <?php foreach( $images as $image ):  $content = '<div class="swiper-slide" >';
                $content .= '<a class="gallery_image" href="'. $image['url'] .'">';
                $content .= '<img src="'. $image['sizes']['gallery-singel size'] .'" alt="'. $image['alt'] .'" />';
                $content .= '</a>';
                $content .= '</div>';
                if ( function_exists('slb_activate') ){ $content = slb_activate($content); } echo $content;?>
            <?php endforeach; ?>       
        </div>
        
    </div> 
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    </div>
<?php endif; ?>
</section>