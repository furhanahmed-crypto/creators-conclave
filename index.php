<?php
require_once __DIR__ . '/constants/index.php';
require_once __DIR__ . '/constants/gallery.php';
require_once __DIR__ . '/constants/speakers.php';
require_once __DIR__ . '/constants/partners.php';

$pageTitle = $homeContent['metaTitle'];
$pageDescription = $homeContent['metaDescription'];
$currentPage = 'home';
$hero = $homeContent['hero'];
$homeSpeakers = array_slice($speakers, 0, 6);
$homePartners = [];
foreach ($partnerGroups as $group) {
    $category = match ($group['id']) {
        'brands' => 'Brand',
        'sponsors' => 'Event',
        'media' => 'Media',
        'community' => 'Community',
        default => 'Partner',
    };
    foreach ($group['partners'] as $partner) {
        $homePartners[] = $partner + ['category' => $category];
    }
}
$homePartners = array_slice($homePartners, 0, 6);
$homeMoments = array_slice($galleryItems, 0, 4);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="fx-banner section section--dark" data-reveal>
    <div class="container">
        <figure class="fx-banner__frame">
            <img src="<?= e(asset($homeContent['banner']['image'])) ?>" alt="">
            <figcaption class="fx-banner__label">
                <span><?= e($homeContent['banner']['kicker']) ?></span>
                <strong><?= e($homeContent['banner']['label']) ?></strong>
            </figcaption>
        </figure>
    </div>
</section>

<section class="fx-about section section--dark">
    <div class="container fx-about__grid">
        <div class="fx-about__copy" data-reveal>
            <p class="eyebrow"><?= e($homeContent['about']['kicker']) ?></p>
            <h2><?= e($homeContent['about']['title']) ?></h2>
            <p><?= e($homeContent['about']['text']) ?></p>
            <a class="button button--gold" href="<?= e(url($homeContent['about']['buttonHref'])) ?>"><?= e($homeContent['about']['button']) ?></a>
        </div>
        <div class="fx-about__visual" data-reveal>
            <div class="fx-about__media">
                <img src="<?= e(asset($homeContent['about']['image'])) ?>" alt="">
                <a class="fx-orbit fx-orbit--lg" href="<?= e(url('about.php')) ?>">
                    <span>Explore Us</span>
                    <span aria-hidden="true">↗</span>
                </a>
            </div>
            <div class="fx-about__stats">
                <?php foreach ($homeContent['numbers'] as $stat): ?>
                    <article>
                        <strong><span data-count="<?= e((string) $stat['value']) ?>" data-suffix="<?= e($stat['suffix']) ?>"><?= e(number_format($stat['value'])) . e($stat['suffix']) ?></span></strong>
                        <span><?= e($stat['label']) ?></span>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="fx-why section section--dark">
    <div class="container">
        <div class="section-heading section-heading--wide" data-reveal>
            <p class="eyebrow">Why join</p>
            <h2><?= e($homeContent['why']['title']) ?></h2>
        </div>
        <div class="fx-why__grid">
            <?php foreach ($homeContent['why']['items'] as $index => $item): ?>
                <article class="fx-why-card" data-reveal>
                    <span class="fx-why-card__index"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <h3><?= e($item['title']) ?></h3>
                    <p><?= e($item['text']) ?></p>
                    <a class="text-link" href="<?= e(url($item['link']['href'])) ?>"><?= e($item['link']['label']) ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="fx-venue section section--dark">
    <div class="container fx-venue__grid">
        <div class="fx-venue__copy" data-reveal>
            <p class="eyebrow"><?= e($homeContent['venue']['kicker']) ?></p>
            <h2><?= e($homeContent['venue']['title']) ?></h2>
            <p><?= e($homeContent['venue']['text']) ?></p>
            <ul class="fx-venue__facts">
                <li>
                    <strong><?= e($homeContent['venue']['date']) ?></strong>
                    <span><?= e($homeContent['venue']['time']) ?></span>
                </li>
                <li>
                    <strong><?= e($homeContent['venue']['place']) ?></strong>
                    <span><?= e($homeContent['venue']['address']) ?></span>
                </li>
            </ul>
        </div>
        <div class="fx-schedule" data-reveal>
            <div class="fx-schedule__tabs" role="tablist" aria-label="Programme">
                <?php foreach ($homeContent['schedule']['tabs'] as $index => $tab): ?>
                    <button
                        class="fx-schedule__tab<?= $index === 0 ? ' is-active' : '' ?>"
                        type="button"
                        role="tab"
                        aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"
                        data-schedule-tab="<?= e($tab['id']) ?>"
                    >
                        <span><?= e($tab['label']) ?></span>
                        <small><?= e($tab['date']) ?></small>
                    </button>
                <?php endforeach; ?>
            </div>
            <?php foreach ($homeContent['schedule']['tabs'] as $index => $tab): ?>
                <div
                    class="fx-schedule__panel<?= $index === 0 ? ' is-active' : '' ?>"
                    data-schedule-panel="<?= e($tab['id']) ?>"
                    role="tabpanel"
                    <?= $index === 0 ? '' : 'hidden' ?>
                >
                    <div class="fx-schedule__cards">
                        <?php foreach ($tab['items'] as $item): ?>
                            <article class="fx-event-card">
                                <div class="fx-event-card__media">
                                    <img src="<?= e(asset($item['image'])) ?>" alt="">
                                    <span><?= e($item['type']) ?></span>
                                </div>
                                <div class="fx-event-card__body">
                                    <p class="fx-event-card__time"><?= e($item['time']) ?> · <?= e($item['date']) ?></p>
                                    <h3><?= e($item['title']) ?></h3>
                                    <div class="fx-event-card__speaker">
                                        <strong><?= e($item['speaker']) ?></strong>
                                        <span><?= e($item['role']) ?></span>
                                    </div>
                                    <p><?= e($item['text']) ?></p>
                                    <a class="text-link" href="<?= e(url($item['href'])) ?>">Learn More</a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="fx-countdown section section--dark" data-reveal>
    <div class="container fx-countdown__inner">
        <p class="eyebrow"><?= e($homeContent['countdown']['kicker']) ?></p>
        <h2><?= e($homeContent['countdown']['title']) ?></h2>
        <div class="fx-countdown__grid" data-countdown="<?= e($site['countdownTo']) ?>">
            <span><strong data-days>00</strong>Days</span>
            <span><strong data-hours>00</strong>Hours</span>
            <span><strong data-mins>00</strong>Mins</span>
            <span><strong data-secs>00</strong>Secs</span>
        </div>
        <a class="button button--gold" href="<?= e(url('passes.php')) ?>">Register Now</a>
    </div>
</section>

<section class="fx-speakers section section--dark">
    <div class="container">
        <div class="section-heading section-heading--wide" data-reveal>
            <p class="eyebrow"><?= e($homeContent['speakers']['kicker']) ?></p>
            <h2><?= e($homeContent['speakers']['title']) ?></h2>
        </div>
        <div class="fx-speakers__grid">
            <?php foreach ($homeSpeakers as $speaker): ?>
                <article class="fx-speaker-card" data-reveal>
                    <div class="fx-speaker-card__media">
                        <img src="<?= e(asset($speaker['image'])) ?>" alt="<?= e($speaker['name']) ?>">
                    </div>
                    <h3><?= e($speaker['name']) ?></h3>
                    <p><?= e($speaker['role']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="fx-marquee section section--dark" aria-hidden="true">
    <div class="fx-marquee__track">
        <?php for ($copy = 0; $copy < 2; $copy++): ?>
            <div class="fx-marquee__group">
                <?php foreach ($homeContent['marquee'] as $word): ?>
                    <span><?= e($word) ?></span>
                <?php endforeach; ?>
            </div>
        <?php endfor; ?>
    </div>
</section>

<section class="fx-pricing section section--dark">
    <div class="container">
        <div class="section-heading section-heading--center" data-reveal>
            <p class="eyebrow"><?= e($homeContent['pricing']['kicker']) ?></p>
            <h2><?= e($homeContent['pricing']['title']) ?></h2>
            <p class="section-heading__copy"><?= e($homeContent['pricing']['text']) ?></p>
        </div>
        <div class="fx-pricing__grid">
            <?php foreach ($homeContent['pricing']['passes'] as $pass): ?>
                <article class="fx-price-card<?= !empty($pass['featured']) ? ' is-featured' : '' ?>" data-reveal>
                    <p class="fx-price-card__name"><?= e($pass['name']) ?></p>
                    <p class="fx-price-card__price">
                        <strong><?= e($pass['price']) ?></strong>
                        <span><?= e($pass['unit']) ?></span>
                    </p>
                    <p class="fx-price-card__note"><?= e($pass['note']) ?></p>
                    <ul>
                        <?php foreach ($pass['features'] as $feature): ?>
                            <li><?= e($feature) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="button <?= !empty($pass['featured']) ? 'button--gold' : 'button--ghost' ?>" href="<?= e(url('passes.php')) ?>">Buy a Ticket</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="fx-partners section section--dark">
    <div class="container">
        <div class="section-heading section-heading--center" data-reveal>
            <span class="fx-flare" aria-hidden="true"></span>
            <p class="eyebrow"><?= e($homeContent['partners']['kicker']) ?></p>
            <h2><?= e($homeContent['partners']['title']) ?></h2>
        </div>
        <div class="fx-partners__stage">
            <?php foreach ($homePartners as $index => $partner): ?>
                <article class="fx-partner fx-partner--<?= (int) (($index % 3) + 1) ?>" data-reveal data-float-partner>
                    <div class="fx-partner__tile">
                        <span class="fx-partner__mark"><?= e($partner['mark']) ?></span>
                    </div>
                    <strong><?= e($partner['category']) ?></strong>
                    <span>Partner</span>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="fx-testimonials section section--dark" data-reveal>
    <div class="fx-testimonials__bg" aria-hidden="true">
        <img src="<?= e(asset('images/events/awards.jpg')) ?>" alt="">
        <span class="fx-testimonials__shade"></span>
    </div>
    <div class="container fx-testimonials__layout">
        <div class="fx-testimonials__copy" data-testimonial-slider>
            <?php foreach ($homeContent['testimonials'] as $index => $item): ?>
                <article class="fx-testimonial<?= $index === 0 ? ' is-active' : '' ?>" data-testimonial-slide>
                    <div class="fx-testimonial__stars" aria-label="<?= (int) $item['rating'] ?> star rating">
                        <?php for ($star = 0; $star < (int) $item['rating']; $star++): ?>
                            <span aria-hidden="true">★</span>
                        <?php endfor; ?>
                    </div>
                    <blockquote>
                        <p>“<?= e($item['quote']) ?>”</p>
                    </blockquote>
                    <div class="fx-testimonial__author">
                        <img src="<?= e(asset($item['avatar'])) ?>" alt="">
                        <div>
                            <strong><?= e($item['name']) ?></strong>
                            <span><?= e($item['place']) ?></span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
            <div class="fx-testimonial__nav">
                <button type="button" class="fx-testimonial__btn" data-testimonial-prev aria-label="Previous testimonial">‹</button>
                <button type="button" class="fx-testimonial__btn" data-testimonial-next aria-label="Next testimonial">›</button>
            </div>
        </div>
        <div class="fx-testimonials__figure">
            <span class="fx-testimonials__quote" aria-hidden="true">“</span>
            <?php foreach ($homeContent['testimonials'] as $index => $item): ?>
                <img
                    class="fx-testimonials__person<?= $index === 0 ? ' is-active' : '' ?>"
                    src="<?= e(asset($item['figure'])) ?>"
                    alt="<?= e($item['name']) ?>"
                    data-testimonial-figure
                >
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="fx-faq section section--dark">
    <div class="container fx-faq__grid">
        <div class="fx-faq__intro" data-reveal>
            <h2><?= e($homeContent['faq']['title']) ?></h2>
            <p><?= e($homeContent['faq']['text']) ?></p>
            <a class="button button--gold" href="<?= e(url($homeContent['faq']['buttonHref'])) ?>"><?= e($homeContent['faq']['button']) ?></a>
        </div>
        <div class="fx-faq__list" data-reveal>
            <?php foreach ($homeContent['faq']['items'] as $index => $item): ?>
                <details class="fx-faq__item" <?= $index === 0 ? 'open' : '' ?>>
                    <summary><?= e($item['q']) ?></summary>
                    <p><?= e($item['a']) ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="fx-moments section section--dark">
    <div class="container">
        <div class="section-heading section-heading--wide" data-reveal>
            <p class="eyebrow"><?= e($homeContent['moments']['kicker']) ?></p>
            <h2><?= e($homeContent['moments']['title']) ?></h2>
        </div>
        <div class="fx-moments__grid">
            <?php foreach ($homeMoments as $item): ?>
                <article class="fx-moment-card" data-reveal>
                    <img src="<?= e(asset($item['src'])) ?>" alt="<?= e($item['caption']) ?>">
                    <div>
                        <span><?= e($item['event'] ?? 'Summit') ?></span>
                        <h3><?= e($item['caption']) ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="fx-newsletter section section--dark" data-reveal>
    <div class="container fx-newsletter__inner">
        <h2><?= e($homeContent['newsletter']['title']) ?></h2>
        <form class="fx-newsletter__form" data-home-newsletter>
            <label class="visually-hidden" for="home-news-email">Email</label>
            <input id="home-news-email" name="email" type="email" placeholder="Enter your email address" required>
            <button class="button button--gold" type="submit"><?= e($homeContent['newsletter']['button']) ?></button>
        </form>
        <p><?= e($homeContent['newsletter']['note']) ?></p>
    </div>
</section>

<section class="fx-footer-cta section section--dark" data-reveal>
    <div class="container fx-footer-cta__inner">
        <h2><?= e($homeContent['footerCta']['title']) ?></h2>
        <div class="fx-footer-cta__actions">
            <a class="button button--gold" href="<?= e(url($homeContent['footerCta']['partnerHref'])) ?>"><?= e($homeContent['footerCta']['partner']) ?></a>
            <a class="button button--ghost" href="<?= e(url($homeContent['footerCta']['ticketHref'])) ?>"><?= e($homeContent['footerCta']['ticket']) ?></a>
        </div>
        <span class="fx-flare fx-flare--wide" aria-hidden="true"></span>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
