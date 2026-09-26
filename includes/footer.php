</main>
<footer class="site-footer">
    <div class="container site-footer__grid">
        <div>
            <a class="logo logo--footer" href="<?= e(url('index.php')) ?>">
                <span class="logo__mark" aria-hidden="true">CC</span>
                <span class="logo__word">
                    <span>Creators</span>
                    <span>Conclave</span>
                </span>
            </a>
            <p class="site-footer__tag"><?= e($site['tagline']) ?></p>
            <p class="site-footer__note"><?= e($site['footerAbout']) ?></p>
        </div>
        <div>
            <p class="footer-label">Quick links</p>
            <ul class="footer-links">
                <?php foreach ($site['quickLinks'] as $link): ?>
                    <li><a href="<?= e(url($link['href'])) ?>"><?= e($link['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <p class="footer-label">Contact</p>
            <p><?= e($site['office']) ?></p>
            <p><a href="<?= e($site['phoneHref']) ?>"><?= e($site['phone']) ?></a><br>
            <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></p>
        </div>
        <div>
            <p class="footer-label">Social icons</p>
            <ul class="footer-links">
                <?php foreach ($site['socials'] as $social): ?>
                    <li><?= e($social) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="container site-footer__base">
        <p>© 2026 Creators Conclave. Presented by Bee Echoo Pvt Ltd. All rights reserved.</p>
        <p>
            <?php foreach ($site['legal'] as $index => $link): ?>
                <?php if ($index > 0): ?> · <?php endif; ?>
                <a href="<?= e(url($link['href'])) ?>"><?= e($link['label']) ?></a>
            <?php endforeach; ?>
        </p>
    </div>
</footer>
<a class="whatsapp" href="<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener">Chat with us</a>
<div class="popup" data-newsletter hidden>
    <div class="popup__card" role="dialog" aria-labelledby="newsletter-title">
        <button class="popup__close" type="button" data-newsletter-close>Close</button>
        <h2 id="newsletter-title"><?= e($site['newsletter']['heading']) ?></h2>
        <p><?= e($site['newsletter']['text']) ?></p>
        <form class="contact-form" data-newsletter-form>
            <div class="form-row">
                <label for="news-name">Name</label>
                <input id="news-name" name="name" type="text" required>
            </div>
            <div class="form-row">
                <label for="news-email">Email</label>
                <input id="news-email" name="email" type="email" required>
            </div>
            <div class="form-row">
                <label for="news-whatsapp">WhatsApp number</label>
                <input id="news-whatsapp" name="whatsapp" type="tel" required>
            </div>
            <button class="button button--gold" type="submit"><?= e($site['newsletter']['button']) ?></button>
        </form>
    </div>
</div>
<div class="lightbox" data-lightbox hidden>
    <button class="lightbox__close" type="button" data-lightbox-close>Close</button>
    <figure class="lightbox__figure">
        <img src="" alt="" data-lightbox-image>
        <figcaption data-lightbox-caption></figcaption>
    </figure>
</div>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= e(asset('js/main.js')) ?>"></script>
<script src="<?= e(asset('js/sliders.js')) ?>"></script>
<script src="<?= e(asset('js/animations.js')) ?>"></script>
</body>
</html>
