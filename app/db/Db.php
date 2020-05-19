<?php


namespace app\db;


use app\config\DbConfig;
use PDO;

class Db
{
    protected $dbh;

    public function __construct(DbConfig $config)
    {
        $this->dbh = new PDO(
            'mysql:host=' . $config->getHost() . ';dbname=' . $config->getDbname(),
            $config->getUser(),
            $config->getPassword()
        );
    }

    public function query($sql, $class, $params = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function queryOne($sql, $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $sth->setFetchMode(PDO::FETCH_CLASS, $class);
        return $sth->fetch();
    }
}