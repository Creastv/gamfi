var swiper = new Swiper('.cs-carousel', {
    slidesPerView:2,
    autoplay: {
        delay: 5000,
      },
    breakpoints: {
        640: {
          slidesPerView: 2,

        },
        768: {
          slidesPerView: 2,

        },
        1024: {
          slidesPerView: 3,

        },
      }
});