var swiper = new Swiper('.gallery-carousel', {
    slidesPerView:2,
    spaceBetween: 30,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-pagination',
      // dynamicBullets: true,
      clickable: true,
    },
    breakpoints: {
        640: {
          slidesPerView: 2,

        },
        768: {
          slidesPerView: 3,

        },
        1024: {
          slidesPerView: 4,

        },
      }
});