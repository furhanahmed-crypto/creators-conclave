<?php
$pageTitle = 'Login';
$pageDescription = 'Login';
$currentPage = 'login';
$hero = ['variant' => 'page', 'title' => 'Login'];

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/hero.php';
?>

<section class="section">
    <div class="container contact-form-wrap">
        <form class="contact-form" method="post" action="<?= e(url('login.php')) ?>">
            <div class="form-row"><label for="email">Email</label><input id="email" name="email" type="email" required></div>
            <div class="form-row"><label for="password">Password</label><input id="password" name="password" type="password" required></div>
            <button class="button button--gold" type="submit">Login</button>
        </form>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
