<?php
namespace src\models;
use src\DAO\ClienteDAO;

class ClienteModel extends Model {
    public $id, $nomeCompleto, $telefone, $end_cep, $end_rua, $end_num, $end_comp, $end_bairro, $end_estado, $end_cidade;

    public function getAllRows() {
        $dao = new ClienteDAO();
        $this->rows = $dao->select();
    }

    public function getById(int $id) {
        $dao = new ClienteDAO();
        $obj = $dao->selectById($id);
        return ($obj) ? $obj : new ClienteModel();
    }

    public function save() {
        $dao = new ClienteDAO();
        if(empty($this->id)) {
            var_dump($this);
            $dao->insert($this);
        }else {
            $dao->update($this);
        }
    }

    public function delete(int $id) {
        $dao = new ClienteDAO();
        $dao->delete($id);
    }
}