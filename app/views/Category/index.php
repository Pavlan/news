<div class="wrapper">
    <div class="main-container">
        <main class="left-column">
            <h2 class="category"><?= $this->data['categoryName'] ?></h2>
            <section class="articles">
                <ul class="articles__list">
                    <?php foreach ($this->data['news'] as $article): ?>
                        <li class="articles__item">
                            <article class="article">
                                <header class="article__header">
                                    <a class="article__link"
                                       href="/article/<?= $this->createArticleLink($article->getTitle(), $article->getId()) ?>">
                                        <img class="article__image"
                                             src="/public/img/news/<?= $article->getImagePath() ?>.jpg" alt="">
                                    </a>
                                    <a class="article__link"
                                       href="/article/<?= $this->createArticleLink($article->getTitle(), $article->getId()) ?>">
                                        <h3 class="article__title"><?= $article->getTitle() ?></h3>
                                    </a>
                                </header>
                                <footer class="article__footer">
                                    <span class="article__time"><?= $article->getTime() ?></span>
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