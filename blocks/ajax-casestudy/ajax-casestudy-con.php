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
              <a class="more" href="<?php the_permalink(); ?>"> Dowiedz się więcej</a>
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
              <a class="more" href="<?php the_permalink(); ?>"> Dowiedz się więcej</a>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
          <?php } ?>
      </div>
  </article>
