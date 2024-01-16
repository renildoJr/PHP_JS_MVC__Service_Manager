<?php

namespace src\DAO;
use \PDO;

abstract class DAO {
    protected $con;

    public function __construct() {
        $dsn = "mysql:host={$_ENV['db']['host']};dbname={$_ENV['db']['database']}";
        $this->con = new PDO($dsn, $_ENV['db']['user'], $_ENV['db']['pass']);
    }

}