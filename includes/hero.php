<?php
$variant = $hero['variant'] ?? 'page';
?>
<?php if ($variant === 'home'): ?>
<section class="hero" data-animate="hero">
    <div class="hero__geometry" aria-hidden="true">
        <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1180 -40 L1520 80 L1400 980" stroke="url(#hero-gold)" stroke-width="1.6"/>
            <path d="M1248 -40 L1590 90 L1470 980" stroke="url(#hero-gold)" stroke-width="1.1" opacity="0.75"/>
            <path d="M1310 -40 L1655 100 L1535 980" stroke="url(#hero-gold)" stroke-width="0.8" opacity="0.5"/>
            <path d="M980 0 L1440 220 L1440 0 Z" fill="url(#hero-facet)" opacity="0.55"/>
            <path d="M1040 0 L1440 190" stroke="#dfb85e" stroke-width="1.4"/>
            <path d="M860 820 L1440 520 L1440 900 L860 900 Z" fill="url(#hero-facet-low)" opacity="0.4"/>
            <path d="M720 900 L1440 560" stroke="#c9a44a" stroke-width="1.15"/>
            <path d="M780 900 L1440 610" stroke="#dfb85e" stroke-width="0.8" opacity="0.7"/>
            <path d="M-20 40 L380 40 L330 150" stroke="url(#hero-gold)" stroke-width="1.2"/>
            <path d="M-20 62 L360 62 L318 158" stroke="#dfb85e" stroke-width="0.7" opacity="0.55"/>
            <defs>
                <linearGradient id="hero-gold" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#fff6d4"/>
                    <stop offset="40%" stop-color="#dfb85e"/>
                    <stop offset="100%" stop-color="#8c6418"/>
                </linearGradient>
                <linearGradient id="hero-facet" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#16140f"/>
                    <stop offset="100%" stop-color="#050507" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="hero-facet-low" x1="0%" y1="0%" x2="80%" y2="100%">
                    <stop offset="0%" stop-color="#1a1710" stop-opacity="0.9"/>
                    <stop offset="100%" stop-color="#050507" stop-opacity="0"/>
                </linearGradient>
            </defs>
        </svg>
    </div>
    <div class="container hero__layout">
        <div class="hero__content">
            <p class="eyebrow" data-hero="eyebrow"><?= e($hero['eyebrow']) ?></p>
            <h1 class="hero__title hero__title--event" data-hero="line">
                <span>Creators</span>
                <span>Conclave</span>
                <span>Summit 2026</span>
            </h1>
            <p class="hero__sub" data-hero="copy"><?= e($hero['subheading']) ?></p>
            <p class="hero__tag" data-hero="copy"><?= e($hero['tagline']) ?></p>
            <ul class="hero__chips" data-hero="actions">
                <?php foreach ($hero['chips'] as $chip): ?>
                    <li><?= e($chip) ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="countdown" data-countdown="<?= e($site['countdownTo']) ?>" data-hero="meta">
                <p><?= e($hero['countdownLabel']) ?></p>
                <div class="countdown__grid">
                    <span><strong data-days>00</strong> Days</span>
                    <span><strong data-hours>00</strong> Hours</span>
                    <span><strong data-mins>00</strong> Mins</span>
                    <span><strong data-secs>00</strong> Secs</span>
                </div>
            </div>
            <div class="hero__actions" data-hero="actions">
                <a class="button button--gold" href="<?= e(url($hero['primary']['href'])) ?>"><?= e($hero['primary']['label']) ?></a>
                <a class="button button--ghost" href="<?= e(url($hero['secondary']['href'])) ?>"><?= e($hero['secondary']['label']) ?></a>
            </div>
        </div>
        <aside class="hero__figure" data-hero="figure">
            <div class="hero__figure-shape">
                <span class="hero__figure-outline" aria-hidden="true"></span>
                <img src="<?= e(asset($hero['image'])) ?>" alt="">
            </div>
        </aside>
    </div>
</section>
<?php else: ?>
<section class="page-hero">
    <div class="page-hero__geometry" aria-hidden="true">
        <svg viewBox="0 0 1440 320" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1080 0 L1440 90 L1440 0 Z" fill="#14110c"/>
            <path d="M1120 0 L1440 70" stroke="#dfb85e" stroke-width="1.2"/>
            <path d="M1180 0 L1440 110" stroke="#c9a44a" stroke-width="0.8" opacity="0.7"/>
            <path d="M0 40 L280 40 L250 110" stroke="#dfb85e" stroke-width="1"/>
        </svg>
    </div>
    <div class="container page-hero__inner">
        <?php if (!empty($hero['eyebrow'])): ?>
            <p class="eyebrow"><?= e($hero['eyebrow']) ?></p>
        <?php endif; ?>
        <h1><?= e($hero['title']) ?></h1>
        <?php if (!empty($hero['description'])): ?>
            <p class="page-hero__copy"><?= e($hero['description']) ?></p>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
