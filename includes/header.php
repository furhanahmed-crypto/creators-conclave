<?php
require_once __DIR__ . '/bootstrap.php';
require_once BASE_PATH . '/constants/site.php';

$pageTitle = $pageTitle ?? 'Creators Conclave';
$pageDescription = $pageDescription ?? $site['footerAbout'];
$currentPage = $currentPage ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>document.documentElement.classList.add('js');</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <link rel="icon" href="<?= e(asset('images/brand/favicon.svg')) ?>" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/components.css')) ?>">
    <?php if (($currentPage ?? '') === 'home'): ?>
        <link rel="stylesheet" href="<?= e(asset('css/festiva-home.css')) ?>">
    <?php endif; ?>
</head>
<body class="page-<?= e($currentPage ?: 'home') ?>">
<div class="ambient" aria-hidden="true">
    <div class="ambient__glow"></div>
    <div class="ambient__blob ambient__blob--a"></div>
    <div class="ambient__blob ambient__blob--b"></div>
    <div class="ambient__blob ambient__blob--c"></div>
    <div class="ambient__sheen"></div>
    <div class="ambient__ribbons">
        <svg viewBox="0 0 1920 1200" fill="none" preserveAspectRatio="xMidYMin slice" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <!-- Metallic Gold Ribbon Gradients -->
                <linearGradient id="gold-band-upper" x1="100%" y1="0%" x2="0%" y2="80%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.95" />
                    <stop offset="14%" stop-color="#fae4a8" stop-opacity="0.95" />
                    <stop offset="36%" stop-color="#dfb85e" stop-opacity="0.9" />
                    <stop offset="62%" stop-color="#8c6418" stop-opacity="0.8" />
                    <stop offset="84%" stop-color="#fcedb8" stop-opacity="0.95" />
                    <stop offset="100%" stop-color="#6e4f10" stop-opacity="0.6" />
                </linearGradient>

                <linearGradient id="gold-pinstripes-upper" x1="100%" y1="0%" x2="0%" y2="80%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.75" />
                    <stop offset="18%" stop-color="#fae4a8" stop-opacity="0.65" />
                    <stop offset="45%" stop-color="#dfb85e" stop-opacity="0.5" />
                    <stop offset="75%" stop-color="#9a741e" stop-opacity="0.3" />
                    <stop offset="100%" stop-color="#6e4f10" stop-opacity="0.1" />
                </linearGradient>

                <linearGradient id="gold-band-lower" x1="100%" y1="30%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.95" />
                    <stop offset="20%" stop-color="#fae4a8" stop-opacity="0.95" />
                    <stop offset="46%" stop-color="#dfb85e" stop-opacity="0.9" />
                    <stop offset="72%" stop-color="#8e6518" stop-opacity="0.85" />
                    <stop offset="90%" stop-color="#fcedb8" stop-opacity="0.95" />
                    <stop offset="100%" stop-color="#5c4009" stop-opacity="0.5" />
                </linearGradient>

                <linearGradient id="gold-pinstripes-lower" x1="100%" y1="30%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#fae4a8" stop-opacity="0.65" />
                    <stop offset="35%" stop-color="#dfb85e" stop-opacity="0.45" />
                    <stop offset="70%" stop-color="#9a741e" stop-opacity="0.3" />
                    <stop offset="100%" stop-color="#6e4f10" stop-opacity="0.08" />
                </linearGradient>

                <!-- Chrome / Silver Liquid Ribbon (Reference 1) -->
                <linearGradient id="chrome-ribbon-upper" x1="0%" y1="0%" x2="80%" y2="100%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.5" />
                    <stop offset="28%" stop-color="#d6dde8" stop-opacity="0.32" />
                    <stop offset="58%" stop-color="#8b95a5" stop-opacity="0.16" />
                    <stop offset="82%" stop-color="#ffffff" stop-opacity="0.38" />
                    <stop offset="100%" stop-color="#646d7a" stop-opacity="0.1" />
                </linearGradient>

                <!-- Architectural Shaded Panel Gradients (Reference 2) -->
                <linearGradient id="panel-depth-upper" x1="85%" y1="0%" x2="15%" y2="85%">
                    <stop offset="0%" stop-color="#191c26" stop-opacity="0.5" />
                    <stop offset="50%" stop-color="#0f1117" stop-opacity="0.3" />
                    <stop offset="100%" stop-color="#050507" stop-opacity="0" />
                </linearGradient>

                <linearGradient id="panel-depth-lower" x1="85%" y1="35%" x2="10%" y2="100%">
                    <stop offset="0%" stop-color="#171924" stop-opacity="0.45" />
                    <stop offset="60%" stop-color="#0e1015" stop-opacity="0.25" />
                    <stop offset="100%" stop-color="#050507" stop-opacity="0" />
                </linearGradient>

                <filter id="ribbon-glow" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur stdDeviation="3.5" result="blur" />
                    <feMerge>
                        <feMergeNode in="blur" />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>
            </defs>

            <!-- Upper Architectural Shaded Panel -->
            <path d="M 2000, -80 C 1480, 20 980, 220 580, 520 C 340, 700 140, 920 -20, 1180 L -20, -80 Z" fill="url(#panel-depth-upper)" />

            <!-- Chrome Liquid Ribbon (Reference 1) -->
            <path d="M -80, -40 C 220, 60 480, 240 640, 480 C 740, 660 780, 880 760, 1120" stroke="url(#chrome-ribbon-upper)" stroke-width="3" />
            <path d="M -80, 0 C 200, 95 450, 270 610, 505 C 705, 680 745, 895 725, 1135" stroke="url(#chrome-ribbon-upper)" stroke-width="1" stroke-opacity="0.4" />

            <!-- Upper Primary Metallic Gold Ribbon (Reference 2) -->
            <path d="M 2000, -40 C 1480, 40 1000, 235 620, 520 C 400, 685 220, 890 50, 1140" stroke="url(#gold-band-upper)" stroke-width="4.5" filter="url(#ribbon-glow)" />
            <path d="M 2000, -25 C 1490, 52 1015, 248 635, 532 C 415, 696 235, 900 65, 1152" stroke="url(#gold-band-upper)" stroke-width="1.5" stroke-opacity="0.85" />

            <!-- Upper Concentric Golden Hairline Pinstripes (Reference 2) -->
            <path d="M 2000, 15 C 1510, 90 1045, 280 670, 560 C 455, 720 280, 925 110, 1180" stroke="url(#gold-pinstripes-upper)" stroke-width="0.9" />
            <path d="M 2000, 45 C 1525, 120 1070, 305 700, 585 C 490, 745 315, 950 145, 1205" stroke="url(#gold-pinstripes-upper)" stroke-width="0.85" />
            <path d="M 2000, 75 C 1540, 150 1095, 330 730, 610 C 525, 770 350, 975 180, 1230" stroke="url(#gold-pinstripes-upper)" stroke-width="0.8" />
            <path d="M 2000, 105 C 1555, 180 1120, 355 760, 635 C 560, 795 385, 1000 215, 1255" stroke="url(#gold-pinstripes-upper)" stroke-width="0.75" />
            <path d="M 2000, 135 C 1570, 210 1145, 380 790, 660 C 595, 820 420, 1025 250, 1280" stroke="url(#gold-pinstripes-upper)" stroke-width="0.75" />
            <path d="M 2000, 165 C 1585, 240 1170, 405 820, 685 C 630, 845 455, 1050 285, 1305" stroke="url(#gold-pinstripes-upper)" stroke-width="0.75" />

            <!-- Lower Curved Panel Depth -->
            <path d="M 2050, 680 C 1620, 700 1240, 830 900, 1040 C 670, 1190 460, 1380 260, 1620 L 2050, 1620 Z" fill="url(#panel-depth-lower)" />

            <!-- Lower Primary Metallic Gold Ribbon -->
            <path d="M 2050, 720 C 1630, 740 1260, 865 930, 1070 C 705, 1215 500, 1400 305, 1640" stroke="url(#gold-band-lower)" stroke-width="4" filter="url(#ribbon-glow)" />
            <path d="M 2050, 740 C 1642, 758 1278, 882 950, 1086 C 725, 1230 520, 1415 325, 1655" stroke="url(#gold-band-lower)" stroke-width="1.2" stroke-opacity="0.85" />

            <!-- Lower Concentric Golden Hairline Pinstripes -->
            <path d="M 2050, 775 C 1660, 790 1310, 910 990, 1110 C 770, 1250 565, 1435 375, 1675" stroke="url(#gold-pinstripes-lower)" stroke-width="0.85" />
            <path d="M 2050, 805 C 1678, 820 1335, 935 1020, 1135 C 805, 1275 600, 1460 410, 1700" stroke="url(#gold-pinstripes-lower)" stroke-width="0.8" />
            <path d="M 2050, 835 C 1695, 850 1360, 960 1050, 1160 C 840, 1300 635, 1485 445, 1725" stroke="url(#gold-pinstripes-lower)" stroke-width="0.75" />
            <path d="M 2050, 865 C 1712, 880 1385, 985 1080, 1185 C 875, 1325 670, 1510 480, 1750" stroke="url(#gold-pinstripes-lower)" stroke-width="0.75" />
            <path d="M 2050, 895 C 1730, 910 1410, 1010 1110, 1210 C 910, 1350 705, 1535 515, 1775" stroke="url(#gold-pinstripes-lower)" stroke-width="0.7" />
        </svg>
    </div>
    <div class="ambient__grain"></div>
</div>
<a class="skip-link" href="#main">Skip to content</a>
<div class="announce" aria-label="Announcements">
    <div class="announce__track">
        <?php for ($copy = 0; $copy < 2; $copy++): ?>
            <p><?= e($site['announce']) ?></p>
        <?php endfor; ?>
    </div>
</div>
<?php include __DIR__ . '/navbar.php'; ?>
<main id="main">
