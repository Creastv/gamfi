<?php 


// //////////////////////////////////////////////////////////////Custome post
function cr_case_study_post_types() {

	$labels = array(
		'name'               => 'Case study',
		'singular_name'      => 'Case study',
		'menu_name'          => 'Case study',
		'name_admin_bar'     => 'Case study',
		'add_new'            => 'Dodaj',
		'add_new_item'       => 'Dodaj ',
		'new_item'           => 'Nowy case',
		'edit_item'          => 'Edytuj case ',
		'view_item'          => 'Zobacz case ',
		'all_items'          => 'Cases',
		'search_items'       => 'Szukaj case',
		'parent_item_colon'  => 'Parent :',
		'not_found'          => 'Nie znaleziono cases',
		'not_found_in_trash' => 'Nie znaleziono cases',
		
	);
	$args = array( 
			 'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'hierarchical'      => true,
		'menu_icon'     => 'dashicons-businessman',
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'publicly_queryable' => true,
		// 'rewrite' => array('slug' => 'case-study',  'with_front' => false,),
		"rewrite"             => array( "slug" => "/klienci/case-study", "with_front" => false ),
		'supports'      => array( 'title', 'page-attributes', 'thumbnail', 'editor', ),
	);
    	register_post_type( 'case-study', $args );

}
add_action( 'init', 'cr_case_study_post_types' );


function my_taxonomies_case_study() {
	$labels = array(
	  'name'              => __( 'Kategoria' ),
	  'singular_name'     => __( 'Kategoria' ),
	  'search_items'      => __( 'Szukaj kategori' ),
	  'all_items'         => __( 'Wszystkie kategorie' ),
	  'parent_item'       => __( 'Rodzic kategoria' ),
	  'parent_item_colon' => __( 'Rodzic kategori:' ),
	  'edit_item'         => __( 'Edytuj kategorie' ), 
	  'update_item'       => __( 'Zaktualizuj kategorię' ),
	  'add_new_item'      => __( 'Dodaj nową kategorię' ),
	  'new_item_name'     => __( 'Nowa kategoria' ),
	  'menu_name'         => __( 'Kategoria' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	  'show_in_rest' => true,
	  'show_ui' => true,
	  'rewrite' => array('slug' => 'case-studies',  'with_front' => false,),
	);
	register_taxonomy( 'case-studies', 'case-study', $args );
  }
  add_action( 'init', 'my_taxonomies_case_study', 0 );


  // //////////////////////////////////////////////////////////////Post cast
function cr_podcasts_post_types() {

	$labels = array(
		'name'               => 'Podcast',
		'singular_name'      => 'Podcast',
		'menu_name'          => 'Podcasts',
		'name_admin_bar'     => 'Podcasts',
		'add_new'            => 'Dodaj',
		'add_new_item'       => 'Dodaj ',
		'new_item'           => 'Nowy ',
		'edit_item'          => 'Edytuj  ',
		'view_item'          => 'Zobacz  ',
		'all_items'          => 'Podcasts',
		'search_items'       => 'Szukaj',
		'parent_item_colon'  => 'Parent :',
		'not_found'          => 'Nie znaleziono',
		'not_found_in_trash' => 'Nie znaleziono',
		
	);
	$args = array( 
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'hierarchical'      => true,
		'menu_icon'     => 'dashicons-media-audio',
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'publicly_queryable' => true,
		// 'rewrite' => array('slug' => 'case-study',  'with_front' => false,),
		"rewrite"             => array( "slug" => "podcast", "with_front" => false ),
		'supports'      => array( 'title', 'page-attributes', 'thumbnail', 'editor' ),
	);
    	register_post_type( 'podcast', $args );

}
add_action( 'init', 'cr_podcasts_post_types' );


 // //////////////////////////////////////////////////////////////Use case
 function cr_use_case_post_types() {

	$labels = array(
		'name'               => 'Use case',
		'singular_name'      => 'Use case',
		'menu_name'          => 'Use case',
		'name_admin_bar'     => 'Use case',
		'add_new'            => 'Dodaj',
		'add_new_item'       => 'Dodaj ',
		'new_item'           => 'Nowy ',
		'edit_item'          => 'Edytuj  ',
		'view_item'          => 'Zobacz  ',
		'all_items'          => 'Use case',
		'search_items'       => 'Szukaj',
		'parent_item_colon'  => 'Parent :',
		'not_found'          => 'Nie znaleziono',
		'not_found_in_trash' => 'Nie znaleziono',
		
	);
	$args = array( 
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'hierarchical'      => true,

		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'publicly_queryable' => true,

		'menu_icon'     => 'dashicons-admin-generic',
        'slug' => '/klienci/use-case',
		// 'rewrite' => array('slug' => 'case-study',  'with_front' => false,),
		"rewrite"             => array( "slug" => "/klienci/use-case", "with_front" => false ),
		'supports'      => array( 'title', 'page-attributes', 'thumbnail', 'editor', 'excerpt' ),
	);
    	register_post_type( 'use-case', $args );

}
add_action( 'init', 'cr_use_case_post_types' );


function my_taxonomies_use_case() {
	$labels = array(
	  'name'              => __( 'Kategoria' ),
	  'singular_name'     => __( 'Kategoria' ),
	  'search_items'      => __( 'Szukaj kategori' ),
	  'all_items'         => __( 'Wszystkie kategorie' ),
	  'parent_item'       => __( 'Rodzic kategoria' ),
	  'parent_item_colon' => __( 'Rodzic kategori:' ),
	  'edit_item'         => __( 'Edytuj kategorie' ), 
	  'update_item'       => __( 'Zaktualizuj kategorię' ),
	  'add_new_item'      => __( 'Dodaj nową kategorię' ),
	  'new_item_name'     => __( 'Nowa kategoria' ),
	  'menu_name'         => __( 'Kategoria' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	  'show_in_rest' => true,
	  'show_ui' => true,
	  'rewrite' => array('slug' => 'use-cases',  'with_front' => false,),
	);
	register_taxonomy( 'use-cases', 'use-case', $args );
  }
  add_action( 'init', 'my_taxonomies_use_case', 0 );


  // //////////////////////////////////////////////////////////////News
 function cr_news_post_types() {

	$labels = array(
		'name'               => 'News',
		'singular_name'      => 'News',
		'menu_name'          => 'News',
		'name_admin_bar'     => 'News',
		'add_new'            => 'Dodaj',
		'add_new_item'       => 'Dodaj ',
		'new_item'           => 'Nowy ',
		'edit_item'          => 'Edytuj  ',
		'view_item'          => 'Zobacz  ',
		'all_items'          => 'News',
		'search_items'       => 'Szukaj',
		'parent_item_colon'  => 'Parent :',
		'not_found'          => 'Nie znaleziono',
		'not_found_in_trash' => 'Nie znaleziono',
		
	);
	$args = array( 
		'public' => false,
		'has_archive' => false,
		'show_in_rest' => true,
		'hierarchical'      => true,
		'menu_icon'     => 'dashicons-format-quote',
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'publicly_queryable' => false,
		// 'rewrite' => array('slug' => 'case-study',  'with_front' => false,),
		"rewrite"             => array( "slug" => "news", "with_front" => false ),
		'supports'      => array( 'title','thumbnail', 'editor' ),
	);
    	register_post_type( 'news', $args );

}
add_action( 'init', 'cr_news_post_types' );


function my_taxonomies_news() {
	$labels = array(
	  'name'              => __( 'Kategoria' ),
	  'singular_name'     => __( 'Kategoria' ),
	  'search_items'      => __( 'Szukaj kategori' ),
	  'all_items'         => __( 'Wszystkie kategorie' ),
	  'parent_item'       => __( 'Rodzic kategoria' ),
	  'parent_item_colon' => __( 'Rodzic kategori:' ),
	  'edit_item'         => __( 'Edytuj kategorie' ), 
	  'update_item'       => __( 'Zaktualizuj kategorię' ),
	  'add_new_item'      => __( 'Dodaj nową kategorię' ),
	  'new_item_name'     => __( 'Nowa kategoria' ),
	  'menu_name'         => __( 'Kategoria' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	  'show_in_rest' => true,
	  'show_ui' => true,
	  'rewrite' => array('slug' => 'cat-news',  'with_front' => false,),
	);
	register_taxonomy( 'cat-news', 'news', $args );
  }
  add_action( 'init', 'my_taxonomies_news', 0 );


  // //////////////////////////////////////////////////////////////News
  function cr_funkcje_produktu_types() {
	$labels = array(
		'name'               => 'Funkcje produktu',
		'singular_name'      => 'Funkcje produktu',
		'menu_name'          => 'Funkcje produktu',
		'name_admin_bar'     => 'Funkcje produktu',
		'add_new'            => 'Dodaj',
		'add_new_item'       => 'Dodaj ',
		'new_item'           => 'Nowy ',
		'edit_item'          => 'Edytuj  ',
		'view_item'          => 'Zobacz  ',
		'all_items'          => 'Funkcje produktu',
		'search_items'       => 'Szukaj',
		'parent_item_colon'  => 'Parent :',
		'not_found'          => 'Nie znaleziono',
		'not_found_in_trash' => 'Nie znaleziono',
		
	);
	$args = array( 
		'public' => false,
		'has_archive' => false,
		'show_in_rest' => true,
		'hierarchical'      => true,
		'menu_icon'     => 'dashicons-editor-code',
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'publicly_queryable' => false,
		// 'rewrite' => array('slug' => 'case-study',  'with_front' => false,),
		"rewrite"             => array( "slug" => "funkcje-produktu", "with_front" => false ),
		'supports'      => array( 'title','thumbnail', 'editor' ),
	);
    	register_post_type( 'funkcje-produktu', $args );

}
add_action( 'init', 'cr_funkcje_produktu_types' );


function my_taxonomies_fukcje() {
	$labels = array(
	  'name'              => __( 'Kategoria' ),
	  'singular_name'     => __( 'Kategoria' ),
	  'search_items'      => __( 'Szukaj kategori' ),
	  'all_items'         => __( 'Wszystkie kategorie' ),
	  'parent_item'       => __( 'Rodzic kategoria' ),
	  'parent_item_colon' => __( 'Rodzic kategori:' ),
	  'edit_item'         => __( 'Edytuj kategorie' ), 
	  'update_item'       => __( 'Zaktualizuj kategorię' ),
	  'add_new_item'      => __( 'Dodaj nową kategorię' ),
	  'new_item_name'     => __( 'Nowa kategoria' ),
	  'menu_name'         => __( 'Kategoria' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	  'show_in_rest' => true,
	  'show_ui' => true,
	  'rewrite' => array('slug' => 'cat-funkcje',  'with_front' => false,),
	);
	register_taxonomy( 'cat-funkcje', 'funkcje-produktu', $args );
  }
  add_action( 'init', 'my_taxonomies_fukcje', 0 );






  add_filter( 'wpseo_breadcrumb_links', 'yoast_seo_breadcrumb_append_link' );

  function yoast_seo_breadcrumb_append_link( $links ) {
	global $post;
  
	if ( is_singular( array( 'podcast') ) ) {
		  $breadcrumb[] = array(
			  'url' => site_url( '/podcast/' ),
			  'text' => 'podcast',
		  );
  
		  array_splice( $links, 1, -2, $breadcrumb );
	}
	if ( is_singular( array( 'use-case') ) ) {
			$breadcrumb[] = array(
				'url' => site_url( '/klienci/use-case/' ),
				'text' => 'use case',
			);
			$breadcrumb2[] = array(
				'url' => site_url( '/klienci/' ),
				'text' => 'klienci',
			);

			array_splice( $links, 2, -2, $breadcrumb );
			array_splice( $links, 1, -3, $breadcrumb2 );
	}
	if ( is_singular( array( 'case-study') ) ) {
		$breadcrumb[] = array(
			'url' => site_url( '/klienci/case-study/' ),
			'text' => 'Case study',
		);
		$breadcrumb2[] = array(
			'url' => site_url( '/klienci/' ),
			'text' => 'klienci',
		);

			array_splice( $links, 1, -2, $breadcrumb );
			array_splice( $links, 1, -3, $breadcrumb2 );
	}
	if ( is_tax('case-studies')) {
		$breadcrumb[] = array(
			'url' => site_url( '/klienci/case-study/' ),
			'text' => 'Case study',
		);

			array_splice( $links, 1, -2, $breadcrumb );
	}
  
	return $links;
  }
  

/**
 * Add custom state to post/page list
 */
add_filter('display_post_states', 'podcast_add_custom_post_states');

function podcast_add_custom_post_states($states) {
    global $post;
    $project_page_id = 5721;
    if( 'page' == get_post_type($post->ID) && $post->ID == $project_page_id && $project_page_id != '0') {
        $states[] = __('Strona główna - Podcast', 'crea');
    }
    return $states;
}

add_filter('display_post_states', 'usecase_add_custom_post_states');

function usecase_add_custom_post_states($states) {
    global $post;
    // $project_page_id = 8546;
	$project_page_id = 10351;

    if( 'page' == get_post_type($post->ID) && $post->ID == $project_page_id && $project_page_id != '0') {
        $states[] = __('Strona główna - Use case', 'crea');
    }
    return $states;
}

add_filter('display_post_states', 'casstudy_add_custom_post_states');

function casstudy_add_custom_post_states($states) {
    global $post;
    // $project_page_id = 8852;
	$project_page_id = 10356;

    if( 'page' == get_post_type($post->ID) && $post->ID == $project_page_id && $project_page_id != '0') {
        $states[] = __('Strona główna - Case study', 'crea');
    }
    return $states;
}