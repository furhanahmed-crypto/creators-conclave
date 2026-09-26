document.addEventListener('DOMContentLoaded', () => {
  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
    document.documentElement.classList.remove('js');
    return;
  }

  gsap.registerPlugin(ScrollTrigger);
  gsap.defaults({ ease: 'power3.out', duration: 0.8 });

  const mm = gsap.matchMedia();

  mm.add('(prefers-reduced-motion: reduce)', () => {
    document.documentElement.classList.remove('js');
    gsap.set('[data-reveal], [data-hero]', { clearProps: 'all' });
  });

  mm.add('(prefers-reduced-motion: no-preference)', () => {
    const hero = document.querySelector('[data-animate="hero"]');
    if (hero) {
      const eyebrow = hero.querySelectorAll('[data-hero="eyebrow"]');
      const line = hero.querySelectorAll('[data-hero="line"]');
      const copy = hero.querySelectorAll('[data-hero="copy"]');
      const meta = hero.querySelectorAll('[data-hero="meta"]');
      const actions = hero.querySelectorAll('[data-hero="actions"]');
      const figure = hero.querySelectorAll('[data-hero="figure"]');

      gsap.set([eyebrow, line, copy, meta, actions, figure], { autoAlpha: 0, y: 22 });

      const timeline = gsap.timeline({ defaults: { ease: 'power3.out' } });
      timeline
        .to(eyebrow, { autoAlpha: 1, y: 0, duration: 0.55 })
        .to(line, { autoAlpha: 1, y: 0, duration: 0.8 }, '-=0.28')
        .to(figure, { autoAlpha: 1, y: 0, duration: 0.85 }, '-=0.7')
        .to(copy, { autoAlpha: 1, y: 0, duration: 0.55, stagger: 0.08 }, '-=0.45')
        .to(meta, { autoAlpha: 1, y: 0, duration: 0.5 }, '-=0.3')
        .to(actions, { autoAlpha: 1, y: 0, duration: 0.5, stagger: 0.08 }, '-=0.28');
    }

    const reveals = gsap.utils.toArray('[data-reveal]');
    if (reveals.length) {
      gsap.set(reveals, { autoAlpha: 0, y: 28 });

      ScrollTrigger.batch(reveals, {
        start: 'top 88%',
        once: true,
        interval: 0.12,
        batchMax: 8,
        onEnter: (batch) => {
          gsap.to(batch, {
            autoAlpha: 1,
            y: 0,
            stagger: 0.08,
            duration: 0.75,
            overwrite: 'auto',
            immediateRender: false,
          });
        },
      });
    }

    const refresh = () => ScrollTrigger.refresh();
    window.addEventListener('load', refresh, { once: true });
    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(refresh);
    }

    return () => {
      window.removeEventListener('load', refresh);
    };
  });
});
