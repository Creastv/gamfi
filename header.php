<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="theme-color" content="#ff7800">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 	<link rel="canonical" href="<?php echo get_permalink( get_the_ID() ); ?>"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="https://fonts.gstatic.com" crossorigin rel="preconnect" />
    <link rel="preload" href="https://www.gamfi.com/wp-content/themes/gamfi/src/css/awsomefonts.min.css" as="font" crossorigin="anonymous">
    <style>
    #CybotCookiebotDialogPoweredbyCybot {
        display: none !important
    }

    </style>
    <!-- <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="065103fb-58d8-4e29-98e7-2c373608a65e"  type="text/javascript"></script>	

    <meta name="facebook-domain-verification" content="bcpa01uzldzavcuvob1a1liso5xc0l" /> -->

    <!-- Google Tag Manager -->
    <!-- <script async >(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-586X2PX');</script> -->
    <!-- End Google Tag Manager -->



    <!-- <script id='pixel-script-poptin' src='https://cdn.popt.in/pixel.js?id=01d1f5016b6d6' async='true'></script>
	<script>
	  (function(){
		window.ldfdr = window.ldfdr || {};
		(function(d, s, ss, fs){
		  fs = d.getElementsByTagName(s)[0];
		  function ce(src){
			var cs  = d.createElement(s);
			cs.src = src;
			setTimeout(function(){fs.parentNode.insertBefore(cs,fs)}, 1);
		  }
		  ce(ss);
		})(document, 'script', 'https://sc.lfeeder.com/lftracker_v1_lYNOR8xeJMq7WQJZ.js');
	  })();
	</script>	 -->
    <?php wp_head(); ?>
    <!-- <script>
        window.onload = function(){
		window.ap3c = window.ap3c || {};
		var ap3c = window.ap3c;
		ap3c.cmd = ap3c.cmd || [];
		ap3c.cmd.push(function() {
			ap3c.init('YRolyqAaj9L6tzLKZ2FtZmk', 'https://capture-api.autopilotapp.com/');
			// ap3c.track({v: 0});
			 ap3c.track({"v":0,"email":"user@emaildomain.com","first":"John","last":"Apple"});
		});
		 var s, t; s = document.createElement('script'); s.type = 'text/javascript'; s.src = "https://cdn3l.ink/app.js";
  		t = document.getElementsByTagName('script')[0]; t.parentNode.insertBefore(s, t);
    	};
	</script> 
    <script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
	<script>
		Weglot.initialize({
			api_key: 'wg_111c108cb6bc437ad8699257b7ff86c58'
		});
	</script> -->
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe class="no-ll" src="https://www.googletagmanager.com/ns.html?id=GTM-586X2PX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->

    <?php get_template_part( 'templates/header/page-top', get_post_format() ); ?>
    <header id="header" <?php if(get_field('submenu_si_no') == true) { echo "class='wsm'"; } ?> itemscope itemtype="http://schema.org/WPHeader">
        <?php get_template_part( 'templates/header/nav', get_post_format() ); ?>
        <?php if(get_field('submenu_si_no') == true) { ?>
        <div class="sub__menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wraper">
                            <div class="titel_sub__menu">
                                <?php 
							$image = get_field('ikonka_przed_opisem_po_lewej_stronie');
							$size = 'avatar'; // (thumbnail, medium, large, full or custom size)
							if( $image ) {
								echo wp_get_attachment_image( $image, $size );
							} ?>
                                <span><?php the_field('opis_po_lewej_stronie')?></span>
                            </div>
                            <div class="wraper-menu">
                                <?php the_field('menu'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </header>
    <?php get_template_part( 'templates/header/title-page', get_post_format() ); ?>
    <?php if(is_page_template('templates/home.php')) { ?>
    <main id="main-page-home">
        <?php } else { ?>
        <main id="main-page">
            <div class="container">
                <div class="row">
                    <?php } ?>
