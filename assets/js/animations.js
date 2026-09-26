document.addEventListener('DOMContentLoaded', () => {
  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

  gsap.registerPlugin(ScrollTrigger);
  gsap.defaults({ ease: 'power3.out', duration: 0.8 });

  const mm = gsap.matchMedia();

  mm.add(
    {
      reduceMotion: '(prefers-reduced-motion: reduce)',
      motion: '(prefers-reduced-motion: no-preference)',
    },
    (context) => {
      if (context.conditions.reduceMotion) return;

      const heroItems = document.querySelector('[data-animate="hero"]');
      if (heroItems) {
        const timeline = gsap.timeline();
        timeline
          .from('[data-hero="eyebrow"]', { y: 18, autoAlpha: 0, duration: 0.55 })
          .from('[data-hero="line"]', { y: 36, autoAlpha: 0, stagger: 0.08, duration: 0.85 }, '-=0.25')
          .from('[data-hero="copy"]', { y: 18, autoAlpha: 0, duration: 0.6 }, '-=0.4')
          .from('[data-hero="actions"]', { y: 14, autoAlpha: 0, duration: 0.5 }, '-=0.35')
          .from('[data-hero="meta"] > div', { y: 12, autoAlpha: 0, stagger: 0.06, duration: 0.45 }, '-=0.3');
      }

      ScrollTrigger.batch('[data-reveal]', {
        start: 'top 90%',
        once: true,
        onEnter: (batch) => {
          gsap.from(batch, {
            y: 24,
            autoAlpha: 0,
            stagger: 0.08,
            duration: 0.7,
            overwrite: true,
          });
        },
      });
    }
  );
});
