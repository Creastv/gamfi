<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'button-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'but ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' text-' . $block['align'];
}
$text = get_field('text_button');
$link = get_field('link_button');
$styl = get_field('style_buttona');
$idbutton =  get_field('id_buttona');


?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php if(!empty($idbutton)) { ?>
     <span id="<?php the_field('id_buttona'); ?>" class="btn <?php echo $styl; ?> btn-md"><?php echo $text; ?></span>
	<?php } else { ?>
	 <a class="btn <?php echo $styl; ?> btn-md" href="<?php echo $link; ?>"><?php echo $text; ?></a>
	<?php } ?>
</div>

<style type="text/css">
    <?php if($styl == 2){ ?>
     #<?php echo $id; ?> .btn-revers {
        border: 2px solid <?php the_field('kolor');?>; 
    }
    <?php } ?>
    #<?php echo $id; ?> .wpcf7-response-output{
        color:<?php echo $formColor; ?>!important;
    }
</style>
<?php $kolory = get_field('kolory');
if( $kolory ): ?>
    <style type="text/css">
        #<?php echo $id; ?> .btn-revers {
            border-color: <?php echo esc_attr( $kolory['kolor_1'] ); ?>;
            color: <?php echo esc_attr( $kolory['kolor_1'] ); ?>;
        }
        #<?php echo $id; ?> .btn-revers:hover {
            background-image: linear-gradient(218deg, <?php echo esc_attr( $kolory['kolor_1'] ); ?> 0, <?php echo esc_attr( $kolory['kolor_2'] ); ?> 50%, <?php echo esc_attr( $kolory['kolor_1'] ); ?> 100%);
            color:#fff;
        }
        
        #<?php echo $id; ?> .btn-main {
            background-image: linear-gradient(218deg, <?php echo esc_attr( $kolory['kolor_1'] ); ?> 0, <?php echo esc_attr( $kolory['kolor_2'] ); ?> 50%, <?php echo esc_attr( $kolory['kolor_1'] ); ?> 100%);
            color: #fff;
        }
        /* #<?php echo $id; ?> .btn-revers:hover {
            background-image: linear-gradient(218deg, <?php echo esc_attr( $kolory['kolor_1'] ); ?> 0, <?php echo esc_attr( $kolory['kolor_2'] ); ?> 50%, <?php echo esc_attr( $kolory['kolor_1'] ); ?> 100%);
            color:#fff;
        } */
    </style>
<?php endif; ?>