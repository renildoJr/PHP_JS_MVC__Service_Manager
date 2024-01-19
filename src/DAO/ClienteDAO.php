<?php
namespace src\DAO;
use src\models\ClienteModel;

class ClienteDAO extends DAO {
    public function __construct() {
        parent::__construct();
        $this->entity = "cliente";
    }

   public function insert(ClienteModel $model) {
        parent::insertOrUpdate($model);
   }

   public function update(ClienteModel $model) {
        parent::insertOrUpdate($model);
   }
}