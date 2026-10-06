</main>
<footer class="site-footer site-footer--festiva">
    <div class="container site-footer__center">
        <a class="logo logo--footer" href="<?= e(url('index.php')) ?>">
            <span class="logo__mark" aria-hidden="true">CC</span>
            <span class="logo__word">
                <span>Creators</span>
                <span>Conclave</span>
            </span>
        </a>
        <nav class="site-footer__nav" aria-label="Footer">
            <?php foreach ($site['footerNav'] as $link): ?>
                <a href="<?= e(url($link['href'])) ?>"><?= e($link['label']) ?></a>
            <?php endforeach; ?>
        </nav>
        <ul class="site-footer__socials">
            <?php foreach ($site['socials'] as $social): ?>
                <li>
                    <a
                        class="site-footer__social"
                        href="<?= e($social['href']) ?>"
                        target="_blank"
                        rel="noopener"
                        aria-label="<?= e($social['label']) ?>"
                    >
                        <span aria-hidden="true"><?= e(strtoupper($social['icon'])) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <p class="site-footer__copy">© 2026 Creators Conclave · Presented by Bee Echoo Pvt Ltd</p>
    </div>
</footer>
<a class="scroll-top" href="#main" data-scroll-top aria-label="Back to top">↑</a>
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
