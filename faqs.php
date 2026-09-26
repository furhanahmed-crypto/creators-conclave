<?php
require_once __DIR__ . '/constants/faqs.php';

$pageTitle = $faqsContent['metaTitle'];
$pageDescription = $faqsContent['metaDescription'];
$currentPage = 'faqs';
$hero = ['variant' => 'page', 'title' => 'FAQs'];

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section">
    <div class="container faq-list">
        <?php foreach ($faqsContent['groups'] as $group): ?>
            <h2><?= e($group['title']) ?></h2>
            <?php foreach ($group['items'] as $item): ?>
                <details>
                    <summary><?= e($item['q']) ?></summary>
                    <p><?= e($item['a']) ?></p>
                </details>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
