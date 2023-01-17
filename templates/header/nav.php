<div id="navbar" class="navigacja">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg " itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <?php if(get_field('logo-header','options')): $logoHeader = get_field('logo-header','options'); ?>
                    <a class="navbar-brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                        <img width="180px" height="59px" src="<?php echo esc_url($logoHeader['url']); ?>" alt="<?php echo esc_attr($logoHeader['alt']); ?>" title="<?php echo esc_attr($logoHeader['title']); ?>" />
                    </a>
                    <?php else :?>
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel="home">
                        <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                        <p class="site-title"><?php bloginfo( 'description' ); ?></p>
                    </a>
                    <?php endif; ?>
                    <div class="hamburger hidden hamburger--spin js-hamburger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <?php if(get_field('pokaz_button','options')) { $navPos = "justify-content-center"; } else{ $navPos = "justify-content-end"; } ?>

                    <?php get_template_part( 'templates/header/menu', get_post_format() ); ?>

                    <?php if(get_field('pokaz_button','options')) { ?>

                    <?php if( have_rows('cta','options') ): ?>
                    <div class="header-right">
                        <div class="inner">
                            <i class="fas fa-ellipsis-h opener"></i>
                        </div>
                        <?php while( have_rows('cta','options') ): the_row(); ?>
                        <div class="wrap-cta">
                            <?php if(get_sub_field('link') && get_sub_field('tresc'))  { ?>
                            <a href="<?php the_sub_field('link','options'); ?>" class=" btn btn-md btn-revers"><?php the_sub_field('tresc','options'); ?></a>
                            <?php } ?>
                            <?php if(get_sub_field('link_two') && get_sub_field('tresc_two'))  { ?>
                            <a href="<?php the_sub_field('link_two','options'); ?>" class=" btn btn-md btn-main"><?php the_sub_field('tresc_two','options'); ?></a>
                            <?php } ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                    <?php } ?>
                </nav>
            </div>
        </div>
    </div>
</div>
