<?php


namespace app\core;


use app\config\DbConfig;
use app\db\Db;

abstract class Model
{
    protected $db;
    protected $data;
    protected $meta;

    public function __construct()
    {
        $dbConfig = new DbConfig();
        $this->db = new Db($dbConfig);
    }

    public function findAll($table, $class): array
    {
        $sql = 'SELECT * FROM ' . $table . ' ORDER BY id DESC';
        return $this->db->query($sql, $class);
    }

    public function findAllByAuthorId($table, $class, $authorId): array
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE authorId = :authorId' . ' ORDER BY id DESC';
        return $this->db->query($sql, $class, [':authorId' => $authorId]);
    }

    public function findByName($table, $class, $name)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE name = :name';
        return $this->db->queryOne($sql, $class, [':name' => $name]);
    }

    public function findAllByCategoryId($table, $class, $categoryId): array
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE categoryId = :categoryId';
        return $this->db->query($sql, $class, [':categoryId' => $categoryId]);
    }

    public function findById($table, $class, $id)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE id = :id';
        return $this->db->queryOne($sql, $class, [':id' => $id]);
    }

    public function update($table, $object): bool
    {
        $cols = 'title = :title, content = :content, categoryId = :categoryId, imagePath = :imagePath';
        $data = [
            ':id' => $object->getId(),
            ':title' => $object->getTitle(),
            ':content' => $object->getContent(),
            ':categoryId' => $object->getCategoryId(),
            ':imagePath' => $object->getImagePath()
        ];
        $sql = 'UPDATE ' . $table . ' SET ' . $cols . ' WHERE id = :id';
        return $this->db->execute($sql, $data);
    }

    public function insert($table, $object): bool
    {
        $cols = 'title, content, authorId, time, categoryId, imagePath';
        $data = [
            ':title' => $object->getTitle(),
            ':content' => $object->getContent(),
            ':authorId' => $object->getAuthorId(),
            ':time' => $object->timeToDb(),
            ':categoryId' => $object->getCategoryId(),
            ':imagePath' => $object->getImagePath()
        ];
        $sql = 'INSERT INTO ' . $table . ' (' . $cols . ') VALUES (' . implode(', ', array_keys($data)) . ')';
        return $this->db->execute($sql, $data);
    }

    public function delete($table, $id): bool
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE id = :id';
        return $this->db->execute($sql, [':id' => $id]);
    }
}