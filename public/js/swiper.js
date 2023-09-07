// big Swiper
var swiper = new Swiper(".bigSwiper", {
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
});
// small Swiper
var swiper = new Swiper(".smallSwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerGroup: 1,
        slidesPerView: 2,
        spaceBetween: 10,
      },
      820: {
        slidesPerGroup: 4,
        slidesPerView: 4,
        spaceBetween: 15,
      },
      1400: {
        slidesPerGroup: 1,
        slidesPerView: 6,
        spaceBetween: 15,
      },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
  });