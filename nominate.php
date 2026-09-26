<?php
require_once __DIR__ . '/constants/nominate.php';
require_once __DIR__ . '/constants/awards.php';

$pageTitle = $nominateContent['metaTitle'];
$pageDescription = $nominateContent['metaDescription'];
$currentPage = 'awards';
$errors = [];
$sent = false;
$old = ['name' => '', 'email' => '', 'whatsapp' => '', 'city' => '', 'languages' => '', 'platform' => '', 'handles' => '', 'followers' => '', 'links' => '', 'bio' => '', 'why' => '', 'package' => '', 'coupon' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $key => $value) {
        $old[$key] = trim($_POST[$key] ?? '');
    }
    $categories = $_POST['categories'] ?? [];
    if (!is_array($categories)) {
        $categories = [];
    }
    if ($old['name'] === '') $errors['name'] = 'Add your full name.';
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Use a working email address.';
    if ($old['whatsapp'] === '') $errors['whatsapp'] = 'Add your WhatsApp number.';
    if (count($categories) < 1 || count($categories) > 3) $errors['categories'] = 'Choose up to 3 categories.';
    if ($old['package'] === '') $errors['package'] = 'Choose a nomination package.';
    if (empty($_POST['consent'])) $errors['consent'] = 'Please agree to continue.';
    if (!$errors) $sent = true;
}

$hero = ['variant' => 'page', 'title' => $nominateContent['bannerTitle'], 'description' => $nominateContent['bannerText']];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section">
    <div class="container prose-block">
        <p><?= e($nominateContent['intro']) ?></p>
        <p><?= e($nominateContent['invite']) ?></p>
    </div>
    <div class="container">
        <h2 class="block-title"><?= e($nominateContent['packagesTitle']) ?></h2>
        <table class="data-table">
            <thead><tr><th>Package</th><th>Fee</th><th>Includes (proposed)</th></tr></thead>
            <tbody>
                <?php foreach ($nominateContent['packages'] as $package): ?>
                    <tr>
                        <td><?= e($package['name']) ?></td>
                        <td><?= e($package['fee']) ?></td>
                        <td><?= e($package['includes']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="table-note"><?= e($nominateContent['note']) ?></p>
    </div>
</section>

<section class="section section--tight">
    <div class="container contact-form-wrap">
        <?php if ($sent): ?>
            <div class="form-success" role="status"><p><?= e($nominateContent['thanks']) ?></p></div>
        <?php else: ?>
            <form class="contact-form" method="post" enctype="multipart/form-data">
                <div class="form-row"><label for="name">Full name</label><input id="name" name="name" value="<?= e($old['name']) ?>" required></div>
                <div class="form-row"><label for="email">Email address</label><input id="email" name="email" type="email" value="<?= e($old['email']) ?>" required></div>
                <div class="form-row"><label for="whatsapp">WhatsApp number</label><input id="whatsapp" name="whatsapp" value="<?= e($old['whatsapp']) ?>" required></div>
                <div class="form-row"><label for="city">City & state / country</label><input id="city" name="city" value="<?= e($old['city']) ?>"></div>
                <div class="form-row"><label for="languages">Language(s) of content</label><input id="languages" name="languages" value="<?= e($old['languages']) ?>"></div>
                <div class="form-row">
                    <label for="platform">Primary platform</label>
                    <select id="platform" name="platform">
                        <?php foreach ($nominateContent['platforms'] as $platform): ?>
                            <option <?= $old['platform'] === $platform ? 'selected' : '' ?>><?= e($platform) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row"><label for="handles">Social handle(s) and profile links</label><textarea id="handles" name="handles" rows="3"><?= e($old['handles']) ?></textarea></div>
                <div class="form-row"><label for="followers">Follower / subscriber count</label><input id="followers" name="followers" value="<?= e($old['followers']) ?>"></div>
                <fieldset class="form-row">
                    <legend>Award category — choose up to 3</legend>
                    <?php foreach ($awardsContent['categories'] as $category): ?>
                        <label class="check"><input type="checkbox" name="categories[]" value="<?= e($category[0]) ?>"> <?= e($category[0]) ?></label>
                    <?php endforeach; ?>
                    <?php if (!empty($errors['categories'])): ?><p class="field-error"><?= e($errors['categories']) ?></p><?php endif; ?>
                </fieldset>
                <div class="form-row"><label for="links">Links to 3 best pieces of content</label><textarea id="links" name="links" rows="3"><?= e($old['links']) ?></textarea></div>
                <div class="form-row"><label for="bio">Short bio (max 150 words)</label><textarea id="bio" name="bio" rows="4"><?= e($old['bio']) ?></textarea></div>
                <div class="form-row"><label for="why">Why should you win? (max 200 words)</label><textarea id="why" name="why" rows="4"><?= e($old['why']) ?></textarea></div>
                <div class="form-row"><label for="photo">Profile photo upload</label><input id="photo" name="photo" type="file" accept="image/*"></div>
                <div class="form-row">
                    <label for="package">Nomination package</label>
                    <select id="package" name="package" required>
                        <option value="">Select</option>
                        <?php foreach ($nominateContent['packages'] as $package): ?>
                            <option value="<?= e($package['name']) ?>" <?= $old['package'] === $package['name'] ? 'selected' : '' ?>><?= e($package['name']) ?> — <?= e($package['fee']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row"><label for="coupon">Coupon / invite code (optional)</label><input id="coupon" name="coupon" value="<?= e($old['coupon']) ?>"></div>
                <label class="check"><input type="checkbox" name="consent" value="1" required> I agree to the Nomination Rules and Terms & Conditions, and consent to my name, photo and content being published if shortlisted.</label>
                <button class="button button--gold" type="submit">Proceed to Payment</button>
            </form>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
