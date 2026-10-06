document.addEventListener('DOMContentLoaded', () => {
  const showAll = () => {
    document.documentElement.classList.remove('js');
    document.querySelectorAll('[data-reveal], [data-hero]').forEach((el) => {
      el.style.visibility = 'visible';
      el.style.opacity = '1';
      el.style.transform = '';
      el.style.filter = '';
    });
  };

  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
    showAll();
    return;
  }

  gsap.registerPlugin(ScrollTrigger);
  gsap.defaults({ ease: 'sine.inOut', duration: 1.05 });

  const mm = gsap.matchMedia();

  mm.add('(prefers-reduced-motion: reduce)', () => {
    showAll();
    gsap.set('[data-reveal], [data-hero]', { clearProps: 'all' });
  });

  mm.add('(prefers-reduced-motion: no-preference)', () => {
    try {
      const hero = document.querySelector('[data-animate="hero"]');
      if (hero) {
        const pick = (name) => gsap.utils.toArray(hero.querySelectorAll(`[data-hero="${name}"]`));
        const eyebrow = pick('eyebrow');
        const line = pick('line');
        const copy = pick('copy');
        const actions = pick('actions');
        const figure = pick('figure');
        const bar = pick('bar');
        const parts = [...eyebrow, ...line, ...copy, ...actions, ...figure, ...bar];

        if (parts.length) {
          gsap.set(parts, { autoAlpha: 0, y: 36 });

          const timeline = gsap.timeline({
            defaults: { ease: 'sine.out', duration: 1.1 },
          });

          if (figure.length) timeline.to(figure, { autoAlpha: 1, y: 0, duration: 1.35 }, 0);
          if (eyebrow.length) timeline.to(eyebrow, { autoAlpha: 1, y: 0, duration: 0.9 }, 0.15);
          if (line.length) timeline.to(line, { autoAlpha: 1, y: 0, duration: 1.2 }, 0.28);
          if (copy.length) timeline.to(copy, { autoAlpha: 1, y: 0, duration: 0.95 }, 0.45);
          if (actions.length) timeline.to(actions, { autoAlpha: 1, y: 0, duration: 0.9 }, 0.58);
          if (bar.length) timeline.to(bar, { autoAlpha: 1, y: 0, duration: 1 }, 0.7);
        }

        const heroBg = hero.querySelector('.fx-hero__bg');
        if (heroBg) {
          gsap.fromTo(
            heroBg,
            { scale: 1.06 },
            { scale: 1, duration: 2.4, ease: 'sine.out' }
          );
        }
      }

      const reveals = gsap.utils.toArray('[data-reveal]');
      if (reveals.length) {
        gsap.set(reveals, { autoAlpha: 0, y: 48 });

        reveals.forEach((el, index) => {
          ScrollTrigger.create({
            trigger: el,
            start: 'top 92%',
            once: true,
            onEnter: () => {
              gsap.to(el, {
                autoAlpha: 1,
                y: 0,
                duration: 1.2,
                ease: 'sine.out',
                delay: (index % 4) * 0.07,
                overwrite: 'auto',
              });
            },
          });
        });

        const revealInView = () => {
          ScrollTrigger.refresh();
          reveals.forEach((el) => {
            const rect = el.getBoundingClientRect();
            const inView = rect.top < window.innerHeight * 0.96 && rect.bottom > 40;
            const hidden = Number(getComputedStyle(el).opacity) < 0.05;
            if (inView && hidden) {
              gsap.to(el, {
                autoAlpha: 1,
                y: 0,
                duration: 1.1,
                ease: 'sine.out',
                overwrite: 'auto',
              });
            }
          });
        };

        requestAnimationFrame(revealInView);
        window.setTimeout(revealInView, 120);
      }

      gsap.utils.toArray('.fx-orbit').forEach((node) => {
        gsap.to(node, {
          rotation: 360,
          duration: 22,
          ease: 'none',
          repeat: -1,
          transformOrigin: '50% 50%',
        });
        const labels = node.querySelectorAll('span');
        if (labels.length) {
          gsap.to(labels, {
            rotation: -360,
            duration: 22,
            ease: 'none',
            repeat: -1,
          });
        }
      });

      const marquee = document.querySelector('.fx-marquee__track');
      if (marquee) {
        marquee.style.animation = 'none';
        gsap.to(marquee, {
          xPercent: -50,
          duration: 32,
          ease: 'none',
          repeat: -1,
        });
      }

      gsap.utils.toArray('.fx-float-card').forEach((card, i) => {
        gsap.to(card, {
          y: i % 2 === 0 ? -14 : -10,
          duration: 3.4 + i * 0.35,
          ease: 'sine.inOut',
          yoyo: true,
          repeat: -1,
        });
      });

      gsap.utils.toArray('[data-float-partner]').forEach((card, i) => {
        gsap.to(card, {
          y: i % 2 === 0 ? -12 : 10,
          duration: 3.8 + (i % 3) * 0.45,
          ease: 'sine.inOut',
          yoyo: true,
          repeat: -1,
          delay: i * 0.12,
        });
      });

      gsap.utils.toArray('.fx-flare').forEach((flare) => {
        gsap.fromTo(
          flare,
          { scaleX: 0.35, opacity: 0.35 },
          {
            scaleX: 1,
            opacity: 1,
            duration: 1.4,
            ease: 'sine.out',
            scrollTrigger: {
              trigger: flare,
              start: 'top 90%',
              once: true,
            },
          }
        );
      });

      const refresh = () => ScrollTrigger.refresh();
      window.addEventListener('load', refresh, { once: true });
      if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(refresh).catch(() => {});
      }

      window.setTimeout(() => {
        document.querySelectorAll('[data-reveal], [data-hero]').forEach((el) => {
          if (Number(getComputedStyle(el).opacity) < 0.05) {
            gsap.set(el, { autoAlpha: 1, y: 0, clearProps: 'filter' });
          }
        });
      }, 2000);

      return () => {
        window.removeEventListener('load', refresh);
      };
    } catch (error) {
      console.error('GSAP animation error:', error);
      showAll();
    }
  });
});
