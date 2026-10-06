<?php
$variant = $hero['variant'] ?? 'page';
?>
<?php if ($variant === 'home'): ?>
<section class="fx-hero" data-animate="hero">
    <div class="fx-hero__media" aria-hidden="true">
        <img src="<?= e(asset($hero['image'])) ?>" alt="">
        <span class="fx-hero__shade"></span>
        <span class="fx-hero__glow"></span>
        <span class="fx-hero__panel"></span>
    </div>
    <div class="container fx-hero__layout">
        <div class="fx-hero__content">
            <p class="fx-hero__eyebrow" data-hero="eyebrow"><?= e($hero['eyebrow']) ?></p>
            <h1 class="fx-hero__title" data-hero="line"><?= e($hero['title']) ?></h1>
            <ul class="fx-hero__meta" data-hero="meta">
                <li>
                    <strong><?= e($hero['dateStrong']) ?></strong>
                    <span><?= e($hero['dateLight']) ?></span>
                </li>
                <li>
                    <strong><?= e($hero['venueStrong']) ?></strong>
                    <span><?= e($hero['venueLight']) ?></span>
                </li>
            </ul>
            <div class="fx-hero__actions" data-hero="actions">
                <a class="button button--gold" href="<?= e(url($hero['primary']['href'])) ?>"><?= e($hero['primary']['label']) ?></a>
                <a class="button button--ghost" href="<?= e(url($hero['secondary']['href'])) ?>"><?= e($hero['secondary']['label']) ?></a>
            </div>
        </div>
        <aside class="fx-hero__aside" data-hero="figure">
            <figure class="fx-hero__figure">
                <img src="<?= e(asset($hero['figure'] ?? $hero['image'])) ?>" alt="">
            </figure>
            <?php foreach ($hero['floatCards'] as $card): ?>
                <article class="fx-float-card">
                    <p class="fx-float-card__label"><?= e($card['label']) ?></p>
                    <h3><?= e($card['title']) ?></h3>
                    <p><?= e($card['meta']) ?></p>
                </article>
            <?php endforeach; ?>
            <a class="fx-orbit" href="<?= e(url('about.php')) ?>">
                <span>Explore Us</span>
                <span aria-hidden="true">↗</span>
            </a>
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
