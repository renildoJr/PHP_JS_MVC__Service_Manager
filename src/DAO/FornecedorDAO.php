<?php
namespace src\DAO;

class FornecedorDAO extends DAO {
     public function __construct() {
          parent::__construct();
          $this->entity = "fornecedor";
     }
}