import Swiper from "swiper/bundle";

import 'swiper/css/bundle';

new Swiper(".swiper", {
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