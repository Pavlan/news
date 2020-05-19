<?php


namespace app\models;


use app\core\Model;

class Category extends Model
{
    public const TABLE = 'category';

    private $id;
    private $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}