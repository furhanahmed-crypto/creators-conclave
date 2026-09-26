<?php
require_once __DIR__ . '/constants/passes.php';

$pageTitle = $passesContent['metaTitle'];
$pageDescription = $passesContent['metaDescription'];
$currentPage = 'passes';
$sent = false;
$old = ['name' => '', 'email' => '', 'whatsapp' => '', 'city' => '', 'role' => '', 'pass' => '', 'quantity' => '1', 'coupon' => '', 'gstin' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $key => $value) {
        $old[$key] = trim($_POST[$key] ?? '');
    }
    if ($old['name'] !== '' && filter_var($old['email'], FILTER_VALIDATE_EMAIL) && $old['whatsapp'] !== '' && $old['pass'] !== '' && !empty($_POST['consent'])) {
        $sent = true;
    }
}

$hero = ['variant' => 'page', 'title' => $passesContent['bannerTitle'], 'description' => $passesContent['bannerText']];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section">
    <div class="container prose-block"><p><?= e($passesContent['intro']) ?></p></div>
    <div class="container">
        <h2 class="block-title"><?= e($passesContent['packagesTitle']) ?></h2>
        <table class="data-table">
            <thead><tr><th>Pass</th><th>Price</th><th>Includes (proposed)</th></tr></thead>
            <tbody>
                <?php foreach ($passesContent['passes'] as $pass): ?>
                    <tr>
                        <td><?= e($pass['name']) ?></td>
                        <td><?= e($pass['price']) ?></td>
                        <td><?= e($pass['includes']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="table-note"><?= e($passesContent['coupon']) ?></p>
        <div class="hero__actions">
            <a class="button button--gold" href="#book">Buy Silver</a>
            <a class="button button--gold" href="#book">Buy Gold</a>
            <a class="button button--gold" href="#book">Buy Platinum</a>
            <a class="button button--ghost" href="#book">Buy 1+1 Combo</a>
        </div>
    </div>
</section>

<section class="section section--tight" id="book">
    <div class="container contact-form-wrap">
        <?php if ($sent): ?>
            <div class="form-success" role="status"><p><?= e($passesContent['thanks']) ?></p></div>
        <?php else: ?>
            <form class="contact-form" method="post">
                <div class="form-row"><label for="name">Name</label><input id="name" name="name" value="<?= e($old['name']) ?>" required></div>
                <div class="form-row"><label for="email">Email</label><input id="email" name="email" type="email" value="<?= e($old['email']) ?>" required></div>
                <div class="form-row"><label for="whatsapp">WhatsApp number</label><input id="whatsapp" name="whatsapp" value="<?= e($old['whatsapp']) ?>" required></div>
                <div class="form-row"><label for="city">City</label><input id="city" name="city" value="<?= e($old['city']) ?>"></div>
                <div class="form-row">
                    <label for="role">I am a</label>
                    <select id="role" name="role">
                        <?php foreach ($passesContent['roles'] as $role): ?>
                            <option><?= e($role) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="pass">Pass type</label>
                    <select id="pass" name="pass" required>
                        <option value="">Select</option>
                        <?php foreach ($passesContent['passes'] as $pass): ?>
                            <option><?= e($pass['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-row"><label for="quantity">Quantity</label><input id="quantity" name="quantity" type="number" min="1" value="<?= e($old['quantity']) ?>"></div>
                <div class="form-row"><label for="coupon">Coupon code</label><input id="coupon" name="coupon" value="<?= e($old['coupon']) ?>"></div>
                <div class="form-row"><label for="gstin">GSTIN (optional, for business invoice)</label><input id="gstin" name="gstin" value="<?= e($old['gstin']) ?>"></div>
                <label class="check"><input type="checkbox" name="consent" value="1" required> I agree to the Terms & Conditions and Refund Policy</label>
                <button class="button button--gold" type="submit">Buy Your Pass</button>
            </form>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
