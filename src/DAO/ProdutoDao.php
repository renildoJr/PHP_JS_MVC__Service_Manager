<?php
namespace src\DAO;

class ProdutoDAO extends DAO {
    public function __construct() {
        parent::__construct();
        $this->entity = "produto";
    }
}