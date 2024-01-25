<?php
namespace src\DAO;

class ClienteDAO extends DAO {
    public function __construct() {
        parent::__construct();
        $this->entity = "cliente";
    }
}