<?php
$id = 'case-stydy-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'case-stydy-block ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if(get_field('rodzaj_blocku') == 'hero') { ?>
    <?php
        $featured_case = get_field('case_study_hero');
        if( $featured_case &&  get_field('wyswietl_karte_w_liscie_dodawanej_za_pomoca_bloku_case_study', $featured_case) == true):  ?>
    <article class="hero-cs">
        <div class="info">
            <div class="wrap">
                <div class="name">
                    <?php if(get_field('wyswietlaj_logo_nazwa', $featured_case) == "name") { ?>
                    <h3><?php the_field('nazwa_firmy', $featured_case); ?></h3>
                    <?php } else { ?>
                    <?php  $image = get_field('logo_firmy',  $featured_case);
                        if( !empty( $image ) ): ?>
                    <?php  echo wp_get_attachment_image( $image, 'medium' ); ?>
                    <?php endif; ?>
                    <?php } ?>
                </div>
                <?php if( have_rows('szczegolowe_info', $featured_case) ): ?>
                <ul>
                    <?php while( have_rows('szczegolowe_info', $featured_case) ): the_row(); 
                        $branza = get_sub_field('branza');
                        $liczbaPracownikow = get_sub_field('liczba_pracownikow');
                        $klientGamfiOd = get_sub_field('klient_gamfi_od');
                        $produkt = get_sub_field('produkt');
                        $linko = get_the_permalink($featured_case);
                        $title = get_the_title($featured_case);
                        $dispLink = get_field('nie_wyswietlaj_czytaj_wiecej', $featured_case)
	                    
                    ?>
                    <?php if(!empty($branza)) { ?>
                    <li><span>Branża: </span><b><?php echo $branza; ?></b></li>
                    <?php } ?>
                    <?php if(!empty($liczbaPracownikow)) { ?>
                    <li><span>Liczba pracowników: </span><b><?php echo $liczbaPracownikow; ?></b></li>
                    <?php } ?>
                    <?php if(!empty($klientGamfiOd)) { ?>
                    <li><span> Klient Gamfi w okresie: </span><b><?php echo $klientGamfiOd; ?></b></li>
                    <?php } ?>
                    <?php if(!empty($produkt)) { ?>
                    <li><span>Produkt: </span><b><?php echo $produkt; ?></b></li>
                    <?php } ?>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="testi-cs">
            <?php if(get_field('rodzaj_tresci', $featured_case) == "Zajawka") { ?>
            <div class="top">
                <h3 class="title"><?php echo $title; ?></h3>
                <p><?php the_field('zajawka', $featured_case); ?></p>
                <?php if(!$dispLink) { ?>
                <a class="more" href="<?php echo $linko; ?>"> Dowiedz się więcej</a>
                <?php } ?>
            </div>
            <?php } else { ?>
            <?php if( have_rows('testymonial', $featured_case) ): ?>
            <?php while( have_rows('testymonial', $featured_case) ): the_row(); 
                    $zdjecieProfilowe = get_sub_field('zdjecie_profilowe');
                    $size = 'avatar';

                    $imieNazwisko = get_sub_field('imie_nazwisko');
                    $stanowisko = get_sub_field('stanowisko');
                    $firma = get_sub_field('firma');
                    $opinia = get_sub_field('opinia');
                    $link = get_the_permalink($featured_case);
                    $title = get_the_title($featured_case);
                    $dispLink = get_field('nie_wyswietlaj_czytaj_wiecej', $featured_case);
						  
                ?>
            <div class="top">
                <h3 class="title"><?php echo $title; ?></h3>
                <p><?php echo $opinia; ?></p>
            </div>
            <div class="bottom">
                <div class="per">
                    <div class="avatar">
                        <?php if( !empty( $zdjecieProfilowe ) ): ?>
                        <?php  echo wp_get_attachment_image( $zdjecieProfilowe, $size ); ?>
                        <?php else : ?>
                        <svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490.667 490.667">
                            <path fill="#c9c9c9" d="M245.333 0C110.059 0 0 110.059 0 245.333s110.059 245.333 245.333 245.333 245.333-110.059 245.333-245.333S380.608 0 245.333 0zm0 469.333c-123.52 0-224-100.48-224-224s100.48-224 224-224 224 100.48 224 224-100.48 224-224 224z" />
                            <path d="M245.333 234.667c-76.459 0-138.667 62.208-138.667 138.667 0 5.888 4.779 10.667 10.667 10.667S128 379.221 128 373.333C128 308.629 180.629 256 245.333 256s117.333 52.629 117.333 117.333c0 5.888 4.779 10.667 10.667 10.667S384 379.221 384 373.333c0-76.458-62.208-138.666-138.667-138.666zM245.333 64c-41.173 0-74.667 33.493-74.667 74.667s33.493 74.667 74.667 74.667S320 179.84 320 138.667 286.507 64 245.333 64zm0 128C215.936 192 192 168.064 192 138.667s23.936-53.333 53.333-53.333 53.333 23.936 53.333 53.333S274.731 192 245.333 192z" fill="#ff7800" />
                        </svg>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($imieNazwisko) && !empty($firma)  && !empty($stanowisko)) { ?>
                    <div class="name">
                        <?php if(!empty($imieNazwisko)) { ?>
                        <span class="name"><b><?php echo  $imieNazwisko; ?></b></span>
                        <?php } ?>
                        <?php if(!empty($stanowisko) && !empty($firma)) { ?>
                        <span class="sta-firm"><?php echo  $stanowisko; ?>, <?php echo  $firma; ?></span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                 <?php if($dispLink == false) { ?>
                <a class="more" href="<?php echo $link; ?>"> Dowiedz się więcej</a>
                <?php } ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php } ?>
        </div>
    </article>
    <?php  endif; ?>
    <?php } else { ?>
    <?php if(get_field('wyswietlaj_case_studies_po:') == 'Po kategoriach') { ?>

    <?php $terms = get_field('kategorie_cases', $post->ID);
            if( $terms ): ?>
    <?php foreach( $terms as $term ): ?>
    <?php $categories[] = $term->slug; ?>
    <?php endforeach; ?>
    <?php endif; ?>

    <?php 
                $postPerPage = get_field('ilosc_postow_case');
                $nr = $postPerPage;
                if(!empty($postPerPage) && $postPerPage == 0) { $nr = '-1'; };
                $displayField = get_field('sposob_wyswietlania_case');
                $display = ($displayField == "Randomowo") ? "rand" : "title" ;
                $args = array(
                    'post_type' => 'case-study',
                    'post_status' => "publish",
                    'posts_per_page' => $nr,
                    'order' => 'ASC', 
                    'orderby' => $display,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'case-studies',
                            'field'    => 'slug', // term_id, slug  
                            'terms'    => $categories,
                        ),
                    ), 
                ); $loop = new WP_Query($args);
                if($loop->have_posts() ) :
            ?>
    <div class="wrap-cs-grid">
        <?php  while ($loop->have_posts()) : $loop->the_post(); 
                if(get_field('wyswietl_karte_w_liscie_dodawanej_za_pomoca_bloku_case_study', get_the_ID()) == true ) { ?>
        <article class="cs-grid-item">
            <div class="info">
                <div class="wrap">
                    <div class="name">
                        <?php if(get_field('wyswietlaj_logo_nazwa', get_the_ID()) == "name") { ?>
                        <h3><?php the_field('nazwa_firmy', get_the_ID()); ?></h3>
                        <?php } else { ?>
                        <?php  $image = get_field('logo_firmy', get_the_ID());
                                    if( !empty( $image ) ): ?>
                        <?php  echo wp_get_attachment_image( $image, 'medium' ); ?>
                        <?php endif; ?>
                        <?php } ?>
                    </div>
                    <?php if( have_rows('szczegolowe_info', get_the_ID()) ): ?>
                    <ul>
                        <?php while( have_rows('szczegolowe_info', get_the_ID()) ): the_row(); 
                                    $branza = get_sub_field('branza');
                                    $liczbaPracownikow = get_sub_field('liczba_pracownikow');
                                    $klientGamfiOd = get_sub_field('klient_gamfi_od');
                                    $produkt = get_sub_field('produkt');
                                ?>
                        <?php if(!empty($branza)) { ?>
                        <li><span>Branża: </span><b><?php echo $branza; ?></b></li>
                        <?php } ?>
                        <?php if(!empty($liczbaPracownikow)) { ?>
                        <li><span>Liczba pracowników: </span><b><?php echo $liczbaPracownikow; ?></b></li>
                        <?php } ?>
                        <?php if(!empty($klientGamfiOd)) { ?>
                        <li><span> Klient Gamfi w okresie: </span><b><?php echo $klientGamfiOd; ?></b></li>
                        <?php } ?>
                        <?php if(!empty($produkt)) { ?>
                        <li><span>Produkt: </span><b><?php echo $produkt; ?></b></li>
                        <?php } ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="testi-cs">
                <?php if(get_field('rodzaj_tresci', get_the_ID()) == "Zajawka") { ?>
                <div class="top">
                    <p><?php the_field('zajawka', get_the_ID()); ?></p>
                     <?php if(!get_field('nie_wyswietlaj_czytaj_wiecej', get_the_ID())) { ?>
                    <a class="more" href="<?php the_permalink(); ?>"> Dowiedz się więcej</a>
                    <?php } ?>
                </div>
                <?php } else { ?>

                <?php if( have_rows('testymonial', get_the_ID()) ): ?>
                <?php while( have_rows('testymonial', get_the_ID()) ): the_row(); 
                                    $zdjecieProfilowe = get_sub_field('zdjecie_profilowe');
                                    $size = 'avatar';

                                    $imieNazwisko = get_sub_field('imie_nazwisko');
                                    $stanowisko = get_sub_field('stanowisko');
                                    $firma = get_sub_field('firma');
                                    $opinia = get_sub_field('opinia');
                                   
								
                                ?>
                <div class="top">
                    <h3><?php the_title();?></h3>
                    <p><?php echo $opinia; ?></p>
                </div>
                <div class="bottom">

                    <div class="per">
                        <div class="avatar">
                            <?php 
                                        if( !empty( $zdjecieProfilowe ) ): ?>
                            <?php  echo wp_get_attachment_image( $zdjecieProfilowe, $size ); ?>
                            <?php else : ?>
                            <svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490.667 490.667">
                                <path fill="#c9c9c9" d="M245.333 0C110.059 0 0 110.059 0 245.333s110.059 245.333 245.333 245.333 245.333-110.059 245.333-245.333S380.608 0 245.333 0zm0 469.333c-123.52 0-224-100.48-224-224s100.48-224 224-224 224 100.48 224 224-100.48 224-224 224z" />
                                <path d="M245.333 234.667c-76.459 0-138.667 62.208-138.667 138.667 0 5.888 4.779 10.667 10.667 10.667S128 379.221 128 373.333C128 308.629 180.629 256 245.333 256s117.333 52.629 117.333 117.333c0 5.888 4.779 10.667 10.667 10.667S384 379.221 384 373.333c0-76.458-62.208-138.666-138.667-138.666zM245.333 64c-41.173 0-74.667 33.493-74.667 74.667s33.493 74.667 74.667 74.667S320 179.84 320 138.667 286.507 64 245.333 64zm0 128C215.936 192 192 168.064 192 138.667s23.936-53.333 53.333-53.333 53.333 23.936 53.333 53.333S274.731 192 245.333 192z" fill="#ff7800" />
                            </svg>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($imieNazwisko) && !empty($firma)  && !empty($stanowisko)) { ?>
                        <div class="name">
                            <?php if(!empty($imieNazwisko)) { ?>
                            <span class="name"><b><?php echo  $imieNazwisko; ?></b></span>
                            <?php } ?>
                            <?php if(!empty($stanowisko) && !empty($firma)) { ?>
                            <span class="sta-firm"><?php echo  $stanowisko; ?>, <?php echo  $firma; ?></span>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                     <?php if(!get_field('nie_wyswietlaj_czytaj_wiecej', get_the_ID())) { ?>
                    <a class="more" href="<?php the_permalink(); ?>"> Dowiedz się więcej</a>
                    <?php } ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php } ?>
            </div>
        </article>
        <?php } ?>
        <?php  endwhile; ?>
    </div>
    <?php endif; wp_reset_query(); ?>


    <?php } elseif(get_field('wyswietlaj_case_studies_po:') == 'Wybrane') { ?>

    <?php $casestudies = get_field('case_studies_karty');
            if( $casestudies ): ?>
    <div class="wrap-cs-grid">
        <?php foreach( $casestudies as $casestudy ): 
                    $cont = get_the_excerpt($casestudy->ID);
                    $thumb = get_the_post_thumbnail( $casestudy->ID, 'medium');
                    $title = get_the_title( $casestudy->ID );
                ?>

        <article class="cs-grid-item">
            <div class="info">
                <div class="wrap">
                    <div class="name">
                        <?php if(get_field('wyswietlaj_logo_nazwa', $casestudy) == "name") { ?>
                        <h3><?php the_field('nazwa_firmy', $casestudy); ?></h3>
                        <?php } else { ?>
                        <?php  $image = get_field('logo_firmy',  $casestudy);
                                if( !empty( $image ) ): ?>
                        <?php  echo wp_get_attachment_image( $image, 'medium' ); ?>
                        <?php endif; ?>
                        <?php } ?>
                    </div>
                    <?php if( have_rows('szczegolowe_info', $casestudy) ): ?>
                    <ul>
                        <?php while( have_rows('szczegolowe_info', $casestudy) ): the_row(); 
                                $branza = get_sub_field('branza');
                                $liczbaPracownikow = get_sub_field('liczba_pracownikow');
                                $klientGamfiOd = get_sub_field('klient_gamfi_od');
                                $produkt = get_sub_field('produkt');
                                $linko = get_the_permalink($casestudy);
                                $title = get_the_title($casestudy);
                                $dispLink = get_field('nie_wyswietlaj_czytaj_wiecej', $casestudy);
                            ?>
                        <?php if(!empty($branza)) { ?>
                        <li><span>Branża: </span><b><?php echo $branza; ?></b></li>
                        <?php } ?>
                        <?php if(!empty($liczbaPracownikow)) { ?>
                        <li><span>Liczba pracowników: </span><b><?php echo $liczbaPracownikow; ?></b></li>
                        <?php } ?>
                        <?php if(!empty($klientGamfiOd)) { ?>
                        <li><span> Klient Gamfi w okresie: </span><b><?php echo $klientGamfiOd; ?></b></li>
                        <?php } ?>
                        <?php if(!empty($produkt)) { ?>
                        <li><span>Produkt: </span><b><?php echo $produkt; ?></b></li>
                        <?php } ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="testi-cs">
                <?php if(get_field('rodzaj_tresci', $casestudy) == "Zajawka") { ?>
                <div class="top">
                    <h3><?php echo $title; ?> </h3>
                    <p><?php the_field('zajawka', $casestudy); ?></p>
                     <?php if( $dispLink == false ) { ?>
                    <a class="more" href="<?php echo $linko; ?>"> Dowiedz się więcej</a>
                    <?php } ?>
                </div>
                <?php } else { ?>

                <?php if( have_rows('testymonial', $casestudy) ): ?>
                <?php while( have_rows('testymonial', $casestudy) ): the_row(); 
                            $zdjecieProfilowe = get_sub_field('zdjecie_profilowe');
                            $size = 'avatar';
                            $title = get_the_title();
                            $imieNazwisko = get_sub_field('imie_nazwisko');
                            $stanowisko = get_sub_field('stanowisko');
                            $firma = get_sub_field('firma');
                            $opinia = get_sub_field('opinia');
                            $link = get_the_permalink($casestudy);
                            $title = get_the_title($casestudy);
                            $diLink = get_field('nie_wyswietlaj_czytaj_wiecej', $casestudy)
                        ?>
                <div class="top">
                    <h3><?php echo $title; ?></h3>
                    <p><?php echo $opinia; ?></p>
                </div>
                <div class="bottom">
                    <div class="per">
                        <div class="avatar">
                            <?php if( !empty( $zdjecieProfilowe ) ): ?>
                            <?php  echo wp_get_attachment_image( $zdjecieProfilowe, $size ); ?>
                            <?php else : ?>
                            <svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490.667 490.667">
                                <path fill="#c9c9c9" d="M245.333 0C110.059 0 0 110.059 0 245.333s110.059 245.333 245.333 245.333 245.333-110.059 245.333-245.333S380.608 0 245.333 0zm0 469.333c-123.52 0-224-100.48-224-224s100.48-224 224-224 224 100.48 224 224-100.48 224-224 224z" />
                                <path d="M245.333 234.667c-76.459 0-138.667 62.208-138.667 138.667 0 5.888 4.779 10.667 10.667 10.667S128 379.221 128 373.333C128 308.629 180.629 256 245.333 256s117.333 52.629 117.333 117.333c0 5.888 4.779 10.667 10.667 10.667S384 379.221 384 373.333c0-76.458-62.208-138.666-138.667-138.666zM245.333 64c-41.173 0-74.667 33.493-74.667 74.667s33.493 74.667 74.667 74.667S320 179.84 320 138.667 286.507 64 245.333 64zm0 128C215.936 192 192 168.064 192 138.667s23.936-53.333 53.333-53.333 53.333 23.936 53.333 53.333S274.731 192 245.333 192z" fill="#ff7800" />
                            </svg>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($imieNazwisko) && !empty($firma)  && !empty($stanowisko)) { ?>
                        <div class="name">
                            <?php if(!empty($imieNazwisko)) { ?>
                            <span class="name"><b><?php echo  $imieNazwisko; ?></b></span>
                            <?php } ?>
                            <?php if(!empty($stanowisko) && !empty($firma)) { ?>
                            <span class="sta-firm"><?php echo  $stanowisko; ?>, <?php echo  $firma; ?></span>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                     <?php if( $diLink == false ) { ?>
                    <a class="more" href="<?php echo $link; ?>"> Dowiedz się więcej</a>
                    <?php } ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php } ?>
            </div>
        </article>

        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php } else { ?>
    <?php $args = array(
                'post_type' => 'case-study',
                'post_status' => "publish",
                'posts_per_page' => -1,
                'order' => 'ASC',  
            ); $loop = new WP_Query($args);
            if($loop->have_posts() ) : ?>
    <div class="wrap-cs-grid">
        <?php  while ($loop->have_posts()) : $loop->the_post(); 
                if(get_field('wyswietl_karte_w_liscie_dodawanej_za_pomoca_bloku_case_study', get_the_ID()) == true ) { ?>
        <article class="cs-grid-item">
            <div class="info">
                <div class="wrap">
                    <div class="name">
                        <?php if(get_field('wyswietlaj_logo_nazwa', get_the_ID()) == "name") { ?>
                        <h3><?php the_field('nazwa_firmy', get_the_ID()); ?></h3>
                        <?php } else { ?>
                        <?php  $image = get_field('logo_firmy', get_the_ID());
                                if( !empty( $image ) ): ?>
                        <?php  echo wp_get_attachment_image( $image, 'medium' ); ?>
                        <?php endif; ?>
                        <?php } ?>
                    </div>
                    <?php if( have_rows('szczegolowe_info', get_the_ID()) ): ?>
                    <ul>
                        <?php while( have_rows('szczegolowe_info', get_the_ID()) ): the_row(); 
                                    $branza = get_sub_field('branza');
                                    $liczbaPracownikow = get_sub_field('liczba_pracownikow');
                                    $klientGamfiOd = get_sub_field('klient_gamfi_od');
                                    $produkt = get_sub_field('produkt');
									$title = get_the_title();
                                ?>
                        <?php if(!empty($branza)) { ?>
                        <li><span>Branża: </span><b><?php echo $branza; ?></b></li>
                        <?php } ?>
                        <?php if(!empty($liczbaPracownikow)) { ?>
                        <li><span>Liczba pracowników: </span><b><?php echo $liczbaPracownikow; ?></b></li>
                        <?php } ?>
                        <?php if(!empty($klientGamfiOd)) { ?>
                        <li><span> Klient Gamfi w okresie: </span><b><?php echo $klientGamfiOd; ?></b></li>
                        <?php } ?>
                        <?php if(!empty($produkt)) { ?>
                        <li><span>Produkt: </span><b><?php echo $produkt; ?></b></li>
                        <?php } ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="testi-cs">
                <?php if(get_field('rodzaj_tresci', get_the_ID()) == "Zajawka") { ?>
                <div class="top">
                    <h3><?php echo $title; ?></h3>
                    <p><?php the_field('zajawka', get_the_ID()); ?></p>
                    <?php if(!get_field('nie_wyswietlaj_czytaj_wiecej', get_the_ID())) { ?>
                    <a class="more" href="<?php the_permalink(); ?>"> Dowiedz się więcej</a>
                    <?php } ?>
                </div>
                <?php } else { ?>
                <?php if( have_rows('testymonial', get_the_ID()) ): ?>
                <?php while( have_rows('testymonial', get_the_ID()) ): the_row(); 
                                    $zdjecieProfilowe = get_sub_field('zdjecie_profilowe');
                                    $size = 'avatar';

                                    $imieNazwisko = get_sub_field('imie_nazwisko');
                                    $stanowisko = get_sub_field('stanowisko');
                                    $firma = get_sub_field('firma');
                                    $opinia = get_sub_field('opinia');
									  $title = get_the_title();
                                ?>
                <div class="top">
                    <p><b><?php the_title(); ?></b></p>
                    <p><?php echo $opinia; ?></p>

                </div>
                <div class="bottom">
                    <div class="per">
                        <div class="avatar">
                            <?php 
                                        if( !empty( $zdjecieProfilowe ) ): ?>
                            <?php  echo wp_get_attachment_image( $zdjecieProfilowe, $size ); ?>
                            <?php else : ?>
                            <svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490.667 490.667">
                                <path fill="#c9c9c9" d="M245.333 0C110.059 0 0 110.059 0 245.333s110.059 245.333 245.333 245.333 245.333-110.059 245.333-245.333S380.608 0 245.333 0zm0 469.333c-123.52 0-224-100.48-224-224s100.48-224 224-224 224 100.48 224 224-100.48 224-224 224z" />
                                <path d="M245.333 234.667c-76.459 0-138.667 62.208-138.667 138.667 0 5.888 4.779 10.667 10.667 10.667S128 379.221 128 373.333C128 308.629 180.629 256 245.333 256s117.333 52.629 117.333 117.333c0 5.888 4.779 10.667 10.667 10.667S384 379.221 384 373.333c0-76.458-62.208-138.666-138.667-138.666zM245.333 64c-41.173 0-74.667 33.493-74.667 74.667s33.493 74.667 74.667 74.667S320 179.84 320 138.667 286.507 64 245.333 64zm0 128C215.936 192 192 168.064 192 138.667s23.936-53.333 53.333-53.333 53.333 23.936 53.333 53.333S274.731 192 245.333 192z" fill="#ff7800" />
                            </svg>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($imieNazwisko) && !empty($firma)  && !empty($stanowisko)) { ?>
                        <div class="name">
                            <?php if(!empty($imieNazwisko)) { ?>
                            <span class="name"><b><?php echo  $imieNazwisko; ?></b></span>
                            <?php } ?>
                            <?php if(!empty($stanowisko) && !empty($firma)) { ?>
                            <span class="sta-firm"><?php echo  $stanowisko; ?>, <?php echo  $firma; ?></span>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <?php if(!get_field('nie_wyswietlaj_czytaj_wiecej', get_the_ID())) { ?>
                    <a class="more" href="<?php the_permalink(); ?>"> Dowiedz się więcej</a>
                    <?php } ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php } ?>
            </div>
        </article>
        <?php } ?>
        <?php  endwhile; ?>
    </div>
    <?php endif; wp_reset_query(); ?>
    <?php } ?>
    <?php } ?>
</section>
