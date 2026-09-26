<?php
require_once __DIR__ . '/constants/awards.php';

$pageTitle = $awardsContent['metaTitle'];
$pageDescription = $awardsContent['metaDescription'];
$currentPage = 'awards';
$hero = ['variant' => 'page', 'title' => $awardsContent['bannerTitle'], 'description' => $awardsContent['bannerText']];

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section section--light">
    <div class="container prose-block" data-reveal>
        <p><?= e($awardsContent['intro']) ?></p>
    </div>
    <div class="container">
        <h2 class="block-title">Key dates</h2>
        <table class="data-table">
            <thead><tr><th>Milestone</th><th>Date</th></tr></thead>
            <tbody>
                <?php foreach ($awardsContent['dates'] as $row): ?>
                    <tr><td><?= e($row['milestone']) ?></td><td><?= e($row['date']) ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<section class="section section--light section--tight">
    <div class="container">
        <h2 class="block-title"><?= e($awardsContent['whoTitle']) ?></h2>
        <ul class="plain-list">
            <?php foreach ($awardsContent['who'] as $item): ?>
                <li><?= e($item) ?></li>
            <?php endforeach; ?>
        </ul>
        <h2 class="block-title"><?= e($awardsContent['categoriesTitle']) ?></h2>
        <table class="data-table">
            <thead><tr><th>#</th><th>Category</th><th>Recognises</th></tr></thead>
            <tbody>
                <?php foreach ($awardsContent['categories'] as $index => $row): ?>
                    <tr>
                        <td><?= e((string) ($index + 1)) ?></td>
                        <td><?= e($row[0]) ?></td>
                        <td><?= e($row[1]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<section class="section section--dark">
    <div class="container">
        <div class="cta-panel" data-reveal>
            <h2><?= e($awardsContent['chosenTitle']) ?></h2>
            <p><?= e($awardsContent['chosen']) ?></p>
            <p><?= e($awardsContent['cta']) ?></p>
            <a class="button button--gold" href="<?= e(url('nominate.php')) ?>">Nominate Now</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
