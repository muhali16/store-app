  // import Swiper bundle with all modules installed
  import Swiper from '../../node_modules/swiper';

  // import styles bundle
  import 'swiper/css/bundle';

  // init Swiper:
  var swiper = new Swiper(".mySwiper", {
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 3000,
    }
  });