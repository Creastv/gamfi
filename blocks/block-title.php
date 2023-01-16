<?php

/**
 * title Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
 $id = 'title-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'title-animation ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
     $className .= 'text-' . $block['align'];
 }
$text = get_field('title_title');
$tag = get_field('tag_title');
$color = get_field('kolor_tytul');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" data-aos="fade-up" data-aos-duration="1000">
   <div class="container">
    <<?php echo $tag; ?>>
    <?php if(!empty($color)) : ?>
      <span style="color:<?php echo $color; ?>">
      <?php echo $text; ?>
      </span>
    <?php else : ?>
     <?php echo $text; ?>
    <?php endif; ?> 
    </<?php echo $tag; ?>>
   </div>
</div>