<?php


namespace app\models;


use app\core\Model;
use app\core\ModelInterface;

class AdminPanel extends Model implements ModelInterface
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

    private function setData($authorId): void
    {
        $this->data['articles'] = $this->getAllArticlesByAuthorId($authorId);
    }

    private function setMeta(): void
    {
        $this->meta['title'] = 'Admin panel';
        $this->meta['description'] = '';
        $this->meta['keywords'] = '';
    }

    private function getAllArticlesByAuthorId($authorId): array
    {
        return $this->findAllByAuthorId(Article::TABLE, Article::class, $authorId);
    }
}