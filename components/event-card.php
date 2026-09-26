<?php
$variant = $variant ?? 'default';
?>
<article class="event-card event-card--<?= e($variant) ?>" data-type="<?= e($event['type']) ?>" data-reveal>
    <a class="event-card__media" href="<?= e(url('event-details.php?slug=' . $event['slug'])) ?>">
        <img src="<?= e(asset($event['image'])) ?>" alt="<?= e($event['name']) ?>">
    </a>
    <div class="event-card__body">
        <p class="event-card__type"><?= e($event['type']) ?></p>
        <h3><a href="<?= e(url('event-details.php?slug=' . $event['slug'])) ?>"><?= e($event['name']) ?></a></h3>
        <p class="event-card__meta"><?= e($event['city']) ?> · <?= e($event['dateShort']) ?></p>
        <p class="event-card__summary"><?= e($event['summary']) ?></p>
        <a class="text-link" href="<?= e(url('event-details.php?slug=' . $event['slug'])) ?>">View event</a>
    </div>
</article>
