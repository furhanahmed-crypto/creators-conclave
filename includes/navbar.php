<header class="site-header" data-header>
    <div class="container site-header__bar">
        <a class="logo" href="<?= e(url('index.php')) ?>">
            <span class="logo__mark" aria-hidden="true">CC</span>
            <span class="logo__word">
                <span>Creators</span>
                <span>Conclave</span>
            </span>
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
            <span class="nav-toggle__label">Menu</span>
            <span class="nav-toggle__bars" aria-hidden="true"></span>
        </button>
        <nav class="site-nav" id="site-nav" data-nav>
            <ul class="site-nav__list">
                <?php foreach ($site['nav'] as $item): ?>
                    <li>
                        <a class="<?= $currentPage === $item['id'] ? 'is-active' : '' ?>" href="<?= e(url($item['href'])) ?>">
                            <?= e($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="site-nav__actions">
                <a class="button button--gold" href="<?= e(url('nominate.php')) ?>">Nominate Now</a>
                <a class="button button--ghost" href="<?= e(url('login.php')) ?>">Login</a>
            </div>
        </nav>
    </div>
</header>
