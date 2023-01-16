<?php
$id = 'podcasts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'podcasts-block ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="wraper_podcast">
<?php if(get_field('wyswietlaj_model') == "Randomowo") { ?>
    <?php 
        $postsPerPage = get_field('liczba_podkastow');
        $obj = get_queried_object();
        $postid = $obj->ID;

        $args = array(
            'post_type' => 'podcast',
            'post_status' => 'publish',
            'posts_per_page' => $postsPerPage,
            'orderby' => 'rand',
            'order' => 'ASC',  
            'post__not_in' => array( $postid )
        );
        $loop = new WP_Query($args);
        if($loop->have_posts() ) : ?>
    <?php  while ($loop->have_posts()) : $loop->the_post(); ?>
                
        <article id="post-<?php the_ID(); ?>">
            <div class="content-pod">
                <h3 class="title-pod"><a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                </a></h3>
                <div class="wraper">
                    <?php if (has_post_thumbnail( $post->ID ) ) { ?>
                    <div class="img">
                    <?php the_post_thumbnail('medium'); ?>
                    </div>
                    <?php } ?>
                    <div class="con  <?php if (!has_post_thumbnail( $post->ID ) ) { echo "con-full"; }?>">
                    <?php if(get_field('zajawka', get_the_ID())) { ?>
                        <p><?php the_field('zajawka', get_the_ID()) ?></p>
                    <?php } ?>
                    <?php if(get_field('czas_trwania', get_the_ID())) { ?>
                        <div class="ex-inf">
                        <span> Czas trwania: <b><?php the_field('czas_trwania', get_the_ID()) ?></b> </span>
                        </div>
                    <?php } ?>
                    <?php if(get_field('prowadzacy', get_the_ID())) { ?>
                      <div class="ex-inf">
                      <span>  Prowadzący: </br><b><?php the_field('prowadzacy', get_the_ID()) ?></b></span>
                      </div>

                    <?php } ?>
                    <a class=" more"href="<?php the_permalink(); ?>"></i> Słuchaj teraz </a>
                </div>
                </div>
            </div>
        </article>
    <?php  endwhile; ?>
    <?php else : ?>
         <h1 class="text-center">Nic nie znaleziono</h1>
    <?php endif; wp_reset_query(); ?>

<?php } elseif(get_field('wyswietlaj_model') == "Wszystkie") { ?>
   
   <?php 

        $args = array(
            'post_type' => 'podcast',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'DSC',  
        );
        $loop = new WP_Query($args);
        if($loop->have_posts() ) : ?>
    <?php  while ($loop->have_posts()) : $loop->the_post(); ?>
                
        <article id="post-<?php the_ID(); ?>">
            <div class="content-pod">
                <h3 class="title-pod"><a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                </a></h3>
                <div class="wraper">
                    <?php if (has_post_thumbnail( $post->ID ) ) { ?>
                    <div class="img">
                    <?php the_post_thumbnail('medium'); ?>
                    </div>
                    <?php } ?>
                    <div class="con  <?php if (!has_post_thumbnail( $post->ID ) ) { echo "con-full"; }?>">
                    <?php if(get_field('zajawka', get_the_ID())) { ?>
                        <p><?php the_field('zajawka', get_the_ID()) ?></p>
                    <?php } ?>
                    <?php if(get_field('czas_trwania', get_the_ID())) { ?>
                        <div class="ex-inf">
                        <span> Czas trwania: <b><?php the_field('czas_trwania', get_the_ID()) ?></b> </span>
                        </div>
                    <?php } ?>
                    <?php if(get_field('prowadzacy', get_the_ID())) { ?>
                      <div class="ex-inf">
                      <span> Prowadzący: </br><b><?php the_field('prowadzacy', get_the_ID()) ?></b></span>
                      </div>

                    <?php } ?>
                    <a class=" more"href="<?php the_permalink(); ?>"> Słuchaj teraz </a>
                </div>
                </div>
            </div>
        </article>
    <?php  endwhile; ?>
    <?php else : ?>
         <h1 class="text-center">Nic nie znaleziono</h1>
    <?php endif; wp_reset_query(); ?>
<?php } else { ?>   
        <?php $podcasts = get_field('podcasts');
        if( $podcasts ): ?>
            <?php foreach( $podcasts as $podcast ): 
                $permalink = get_permalink( $podcast->ID );
                $thumb = get_the_post_thumbnail( $podcast->ID, 'medium');
                $title = get_the_title( $podcast->ID );
                $czas = get_the_title( $podcast->ID );
                $casTrwania = get_field( 'czas_trwania', $podcast->ID );
                $prwa = get_field( 'prowadzacy', $podcast->ID );
                $zajawka = get_field( 'zajawka', $podcast->ID );
                ?>
                 <article id="post-<?php the_ID(); ?>">
                    <div class="content-pod">
                        <h3 class="title-pod"><a href="<?php echo esc_url( $permalink ); ?>">
                                <?php echo esc_html( $title ); ?>
                        </a></h3>
                        <div class="wraper">
                            <?php if (has_post_thumbnail( $post->ID ) ) { ?>
                            <div class="img">
                            <?php echo $thumb; ?>
                            </div>
                            <?php } ?>
                            <div class="con  <?php if (!has_post_thumbnail( $post->ID ) ) { echo "con-full"; }?>">
                                <?php if(!empty($zajawka)) { ?>
                                    <p><?php echo esc_html(  $zajawka ); ?></p>
                                <?php } ?>
                                <?php if(!empty($czasTrwania)) { ?>
                                    <div class="ex-inf">
                                    <span><i class="fas fa-volume-down"></i> Czas trwania: <b><?php echo esc_html(  $czasTrwania ); ?></b> </span>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($prwa)) { ?>
                                <div class="ex-inf">
                                <span> <i class="fas fa-user-friends"></i> Prowadzący: </br><b><?php echo esc_html(  $prwa ); ?></b></span>
                                </div>
                                <?php } ?>
                                <a class=" more" href="<?php echo esc_url( $permalink ); ?>"><i class="fas fa-podcast"></i> Słuchaj teraz </a>
                            </div>
                        </div>
                    </div>
                </article>
          
        <?php endforeach; ?>
        <?php endif; ?>
<?php } ?>
</div>
</section>