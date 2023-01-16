    
jQuery(document).ready(function(){  
    jQuery(".hamburger").click(function(){  
      jQuery(".hamburger").toggleClass(" is-active");  
      jQuery("html").toggleClass("overflow");  
    }); 
    jQuery(".opener").click(function(){  
      jQuery(".wrap-cta").slideToggle("is-active");  
    });  
  }); 
   AOS.init();
  jQuery(document).on( 'scroll', function(){
  if (jQuery(window).scrollTop() > 200) {
      jQuery('#header').addClass( "sticky" );
      // jQuery('#main-page').css("marginTop", + navBar.offsetHeight);
  } else {
      jQuery('#header').removeClass( "sticky" );
      // jQuery('#main-page').css("marginTop", "0px");
  }
  if (jQuery(window).scrollTop() > 300) {
      jQuery('#header').addClass( "fadeIn" );
      // jQuery('#main-page').css("marginTop", + navBar.offsetHeight);
  } else {
      jQuery('#header').removeClass( "fadeIn" );
      // jQuery('#main-page').css("marginTop", "0px");
  }
  if (jQuery(window).scrollTop() > 100) {
      jQuery('.navbar-brand ').addClass( "logo-scroll" );
  } else {
      jQuery('.navbar-brand ').removeClass( "logo-scroll" );
  }
  });



function offsetAnchor() {
  if (location.hash.length !== 0) {
    window.scrollTo(window.scrollX, window.scrollY - 100);
  }
}
jQuery(document).on('click', 'a[href^="#"]', function(event) {
  window.setTimeout(function() {
    offsetAnchor();
  }, 0);
});
window.addEventListener('a[href^="#"]', function(event) {
  window.scrollTo(window.scrollX, window.scrollY - 100);
});
window.setTimeout(offsetAnchor, 0);

