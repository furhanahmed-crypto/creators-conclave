<?php
$variant = $hero['variant'] ?? 'page';
?>
<?php if ($variant === 'home'): ?>
<section class="fx-hero" data-animate="hero">
    <div class="fx-hero__media" aria-hidden="true">
        <img class="fx-hero__bg" src="<?= e(asset($hero['background'] ?? $hero['image'])) ?>" alt="">
        <span class="fx-hero__shade"></span>
    </div>

    <div class="container fx-hero__layout">
        <aside class="fx-hero__visual" data-hero="figure">
            <figure class="fx-hero__figure">
                <img src="<?= e(asset($hero['figure'] ?? $hero['image'])) ?>" alt="CreatorX Awards trophy">
                <span class="fx-hero__figure-glow" aria-hidden="true"></span>
            </figure>
        </aside>

        <div class="fx-hero__content">
            <p class="fx-hero__eyebrow" data-hero="eyebrow"><?= e($hero['eyebrow']) ?></p>
            <h1 class="fx-hero__title" data-hero="line"><?= e($hero['title']) ?></h1>
            <?php if (!empty($hero['subtitle'])): ?>
                <p class="fx-hero__subtitle" data-hero="copy"><?= e($hero['subtitle']) ?></p>
            <?php endif; ?>
            <div class="fx-hero__actions" data-hero="actions">
                <a class="button button--gold" href="<?= e(url($hero['primary']['href'])) ?>"><?= e($hero['primary']['label']) ?></a>
                <a class="button button--ghost" href="<?= e(url($hero['secondary']['href'])) ?>"><?= e($hero['secondary']['label']) ?></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="fx-hero__bar" data-hero="bar">
            <a class="fx-hero__urgency" href="<?= e(url($hero['primary']['href'])) ?>">
                <span class="fx-hero__urgency-dot" aria-hidden="true"></span>
                <?= e($hero['urgency'] ?? 'Hurry Up! Register Now') ?>
            </a>

            <div class="fx-hero__countdown" data-countdown="<?= e($site['countdownTo']) ?>">
                <span><strong data-days>00</strong><small>Days</small></span>
                <span><strong data-hours>00</strong><small>Hours</small></span>
                <span><strong data-mins>00</strong><small>Mins</small></span>
                <span><strong data-secs>00</strong><small>Secs</small></span>
            </div>

            <div class="fx-hero__venue">
                <span class="fx-hero__pin" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 21s7-5.4 7-11a7 7 0 1 0-14 0c0 5.6 7 11 7 11Z"/>
                        <circle cx="12" cy="10" r="2.5"/>
                    </svg>
                </span>
                <div>
                    <strong><?= e($hero['venueStrong']) ?></strong>
                    <span><?= e($hero['venueLight']) ?></span>
                </div>
            </div>
        </div>
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
