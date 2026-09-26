<?php
$variant = $hero['variant'] ?? 'page';
?>
<?php if ($variant === 'home'): ?>
<section class="hero" data-animate="hero">
    <div class="hero__media">
        <img src="<?= e(asset($hero['image'])) ?>" alt="">
    </div>
    <div class="hero__shade"></div>
    <div class="container hero__content">
        <p class="eyebrow" data-hero="eyebrow"><?= e($hero['eyebrow']) ?></p>
        <h1 class="hero__title hero__title--event" data-hero="line"><?= e($hero['title']) ?></h1>
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
</section>
<?php else: ?>
<section class="page-hero">
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
