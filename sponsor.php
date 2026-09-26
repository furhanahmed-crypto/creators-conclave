<?php
require_once __DIR__ . '/constants/sponsor.php';

$pageTitle = $sponsorContent['metaTitle'];
$pageDescription = $sponsorContent['metaDescription'];
$currentPage = 'sponsor';
$sent = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    if ($name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sent = true;
    }
}

$hero = ['variant' => 'page', 'title' => $sponsorContent['bannerTitle'], 'description' => $sponsorContent['bannerText']];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section">
    <div class="container prose-block"><p><?= e($sponsorContent['intro']) ?></p></div>
    <div class="container">
        <h2 class="block-title"><?= e($sponsorContent['whyTitle']) ?></h2>
        <div class="practice-grid">
            <?php foreach ($sponsorContent['why'] as $item): ?>
                <article class="practice-card" data-reveal>
                    <h3><?= e($item['title']) ?></h3>
                    <p><?= e($item['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
        <h2 class="block-title"><?= e($sponsorContent['tiersTitle']) ?></h2>
        <table class="data-table">
            <thead><tr><th>Tier</th><th>Key benefits (proposed)</th></tr></thead>
            <tbody>
                <?php foreach ($sponsorContent['tiers'] as $tier): ?>
                    <tr><td><?= e($tier['name']) ?></td><td><?= e($tier['benefits']) ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="hero__actions">
            <a class="button button--ghost" href="#enquire">Download Sponsorship Brochure (PDF)</a>
            <a class="button button--gold" href="#enquire">Enquire Now</a>
        </div>
    </div>
</section>

<section class="section section--tight" id="enquire">
    <div class="container contact-form-wrap">
        <?php if ($sent): ?>
            <div class="form-success" role="status"><p><?= e($sponsorContent['thanks']) ?></p></div>
        <?php else: ?>
            <form class="contact-form" method="post">
                <div class="form-row"><label for="name">Name</label><input id="name" name="name" required></div>
                <div class="form-row"><label for="company">Company / brand name</label><input id="company" name="company"></div>
                <div class="form-row"><label for="designation">Designation</label><input id="designation" name="designation"></div>
                <div class="form-row"><label for="email">Email</label><input id="email" name="email" type="email" required></div>
                <div class="form-row"><label for="whatsapp">WhatsApp number</label><input id="whatsapp" name="whatsapp"></div>
                <div class="form-row"><label for="city">City</label><input id="city" name="city"></div>
                <div class="form-row">
                    <label for="interest">Interested in</label>
                    <select id="interest" name="interest">
                        <?php foreach ($sponsorContent['interests'] as $interest): ?>
                            <option><?= e($interest) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row"><label for="budget">Budget range (optional)</label><input id="budget" name="budget"></div>
                <div class="form-row"><label for="message">Message</label><textarea id="message" name="message" rows="5"></textarea></div>
                <button class="button button--gold" type="submit">Enquire Now</button>
            </form>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
