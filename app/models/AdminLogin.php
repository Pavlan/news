<?php


namespace app\models;


use app\core\Model;
use app\core\ModelInterface;

class AdminLogin extends Model implements ModelInterface

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

    private function setData($errorMessage = ''): void
    {
        $this->data['errorMessage'] = $errorMessage;
    }

    private function setMeta(): void
    {
        $this->meta['title'] = 'Login';
        $this->meta['description'] = '';
        $this->meta['keywords'] = '';
    }

    public function validate($name, $password): array
    {
        $author = $this->findByName(Author::TABLE, Author::class, $name);
        if ($author && password_verify($password, $author->getPassword())) {
            $_SESSION['userName'] = $author->getName();
            $_SESSION['authorId'] = $author->getId();
            $this->setData();
        } else {
            $this->setData('Invalid name or password');
        }
        return $this->data;
    }
}