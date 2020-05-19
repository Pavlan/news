<div class="wrapper">
    <section class="articles">
        <ul class="articles__list">
            <?php foreach ($this->data['articles'] as $article): ?>
                <li class="articles__item">
                    <article class="article">
                        <header class="article__header">
                            <img class="article__image" src="/public/img/news/<?= $article->getImagePath() ?>.jpg" alt="">
                            <h2 class="article__title"><?= $article->getTitle() ?></h2>
                        </header>
                        <footer class="article__footer">
                            <span class="article__time"><?= $article->getTime() ?></span>
                            <span class="article__category"><?= $article->getCategoryName() ?></span>
                            <a class="article__link" href="/admin/article/edit/<?= $article->getId() ?>">
                                <img class="article__icon" src="/public/img/admin/edit.svg" alt="Edit">
                            </a>
                            <a class="article__link" href="/admin/article/delete/<?= $article->getId() ?>">
                                <img class="article__icon" src="/public/img/admin/delete.svg" alt="Delete">
                            </a>
                        </footer>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>