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

            <?php foreach($megamenu as $mm) { ?>

            <?php if(!$mm['sub_menu']) { ?>

            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?php echo $mm['link']; ?> nav-item  <?php if($postId == $mm['link'] ) { echo "current-menu-item"; }; ?> ">
                <a itemprop="url" title=" <?php echo $mm['tekst_linku']; ?>" href="<?php the_permalink( $mm['link']); ?>" class="nav-link">
                    <span> <?php echo $mm['tekst_linku']; ?></span>
                </a>
            </li>

            <?php } else { ?>

            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-<?php echo $mm['link']; ?>  <?php if($postId == $mm['link'] ) { echo "current-menu-item"; }; ?> nav-item">
                <a itemprop="url" title=" <?php echo $mm['tekst_linku']; ?>" href="<?php the_permalink( $mm['link']); ?>" class="dropdown-toggle nav-link">
                    <span> <?php echo $mm['tekst_linku']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-mega-menu" aria-labelledby="menu-item-dropdown-<?php echo $mm['link']; ?>" role="menu">
                    <?php if($mm['tytul_glowny']) { ?>
                    <div class="mm-title">
                        <span><?php echo $mm['tytul_glowny']; ?></span>
                    </div>
                    <?php } ?>
                    <?php  if($mm['kolumny']){ ?>
                    <div class="wraper-megamenu">
                        <?php foreach($mm['kolumny'] as $kol){ ?>
                        <div class="mm-col mm-col-3">
                            <?php if($kol['tytul']) { ?>
                            <span><?php echo $kol['tytul']; ?></span>
                            <?php } ?>
                            <?php ?>
                            <?php if($kol['menu']) { ?>
                            <ul>
                                <?php foreach($kol['menu'] as $menu){ ?>
                                <li itemprop="name" class="menu-item  nav-item menu-item-<?php echo $menu['link']; ?>  <?php if($postId == $menu['link'] ) { echo "current-menu-item active"; }; ?>">
                                    <a itemprop="url" title="<?php echo $menu['tekst_linku']; ?>" href="<?php the_permalink( $menu['link']); ?>" class="dropdown-item">
                                        <span><?php echo $menu['tekst_linku']; ?></span>
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

            <!-- <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-10388 nav-item"><a itemprop="url" title="Gamfi Onboarding" href="http://localhost/gamfi23/produkty/onboarding/" data-hover="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-10388"> <span>Gamfi Onboarding</span></a>
                <div class="dropdown-menu dropdown-mega-menu" aria-labelledby="menu-item-dropdown-10388" role="menu">
                    <div class="mm-title">
                        <span>test testk;.k</span>
                    </div>
                    <div class="wraper-megamenu">

                        <div class="mm-col mm-col-3">
                            <span>Funkcje</span>
                            <ul>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20734 nav-item"><a itemprop="url" title="O aplikacji" href="http://localhost/gamfi23/produkty/onboarding/" class="dropdown-item"> <span>O aplikacji</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20481 nav-item"><a itemprop="url" title="Ustrukturyzowany proces wdrożenia" href="http://localhost/gamfi23/produkty/onboarding/ustrukturyzowany-proces-wdrozenia/" class="dropdown-item"> <span>Ustrukturyzowany proces wdrożenia</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20480 nav-item"><a itemprop="url" title="Automatyzacja onboardingu" href="http://localhost/gamfi23/produkty/onboarding/automatyzacja-onboardingu/" class="dropdown-item"> <span>Automatyzacja onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20479 nav-item"><a itemprop="url" title="Skalowanie onboardingu" href="http://localhost/gamfi23/produkty/onboarding/skalowanie-onboardingu/" class="dropdown-item"> <span>Skalowanie onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20478 nav-item"><a itemprop="url" title="Monitoring onboardingu" href="http://localhost/gamfi23/produkty/onboarding/monitoring-onboardingu/" class="dropdown-item"> <span>Monitoring onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20733 nav-item"><a itemprop="url" title="Portal pracownika" href="http://localhost/gamfi23/produkty/onboarding/portal-pracownika/" class="dropdown-item"> <span>Portal pracownika</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20732 nav-item"><a itemprop="url" title="Automatyczny przepływ zadań" href="http://localhost/gamfi23/produkty/onboarding/automatyczny-przeplyw-zadan/" class="dropdown-item"> <span>Automatyczny przepływ zadań</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20731 nav-item"><a itemprop="url" title="Panel administratora" href="http://localhost/gamfi23/produkty/onboarding/panel-administratora/" class="dropdown-item"> <span>Panel administratora</span></a></li>
                            </ul>
                        </div>

                        <div class="mm-col mm-col-3">
                            <span>Korzyści</span>
                            <ul>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20734 nav-item"><a itemprop="url" title="O aplikacji" href="http://localhost/gamfi23/produkty/onboarding/" class="dropdown-item"> <span>O aplikacji</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20481 nav-item"><a itemprop="url" title="Ustrukturyzowany proces wdrożenia" href="http://localhost/gamfi23/produkty/onboarding/ustrukturyzowany-proces-wdrozenia/" class="dropdown-item"> <span>Ustrukturyzowany proces wdrożenia</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20480 nav-item"><a itemprop="url" title="Automatyzacja onboardingu" href="http://localhost/gamfi23/produkty/onboarding/automatyzacja-onboardingu/" class="dropdown-item"> <span>Automatyzacja onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20479 nav-item"><a itemprop="url" title="Skalowanie onboardingu" href="http://localhost/gamfi23/produkty/onboarding/skalowanie-onboardingu/" class="dropdown-item"> <span>Skalowanie onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20478 nav-item"><a itemprop="url" title="Monitoring onboardingu" href="http://localhost/gamfi23/produkty/onboarding/monitoring-onboardingu/" class="dropdown-item"> <span>Monitoring onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20733 nav-item"><a itemprop="url" title="Portal pracownika" href="http://localhost/gamfi23/produkty/onboarding/portal-pracownika/" class="dropdown-item"> <span>Portal pracownika</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20732 nav-item"><a itemprop="url" title="Automatyczny przepływ zadań" href="http://localhost/gamfi23/produkty/onboarding/automatyczny-przeplyw-zadan/" class="dropdown-item"> <span>Automatyczny przepływ zadań</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20731 nav-item"><a itemprop="url" title="Panel administratora" href="http://localhost/gamfi23/produkty/onboarding/panel-administratora/" class="dropdown-item"> <span>Panel administratora</span></a></li>
                            </ul>
                        </div>
                        <div class="mm-col mm-col-3">
                            <span>Zastosowania</span>
                            <ul>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20734 nav-item"><a itemprop="url" title="O aplikacji" href="http://localhost/gamfi23/produkty/onboarding/" class="dropdown-item"> <span>O aplikacji</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20481 nav-item"><a itemprop="url" title="Ustrukturyzowany proces wdrożenia" href="http://localhost/gamfi23/produkty/onboarding/ustrukturyzowany-proces-wdrozenia/" class="dropdown-item"> <span>Ustrukturyzowany proces wdrożenia</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20480 nav-item"><a itemprop="url" title="Automatyzacja onboardingu" href="http://localhost/gamfi23/produkty/onboarding/automatyzacja-onboardingu/" class="dropdown-item"> <span>Automatyzacja onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20479 nav-item"><a itemprop="url" title="Skalowanie onboardingu" href="http://localhost/gamfi23/produkty/onboarding/skalowanie-onboardingu/" class="dropdown-item"> <span>Skalowanie onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20478 nav-item"><a itemprop="url" title="Monitoring onboardingu" href="http://localhost/gamfi23/produkty/onboarding/monitoring-onboardingu/" class="dropdown-item"> <span>Monitoring onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20733 nav-item"><a itemprop="url" title="Portal pracownika" href="http://localhost/gamfi23/produkty/onboarding/portal-pracownika/" class="dropdown-item"> <span>Portal pracownika</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20732 nav-item"><a itemprop="url" title="Automatyczny przepływ zadań" href="http://localhost/gamfi23/produkty/onboarding/automatyczny-przeplyw-zadan/" class="dropdown-item"> <span>Automatyczny przepływ zadań</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20731 nav-item"><a itemprop="url" title="Panel administratora" href="http://localhost/gamfi23/produkty/onboarding/panel-administratora/" class="dropdown-item"> <span>Panel administratora</span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </li>
            <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-10388 nav-item"><a itemprop="url" title="Gamfi Onboarding" href="http://localhost/gamfi23/produkty/onboarding/" data-hover="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-10388"> <span>Gamfi Onboarding</span></a>
                <div class="dropdown-menu dropdown-mega-menu" aria-labelledby="menu-item-dropdown-10388" role="menu">
                    <div class="mm-title">
                        <span>test testk;.k</span>
                    </div>
                    <div class="wraper-megamenu">
                        <div class="mm-col mm-col-2">
                            <span>Korzyści</span>
                            <ul>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20734 nav-item"><a itemprop="url" title="O aplikacji" href="http://localhost/gamfi23/produkty/onboarding/" class="dropdown-item"> <span>O aplikacji</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20481 nav-item"><a itemprop="url" title="Ustrukturyzowany proces wdrożenia" href="http://localhost/gamfi23/produkty/onboarding/ustrukturyzowany-proces-wdrozenia/" class="dropdown-item"> <span>Ustrukturyzowany proces wdrożenia</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20480 nav-item"><a itemprop="url" title="Automatyzacja onboardingu" href="http://localhost/gamfi23/produkty/onboarding/automatyzacja-onboardingu/" class="dropdown-item"> <span>Automatyzacja onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20479 nav-item"><a itemprop="url" title="Skalowanie onboardingu" href="http://localhost/gamfi23/produkty/onboarding/skalowanie-onboardingu/" class="dropdown-item"> <span>Skalowanie onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20478 nav-item"><a itemprop="url" title="Monitoring onboardingu" href="http://localhost/gamfi23/produkty/onboarding/monitoring-onboardingu/" class="dropdown-item"> <span>Monitoring onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20733 nav-item"><a itemprop="url" title="Portal pracownika" href="http://localhost/gamfi23/produkty/onboarding/portal-pracownika/" class="dropdown-item"> <span>Portal pracownika</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20732 nav-item"><a itemprop="url" title="Automatyczny przepływ zadań" href="http://localhost/gamfi23/produkty/onboarding/automatyczny-przeplyw-zadan/" class="dropdown-item"> <span>Automatyczny przepływ zadań</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20731 nav-item"><a itemprop="url" title="Panel administratora" href="http://localhost/gamfi23/produkty/onboarding/panel-administratora/" class="dropdown-item"> <span>Panel administratora</span></a></li>
                            </ul>
                        </div>
                        <div class="mm-col mm-col-2">
                            <span>Zastosowania</span>
                            <ul>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20734 nav-item"><a itemprop="url" title="O aplikacji" href="http://localhost/gamfi23/produkty/onboarding/" class="dropdown-item"> <span>O aplikacji</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20481 nav-item"><a itemprop="url" title="Ustrukturyzowany proces wdrożenia" href="http://localhost/gamfi23/produkty/onboarding/ustrukturyzowany-proces-wdrozenia/" class="dropdown-item"> <span>Ustrukturyzowany proces wdrożenia</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20480 nav-item"><a itemprop="url" title="Automatyzacja onboardingu" href="http://localhost/gamfi23/produkty/onboarding/automatyzacja-onboardingu/" class="dropdown-item"> <span>Automatyzacja onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20479 nav-item"><a itemprop="url" title="Skalowanie onboardingu" href="http://localhost/gamfi23/produkty/onboarding/skalowanie-onboardingu/" class="dropdown-item"> <span>Skalowanie onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20478 nav-item"><a itemprop="url" title="Monitoring onboardingu" href="http://localhost/gamfi23/produkty/onboarding/monitoring-onboardingu/" class="dropdown-item"> <span>Monitoring onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20733 nav-item"><a itemprop="url" title="Portal pracownika" href="http://localhost/gamfi23/produkty/onboarding/portal-pracownika/" class="dropdown-item"> <span>Portal pracownika</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20732 nav-item"><a itemprop="url" title="Automatyczny przepływ zadań" href="http://localhost/gamfi23/produkty/onboarding/automatyczny-przeplyw-zadan/" class="dropdown-item"> <span>Automatyczny przepływ zadań</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20731 nav-item"><a itemprop="url" title="Panel administratora" href="http://localhost/gamfi23/produkty/onboarding/panel-administratora/" class="dropdown-item"> <span>Panel administratora</span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </li>
            <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-10388 nav-item"><a itemprop="url" title="Gamfi Onboarding" href="http://localhost/gamfi23/produkty/onboarding/" data-hover="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-10388"> <span>Gamfi Onboarding</span></a>
                <div class="dropdown-menu dropdown-mega-menu" aria-labelledby="menu-item-dropdown-10388" role="menu">
                    <div class="mm-title">
                        <span>test testk;.k</span>
                    </div>
                    <div class="wraper-megamenu">
                        <div class="mm-col">
                            <span>Korzyści</span>
                            <ul>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20734 nav-item"><a itemprop="url" title="O aplikacji" href="http://localhost/gamfi23/produkty/onboarding/" class="dropdown-item"> <span>O aplikacji</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20481 nav-item"><a itemprop="url" title="Ustrukturyzowany proces wdrożenia" href="http://localhost/gamfi23/produkty/onboarding/ustrukturyzowany-proces-wdrozenia/" class="dropdown-item"> <span>Ustrukturyzowany proces wdrożenia</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20480 nav-item"><a itemprop="url" title="Automatyzacja onboardingu" href="http://localhost/gamfi23/produkty/onboarding/automatyzacja-onboardingu/" class="dropdown-item"> <span>Automatyzacja onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20479 nav-item"><a itemprop="url" title="Skalowanie onboardingu" href="http://localhost/gamfi23/produkty/onboarding/skalowanie-onboardingu/" class="dropdown-item"> <span>Skalowanie onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20478 nav-item"><a itemprop="url" title="Monitoring onboardingu" href="http://localhost/gamfi23/produkty/onboarding/monitoring-onboardingu/" class="dropdown-item"> <span>Monitoring onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20733 nav-item"><a itemprop="url" title="Portal pracownika" href="http://localhost/gamfi23/produkty/onboarding/portal-pracownika/" class="dropdown-item"> <span>Portal pracownika</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20732 nav-item"><a itemprop="url" title="Automatyczny przepływ zadań" href="http://localhost/gamfi23/produkty/onboarding/automatyczny-przeplyw-zadan/" class="dropdown-item"> <span>Automatyczny przepływ zadań</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20731 nav-item"><a itemprop="url" title="Panel administratora" href="http://localhost/gamfi23/produkty/onboarding/panel-administratora/" class="dropdown-item"> <span>Panel administratora</span></a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </li>
            <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10389 nav-item"><a itemprop="url" title="Gamfi TeamBOOSTER" href="http://localhost/gamfi23/produkty/teambooster/" class="nav-link"> <span>Gamfi TeamBOOSTER</span></a></li>
            <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10389 nav-item"><a itemprop="url" title="Gamfi TeamBOOSTER" href="http://localhost/gamfi23/produkty/teambooster/" class="nav-link"> <span>Gamfi TeamBOOSTER</span></a></li>
            <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10389 nav-item"><a itemprop="url" title="Gamfi TeamBOOSTER" href="http://localhost/gamfi23/produkty/teambooster/" class="nav-link"> <span>Gamfi TeamBOOSTER</span></a></li>

            <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10389 nav-item"><a itemprop="url" title="Gamfi TeamBOOSTER" href="http://localhost/gamfi23/produkty/teambooster/" class="nav-link"> <span>Gamfi TeamBOOSTER</span></a></li>
            <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-10388 nav-item"><a itemprop="url" title="Gamfi Onboarding" href="http://localhost/gamfi23/produkty/onboarding/" data-hover="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-10388"> <span>Gamfi Onboarding</span></a>
                <div class="dropdown-menu dropdown-mega-menu dropdown-mega-menu-right" aria-labelledby="menu-item-dropdown-10388" role="menu">
                    <div class="mm-title">
                        <span>test testk;.k</span>
                    </div>
                    <div class="wraper-megamenu">

                        <div class="mm-col mm-col-3">
                            <span>Funkcje</span>
                            <ul>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20734 nav-item"><a itemprop="url" title="O aplikacji" href="http://localhost/gamfi23/produkty/onboarding/" class="dropdown-item"> <span>O aplikacji</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20481 nav-item"><a itemprop="url" title="Ustrukturyzowany proces wdrożenia" href="http://localhost/gamfi23/produkty/onboarding/ustrukturyzowany-proces-wdrozenia/" class="dropdown-item"> <span>Ustrukturyzowany proces wdrożenia</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20480 nav-item"><a itemprop="url" title="Automatyzacja onboardingu" href="http://localhost/gamfi23/produkty/onboarding/automatyzacja-onboardingu/" class="dropdown-item"> <span>Automatyzacja onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20479 nav-item"><a itemprop="url" title="Skalowanie onboardingu" href="http://localhost/gamfi23/produkty/onboarding/skalowanie-onboardingu/" class="dropdown-item"> <span>Skalowanie onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20478 nav-item"><a itemprop="url" title="Monitoring onboardingu" href="http://localhost/gamfi23/produkty/onboarding/monitoring-onboardingu/" class="dropdown-item"> <span>Monitoring onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20733 nav-item"><a itemprop="url" title="Portal pracownika" href="http://localhost/gamfi23/produkty/onboarding/portal-pracownika/" class="dropdown-item"> <span>Portal pracownika</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20732 nav-item"><a itemprop="url" title="Automatyczny przepływ zadań" href="http://localhost/gamfi23/produkty/onboarding/automatyczny-przeplyw-zadan/" class="dropdown-item"> <span>Automatyczny przepływ zadań</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20731 nav-item"><a itemprop="url" title="Panel administratora" href="http://localhost/gamfi23/produkty/onboarding/panel-administratora/" class="dropdown-item"> <span>Panel administratora</span></a></li>
                            </ul>
                        </div>

                        <div class="mm-col mm-col-3">
                            <span>Korzyści</span>
                            <ul>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20734 nav-item"><a itemprop="url" title="O aplikacji" href="http://localhost/gamfi23/produkty/onboarding/" class="dropdown-item"> <span>O aplikacji</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20481 nav-item"><a itemprop="url" title="Ustrukturyzowany proces wdrożenia" href="http://localhost/gamfi23/produkty/onboarding/ustrukturyzowany-proces-wdrozenia/" class="dropdown-item"> <span>Ustrukturyzowany proces wdrożenia</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20480 nav-item"><a itemprop="url" title="Automatyzacja onboardingu" href="http://localhost/gamfi23/produkty/onboarding/automatyzacja-onboardingu/" class="dropdown-item"> <span>Automatyzacja onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20479 nav-item"><a itemprop="url" title="Skalowanie onboardingu" href="http://localhost/gamfi23/produkty/onboarding/skalowanie-onboardingu/" class="dropdown-item"> <span>Skalowanie onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20478 nav-item"><a itemprop="url" title="Monitoring onboardingu" href="http://localhost/gamfi23/produkty/onboarding/monitoring-onboardingu/" class="dropdown-item"> <span>Monitoring onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20733 nav-item"><a itemprop="url" title="Portal pracownika" href="http://localhost/gamfi23/produkty/onboarding/portal-pracownika/" class="dropdown-item"> <span>Portal pracownika</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20732 nav-item"><a itemprop="url" title="Automatyczny przepływ zadań" href="http://localhost/gamfi23/produkty/onboarding/automatyczny-przeplyw-zadan/" class="dropdown-item"> <span>Automatyczny przepływ zadań</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20731 nav-item"><a itemprop="url" title="Panel administratora" href="http://localhost/gamfi23/produkty/onboarding/panel-administratora/" class="dropdown-item"> <span>Panel administratora</span></a></li>
                            </ul>
                        </div>
                        <div class="mm-col mm-col-3">
                            <span>Zastosowania</span>
                            <ul>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20734 nav-item"><a itemprop="url" title="O aplikacji" href="http://localhost/gamfi23/produkty/onboarding/" class="dropdown-item"> <span>O aplikacji</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20481 nav-item"><a itemprop="url" title="Ustrukturyzowany proces wdrożenia" href="http://localhost/gamfi23/produkty/onboarding/ustrukturyzowany-proces-wdrozenia/" class="dropdown-item"> <span>Ustrukturyzowany proces wdrożenia</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20480 nav-item"><a itemprop="url" title="Automatyzacja onboardingu" href="http://localhost/gamfi23/produkty/onboarding/automatyzacja-onboardingu/" class="dropdown-item"> <span>Automatyzacja onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20479 nav-item"><a itemprop="url" title="Skalowanie onboardingu" href="http://localhost/gamfi23/produkty/onboarding/skalowanie-onboardingu/" class="dropdown-item"> <span>Skalowanie onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20478 nav-item"><a itemprop="url" title="Monitoring onboardingu" href="http://localhost/gamfi23/produkty/onboarding/monitoring-onboardingu/" class="dropdown-item"> <span>Monitoring onboardingu</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20733 nav-item"><a itemprop="url" title="Portal pracownika" href="http://localhost/gamfi23/produkty/onboarding/portal-pracownika/" class="dropdown-item"> <span>Portal pracownika</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20732 nav-item"><a itemprop="url" title="Automatyczny przepływ zadań" href="http://localhost/gamfi23/produkty/onboarding/automatyczny-przeplyw-zadan/" class="dropdown-item"> <span>Automatyczny przepływ zadań</span></a></li>
                                <li itemprop="name" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20731 nav-item"><a itemprop="url" title="Panel administratora" href="http://localhost/gamfi23/produkty/onboarding/panel-administratora/" class="dropdown-item"> <span>Panel administratora</span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </li> -->

        </ul>

    </div>
</div>

<?php } ?>
