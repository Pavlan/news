<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->meta['title'] ?></title>
    <meta name="description" content="<?= $this->meta['description'] ?>">
    <meta name="keywords" content="<?= $this->meta['keywords'] ?>">
    <link rel="stylesheet" href="/css/style.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<header class="page-header">
    <div class="page-header__top">
        <div class="wrapper">
            <div class="page-header__top-container">
                <span class="page-header__date"><?= date('l F d, Y') ?></span>
            </div>
        </div>
    </div>
    <div class="page-header__main">
        <div class="wrapper">
            <div class="page-header__main-container">
                <h1 class="page-header__title">
                    <a class="page-header__title-link" href="/">News</a>
                </h1>
                <nav class="page-header__nav">
                    <ul class="page-header__nav-list">
                        <?php foreach ($this->data['menuItems'] as $menuItem): ?>
                            <li class="page-header__nav-item">
                                <a class="page-header__nav-link" href="/category/<?= strtolower($menuItem->getName()) ?>"><?= $menuItem->getName() ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<?php require $this->template; ?>
<footer class="page-footer">
    <div class="wrapper">
        <nav class="page-footer__nav">
            <ul class="page-footer__nav-list">
                <li class="page-footer__nav-item">
                    <a class="page-footer__nav-link" href="#">Terms of Use</a>
                </li>
                <li class="page-footer__nav-item">
                    <a class="page-footer__nav-link" href="#">Privacy Policy</a>
                </li>
                <li class="page-footer__nav-item">
                    <a class="page-footer__nav-link" href="#">Advertise</a>
                </li>
                <li class="page-footer__nav-item">
                    <a class="page-footer__nav-link" href="#">Cookies</a>
                </li>
                <li class="page-footer__nav-item">
                    <a class="page-footer__nav-link" href="#">Contact</a>
                </li>
            </ul>
        </nav>
        <span class="page-footer__copyright">Copyright © 2020 NEWS. All rights reserved.</span>
    </div>
</footer>
</body>
</html>