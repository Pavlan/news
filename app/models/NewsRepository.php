<?php


namespace app\models;


use app\core\Model;
use app\core\ModelInterface;

class NewsRepository extends Model implements ModelInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->setData();
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

    private function setData(): void
    {
        $this->data['news'] = $this->getAllArticles();
        $this->data['menuItems'] = $this->getMenuItems();
    }

    private function setMeta(): void
    {
        $this->meta['title'] = 'News';
        $this->meta['description'] = '';
        $this->meta['keywords'] = '';
    }

    private function getAllArticles(): array
    {
        return $this->findAll(Article::TABLE, Article::class);
    }

    private function getMenuItems(): array
    {
        return $this->findAll(Category::TABLE, Category::class);
    }
}