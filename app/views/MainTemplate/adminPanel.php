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
    <link href="/css/admin.min.css" rel="stylesheet">
</head>
<body>
<header class="page-header">
    <div class="page-header__top">
        <div class="wrapper">
            <div class="page-header__top-container">
                <span class="page-header__date"><?= date('l F d, Y') ?></span>
                <div class="user-block">
                    <span class="user-block__name"><?=$_SESSION['userName'] ?></span>
                    <a class="user-block__logout" href="/admin/login/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header__main">
        <div class="wrapper">
            <div class="page-header__main-container">
                <h1 class="page-header__title">
                    <a class="page-header__title-link" href="/admin">Admin panel</a>
                </h1>
                <nav class="page-header__nav">
                    <ul class="page-header__nav-list">
                        <li class="page-header__nav-item">
                            <a class="page-header__nav-link" href="/admin/panel">My articles</a>
                        </li>
                        <li class="page-header__nav-item">
                            <a class="page-header__nav-link" href="/admin/article/add">Add new article</a>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<?php if (is_file($this->template)) require $this->template; ?>
</body>
</html>