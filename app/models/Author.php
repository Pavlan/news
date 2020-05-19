<?php


namespace app\models;


use app\core\Model;

class Author extends Model
{
    public const TABLE = 'authors';

    private $id;
    private $name;
    private $password;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }
}