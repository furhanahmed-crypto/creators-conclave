<article class="speaker-card" data-category="<?= e($speaker['category']) ?>" data-reveal>
    <div class="speaker-card__media">
        <img src="<?= e(asset($speaker['image'])) ?>" alt="<?= e($speaker['name']) ?>">
    </div>
    <div class="speaker-card__body">
        <p class="speaker-card__category"><?= e($speaker['category']) ?></p>
        <h3><?= e($speaker['name']) ?></h3>
        <p class="speaker-card__role"><?= e($speaker['platform']) ?> · <?= e($speaker['role']) ?></p>
        <p><?= e($speaker['bio']) ?></p>
    </div>
</article>
