<?php


$uid = $block['id'];
$className = 'g-testimonial';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}

?>
<div id="<?php echo $uid; ?>" class=" <?php echo esc_attr($className); ?>">
    <?php if( have_rows('tetimonials') ): ?>
    <div class="wraper-testimonial">
        <div class="swiper swiperTestimonial">
            <div class="swiper-wrapper">
                <?php while( have_rows('tetimonials') ): the_row(); 
                $kto = get_sub_field('person');
                $pozycja = get_sub_field('position');
                $co = get_sub_field('desc');
                $img = get_sub_field('person_img');
                ?>
                <div class="swiper-slide">
                    <div class="wraper">
                        <p><?php echo $co;?></p>
                        <div class="who">
                            <div class="left">
                                <?php if( $img ) {
                                    echo wp_get_attachment_image( $img, 'avatar' );
                                } ?>
                            </div>
                            <div class="right">
                                <h3><?php echo $kto;?> </h3>
                                <span><?php echo $pozycja;?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="arrow">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <?php endif; ?>
</div>
