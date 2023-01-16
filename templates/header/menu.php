<?php 
$megamenu_on = get_field('mega_menu_on', "options");
$megamenu = get_field('mega_menu', "options");
$postId= get_the_ID();

?>


<?php if($megamenu_on == false) { ?>

<div class="test">
    <?php wp_nav_menu( array(
		'walker' => new WP_Bootstrap_Navwalker(),
		'theme_location'	=> 'primary',
		'depth'				=> 2, // 1 = with dropdowns, 0 = no dropdowns.
		'container'			=> 'div',
		'container_class'	=> 'collapse navbar-collapse '. $navPos .' ',
		'container_id'		=> 'bs-example-navbar-collapse-1',
		'menu_class'		=> 'navbar-nav',
		'items_wrap' => ' <div class="n"><div class="mobile-brand "><img  src=" ' . esc_url($logoHeader["url"]). '" ><div class="hamburger hidden hamburger--spin js-hamburger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation"><div class="hamburger-box"><div class="hamburger-inner"></div></div></div></div><ul id="%1$s" class="%2$s">%3$s</ul></div>'
	) ); ?>
</div>

<?php } else { ?>

<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse justify-content-center ">
    <div class="n">
        <div class="mobile-brand "><img src=" http://localhost/gamfi23/wp-content/uploads/2020/11/logo-gamfi-orange-cmyk.png">
            <div class="hamburger hidden hamburger--spin js-hamburger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </div>
        <ul id="menu-menu-glowne-new" class="navbar-nav">

            <?php foreach($megamenu as $mm) { 
                if($mm['pozycja']){
                    $pos = "dropdown-mega-menu-right";
                } else {
                    $pos = 'dropdown-mega-menu-left';
                }
                $link = $mm['link'];
                if( $link ){
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; 
                    $linkid = url_to_postid( $link_url );
                }
            ?>

            <?php if(!$mm['sub_menu']) { ?>

            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?php echo $linkid; ?> nav-item  <?php if($postId ==  $linkid ) { echo "current-menu-item"; }; ?> ">
                <a itemprop="url" title=" <?php echo $link_title; ?>" href="<?php echo $link_url; ?>" class="nav-link">
                    <span> <?php echo $link_title; ?></span>
                </a>
            </li>

            <?php } else { ?>

            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-<?php echo $linkid; ?>  <?php if($postId == $linkid ) { echo "current-menu-item"; }; ?>nav-item">
                <a itemprop="url" title="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" class="dropdown-toggle nav-link">
                    <span> <?php echo $link_title; ?></span>
                </a>
                <div class="dropdown-menu dropdown-mega-menu  <?php echo $pos; ?> " aria-labelledby="menu-item-dropdown-<?php echo $linkid; ?>" role="menu">
                    <?php if($mm['tytul_glowny']) { ?>
                    <div class="mm-title">
                        <span><?php echo $mm['tytul_glowny']; ?></span>
                    </div>
                    <?php } ?>
                    <?php  if($mm['kolumny']){ ?>
                    <div class="wraper-megamenu">
                        <?php foreach($mm['kolumny'] as $kol){ 
                             $count = count($mm['kolumny']);
                        ?>
                        <div class="mm-col mm-col-<?php  echo $count; ?>">
                            <?php if($kol['tytul']) { ?>
                            <span><?php echo $kol['tytul']; ?></span>
                            <?php } ?>
                            <?php ?>
                            <?php if($kol['menu']) { ?>
                            <ul>
                                <?php foreach($kol['menu'] as $menu){ 
                                      $sublink = $menu['link'];
                                    if( $sublink ){
                                        $sublink_url = $sublink['url'];
                                        $sublink_title = $sublink['title'];
                                        $sublink_target = $sublink['target'] ? $link['target'] : '_self'; 
                                        $menulinkid = url_to_postid( $sublink_url );
                                    }
                                ?>
                                <li itemprop="name" class="menu-item  nav-item menu-item-<?php echo $menulinkid; ?>  <?php if($postId == $menulinkid ) { echo "current-menu-item active"; }; ?>">
                                    <a itemprop="url" title="<?php echo $sublink_title; ?>" href="<?php echo $sublink_url ; ?>" class="dropdown-item">
                                        <span><?php echo $sublink_title; ?></span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <?php  } ?>
                </div>
            </li>

            <?php } ?>
            <?php } ?>
        </ul>

    </div>
</div>

<?php } ?>
