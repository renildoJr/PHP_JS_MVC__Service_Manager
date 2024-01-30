<?php
namespace src\DAO;

class FornecedorProdutoDAO extends DAO {
     public function __construct() {
          parent::__construct();
          $this->entity = "fornecedor_produto";
     }
}