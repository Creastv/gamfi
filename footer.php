      </div>
    </div>
  </main>
  <footer id="footer" itemscope="" itemtype="http://schema.org/WPFooter">
    <div class="container">
      <div class="row">
        <div class="col-6 col-md-3 ">
          <?php do_action( 'before_sidebar' ); ?>
          <?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?><?php endif; ?>
		
        </div>
		 <?php if (pll_current_language() == 'en') { ?>
		   <div class="col-6 col-md-3 ">
			<?php wp_nav_menu( array(
						'walker' => new WP_Bootstrap_Navwalker(),
						'theme_location'	=> 'tree',
						'depth'				=> 2, // 1 = with dropdowns, 0 = no dropdowns.
			) ); ?>
			</div>
		  <?php } else { ?>
        <div class="col-6 col-md-3 ">
        <?php do_action( 'before_sidebar' ); ?>
        <?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?><?php endif; ?>
        </div>
        <div class="col-6 col-md-3">
        <?php do_action( 'before_sidebar' ); ?>
        <?php if ( ! dynamic_sidebar( 'sidebar-4' ) ) : ?><?php endif; ?>
        </div>
        <div class="col-6 col-md-3">
        <?php do_action( 'before_sidebar' ); ?>
        <?php if ( ! dynamic_sidebar( 'sidebar-5' ) ) : ?><?php endif; ?>
        </div>
		 <?php } ?>
      </div>
    </div>
    <div id="info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <div class="wraper">
            <div class="left">
              <p> <?php the_field('info', pll_current_language('slug')); ?></p>
            </div>
            <?php if (get_field('social_media_footer', pll_current_language('slug')) == true ) { ?>
            <div class="right">
              <?php if( have_rows('linki_do_grup_spolecznosciowych', pll_current_language('slug')) ): ?>
              <ul>
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
    </div>
  </footer>
  <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script> -->
    <?php if(get_field('submenu_si_no') == true) { ?>
  <script>
    if(jQuery(window).innerWidth() <= 992) {
    jQuery(document).ready(function(){  
      var flag = true;
      console.log(flag)
      jQuery(".titel_sub__menu").click(function(){  
        jQuery('.titel_sub__menu').toggleClass( "active" );
        if (flag == true){
          flag = false;
          console.log(flag)
          jQuery('.wraper-menu').slideDown("fast")
        } else {
          flag = true;
          console.log(flag)
          jQuery('.wraper-menu').slideUp("fast");
        }
      }); 
      jQuery(".wraper-menu ul li a").click(function(){
        flag = true;
        jQuery('.wraper-menu').slideUp("fast");
        jQuery('.titel_sub__menu').removeClass( "active" );
      });
    }); 
    }

  </script>
  <?php } ?>
  <script>
    function addCookieRestrictContent(cookieName) {
        document.cookie = `${cookieName}=gamaacess3623ass; max-age=31556926; path=/;`;
    };
    // onsubmit="addCookieRestrictContent('test)"
  </script>

  <?php wp_footer(); ?>
 </body>
</html>


