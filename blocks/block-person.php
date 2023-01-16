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
 $id = 'person-blog-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }
 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'person-blog ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= 'text-' . $block['align'];
 }
 ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" >
 <?php if( have_rows('persons_') ): ?>
    <div class="wraper">
    <?php while( have_rows('persons_') ): the_row();
    $image = get_sub_field('img');
    $tytul = get_sub_field('tytul');
    $desc = get_sub_field('desc');
    $subdesc = get_sub_field('sub_desc'); ?>
    <div class="box">
    <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
    <div class="desc">
     <h4><?php echo $tytul; ?></h4>
     <p><i><?php echo $desc; ?></i></p>
     <span> <?php echo $subdesc; ?></span>
    </div>
    </div>
    <?php endwhile; ?>
    </dv>
<?php endif; ?>

</section>