<button class="gallery-card gallery-card--<?= e($item['tone'] ?? 'wide') ?>" type="button" data-gallery-item data-event="<?= e($item['event']) ?>" data-src="<?= e(asset($item['src'])) ?>" data-caption="<?= e($item['caption']) ?>">
    <img src="<?= e(asset($item['src'])) ?>" alt="<?= e($item['caption']) ?>">
    <span class="gallery-card__meta">
        <span><?= e($item['event']) ?></span>
        <span><?= e($item['caption']) ?></span>
    </span>
</button>
