<?php
$id = 'content-reasercher-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'content-reasercher ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$idForm = get_field('formularz');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-5">
           <?php echo do_shortcode('[searchandfilter id="' . $idForm. '"]') ?>
    </div>
     <div class="col-lg-9 col-md-8 col-sm-7 co-results">
        <?php echo do_shortcode('[searchandfilter id="' . $idForm. '" show="results"]') ?>
    </div>
</div>
</section>
