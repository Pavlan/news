<?php


namespace app\models;


use app\core\Model;
use app\core\ModelInterface;
use app\exceptions\AppException;

class CategoryRepository extends Model implements ModelInterface
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

    private function setData($params): void
    {
        $category = $this->getCategoryObject($params);
        $this->data['categoryName'] = $category->getName();
        $this->data['news'] = $this->getAllNewsByCategoryId($category->getId());
        $this->data['menuItems'] = $this->getMenuItems();
    }

    private function setMeta(): void
    {
        $this->meta['title'] = $this->data['categoryName'];
        $this->meta['description'] = '';
        $this->meta['keywords'] = '';
    }

    private function getCategoryObject($params)
    {
        if ($category = $this->findByName(Category::TABLE, Category::class, $params)) {
            return $category;
        }
        throw new AppException('Page not found', 404);
    }

    private function getAllNewsByCategoryId($categoryId): array
    {
        return $this->findAllByCategoryId(Article::TABLE, Article::class, $categoryId);
    }

    private function getMenuItems(): array
    {
        return $this->findAll(Category::TABLE, Category::class);
    }
}