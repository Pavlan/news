<div class="wrapper">
    <div class="main-container">
        <main class="left-column">
            <section class="main-article">
                <a class="main-article__link" href="#">
                    <img class="main-article__image" src="https://picsum.photos/645/370" alt="">
                </a>
                <div class="main-article__bottom">
                    <a class="main-article__link" href="#">
                        <h3 class="main-article__title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, quo.</h3>
                    </a>
                    <div class="main-article__info">
                        <span class="main-article__time">16 h</span>
                        <a class="main-article__category" href="#">Sport</a>
                    </div>
                </div>
            </section>
            <section class="articles">
                <ul class="articles__list">
                    <?php foreach ($this->data['news'] as $article): ?>
                        <li class="articles__item">
                            <article class="article">
                                <header class="article__header">
                                    <a class="article__link"
                                       href="/article/<?= $this->createArticleLink($article->getTitle(), $article->getId()) ?>">
                                        <img class="article__image"
                                             src="public/img/news/<?= $article->getImagePath() ?>.jpg" alt="">
                                    </a>
                                    <a class="article__link"
                                       href="/article/<?= $this->createArticleLink($article->getTitle(), $article->getId()) ?>">
                                        <h3 class="article__title"><?= $article->getTitle() ?></h3>
                                    </a>
                                </header>
                                <footer class="article__footer">
                                    <span class="article__time"><?= $article->getTime() ?></span>
                                    <a class="article__category"
                                       href="/category/<?= strtolower($article->getCategoryName()) ?>">
                                        <?= $article->getCategoryName() ?></a>
                                </footer>
                            </article>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </main>
        <aside class="right-column">

        </aside>
    </div>
</div>