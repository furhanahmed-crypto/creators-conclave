<?php
require_once __DIR__ . '/constants/contact.php';

$pageTitle = $contactContent['metaTitle'];
$pageDescription = $contactContent['metaDescription'];
$currentPage = 'contact';
$sent = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    if ($name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) && $message !== '') {
        $sent = true;
    }
}

$hero = ['variant' => 'page', 'title' => $contactContent['bannerTitle'], 'description' => $contactContent['bannerText']];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section">
    <div class="container contact-layout">
        <div>
            <table class="data-table">
                <thead><tr><th>For</th><th>Reach us at</th></tr></thead>
                <tbody>
                    <?php foreach ($contactContent['cards'] as $card): ?>
                        <tr><td><?= e($card['for']) ?></td><td><?= e($card['reach']) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <iframe class="map" title="Bee Echoo Pvt Ltd, Madhapur, Hyderabad" src="https://maps.google.com/maps?q=Survey%20No.%2064%20Building%20No.%209%20Madhapur%20HITEC%20City%20Hyderabad%20500081&output=embed" loading="lazy"></iframe>
        </div>
        <div class="contact-form-wrap">
            <?php if ($sent): ?>
                <div class="form-success" role="status"><p><?= e($contactContent['thanks']) ?></p></div>
            <?php else: ?>
                <form class="contact-form" method="post">
                    <div class="form-row"><label for="name">Name</label><input id="name" name="name" required></div>
                    <div class="form-row"><label for="email">Email</label><input id="email" name="email" type="email" required></div>
                    <div class="form-row"><label for="whatsapp">WhatsApp number</label><input id="whatsapp" name="whatsapp"></div>
                    <div class="form-row">
                        <label for="role">I am a</label>
                        <select id="role" name="role">
                            <?php foreach ($contactContent['roles'] as $role): ?>
                                <option><?= e($role) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-row"><label for="subject">Subject</label><input id="subject" name="subject"></div>
                    <div class="form-row"><label for="message">Message</label><textarea id="message" name="message" rows="5" required></textarea></div>
                    <button class="button button--gold" type="submit">Send Message</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
