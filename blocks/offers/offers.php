<?php
$title = get_field('title');
$desc = get_field('desc');

 $id = 'swicher-offer-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'swicher-offer ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="wraper">
        <?php if($title && $desc){?>
        <div class="row text-center">
            <div class="col col1">
                <?php if($title){?>
                <h2><?php echo $title; ?></h2>
                <?php } ?>
                <?php if($desc){?>
                <p><?php echo $desc; ?></p>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <div class="row text-center">
            <div class="col col1">
                <div class="sw">
                    <div class="left">
                        <span><?php the_field('label_switcher');?></span>
                    </div>
                    <label class="switch" for="swicher">
                        <input id="swicher" type="checkbox">
                        <span class="slider round"></span>
                    </label>
                    <div class="right">
                        <span><?php the_field('label_switcher_two');?></span>
                    </div>
                </div>
            </div>
        </div>
        <!--offer 1 -->
        <?php if( have_rows('offers') ): ?>
        <?php while( have_rows('offers') ): the_row();  ?>
        <div id="offer1" class="active">
            <div class="row">
                <div class="col col2">
                    <div class="box" style="background-color:<?php the_sub_field('left_column_bg-color')?>;">
                        <h3 style="color:<?php the_sub_field('left_column_text-color')?>;"><?php the_sub_field('price')?></h3>
                        <?php 
                        $link = get_sub_field('btn');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="btn btn-main" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col col2">
                    <?php if( have_rows('bullets_list_') ): ?>
                    <ul class="bullets">
                        <?php while( have_rows('bullets_list_') ): the_row(); ?>
                        <li>
                            <svg width="30px" height="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 409.6 301" style="enable-background:new 0 0 409.6 301;" xml:space="preserve">
                                <path fill="green" class="st0" d="M0.6,148c1.8-7.5,4.6-14.5,10.5-19.7c13.9-12.4,32.6-11.5,46.6,2.4c29,28.9,57.9,57.9,86.8,86.8
                                    c1.1,1.1,1.9,2.5,3.4,4.5c1.7-2.2,2.6-3.5,3.7-4.6c67.1-67.1,134.2-134.2,201.3-201.4c10-10,21.6-13.7,35.3-9.4
                                    c20.5,6.4,28.7,33.5,15.2,50.2c-1.6,2-3.3,3.9-5,5.7c-75.1,75.2-150.3,150.3-225.4,225.4c-10.1,10.1-21.8,14.5-35.6,9.6
                                    c-5-1.8-9.8-5-13.6-8.8c-37.7-37.3-75.1-75-112.7-112.4c-5.7-5.7-9-12.4-10.7-20.1C0.6,153.3,0.6,150.7,0.6,148z" />
                            </svg>
                            <span> <?php the_sub_field('bullet'); ?></span>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <!--offer 2 -->

        <?php if( have_rows('offer_two') ): ?>
        <?php while( have_rows('offer_two') ): the_row();  ?>
        <div id="offer2">
            <div class="row">
                <div class="col col 2">
                    <div class="box" style="background-color:<?php the_sub_field('left_column_bg_color_two')?>;">
                        <h3 style="color:<?php the_sub_field('left_column_text_color_two')?>;"><?php the_sub_field('price_two')?></h3>
                        <?php 
                        $link = get_sub_field('btn_two');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="btn btn-main" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col col2">

                    <?php if( have_rows('bullets_list_two') ): ?>
                    <ul class="bullets">
                        <?php while( have_rows('bullets_list_two') ): the_row(); ?>
                        <li>
                            <svg width="30px" height="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 409.6 301" style="enable-background:new 0 0 409.6 301;" xml:space="preserve">
                                <path fill="green" class="st0" d="M0.6,148c1.8-7.5,4.6-14.5,10.5-19.7c13.9-12.4,32.6-11.5,46.6,2.4c29,28.9,57.9,57.9,86.8,86.8
                                    c1.1,1.1,1.9,2.5,3.4,4.5c1.7-2.2,2.6-3.5,3.7-4.6c67.1-67.1,134.2-134.2,201.3-201.4c10-10,21.6-13.7,35.3-9.4
                                    c20.5,6.4,28.7,33.5,15.2,50.2c-1.6,2-3.3,3.9-5,5.7c-75.1,75.2-150.3,150.3-225.4,225.4c-10.1,10.1-21.8,14.5-35.6,9.6
                                    c-5-1.8-9.8-5-13.6-8.8c-37.7-37.3-75.1-75-112.7-112.4c-5.7-5.7-9-12.4-10.7-20.1C0.6,153.3,0.6,150.7,0.6,148z" />
                            </svg>
                            <span> <?php the_sub_field('bullet'); ?></span>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
