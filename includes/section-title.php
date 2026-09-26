<div class="section-heading <?= !empty($section['wide']) ? 'section-heading--wide' : '' ?>" data-reveal>
    <?php if (!empty($section['eyebrow'])): ?>
        <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
    <?php endif; ?>
    <h2><?= e($section['title']) ?></h2>
    <?php if (!empty($section['description'])): ?>
        <p class="section-heading__copy"><?= e($section['description']) ?></p>
    <?php endif; ?>
</div>
