<?php


namespace app\models;


use app\core\Model;
use app\core\ModelInterface;
use app\exceptions\AppException;

class ArticleRepository extends Model implements ModelInterface
{
    public function __construct($params)
    {
        parent::__construct();
        $this->setData($params);
        $this->setMeta();
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    private function setData($id): void
    {
        $this->data['article'] = $this->getArticleById($id);
        $this->data['menuItems'] = $this->getMenuItems();
    }

    private function setMeta(): void
    {
        $this->meta['title'] = $this->data['article']->getTitle();
        $this->meta['description'] = '';
        $this->meta['keywords'] = '';
    }

    private function getArticleById($id)
    {
        if ($article = $this->findById(Article::TABLE, Article::class, $id)) {
            return $article;
        }
        throw new AppException('Page not found', 404);
    }

    private function getMenuItems(): array
    {
        return $this->findAll(Category::TABLE, Category::class);
    }
}