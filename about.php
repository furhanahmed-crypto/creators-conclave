<?php
require_once __DIR__ . '/constants/about.php';

$pageTitle = $aboutContent['metaTitle'];
$pageDescription = $aboutContent['metaDescription'];
$currentPage = 'about';
$hero = ['variant' => 'page', 'title' => $aboutContent['bannerTitle'], 'description' => $aboutContent['bannerText']];

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section">
    <div class="container prose-block">
        <h2 data-reveal><?= e($aboutContent['storyTitle']) ?></h2>
        <?php foreach ($aboutContent['story'] as $paragraph): ?>
            <p data-reveal><?= e($paragraph) ?></p>
        <?php endforeach; ?>
    </div>
</section>

<section class="section section--tight">
    <div class="container pillar-grid">
        <article class="pillar" data-reveal>
            <h2><?= e($aboutContent['visionTitle']) ?></h2>
            <p><?= e($aboutContent['vision']) ?></p>
        </article>
        <article class="pillar" data-reveal>
            <h2><?= e($aboutContent['missionTitle']) ?></h2>
            <ul class="plain-list">
                <?php foreach ($aboutContent['mission'] as $item): ?>
                    <li><?= e($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </article>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="block-title" data-reveal><?= e($aboutContent['standTitle']) ?></h2>
        <div class="practice-grid practice-grid--three">
            <?php foreach ($aboutContent['stand'] as $item): ?>
                <article class="practice-card" data-reveal>
                    <h3><?= e($item['title']) ?></h3>
                    <p><?= e($item['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--band">
    <div class="container split-copy">
        <article data-reveal>
            <h2><?= e($aboutContent['presenterTitle']) ?></h2>
            <p><?= e($aboutContent['presenter']) ?></p>
        </article>
        <article data-reveal>
            <h2><?= e($aboutContent['leadershipTitle']) ?></h2>
            <p><?= e($aboutContent['leader']) ?></p>
        </article>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
