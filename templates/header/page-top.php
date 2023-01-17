<?php if (get_field('top_header', 'options') == true ) { ?>
<section id="top-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="wraper">
                    <?php if(get_field('lewa_sekcja', 'options')) {?>
                    <div class="left">
                        <p><?php the_field('lewa_sekcja', 'options'); ?></p>
                    </div>
                    <?php } ?>
                    <?php if (get_field('social_media_header', 'options') == true ) { ?>
                    <div class="right">
                        <?php if( have_rows('linki_do_grup_spolecznosciowych', 'options') ): ?>
                        <ul>

                            <?php while( have_rows('linki_do_grup_spolecznosciowych', 'options') ): the_row(); ?>

                            <li><a href="<?php the_sub_field('link_social', 'options'); ?>" target="_blank" rel="nofollow"><?php if(get_sub_field('klasa_ikony', 'options')) { ?><i class="fab <?php the_sub_field('klasa_ikony', 'options'); ?>"></i><?php } ?></a></li>

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
