<?php
if ( ! function_exists( 'crea_setup' ) ) :
	function crea_setup() {
	global $cap, $content_width;
		add_editor_style();
		add_theme_support( 'post-thumbnails' );
        add_image_size( 'gallery-singel size', 400, 590 );
		add_image_size( 'avatar', 75, 75, array('center') );
		add_image_size( 'logo', 150, 150 );
		add_theme_support( 'post-formats', array( 'div', 'image', 'video', 'quote', 'link' ) );
		add_theme_support( "title-tag" );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-formats', array(
			'video',
			'gallery'
		) );
		register_nav_menus( array(
			'primary'  => __( 'Header menu', 'crea' ),
			'secundary'  => __( 'Footer menu', 'crea' ),
			'tree'  => __( 'Footer menu en', 'crea' ),
		) );
	}
	endif;
add_action( 'after_setup_theme', 'crea_setup' );

/**
 * wszystkie widgety
*/
function cr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cr' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p> <span class="sline maincolor-sline margin-sline-20"></span>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box1', 'cr' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box2', 'cr' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box3', 'cr' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box4', 'cr' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - en', 'cr' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
}
add_action( 'widgets_init', 'cr_widgets_init' );
/**
 * wszystkie scrypty
*/
function cr_scripts() {
	// load cr styles
	wp_enqueue_style( 'cr-style', get_stylesheet_uri() );
	// custome.style
	wp_enqueue_style( 'cr_custome-style', get_template_directory_uri().'/src/css/main.css' ); 
	// aos
	wp_enqueue_style( 'cr_aos-style', get_template_directory_uri().'/src/css/aos.css' ); 
	// Google fonts
	wp_enqueue_style( 'cr_google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Merriweather:wght@300;400;700;900&display=swap' );

  	wp_enqueue_style( 'cr_awsomefonts', get_template_directory_uri().'/src/css/awsomefonts.min.css' );
	if(is_singular( array( 'case-study', 'case-studies' ) )):

		wp_enqueue_style( 'cr_svipeer_cs_css', get_template_directory_uri() . '/src/css/swiper-bundle.min.css' );
		wp_enqueue_script('cr-swiper_cs_js', get_template_directory_uri() . '/src/js/swiper-bundle.min.js',  array(), '20130456', true );
		wp_enqueue_script( 'block-cs-script', get_template_directory_uri() . '/src/js/cs-carousel.js', array(), '20130457', true );

	endif;	
   
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
	
	// bootstrap js
	wp_enqueue_script('cr_bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'jquery' ),'2', true );
    // bootstrap js
	wp_enqueue_script('cr_aos_js', get_template_directory_uri().'/src/js/aos.js', array( 'jquery' ),'2', true );
// 	wp_enqueue_script('cr_aos_js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array( 'jquery' ),'2', true );
	
	// load aos js
	
	wp_enqueue_script('cr-main', get_template_directory_uri().'/src/js/main.js', array( 'jquery' ),'3', true );
	if (is_page_template('templates/fullwidth.php')) :
		wp_enqueue_script('cr-cokie', 'https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js',  array(), '45130456', true );
	endif;
}
add_action( 'wp_enqueue_scripts', 'cr_scripts' );

// gutenberg editor
function add_block_editor_assets(){
  wp_enqueue_style('block_editor_css', get_template_directory_uri().'/src/css/admin.css');
}
add_action('enqueue_block_editor_assets','add_block_editor_assets',10,0);

/**
* wordpress nav walker
*/
require get_template_directory() . '/src/wp-nav.php';
require get_template_directory() . '/src/custome-post.php';
require get_template_directory() . '/blocks/blocks.php';


/**
* Fukcja usuwa komunikaty o update
*/
function remove_update_notifications( $value ) {

    if ( isset( $value ) && is_object( $value ) ) {
        unset( $value->response[ 'advanced-custom-fields-pro-master/acf.php' ] );
		unset( $value->response[ 'search-filter-pro/search-filter-pro.php' ] );
        unset( $value->response[ 'polylang-pro/polylang.php' ] );
		
    }

    return $value;
}
add_filter( 'site_transient_update_plugins', 'remove_update_notifications' );

/**
* ACF pola - edycja
*/
// function remove_acf_menu(){
// 	global $current_user;
// 	if ($current_user->user_login!='admin'){
// 	  remove_menu_page( 'edit.php?post_type=acf-field-group' );
// 	}
//   }
// add_action( 'admin_menu', 'remove_acf_menu', 100 );
 
// function rjs_lwp_contactform_css_js() {
//     global $post;
//     if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'contact-form-7') ) {
//         wp_enqueue_script('contact-form-7');
//         wp_enqueue_style('contact-form-7');

//     }else{
//         wp_dequeue_script( 'contact-form-7' );
//         wp_dequeue_style( 'contact-form-7' );
//     }
// }
// add_action( 'wp_enqueue_scripts', 'rjs_lwp_contactform_css_js');

/**
* Dodanie zakłądki Opcje szablonu
*/
function my_acf_op_init() {
    if( function_exists('acf_add_options_page') ) {
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Opcje i ustawienia szablonu'),
            'menu_title'    => __('Ustawienia szablonu'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Schema.org',
			'menu_title'	=> 'Schema - organization',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Mega Menu',
			'menu_title'	=> 'Mega menu',
			'parent_slug'	=> 'themes.php',
		));

		// $languages = array( 'pl', 'en' );

		// foreach ( $languages as $lang ) {
		//   acf_add_options_sub_page( array(
		// 	'page_title' => 'Options (' . strtoupper( $lang ) . ')',
		// 	'menu_title' => __('Options (' . strtoupper( $lang ) . ')', 'text-domain'),
		// 	'menu_slug'  => "options-${lang}",
		// 	'post_id'    => $lang,
		// 	'parent'     => 'theme-general-settings'
		//   ) );
		// }
		 acf_add_options_sub_page( array(
			'page_title' => 'Options ',
			'menu_title' => __('Options' , 'text-domain'),
			'menu_slug'  => "options-pl",
			'post_id'    => 'pl',
			'parent'     => 'theme-general-settings'
		  ) );
		
	}
}
add_action('acf/init', 'my_acf_op_init');

if (!function_exists('theme_php_include_setup')) {
	function theme_php_include_setup() {
		require get_template_directory() . '/src/schema-organization.php';
    }
}
 // apply conditions at appropriate WP action 
add_action('wp', 'theme_php_include_setup');

// // ////////////////////////////////////////////////////Disable Emoticons
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// Remove RSD Links
remove_action( 'wp_head', 'rsd_link' ) ;
// Remove Shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Hide WordPress Version
remove_action( 'wp_head', 'wp_generator' ) ;
// Disable Self Pingback
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
 
add_action( 'pre_ping', 'no_self_ping' );

// // ////////////////////////////////////////Disable Dashicons on Front-end
function wpdocs_dequeue_dashicon() {
	if (current_user_can( 'update_core' )) {
		return;
	}
	wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );
// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// ///////////////////////////////// /////////////////////Remove Query Strings
function remove_cssjs_ver( $src ) {
	if( strpos( $src, '?ver=' ) )
	 $src = remove_query_arg( 'ver', $src );
	return $src;
	}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

////////////////////////////////////////////// wp_nav_menu remove class and id from li
function remove_css_id_filter($var) {
    return is_array($var) ? array_intersect($var, array('current-menu-item', 'btn', 'btn-main')) : '';
} 
add_filter( 'page_css_class', 'remove_css_id_filter', 100, 1);
add_filter( 'nav_menu_item_id', 'remove_css_id_filter', 100, 1);
// add_filter( 'nav_menu_css_class', 'remove_css_id_filter', 100, 1);


add_action( 'init', function() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}, PHP_INT_MAX - 1 );

function itsme_disable_feed() {
	wp_redirect( home_url() );
    die;
   }
   
   add_action('do_feed', 'itsme_disable_feed', 1);
   add_action('do_feed_rdf', 'itsme_disable_feed', 1);
   add_action('do_feed_rss', 'itsme_disable_feed', 1);
   add_action('do_feed_rss2', 'itsme_disable_feed', 1);
   add_action('do_feed_atom', 'itsme_disable_feed', 1);
   add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
   add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

   remove_action( 'wp_head', 'feed_links_extra', 3 );
   remove_action( 'wp_head', 'feed_links', 2 );
   

function sv_move_jp_sharing( $content ) {
	
	if ( is_singular( 'page' ) && function_exists( 'sharing_display' ) ) {
		remove_filter( 'the_content', 'sharing_display', 19 );
	}
	return $content;
}
add_filter( 'the_content', 'sv_move_jp_sharing' );

	
//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


/**
 * Set the theme colors
 */
add_action( 'after_setup_theme', 'prefix_register_colors' );
function prefix_register_colors() {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Black', 'crea' ),
				'slug' => 'black',
				'color' => '#222222',
			),
			array(
				'name'  => esc_html__( 'Dark', 'crea' ),
				'slug' => 'dark',
				'color' => '#555',
			),
			array(
				'name'  => esc_html__( 'Blue', 'crea' ),
				'slug' => 'blue',
				'color' => ' #209aff',
			),
			array(
				'name'  => esc_html__( 'Orange', 'crea' ),
				'slug' => 'orange',
				'color' => '#ff7800',
			),
			array(
				'name'  => esc_html__( 'Orange light', 'crea' ),
				'slug' => 'orange-light',
				'color' => '#FCE5CD',
			),
			array(
				'name'  => esc_html__( 'Light', 'crea' ),
				'slug' => 'light',
				'color' => '#efefef',
			),
		)
	);
}


/**
 * Get the colors formatted for use with Iris, Automattic's color picker
 */
function output_the_colors() {
	
	// get the colors
    $color_palette = current( (array) get_theme_support( 'editor-color-palette' ) );

	// bail if there aren't any colors found
	if ( !$color_palette )
		return;

	// output begins
	ob_start();

	// output the names in a string
	echo '[';
		foreach ( $color_palette as $color ) {
			echo "'" . $color['color'] . "', ";
		}
	echo ']';
    
    return ob_get_clean();

}


/**
 * Add the colors into Iris
 */
add_action( 'acf/input/admin_footer', 'gutenberg_sections_register_acf_color_palette' );
function gutenberg_sections_register_acf_color_palette() {

    $color_palette = output_the_colors();
    if ( !$color_palette )
        return;
    
    ?>
<script type="text/javascript">
(function($) {
    acf.add_filter('color_picker_args', function(args, $field) {

        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = <?php echo $color_palette; ?>

        // return colors
        return args;

    });
})(jQuery);
</script>
<?php

}
add_filter('wpseo_opengraph_author_facebook' , '__return_false' );
add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );


function call_product_pool(){
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'case-study',
        'posts_per_page' => -1,
		'posts_per_page' => 2,
        'paged' => $paged,
    );
    $cat = ($_POST['cat']);
    if ($cat) {
        $args['tax_query'][] = [
            'taxonomy' => 'case-studies',
            'field' => 'slug',
            'terms' => $cat,
            'orderby' => 'date',
            'order' => 'ASC',
        ];
	}
    $query = new WP_Query($args);
	   $numberPages = $query->max_num_pages;
    if( $query->have_posts() ) :
	    if ($cat) {
        while( $query->have_posts() ): $query->the_post();
          get_template_part( 'blocks/ajax-casestudy/ajax-casestudy-con' );
        endwhile;
	
        $current = $paged;
        if($current == 0){
            $current = 1;
        }
        $next = $current+1;
        $prev = $current-1;
        if ($current == 0){
            $next = 2;
            $prev = 1;
        };
        if ($numberPages > 1){
             echo '<nav class="ajax-pagination" ><ul class="page-numbers pf ">';
                if($current != 1   ) {  
                    echo '<li><a href="#" class="page-numbers pagination" value="' .   $prev . '">« Poprzednie </a></li>';
                }
            for ($i = 1; $i <= $numberPages; $i++) {
              
                if($i == $current) {  
                echo '<li><span class="page-numbers current" >'
                    . $i . '</span></li>';
                } else {
                     echo '<li><a href="#" class="page-numbers pagination" value="' . $i . '">'
                    . $i . '</a></li>';
                }
            }
                if($current >= 0 && $current < $numberPages ) {  
                    echo '<li><a href="#" class="page-numbers pagination" value="' .   $next . '"> Następne »</a></li>';
                }
             echo '</ul></nav>';
        } 
		} else{
			echo '<div class="no-result">';
			echo '<h5><b>Nie wybrałeś żadnej kategorii</b></h5>';
			echo '<p>Wybierz co najmniej jedną kategorię.</p>';
			echo '</div>';
		}
        wp_reset_query();
    else :
    endif;
    die();
}

add_action('wp_ajax_call_product_pool', 'call_product_pool');
add_action('wp_ajax_nopriv_call_product_pool', 'call_product_pool');


function pm_term_permalinks_trailing_slashes($permalink, $term) {
if(!empty($term->taxonomy) && (in_array($term->taxonomy, array('post', 'page', 'news', 'use-case', 'podcast', 'case-study')))) {
$permalink = trailingslashit($permalink);
}
return $permalink;
}
add_filter('permalink_manager_filter_final_term_permalink', 'pm_term_permalinks_trailing_slashes', 999, 2);	

function pm_stop_trailing_slash_redirect($correct_permalink, $redirect_type, $queried_object) {
if(!empty($queried_object->post_type) && (in_array($queried_object->post_type, array('post', 'page', 'news', 'use-case', 'podcast', 'case-study'))) && $redirect_type == 'slash_redirect') {
return false;
}
return $correct_permalink;
}
add_filter('permalink_manager_filter_redirect', 'pm_stop_trailing_slash_redirect', 9, 3);


add_filter('request', 'rudr_change_term_request', 1, 1 );

function rudr_change_term_request($query){
	
	$tax_name = 'category'; // specify you taxonomy name here, it can be also 'category' or 'post_tag'
	
	// Request for child terms differs, we should make an additional check
	if( $query['attachment'] ) :
		$include_children = true;
		$name = $query['attachment'];
	else:
		$include_children = false;
		$name = $query['name'];
	endif;
	
	
	$term = get_term_by('slug', $name, $tax_name); // get the current term to make sure it exists
	
	if (isset($name) && $term && !is_wp_error($term)): // check it here
		
		if( $include_children ) {
			unset($query['attachment']);
			$parent = $term->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $tax_name);
				$name = $parent_term->slug . '/' . $name;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}
		
		switch( $tax_name ):
			case 'category':{
				$query['category_name'] = $name; // for categories
				break;
			}
			case 'post_tag':{
				$query['tag'] = $name; // for post tags
				break;
			}
			default:{
				$query[$tax_name] = $name; // for another taxonomies
				break;
			}
		endswitch;

	endif;
	
	return $query;
	
}


add_filter( 'term_link', 'rudr_term_permalink', 10, 3 );

function rudr_term_permalink( $url, $term, $taxonomy ){
	
	$taxonomy_name = 'category'; // your taxonomy name here
	$taxonomy_slug = 'category'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' )

	// exit the function if taxonomy slug is not in URL
	if ( strpos($url, $taxonomy_slug) === FALSE || $taxonomy != $taxonomy_name ) return $url;
	
	$url = str_replace('/' . $taxonomy_slug, '', $url);
	
	return $url;
}

add_action('template_redirect', 'rudr_old_term_redirect');

function rudr_old_term_redirect() {
	
	$taxonomy_name = 'category';
	$taxonomy_slug = 'category';
	
	// exit the redirect function if taxonomy slug is not in URL
	if( strpos( $_SERVER['REQUEST_URI'], $taxonomy_slug ) === FALSE)
		return;

	if( ( is_category() && $taxonomy_name=='category' ) || ( is_tag() && $taxonomy_name=='post_tag' ) || is_tax( $taxonomy_name ) ) :

        	wp_redirect( site_url( str_replace($taxonomy_slug, '', $_SERVER['REQUEST_URI']) ), 301 );
		exit();
		
	endif;

}
 

// Paginacja
function pagination_bars() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
	$big = 999999999; // need an unlikely integer
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
		echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

function exclude_featured_post( $query ) {
    if ( $query->is_home() && $query->is_main_query()) {
        // in case for some reason there's already a meta query set from other plugin
        $meta_query = $query->get('meta_query')? : [];

        // append yours
        $meta_query[] = [
            'key' => 'ukryj_post',
            'value' => '1',
            'compare' => '!='
        ];

        $query->set('meta_query', $meta_query);
    }
}
add_action( 'pre_get_posts', 'exclude_featured_post' );
