<?php if (get_field('top_header', pll_current_language('slug')) == true ) { ?>
<section id="top-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="wraper">
                    <?php if(get_field('lewa_sekcja', pll_current_language('slug'))) {?>
                    <div class="left">
                        <p><?php the_field('lewa_sekcja', pll_current_language('slug')); ?></p>
                    </div>
                    <?php } ?>
                    <?php if (get_field('social_media_header', pll_current_language('slug')) == true ) { ?>
                    <div class="right">
                    <?php if( have_rows('linki_do_grup_spolecznosciowych', pll_current_language('slug')) ): ?>
                        <ul>
<!--                         <?php pll_the_languages(array('show_flags'=>1,'show_names'=>0)); ?> -->
                        <?php while( have_rows('linki_do_grup_spolecznosciowych', pll_current_language('slug')) ): the_row(); ?>
                         
                         <li><a href="<?php the_sub_field('link_social', pll_current_language('slug')); ?>" target="_blank" rel="nofollow"><?php if(get_sub_field('klasa_ikony', pll_current_language('slug'))) { ?><i class="fab <?php the_sub_field('klasa_ikony', pll_current_language('slug')); ?>"></i><?php } ?></a></li>
                            
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>