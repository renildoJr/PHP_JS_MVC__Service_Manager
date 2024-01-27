<?php
namespace src\DAO;

class CategoriaProdutoDAO extends DAO {
    public function __construct() {
        parent::__construct();
        $this->entity = "catg_produto";
   }
}