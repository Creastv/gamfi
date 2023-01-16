<?php

/**
 * Form style Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'form-styled ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' text-' . $block['align'];
}
$formColor = get_field('form_color');
$form = get_field('form');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php
        if (get_field('form')):
            $cf7_id = get_field('form');
            echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
        else:
            echo do_shortcode('[contact-form-7 id="4885" title="Formularz 1"]');
        endif; 
    ?>
    <style type="text/css">
        <?php if(the_field('shadow') == 1){ ?>
            #<?php echo $id; ?> input, #<?php echo $id; ?> textarea, #<?php echo $id; ?> select{
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.15)!important;
            }
        <?php } ?>
        #<?php echo $id; ?> .wpcf7-response-output{
            color:<?php echo $formColor; ?>!important;
        }
        #<?php echo $id; ?> .screen-reader-response p {
            color:<?php echo $formColor; ?>!important;
        }
        #<?php echo $id; ?> input, #<?php echo $id; ?> textarea, #<?php echo $id; ?> select{
             border: 1px solid <?php echo $formColor; ?>!important;
             
        }
        #<?php echo $id; ?> .wpcf7-submit{
            background-color:<?php echo $formColor; ?>!important;
        }
    </style>
</div>