<?php
namespace src\DAO;

class CategoriaServicoDAO extends DAO {
     public function __construct() {
          parent::__construct();
          $this->entity = "catg_servico";
     }
}