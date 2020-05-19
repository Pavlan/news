<section class="add-article">
    <div class="wrapper">
        <h3 class="add-article__title">Edit article</h3>
        <form class="add-article__form" enctype="multipart/form-data"
              action="/admin/article/update" method="post">
            <label for="title" class="add-article__label">Title</label>
            <input class="add-article__input" id="title" type="text" name="title" required
                   value="<?= $this->data['article']->getTitle() ?>">
            <label for="content" class="add-article__label">Content</label>
            <textarea class="add-article__textarea" id="content" type="text" name="content" required
                      rows="10"><?= $this->data['article']->getContent() ?></textarea>
            <label for="category" class="add-article__label">Category</label>
            <select class="add-article__select" id="category" name="category" required>
                <?php foreach ($this->data['categories'] as $category): ?>
                    <option class="add-article__option" value="<?= $category->getId() ?>"
                        <?php if ($category->getId() === $this->data['article']->getCategoryId()) {echo 'selected';}?>>
                        <?= $category->getName() ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="id" value="<?= $this->data['article']->getId() ?>">
            <button class="add-article__button" type="submit">Send</button>
        </form>
    </div>
</section>