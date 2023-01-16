<?php 
/**
 * Counter Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
 $id = 'counter-simple-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'counter-simple ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= 'text-' . $block['align'];
 }
 ?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" >
<?php if( have_rows('counters') ):  $i = 1 ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wraper" >
            <?php while( have_rows('counters') ): the_row(); 
                $title = get_sub_field('title');
                $num = get_sub_field('number');
                $pref = get_sub_field('prefix');
                $desc = get_sub_field('desc');
                $speed = get_field('counter_speed');

                echo '<div class="count" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="' . $i++ . '00">';
                   echo '<p class="stat-caption">' . $title. '</p>';
                   if( !$is_preview ) {
                   echo '<span  class="timer" data-from="0" data-to="' . $num . '" data-speed="' . $speed . '" > </span> <span class="pref">' . $pref . '</span>';
                   } else {
                    echo '<span  class="timer" >' . $num . '</span> <span class="pref">' . $pref . '</span>'; 
                   }
                   echo '<p class="stat-caption">' . $desc. '</p>';
                echo '</div>';
            endwhile; $i++ ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
</section>

