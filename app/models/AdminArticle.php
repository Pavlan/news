<?php


namespace app\models;


use app\core\Model;
use app\core\ModelInterface;

class AdminArticle extends Model implements ModelInterface
{
    public function __construct($params)
    {
        parent::__construct();
        $this->setData($params);
        $this->setMeta();
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function getArticleById($articleId)
    {
        return $this->findById(Article::TABLE, Article::class, $articleId);
    }

    public function updateArticle($data): bool
    {
        $article = $this->getArticleById($data['id']);
        $article->setTitle($data['title']);
        $article->setContent($data['content']);
        $article->setCategoryId($data['category']);
        return $this->update(Article::TABLE, $article);
    }

    public function insertArticle($postData, $fileData, $authorId): bool
    {
        if (!$fileData['error'] === 0) {
            return false;
        }
        $category = $this->getCategoryById($postData['category']);
        $imageName = $this->getImageName($category);
        move_uploaded_file($fileData['tmp_name'], ROOT_DIR . '/public/img/news/' . $imageName . '.jpg');
        $article = $this->createNewArticle($postData, $authorId, $imageName);
        return $this->insert(Article::TABLE, $article);
    }

    public function deleteArticle(): bool
    {
        unlink($this->createImagePath());
        return $this->delete(Article::TABLE, $this->data['article']->getId());
    }

    public function getCategoryById($categoryId)
    {
        return $this->findById(Category::TABLE, Category::class, $categoryId);
    }

    private function setData($articleId): void
    {
        $this->data['article'] = $this->getArticleById($articleId);
        $this->data['categories'] = $this->getAllCategories();
    }

    private function setMeta(): void
    {
        $this->meta['title'] = 'Admin panel';
        $this->meta['description'] = '';
        $this->meta['keywords'] = '';
    }

    private function getAllCategories(): array
    {
        return $this->findAll(Category::TABLE, Category::class);
    }

    private function getImageName($category): string
    {
        return strtolower($category->getName()) . '-' . mt_rand();
    }

    private function createNewArticle($data, $authorId, $imageName): Article
    {
        $article = new Article();
        $article->setTitle($data['title']);
        $article->setContent($data['content']);
        $article->setAuthorId($authorId);
        $article->setTime(date('Y-m-d H:i:s'));
        $article->setCategoryId($data['category']);
        $article->setImagePath($imageName);
        return $article;
    }

    private function createImagePath(): string
    {
        return ROOT_DIR . '/public/img/news/' . $this->data['article']->getImagePath() . '.jpg';
    }
}