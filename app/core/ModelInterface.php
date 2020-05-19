<?php


namespace app\core;


interface ModelInterface
{
    public const TABLE = '';

    public function getData();
    public function getMeta();
}