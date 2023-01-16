<?php

/**
 * Pakiety Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
 $id = 'pakiety-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'pakiety ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= 'text-' . $block['align'];
 }
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <?php if( have_rows('pakiety') ): ?>
        <div class="wraper">
           <?php if(get_field('first_column')) : ?>
            <div class="pakiet pakiet-title">
                <h2><?php the_field('title_section'); ?></h2>
                <p><?php the_field('desc_section'); ?></p>
            </div>
            <?php endif; ?>
            <?php while( have_rows('pakiety') ): the_row(); 
                $title = get_sub_field('title');
                $des = get_sub_field('desc');
                $buttonText = get_sub_field('button_text');
                $buttonLink = get_sub_field('bultton_link');
                $buttonStyle = get_sub_field('button_style');
                $popular = get_sub_field('popular_choice');
                $popularLabel = get_sub_field('label_-_popular_choice');
            ?>  
                
                <div class="pakiet">
                    <?php if(!empty($popular)) { ?>
                        <div class="label">
                        <span><?php the_sub_field('label_-_popular_choice'); ?></span>
                        </div>
                    <?php } ?>
                    <p class="title-pac"><?php echo $title; ?></p>
                    <div class="des">
                      <p> <?php echo $des; ?></p>
                    </div>
                    <?php if( have_rows('bullets') ): ?>
                        <ul class="bullets">
                        <?php while( have_rows('bullets') ): the_row(); 
                              $bullet = get_sub_field('bullet'); ?>
                            <li><?php the_sub_field('bullet') ?></li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(!empty( $buttonLink && $buttonText)) : ?>
                    <a class="btn <?php echo $buttonStyle; ?>" href="<?php echo $buttonLink; ?>"><?php echo $buttonText; ?></a>
                    <?php endif; ?>
                </div>

            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</section>
