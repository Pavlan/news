<?php


namespace app\config;


class DbConfig
{
    private $host = 'localhost';
    private $dbname = 'news';
    private $user = 'root';
    private $password = '';

    public function getHost(): string
    {
        return $this->host;
    }

    public function getDbname(): string
    {
        return $this->dbname;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}