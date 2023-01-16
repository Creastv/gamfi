<?php 
/**
 * Counter circle Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
 $id = 'counter-circle-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'counter-circle ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= 'text-' . $block['align'];
 }
 ?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" >
    <?php if( have_rows('counters_cilcle') ):  $i = 1 ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wraper" >
                <?php while( have_rows('counters_cilcle') ): the_row(); 
                    $title = get_sub_field('desc');
                    $procen = get_sub_field('procen');
                    $prefix = get_sub_field('prefix');
                    ?>
                    <div class="count">
                    <?php if(get_sub_field('title_display') == 1){ ?>
                        <p><?php echo $title; ?></p>
                        <?php } ?>
                        <div class="progressbar" data-animate="false">
                            <div class="circle" data-percent="<?php echo $procen; ?>">
                                <div class="num"> <span class="pro"><?php echo $procen; ?></span> <span><?php echo $prefix; ?></span></div>
                                <div class="circle-design one"></div>
                                <div class="circle-design two"></div>
                            </div>
                        </div>
                        <?php if(get_sub_field('title_display') == 0){ ?>
                        <p><?php echo $title; ?></p>
                        <?php } ?>
                    </div>
                <?php endwhile; $i++ ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>

