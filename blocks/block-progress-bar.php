<?php 
/**
 * Progress Bar Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
 $id = 'progres-bars-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'progres-bars ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= 'text-' . $block['align'];
 }
 ?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" >

<?php if( have_rows('grupa') ):  $i = 1 ?>
    <?php while( have_rows('grupa') ): the_row(); ?>

    <div class="wraper" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $i++ ; ?>00">
    <p class="bar-title"><?php the_sub_field('title_progress') ?> </p>
    <?php if( have_rows('bars') ): ?>

            <?php while( have_rows('bars') ): the_row(); 
                $title = get_sub_field('title_progress_bar');
                $pro = get_sub_field('percentage');
                $colorBar = get_sub_field('color_progres_bar');
                $colorBar2 = get_sub_field('color_progres_bar_2');

                echo '<div class="bar">';
                echo '<p>' . $title. '</p>';
                echo '<div class="progress">';
                echo '<div class="progress-bar" role="progressbar" style="width: ' . $pro . '%; background-color:' . $colorBar . '; background-image:linear-gradient(-224deg, ' . $colorBar. ' 0, ' . $colorBar2.' 100%); " aria-valuenow="' . $pro . '" aria-valuemin="0" aria-valuemax="100">  </div>';
                echo '</div>';
                echo '</div>';
            endwhile; ?>
    <?php endif; ?>
    </div>

    
<?php endwhile; $i++ ?>
<?php endif; ?>
   

</section>

