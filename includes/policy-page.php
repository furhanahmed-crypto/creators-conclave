<?php
require_once dirname(__DIR__) . '/constants/policies.php';

$pages = [
    'nomination-rules.php' => 'nomination',
    'terms.php' => 'terms',
    'refund.php' => 'refund',
    'privacy.php' => 'privacy',
];

$script = basename($_SERVER['SCRIPT_NAME'] ?? '');
$key = $pages[$script] ?? 'terms';
$policy = $policies[$key];

$pageTitle = $policy['title'];
$pageDescription = $policy['title'];
$currentPage = 'policy';
$hero = ['variant' => 'page', 'title' => $policy['title']];

include __DIR__ . '/header.php';
include __DIR__ . '/hero.php';
?>

<section class="section">
    <div class="container prose-block">
        <?php if (!empty($policy['items'])): ?>
            <ol class="policy-list">
                <?php foreach ($policy['items'] as $item): ?>
                    <li><?= e($item) ?></li>
                <?php endforeach; ?>
            </ol>
        <?php else: ?>
            <?php foreach ($policy['paragraphs'] as $paragraph): ?>
                <p><?= e($paragraph) ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
