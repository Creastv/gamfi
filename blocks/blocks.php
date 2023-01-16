<?php
function register_acf_block_types() {
	acf_register_block_type(array(
      'name'              => 'offers',
      'title'             => __('Offers - switch'),
      'render_template'   => 'blocks/offers/offers.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Counter' ),
      'enqueue_assets'    => function(){  
   
          wp_enqueue_style( 'g-offers',  get_template_directory_uri() . '/blocks/offers/offers.min.css' );
          wp_enqueue_script( 'g-offers-js', get_template_directory_uri() . '/blocks/offers/offers.js', array(), '20130457', true );
        
        },
    ));
	    acf_register_block_type(array(
      'name'              => 'ajax-casestudy',
      'title'             => __('ajax-casestudy'),
      'render_template'   => 'blocks/ajax-casestudy/ajax-casestudy.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Counter' ),
      'enqueue_assets'    => function(){  
       
          wp_enqueue_style( 'g-ajax-casestudy',  get_template_directory_uri() . '/blocks/ajax-casestudy/ajax-casestudy.min.css' );
          // wp_enqueue_script( 'g-ajax-casestudy-js', get_template_directory_uri() . '/blocks/ajax-casestudy/ajax-casestudy.js', array(), '20130457', true );
        
        },
    ));
    acf_register_block_type(array(
      'name'              => 'testimonial',
      'title'             => __('testimonial - slider'),
      'render_template'   => 'blocks/testimonial/testimonial.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Counter' ),
      'enqueue_assets'    => function(){  
        
          wp_enqueue_style( 'g-testimonial',  get_template_directory_uri() . '/blocks/testimonial/testimonial.min.css' );
            wp_enqueue_style( 'cr_slider_css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
          wp_enqueue_script('cr-slider_js',  'https://unpkg.com/swiper/swiper-bundle.min.js',  array(), '20130456', true );
          wp_enqueue_script( 'g-testimonial-js', get_template_directory_uri() . '/blocks/testimonial/testimonial.js', array(), '20130457', true );
        
        },
    ));

    acf_register_block_type(array(
      'name'              => 'swiper',
      'title'             => __('Swiper'),
      'render_template'   => 'blocks/swiper/swiper.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Counter' ),
      'enqueue_assets'    => function(){  
        
          wp_enqueue_style( 'g-swiper',  get_template_directory_uri() . '/blocks/swiper/swiper.min.css' );
            wp_enqueue_style( 'cr_slider_css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
          wp_enqueue_script('cr-slider_js',  'https://unpkg.com/swiper/swiper-bundle.min.js',  array(), '20130456', true );
          wp_enqueue_script( 'g-swiper-js', get_template_directory_uri() . '/blocks/swiper/swiper.js', array(), '20130457', true );
        
        },
    ));

    acf_register_block_type(array(
        'name'              => 'block_button',
        'title'             => __('Button'),
        'render_template'   => 'blocks/block-button.php',
        'category'          => 'formatting',
        'icon' => array(
            'background' => '#ff7800',
            'foreground' => '#fff',
            'src' => 'ellipsis',
          ),
        'mode'            => 'preview',
        'keywords'          => array( 'button' ),
    ));

	acf_register_block_type(array(
        'name'              => 'proponowane-posty',
        'title'             => __('Proponowane posty'),
        'render_template'   => 'blocks/p-posty.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'Posty' ),
        'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
    ));

     acf_register_block_type(array(
        'name'              => 'proponowane-usecase',
        'title'             => __('Proponowane use case'),
        'render_template'   => 'blocks/p-usecase.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'Use case' ),
        'icon' => array(
          'background' => '#209aff',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
    ));

    acf_register_block_type(array(
        'name'              => 'block_title',
        'title'             => __('Title with animation'),
        'render_template'   => 'blocks/block-title.php',
        'category'          => 'formatting',
        'icon' => array(
            'background' => '#ff7800',
            'foreground' => '#fff',
            'src' => 'ellipsis',
          ),
        'mode'            => 'preview',
        'keywords'          => array( 'Title' ),
    ));
    acf_register_block_type(array(
        'name'              => 'block_mini-boxys',
        'title'             => __('Mini boxes with animation'),
        'render_template'   => 'blocks/block-mini-box.php',
        'category'          => 'formatting',
        'icon' => array(
            'background' => '#ff7800',
            'foreground' => '#fff',
            'src' => 'ellipsis',
          ),
        'mode'            => 'preview',
        'keywords'          => array( 'Mini boxy' ),
    ));
    acf_register_block_type(array(
      'name'              => 'block_kroki',
      'title'             => __('Steps'),
      'render_template'   => 'blocks/block-kroki.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Kroki' ),
    ));
    acf_register_block_type(array(
      'name'              => 'block_big-boxys',
      'title'             => __('Big boxes with wavify'),
      'render_template'   => 'blocks/block-big-box.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Big boxy' ),
      'enqueue_assets'    => function(){
          wp_enqueue_script('cr-TweenMax_js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js',  array(), '20130456', true );
          wp_enqueue_script('cr-wavify_js', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/85188/jquery.wavify.js',  array(), '20130456', true );
        
          wp_enqueue_script( 'block-wavify', get_template_directory_uri() . '/blocks/includes/block-wavify.js', array(), '20130457', true );
      },
  ));


    acf_register_block_type(array(
      'name'              => 'block_logotypy',
      'title'             => __('Logotypy'),
      'render_template'   => 'blocks/block-logotypy.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Logotypy' ),
      // 'enqueue_assets'    => function(){
          
      //      wp_enqueue_style( 'cr_svipeer_css', 'https://unpkg.com/swiper@6.5.6/swiper-bundle.min.css' );
      //      wp_enqueue_script('cr-swiper_js',  get_template_directory_uri() . '/src/js/swiper-bundle.min.js',  array(), '20130456', true );
        
      //      wp_enqueue_script( 'block-slider-script', get_template_directory_uri() . '/blocks/includes/block-carousel.js', array(), '20130457', true );
      // },
    ));


    acf_register_block_type(array(
        'name'              => 'block_hero',
        'title'             => __('Hero'),
        'render_template'   => 'blocks/block-hero.php',
        'category'          => 'formatting',
        'icon' => array(
            'background' => '#ff7800',
            'foreground' => '#fff',
            'src' => 'ellipsis',
          ),
        'mode'            => 'preview',
        'keywords'          => array( 'Hero' ),
    ));

    acf_register_block_type(array(
        'name'              => 'block_podcasts',
        'title'             => __('Podcast'),
        'render_template'   => 'blocks/block-podcasts.php',
        'category'          => 'formatting',
        'icon' => array(
            'background' => '#ff7800',
            'foreground' => '#fff',
            'src' => 'ellipsis',
          ),
        'mode'            => 'preview',
        'keywords'          => array( 'podcast' ),
    ));

    acf_register_block_type(array(
      'name'              => 'block_casestudies',
      'title'             => __('Case Studies'),
      'render_template'   => 'blocks/block-case-studies.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'casestudis' ),
    ));

    acf_register_block_type(array(
        'name'              => 'block_news',
        'title'             => __('Block - News'),
        'render_template'   => 'blocks/block-news.php',
        'category'          => 'formatting',
        'icon' => array(
            'background' => '#ff7800',
            'foreground' => '#fff',
            'src' => 'ellipsis',
          ),
        'mode'            => 'preview',
        'keywords'          => array( 'news' ),
    ));
    acf_register_block_type(array(
        'name'              => 'block_posts',
        'title'             => __('Block - Wpisy'),
        'render_template'   => 'blocks/block-posts.php',
        'category'          => 'formatting',
        'icon' => array(
            'background' => '#ff7800',
            'foreground' => '#fff',
            'src' => 'ellipsis',
          ),
        'mode'            => 'preview',
        'keywords'          => array( 'Wpisy', 'posty' ),
    ));

    acf_register_block_type(array(
        'name'              => 'block_use_case',
        'title'             => __('Block - Use case'),
        'render_template'   => 'blocks/block-use-case.php',
        'category'          => 'formatting',
        'icon' => array(
            'background' => '#ff7800',
            'foreground' => '#fff',
            'src' => 'ellipsis',
          ),
        'mode'            => 'edit',
        'keywords'          => array( 'use case' ),
    ));

    acf_register_block_type(array(
        'name'              => 'block_fukcje_produktu',
        'title'             => __('Block - Fukcje produktu'),
        'render_template'   => 'blocks/block-fukcje-produktu.php',
        'category'          => 'formatting',
        'icon' => array(
            'background' => '#ff7800',
            'foreground' => '#fff',
            'src' => 'ellipsis',
          ),
        'mode'            => 'preview',
        'keywords'          => array( 'Fukcje produktu' ),
    ));

    acf_register_block_type(array(
      'name'              => 'block_use-case',
      'title'             => __('News'),
      'render_template'   => 'blocks/block-used-case.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Use case' ),
  ));

    acf_register_block_type(array(
      'name'              => 'block_cloud',
      'title'             => __('Cloud'),
      'render_template'   => 'blocks/block-cloud.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Cloud' ),
    ));

    acf_register_block_type(array(
      'name'              => 'block_progress_bar',
      'title'             => __('Progress bar'),
      'render_template'   => 'blocks/block-progress-bar.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Progress Bar' ),
    ));

    acf_register_block_type(array(
        'name'              => 'accordion',
        'title'             => __('Accordion'),
        'description'       => __('Accordion'),
        'render_template'   => 'blocks/block-accordion-faq.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'Accordion' ),
        'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
    ));

    acf_register_block_type(array(
        'name'              => 'pakiety',
        'title'             => __('Pakiet'),
        'description'       => __('Pakiety'),
        'render_template'   => 'blocks/block-pakiety.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'pakiety' ),
        'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
    ));

    acf_register_block_type(array(
      'name'              => 'count',
      'title'             => __('Circle  progress bar'),
      'render_template'   => 'blocks/block-circle-count.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'count' ),
      'icon' => array(
        'background' => '#ff7800',
        'foreground' => '#fff',
        'src' => 'ellipsis',
      ),
    'mode'            => 'preview',
    'enqueue_assets'    => function(){
      if(! is_admin()){
        wp_enqueue_script( 'block-counter-circle', get_template_directory_uri() . '/blocks/includes/block-circle-progresvar.js', array(), '20130457', true );
      }
    },
  ));
    acf_register_block_type(array(
        'name'              => 'form-style',
        'title'             => __('Form style'),
        'render_template'   => 'blocks/block-form-style.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'Form' ),
        'icon' => array(
          'background' => '#209aff',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
    ));

    acf_register_block_type(array(
      'name'              => 'person',
      'title'             => __('Person'),
      'render_template'   => 'blocks/block-person.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'Person' ),
      'icon' => array(
        'background' => '#ff7800',
        'foreground' => '#fff',
        'src' => 'ellipsis',
      ),
    'mode'            => 'preview',
  ));

    acf_register_block_type(array(
        'name'              => 'modal',
        'title'             => __('Modal - popup'),
        'render_template'   => 'blocks/block-modal.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'Popup' ),
        'icon' => array(
          'background' => '#209aff',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
    ));


    acf_register_block_type(array(
      'name'              => 'block_counter',
      'title'             => __('Counter on scroll'),
      'render_template'   => 'blocks/block-counter.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Counter' ),
      'enqueue_assets'    => function(){  
        if(! is_admin()){
          // wp_enqueue_script('cr-circle', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js',  array('jquery'), '201344564', true );
          wp_enqueue_script( 'block-counter', get_template_directory_uri() . '/blocks/includes/block-counter.js', array(), '20130457', true );
        }
        },
    ));

     // Register a restricted block.
		acf_register_block_type(array(
			'name'				=> 'animate',
			'title'				=> 'Container with animation',
			'description'		=> 'A restricted content block.',
			'category'			=> 'formatting',
      'mode'				=> 'preview',
      'icon' => array(
        'background' => '#ff7800',
        'foreground' => '#fff',
        'src' => 'ellipsis',
      ),
			'supports'			=> array(
				'align' => true,
				'mode' => false,
				'jsx' => true
			),
			'render_template' => 'blocks/block-container-animate.php',
    ));

    acf_register_block_type(array(
      'name'              => 'block_gallery',
      'title'             => __('Gallery - slider'),
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'gallery' ),
      'mode'				=> 'preview',
      'icon' => array(
        'background' => '#ff7800',
        'foreground' => '#fff',
        'src' => 'ellipsis',
      ),
      'supports'			=> array(
				'align' => true,
				'mode' => false,
				'jsx' => true
			),
      'render_template' => 'blocks/block-gallery-slider.php',
      'enqueue_assets'    => function(){  
        wp_enqueue_style( 'cr_slider_css', 'https://unpkg.com/swiper@6.5.6/swiper-bundle.min.css' );
        wp_enqueue_script('cr-slider_js',  get_template_directory_uri() . '/src/js/swiper-bundle.min.js',  array(), '20130456', true );
        wp_enqueue_script( 'block-counter', get_template_directory_uri() . '/blocks/includes/block-gallery-slider.js', array(), '20130457', true );
      },
    ));
    
    // Register a restricted block.
		acf_register_block_type(array(
			'name'				=> 'restricted',
			'title'				=> 'Restricted content',
			'description'		=> 'A restricted content block.',
			'category'			=> 'formatting',
      'mode'				=> 'preview',
      'icon' => array(
        'background' => '#ff7800',
        'foreground' => '#fff',
        'src' => 'ellipsis',
      ),
			'supports'			=> array(
				'align' => true,
				'mode' => false,
				'jsx' => true
			),
			'render_template' => 'blocks/block-restricted.php',
		));
	acf_register_block_type(array(
      'name'              => 'content_searcher',
      'title'             => __('Content search'),
      'render_template'   => 'blocks/block-content-searcher.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Kroki' ),
    ));
}


// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}