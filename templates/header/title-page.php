<?php if ( !is_404() && !is_singular( array( 'case-study', 'case-studies', 'post' ) ) && !is_page_template('templates/home.php') && !is_page_template('templates/no-head-title.php') && !is_page_template('templates/restrict-content-no-title.php') && !is_post_type_archive( "podcast")  ) { ?>
<div class="page-title-bar-inner <?php if(get_field('submenu_si_no') == true) { ?> page-title-bar-inner-ext <?php } ?>" data-aos="fade-up" data-aos-duration="1000" >
    <div class="container">
	<div class="row row-xs-center">
    <div class="col-md-12 text-center titlePost">
		<?php if (is_single() && !is_singular('podcast') && !is_singular('use-case')) :?>
		<h2 class="page-title" title="<?php the_title(); ?>">
		<?php else: ?>
		<h1 class="page-title" title="<?php the_title(); ?>">
		<?php endif; ?>
		<?php if ( is_category() ) : single_cat_title();						
		elseif (is_tax( 'case-studies' )):
			single_term_title();
		elseif ($post->post_type == 'case-study') :
			_e( 'Case study', 'cr');
		
		elseif (is_singular( array( 'podcast') )) :
			the_title();
		elseif ($post->post_type == 'podcast') :
			_e( 'Podcasts', 'cr');
		elseif (is_singular( array( 'use-case') )) :
			the_title();
		elseif (is_post_type_archive( "use-case" )) :
			_e( 'Use case', 'cr');	
		elseif (is_single()) :
			_e( 'Blog', 'cr');
		elseif (is_404()) :
			_e( '404', 'cr');
		elseif (is_page() ) :
			the_title();

		elseif ( is_tag() ) :
			single_tag_title();
		elseif ( is_author() ) :
			the_post();
			printf( __( '%s', 'cr' ), '<span class="vcard">' . get_the_author() . '</span>' );
			rewind_posts();
		elseif ( is_day() ) :
			printf( __( 'Day: %s', 'cr' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) :
			printf( __( 'Month: %s', 'cr' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif ( is_year() ) :
			printf( __( 'Year: %s', 'cr' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

		elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
			_e( 'Asides', 'cr' );

		elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
			_e( 'Images', 'cr');

		elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
			_e( 'Videos', 'cr' );

		elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
			_e( 'Quotes', 'cr' );

		elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
			_e( 'Links', 'cr' );
		else :
			_e( 'Blog', 'cr' );
		endif; ?>
		<?php if (is_single()) : ?>
		</h2>
		<?php else: ?>
		</h1>
		<?php endif; ?>
        <?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
            yoast_breadcrumb( ' <p id="breadcrumbs">','</p>' );
		} ?>
		<?php if (is_404()): ?>
		<a class="btn btn-main" href="<?php echo esc_url( home_url( '/' ) ); ?>">Powrót do strony głównej</a>
		<?php endif; ?>
		
	</div>
	</div>
	</div>
</div>	
<?php } else { ?>
	<?php if(!is_page_template('templates/case-study-full-width.php')) { ?>
	<div class="ptbi-white <?php if(get_field('submenu_si_no') == true) { ?> sub_menu_add <?php } ?>"></div>
		<?php if ( function_exists('yoast_breadcrumb') && !is_404() && !is_front_page() && !is_page_template('templates/no-head-title.php') && !is_page_template('templates/restrict-content-no-title.php') && !is_post_type_archive( "podcast" ) && !is_page_template('templates/case-study-full-width.php') ) {
            yoast_breadcrumb( '<div class="container"><div class="row"><div class="col-md-12"> <p id="breadcrumbs">','</p></div></div></div>' );
        } ?>
	<?php } ?>
<?php } ?>

<?php if(is_page_template('templates/case-study-full-width.php')) { ?>
<div class="page-title-bar-inner <?php if(get_field('submenu_si_no') == true) { ?> page-title-bar-inner-ext <?php } ?>" data-aos="fade-up" data-aos-duration="1000" >
    <div class="container">
	<div class="row row-xs-center">
    <div class="col-md-12 text-center titlePost">

		<h1 class="page-title" title="<?php the_title(); ?>">
		<?php the_title(); ?>
		</h1>
        <?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
            yoast_breadcrumb( '<div class="col-md-12"> <p id="breadcrumbs">','</p></div>' );
		} ?>
	</div>
	</div>
	</div>
</div>	
<?php } ?>

