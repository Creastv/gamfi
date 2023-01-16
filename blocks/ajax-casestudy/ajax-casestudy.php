<?php
 $id = 'ajax-casestudy-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'ajax-casestudy ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
  
?>
<?php 
        $cases = new WP_Query( array(
        'post_type' => 'case-study',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC',
        'tax_query' => array(
           
             array( 
                'taxonomy' => 'case-studies',
                 'field' => 'slug',
                 'terms' => array('onboarding', 'teambooster')
               ) 
            ),  
        ));
        ?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <form>
        <div class="tax-swichers">
            <?php $terms = get_terms(['taxonomy' => 'case-studies', 'hide_empty' => false, ]); ?>
            <span class="label">Wyświetlaj po kategoriach:</span>
            <ul>
                <?php  foreach ($terms as $term){ ?>
                <li>
                    <span><?php echo $term->name; ?> </span>
                    <label class="switch" for="<?php echo $term->slug; ?>">
                        <input id="<?php echo $term->slug; ?>" name="cat" value="<?php echo $term->slug; ?>" type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </li>
                <?php  } ?>
            </ul>
        </div>
    </form>
    <section id="ajax-ref" class="case-stydy-block ">
        <?php while ( $cases->have_posts() ) : $cases->the_post(); ?>

        <?php get_template_part( 'blocks/ajax-casestudy/ajax-casestudy-con' ); ?>

        <?php endwhile;
         wp_reset_query(); ?>
    </section>

</div>

<script>
var ajaxpagination = {
    "ajaxurl": "https://www.gamfi.com\/wp-admin\/admin-ajax.php"
};

jQuery(document).ready(function($) {
    setTimeout(function() {
        filtrsAccessory()
    }, 1);
    let page = 0;

    function filtrsAccessory() {
        let cat = [];
        $('input[name=cat]:checked').each(function() {
            cat.push(this.value);
        });

        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'POST',
            data: {
                'action': 'call_product_pool',
                'cat': cat,
                'page': page,
            },
            success: function(result) {
                $('#ajax-ref').html(result);
                console.log(cat)
                page = 1;
            },
            error: function(err) {}
        });
    };
    $('input').change(function() {
        filtrsAccessory()
    })
    $(document).on("click touchend", ".pagination", function(event) {
        event.preventDefault();
        page = $(this).attr('value');
        filtrsAccessory()
    });

});
</script>
