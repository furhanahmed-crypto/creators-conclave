<?php
require_once __DIR__ . '/constants/jury.php';

$pageTitle = $agendaContent['metaTitle'];
$pageDescription = $agendaContent['metaDescription'];
$currentPage = 'agenda';
$hero = ['variant' => 'page', 'title' => $agendaContent['bannerTitle']];

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section">
    <div class="container">
        <p class="table-note"><?= e($agendaContent['intro']) ?></p>
        <table class="data-table">
            <thead><tr><th>Time</th><th>Session</th></tr></thead>
            <tbody>
                <?php foreach ($agendaContent['sessions'] as $row): ?>
                    <tr><td><?= e($row['time']) ?></td><td><?= e($row['session']) ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="standout"><?= e($agendaContent['line']) ?></p>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
