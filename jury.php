<?php
require_once __DIR__ . '/constants/jury.php';

$pageTitle = $juryContent['metaTitle'];
$pageDescription = $juryContent['metaDescription'];
$currentPage = 'jury';
$hero = ['variant' => 'page', 'title' => $juryContent['bannerTitle']];

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section">
    <div class="container prose-block">
        <p><?= e($juryContent['intro']) ?></p>
        <p><?= e($juryContent['cardFormat']) ?></p>
        <p><?= e($juryContent['note']) ?></p>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
