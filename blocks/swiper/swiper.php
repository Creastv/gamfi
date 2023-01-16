<?php


$uid = $block['id'];
$className = 'g-swiper';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}

?>
<div id="<?php echo $uid; ?>" class=" <?php echo esc_attr($className); ?>">
    <?php if( have_rows('zdjecia_swiper') ): ?>
    <div class="wraper-swiper">
        <div class="swiper swiperSwiper">
            <div class="swiper-wrapper">
                <?php while( have_rows('zdjecia_swiper') ): the_row(); 
                $img = get_sub_field('zdj');
                ?>
                <div class="swiper-slide">
                    <div class="wraper">
                    <?php if( $img ) {
                       echo wp_get_attachment_image( $img, 'thumnail' );
                    } ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <?php endif; ?>
</div>
