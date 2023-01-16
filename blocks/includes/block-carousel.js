var swiper = new Swiper('.logotypy-carousel', {
    slidesPerView:2,
    spaceBetween: 30,
    autoplay: {
        delay: 5000,
      },
    breakpoints: {
        640: {
          slidesPerView: 2,

        },
        768: {
          slidesPerView: 4,

        },
        1024: {
          slidesPerView: 5,

        },
      }
});