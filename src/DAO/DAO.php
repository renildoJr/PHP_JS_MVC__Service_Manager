<?php

namespace src\DAO;
use \PDO;

abstract class DAO {
    protected $con;

    public function __construct() {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $this->con = new PDO($dsn, DB_USER, DB_PASS);
    }

}