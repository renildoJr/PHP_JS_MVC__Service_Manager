<?php
namespace src\DAO;

class ServicoDAO extends DAO {
     public function __construct() {
          parent::__construct();
          $this->entity = "servico";
     }
}