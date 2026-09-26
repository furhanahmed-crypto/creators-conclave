document.addEventListener('DOMContentLoaded', () => {
  if (typeof Swiper === 'undefined') return;

  document.querySelectorAll('[data-speaker-swiper]').forEach((node) => {
    const swiper = new Swiper(node, {
      slidesPerView: 1.12,
      spaceBetween: 12,
      pagination: {
        el: node.querySelector('.swiper-pagination'),
        clickable: true,
      },
    });
    node.swiper = swiper;
  });

  const eventSwiper = document.querySelector('[data-event-swiper]');
  if (eventSwiper) {
    const showcase = eventSwiper.closest('.event-showcase');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    new Swiper(eventSwiper, {
      slidesPerView: 1.12,
      spaceBetween: 16,
      speed: reduceMotion ? 0 : 700,
      grabCursor: true,
      watchOverflow: true,
      navigation: {
        prevEl: showcase ? showcase.querySelector('[data-event-prev]') : null,
        nextEl: showcase ? showcase.querySelector('[data-event-next]') : null,
      },
      breakpoints: {
        720: { slidesPerView: 1.65, spaceBetween: 20 },
        1100: { slidesPerView: 2.35, spaceBetween: 24 },
      },
    });
  }

  const partnerSwiper = document.querySelector('[data-partner-swiper]');
  if (partnerSwiper) {
    new Swiper(partnerSwiper, {
      slidesPerView: 1.4,
      spaceBetween: 12,
      loop: true,
      speed: 5000,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
      breakpoints: {
        700: { slidesPerView: 3.2 },
        1100: { slidesPerView: 4.5 },
      },
    });
  }
});
