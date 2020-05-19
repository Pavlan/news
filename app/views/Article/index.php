<div class="wrapper">
    <div class="main-container">
        <main class="left-column">
            <section class="article">
                <h3 class="main-article__title"><?= $this->data['article']->getTitle() ?></h3>
                <img class="article__image" src="/public/img/news/<?= $this->data['article']->getImagePath() ?>.jpg" alt="">
                <div class="article__info">
                    <?= $this->data['article']->getContent() ?>
                    <span class="article__time"><?= $this->data['article']->getTime() ?></span>
                    <a class="article__category"
                       href="/category/<?= strtolower($this->data['article']->getCategoryName()) ?>"><?= $this->data['article']->getCategoryName() ?></a>
                    <span class="article__author">Author: <?= $this->data['article']->getAuthorName() ?></span>
                </div>
            </section>
        </main>
        <aside class="right-column">

        </aside>
    </div>
</div>