<?php


namespace app\models;


use app\core\Model;

class Article extends Model
{
    public const TABLE = 'news';

    protected $id;
    private $title;
    private $content;
    private $authorId;
    private $time;
    private $categoryId;
    private $imagePath;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorId($authorId): void
    {
        $this->authorId = $authorId;
    }

    public function timeToDb()
    {
        return $this->time;
    }

    public function getTime(): string
    {
        $timestamp = strtotime($this->time);
        $timeDiff = time() - $timestamp;
        if ($this->isNewArticle($timeDiff)) {
            return date('G', $timeDiff) . ' h';
        }
        return date('j F', $timestamp);
    }

    public function setTime($time): void
    {
        $this->time = $time;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function setImagePath($imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getAuthorName()
    {
        $authorId = $this->getAuthorId();
        $authorObject = $this->findById(Author::TABLE, Author::class, $authorId);
        return $authorObject->getName();
    }

    public function getCategoryName()
    {
        $categoryId = $this->getCategoryId();
        $categoryObject = $this->findById(Category::TABLE, Category::class, $categoryId);
        return $categoryObject->getName();
    }

    private function isNewArticle($timeDiff): bool
    {
        return $timeDiff < (24 * 60 * 60);
    }
}