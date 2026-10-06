document.addEventListener('DOMContentLoaded', () => {
  const header = document.querySelector('[data-header]');
  const toggle = document.querySelector('[data-nav-toggle]');
  const nav = document.querySelector('[data-nav]');

  const onScroll = () => {
    if (!header) return;
    header.classList.toggle('is-scrolled', window.scrollY > 8);
  };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    nav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  const bindFilter = (bar, itemSelector, emptySelector, attribute) => {
    if (!bar) return;
    const chips = [...bar.querySelectorAll('[data-filter], [data-speaker-filter], [data-gallery-filter]')];
    const items = [...document.querySelectorAll(itemSelector)];
    const empty = document.querySelector(emptySelector);

    chips.forEach((chip) => {
      chip.addEventListener('click', () => {
        const value = chip.getAttribute(attribute);
        chips.forEach((item) => item.classList.toggle('is-active', item === chip));
        let visible = 0;
        items.forEach((item) => {
          const match = value === 'All' || item.getAttribute('data-type') === value || item.getAttribute('data-category') === value || item.getAttribute('data-event') === value;
          item.classList.toggle('is-hidden', !match);
          if (match) visible += 1;
        });
        if (empty) empty.hidden = visible !== 0;
        document.querySelectorAll('[data-speaker-swiper]').forEach((node) => {
          if (node.swiper) node.swiper.update();
        });
      });
    });
  };

  bindFilter(document.querySelector('[data-filter-bar]'), '[data-filter-grid] .event-card', '[data-filter-empty]', 'data-filter');
  bindFilter(document.querySelector('[data-speaker-filters]'), '[data-speaker-grid] .speaker-card, [data-speaker-swiper] .swiper-slide', '[data-speaker-empty]', 'data-speaker-filter');
  bindFilter(document.querySelector('[data-gallery-filters]'), '[data-gallery-grid] .gallery-card', '[data-gallery-empty]', 'data-gallery-filter');

  const lightbox = document.querySelector('[data-lightbox]');
  const lightboxImage = document.querySelector('[data-lightbox-image]');
  const lightboxCaption = document.querySelector('[data-lightbox-caption]');
  const closeButtons = document.querySelectorAll('[data-lightbox-close]');

  const closeLightbox = () => {
    if (!lightbox) return;
    lightbox.hidden = true;
    document.body.style.overflow = '';
  };

  document.querySelectorAll('[data-gallery-item]').forEach((item) => {
    item.addEventListener('click', () => {
      if (!lightbox || !lightboxImage) return;
      lightboxImage.src = item.getAttribute('data-src');
      lightboxImage.alt = item.getAttribute('data-caption') || '';
      if (lightboxCaption) lightboxCaption.textContent = item.getAttribute('data-caption') || '';
      lightbox.hidden = false;
      document.body.style.overflow = 'hidden';
    });
  });

  closeButtons.forEach((button) => button.addEventListener('click', closeLightbox));
  if (lightbox) {
    lightbox.addEventListener('click', (event) => {
      if (event.target === lightbox) closeLightbox();
    });
  }
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      closeLightbox();
      closeNewsletter();
    }
  });

  const countdowns = [...document.querySelectorAll('[data-countdown]')];
  countdowns.forEach((countdown) => {
    const target = new Date(countdown.getAttribute('data-countdown')).getTime();
    if (Number.isNaN(target)) return;
    const units = {
      days: countdown.querySelector('[data-days]'),
      hours: countdown.querySelector('[data-hours]'),
      mins: countdown.querySelector('[data-mins]'),
      secs: countdown.querySelector('[data-secs]'),
    };
    const tick = () => {
      const remaining = Math.max(0, target - Date.now());
      const totalSeconds = Math.floor(remaining / 1000);
      if (units.days) units.days.textContent = String(Math.floor(totalSeconds / 86400)).padStart(2, '0');
      if (units.hours) units.hours.textContent = String(Math.floor((totalSeconds % 86400) / 3600)).padStart(2, '0');
      if (units.mins) units.mins.textContent = String(Math.floor((totalSeconds % 3600) / 60)).padStart(2, '0');
      if (units.secs) units.secs.textContent = String(totalSeconds % 60).padStart(2, '0');
    };
    tick();
    window.setInterval(tick, 1000);
  });

  const newsletter = document.querySelector('[data-newsletter]');
  const closeNewsletter = () => {
    if (!newsletter) return;
    newsletter.hidden = true;
    sessionStorage.setItem('cc-newsletter', '1');
  };
  document.querySelector('[data-newsletter-close]')?.addEventListener('click', closeNewsletter);
  document.querySelector('[data-newsletter-form]')?.addEventListener('submit', (event) => {
    event.preventDefault();
    closeNewsletter();
  });
  document.querySelector('[data-home-newsletter]')?.addEventListener('submit', (event) => {
    event.preventDefault();
    const form = event.currentTarget;
    const button = form.querySelector('button[type="submit"]');
    if (button) {
      const original = button.textContent;
      button.textContent = 'Subscribed';
      button.disabled = true;
      window.setTimeout(() => {
        button.textContent = original;
        button.disabled = false;
        form.reset();
      }, 2200);
    }
  });
  if (newsletter && !sessionStorage.getItem('cc-newsletter')) {
    window.setTimeout(() => {
      if (!sessionStorage.getItem('cc-newsletter')) newsletter.hidden = false;
    }, 20000);
    document.addEventListener('mouseout', (event) => {
      if (event.clientY <= 0 && !sessionStorage.getItem('cc-newsletter')) newsletter.hidden = false;
    });
  }

  const scheduleRoot = document.querySelector('.fx-schedule');
  if (scheduleRoot) {
    const tabs = [...scheduleRoot.querySelectorAll('[data-schedule-tab]')];
    const panels = [...scheduleRoot.querySelectorAll('[data-schedule-panel]')];
    tabs.forEach((tab) => {
      tab.addEventListener('click', () => {
        const id = tab.getAttribute('data-schedule-tab');
        tabs.forEach((item) => {
          const active = item === tab;
          item.classList.toggle('is-active', active);
          item.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        panels.forEach((panel) => {
          const active = panel.getAttribute('data-schedule-panel') === id;
          panel.classList.toggle('is-active', active);
          panel.hidden = !active;
        });
      });
    });
  }

  const counters = [...document.querySelectorAll('[data-count]')];
  if (counters.length && 'IntersectionObserver' in window) {
    const animateCount = (node) => {
      const target = Number(node.getAttribute('data-count') || 0);
      const suffix = node.getAttribute('data-suffix') || '';
      const duration = 1400;
      const start = performance.now();
      const step = (now) => {
        const progress = Math.min(1, (now - start) / duration);
        const eased = 1 - Math.pow(1 - progress, 3);
        node.textContent = `${Math.round(target * eased).toLocaleString()}${suffix}`;
        if (progress < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    };
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        animateCount(entry.target);
        observer.unobserve(entry.target);
      });
    }, { threshold: 0.45 });
    counters.forEach((node) => observer.observe(node));
  }

  const slider = document.querySelector('[data-testimonial-slider]');
  if (slider) {
    const slides = [...slider.querySelectorAll('[data-testimonial-slide]')];
    const figures = [...document.querySelectorAll('[data-testimonial-figure]')];
    let index = Math.max(0, slides.findIndex((slide) => slide.classList.contains('is-active')));

    const show = (next) => {
      if (!slides.length) return;
      index = (next + slides.length) % slides.length;
      slides.forEach((slide, i) => slide.classList.toggle('is-active', i === index));
      figures.forEach((figure, i) => figure.classList.toggle('is-active', i === index));
    };

    document.querySelector('[data-testimonial-prev]')?.addEventListener('click', () => show(index - 1));
    document.querySelector('[data-testimonial-next]')?.addEventListener('click', () => show(index + 1));
  }

  const scrollTop = document.querySelector('[data-scroll-top]');
  if (scrollTop) {
    const onScrollTop = () => {
      scrollTop.classList.toggle('is-visible', window.scrollY > 480);
    };
    onScrollTop();
    window.addEventListener('scroll', onScrollTop, { passive: true });
  }
});
