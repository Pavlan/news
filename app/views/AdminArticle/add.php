<section class="add-article">
    <div class="wrapper">
        <h3 class="add-article__title">Add new article</h3>
        <form class="add-article__form" enctype="multipart/form-data" action="/admin/article/insert" method="post">
            <label for="title" class="add-article__label">Title</label>
            <input class="add-article__input" id="title" type="text" name="title" required>
            <label for="content" class="add-article__label">Content</label>
            <textarea class="add-article__textarea" id="content" type="text" name="content" required rows="10"></textarea>
            <label for="category" class="add-article__label">Category</label>
            <select class="add-article__select" id="category" name="category" required>
                <?php foreach ($this->data['categories'] as $category): ?>
                <option class="add-article__option" value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
                <?php endforeach; ?>
            </select>
            <label for="image" class="add-article__label">Image</label>
            <input class="add-article__image" id="image" type="file" name="image" required>
            <button class="add-article__button" type="submit">Send</button>
        </form>
    </div>
</section>