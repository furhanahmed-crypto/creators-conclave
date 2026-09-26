<?php
require_once __DIR__ . '/constants/index.php';
require_once __DIR__ . '/constants/gallery.php';

$pageTitle = $homeContent['metaTitle'];
$pageDescription = $homeContent['metaDescription'];
$currentPage = 'home';
$hero = $homeContent['hero'];

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section section--light section--tight">
    <div class="container stat-grid stat-grid--five">
        <?php foreach ($homeContent['numbers'] as $stat): ?>
            <article class="stat-card" data-reveal>
                <p class="stat-card__value"><span data-count="<?= e((string) $stat['value']) ?>" data-suffix="<?= e($stat['suffix']) ?>"><?= e(number_format($stat['value'])) . e($stat['suffix']) ?></span></p>
                <p class="stat-card__label"><?= e($stat['label']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section section--light">
    <div class="container prose-block" data-reveal>
        <p class="eyebrow"><?= e($homeContent['about']['kicker']) ?></p>
        <h2><?= e($homeContent['about']['title']) ?></h2>
        <p><?= e($homeContent['about']['text']) ?></p>
        <a class="button button--gold" href="<?= e(url('about.php')) ?>"><?= e($homeContent['about']['button']) ?></a>
    </div>
</section>

<section class="section section--dark section--tight">
    <div class="container">
        <h2 class="block-title" data-reveal><?= e($homeContent['experiences']['title']) ?></h2>
        <div class="experience-grid">
            <?php foreach ($homeContent['experiences']['items'] as $item): ?>
                <article class="experience-card" data-reveal>
                    <img src="<?= e(asset($item['image'])) ?>" alt="<?= e($item['title']) ?>">
                    <div>
                        <h3><?= e($item['title']) ?></h3>
                        <p><?= e($item['text']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--dark event-showcase">
    <div class="container section-row" data-reveal>
        <div class="section-heading">
            <p class="eyebrow"><?= e($homeContent['showcase']['kicker']) ?></p>
            <h2><?= e($homeContent['showcase']['title']) ?></h2>
            <p class="section-heading__copy"><?= e($homeContent['showcase']['text']) ?></p>
        </div>
        <div class="slider-nav" aria-label="Event slides">
            <button class="slider-nav__btn" type="button" data-event-prev aria-label="Previous events">
                <span aria-hidden="true">←</span>
            </button>
            <button class="slider-nav__btn" type="button" data-event-next aria-label="Next events">
                <span aria-hidden="true">→</span>
            </button>
        </div>
    </div>
    <div class="event-showcase__track">
        <div class="swiper event-swiper" data-event-swiper>
            <div class="swiper-wrapper">
                <?php foreach ($homeContent['showcase']['slides'] as $slide): ?>
                    <article class="swiper-slide event-slide">
                        <div class="event-slide__media">
                            <img src="<?= e(asset($slide['image'])) ?>" alt="<?= e($slide['title']) ?>">
                            <p class="event-slide__meta"><?= e($slide['meta']) ?></p>
                        </div>
                        <div class="event-slide__body">
                            <h3><?= e($slide['title']) ?></h3>
                            <p><?= e($slide['description']) ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="section section--light">
    <div class="container">
        <div class="prose-block" data-reveal>
            <p class="eyebrow"><?= e($homeContent['awards']['kicker']) ?></p>
            <h2><?= e($homeContent['awards']['title']) ?></h2>
            <p><?= e($homeContent['awards']['text']) ?></p>
        </div>
        <div class="category-grid">
            <?php foreach ($homeContent['awards']['cards'] as $card): ?>
                <article class="category-card" data-reveal><h3><?= e($card) ?></h3></article>
            <?php endforeach; ?>
        </div>
        <div class="hero__actions">
            <a class="button button--ghost" href="<?= e(url('awards.php')) ?>">View All Categories</a>
            <a class="button button--gold" href="<?= e(url('nominate.php')) ?>">Nominate Now</a>
        </div>
    </div>
</section>

<section class="section section--dark">
    <div class="container">
        <h2 class="block-title" data-reveal><?= e($homeContent['attend']['title']) ?></h2>
        <div class="ecosystem-grid ecosystem-grid--six">
            <?php foreach ($homeContent['attend']['groups'] as $group): ?>
                <article class="ecosystem-card" data-reveal><h3><?= e($group) ?></h3></article>
            <?php endforeach; ?>
        </div>
        <p class="standout" data-reveal><?= e($homeContent['attend']['line']) ?></p>
    </div>
</section>

<section class="section section--light">
    <div class="container">
        <h2 class="block-title" data-reveal><?= e($homeContent['why']['title']) ?></h2>
        <div class="practice-grid">
            <?php foreach ($homeContent['why']['items'] as $item): ?>
                <article class="practice-card" data-reveal>
                    <h3><?= e($item['title']) ?></h3>
                    <p><?= e($item['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--light moment-gallery">
    <div class="container">
        <div class="section-heading section-heading--wide" data-reveal>
            <p class="eyebrow"><?= e($homeContent['gallery']['kicker']) ?></p>
            <h2><?= e($homeContent['gallery']['title']) ?></h2>
            <p class="section-heading__copy"><?= e($homeContent['gallery']['text']) ?></p>
        </div>
        <div class="filter-bar" data-gallery-filters>
            <?php foreach ($galleryFilters as $filter): ?>
                <button class="filter-chip<?= $filter === 'All' ? ' is-active' : '' ?>" type="button" data-gallery-filter="<?= e($filter) ?>"><?= e($filter) ?></button>
            <?php endforeach; ?>
        </div>
        <div class="gallery-masonry" data-gallery-grid>
            <?php foreach ($galleryItems as $item): ?>
                <?php render('gallery-card', ['item' => $item]); ?>
            <?php endforeach; ?>
        </div>
        <p class="filter-empty" data-gallery-empty hidden>Nothing in this room yet.</p>
    </div>
</section>

<section class="section section--light section--tight">
    <div class="container prose-block" data-reveal>
        <p class="eyebrow"><?= e($homeContent['jury']['title']) ?></p>
        <h2><?= e($homeContent['jury']['heading']) ?></h2>
        <p><?= e($homeContent['jury']['line']) ?></p>
        <a class="text-link" href="<?= e(url('jury.php')) ?>">Jury & Guests</a>
    </div>
</section>

<section class="section section--dark">
    <div class="container split-copy">
        <article data-reveal>
            <p class="eyebrow">Multi-city tour</p>
            <h2><?= e($homeContent['tour']['title']) ?></h2>
            <p><?= e($homeContent['tour']['text']) ?></p>
        </article>
        <article data-reveal>
            <p class="eyebrow">Sponsors & partners</p>
            <h2><?= e($homeContent['sponsors']['title']) ?></h2>
            <p><?= e($homeContent['sponsors']['line']) ?></p>
            <a class="button button--gold" href="<?= e(url('sponsor.php')) ?>"><?= e($homeContent['sponsors']['button']) ?></a>
        </article>
    </div>
</section>

<section class="section section--dark">
    <div class="container">
        <div class="cta-panel" data-reveal>
            <h2><?= e($homeContent['cta']['title']) ?></h2>
            <div class="hero__actions">
                <a class="button button--gold" href="<?= e(url('nominate.php')) ?>">Nominate Now</a>
                <a class="button button--ghost" href="<?= e(url('passes.php')) ?>">Buy Your Pass</a>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
