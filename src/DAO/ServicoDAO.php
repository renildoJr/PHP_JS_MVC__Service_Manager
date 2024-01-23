<?php
namespace src\DAO;
use src\models\ServicoModel;

class ServicoDAO extends DAO {
     public function __construct() {
          parent::__construct();
          $this->entity = "servico";
     }

     public function insert(ServicoModel $model) : void {
          parent::insertOrUpdate($model);
     }

     public function update(ServicoModel $model) : void {
          parent::insertOrUpdate($model);
     }
}