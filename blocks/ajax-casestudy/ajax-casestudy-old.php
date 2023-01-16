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
            'relation' => 'OR',  
             array( 
                'taxonomy' => 'case-studies',
                 'field' => 'slug',
                 'terms' => array('onboarding', 'teambooster')
               ) 
            ),  
        ));
        ?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="tax-swichers">
        <?php $terms = get_terms(['taxonomy' => 'case-studies', 'hide_empty' => false, ]); ?>
        <span class="label">Wyświetlaj po kategoriach:</span>
        <ul>
            <?php  foreach ($terms as $term){ ?>
            <li>
                <span><?php echo $term->name; ?> </span>
                <label class="switch" for="<?php echo $term->slug; ?>">
                    <input id="<?php echo $term->slug; ?>" value="<?php echo $term->slug; ?>" type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </li>
            <?php  } ?>
        </ul>
    </div>
    <section id="ajax-ref" class="case-stydy-block ">

        <?php while ( $cases->have_posts() ) : $cases->the_post(); ?>

        <?php get_template_part( 'blocks/ajax-casestudy/ajax-casestudy-con' ); ?>

        <?php endwhile; wp_reset_query(); ?>
    </section>
    <?php if (  $cases->post_count > 1) { ?>
    <div class="more-aj">
        <div class="btn btn-main btn-big" id="more_posts">Wczytaj wiecej</div>
        <div id="loading" class="preloader-wrap">
            <img src="<?php echo get_template_directory_uri() ?>/blocks/ajax-casestudy/loader.gif" alt="loading">
        </div>
    </div>
    <?php } ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let cat = [];
var ppp = 2; // Post per page
var pageNumber = 1;
const ajaxpagination = {
    "ajaxurl": "http://localhost/ggamfi/wp-admin/admin-ajax.php"
};

function load_posts() {

    // cat = []
    pageNumber = 1;
    var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '$cat=' + cat + '&action=more_post_ajax';
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajaxpagination.ajaxurl,
        data: str,
        beforeSend: function() {
            $("#loading").show(); // change the button text, you can also add a preloader image
            $("#more_posts").hide();
        },
        success: function(data) {
            var $data = $(data);
            $('#ajax-ref').html(data);
            console.log(cat)
            if ($data.length) {
                // $("#ajax-ref").append($data);
                $("#more_posts").attr("disabled", false);
                $("#more_posts").show();
                $("#loading").hide();
            } else {
                $("#more_posts").remove();
                $("#loading").hide();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }
    });
    return false;
}

$('input, select').change(function() {
    load_posts()
})
const sw = document.querySelectorAll('.tax-swichers ul li input');
document.addEventListener('DOMContentLoaded', function() {
    for (let i = 0; i < sw.length; i++) {
        if (sw[i].checked) {
            cat.push(sw[i].value)
        }
        sw[i].addEventListener('click', () => {
            if (!cat.includes(sw[i].value)) { //checking weather array contain the id
                cat.push(sw[i].value); //adding to array because value doesnt exists
            } else {
                cat.splice(cat.indexOf(sw[i].value), 1); //deleting
            }
            load_posts();
        });
    }
}, false);


// jQuery(".tax-swichers ul li input").on("click", function() {
//     cat = ['onboarding'];
//     if (this.checked == true) {
//         cat.push(this.value)
//     } else

//         console.log(this.checked == true)
//     console.log(cat)
//     load_posts();
// });
jQuery("#more_posts").on("click", function() {
    jQuery("#more_posts").attr("disabled", true);
    load_posts();
});
</script>
