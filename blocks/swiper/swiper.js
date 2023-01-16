var swiper = new Swiper(".swiperSwiper", {
  slidesPerView: 1,
  preloadImages: false,
  loop: true,
  lazy: true,
  autoplay: {
    delay: 3900,
    disableOnInteraction: false
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  }
});
