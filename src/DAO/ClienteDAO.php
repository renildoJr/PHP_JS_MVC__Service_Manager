<?php
namespace src\DAO;
use src\models\ClienteModel;

class ClienteDAO extends DAO {
    public function __construct() {
        parent::__construct();
        $this->entity = "cliente";
    }

    public function insert(ClienteModel $model) : void {
        $sql = "INSERT INTO $this->entity (nomeCompleto, telefone, end_cep, end_num, end_comp) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $model->getNomeCompleto());
        $stmt->bindValue(2, $model->getTelefone());
        $stmt->bindValue(3, $model->getEnd_cep());
        $stmt->bindValue(4, $model->getEnd_num());
        $stmt->bindValue(5, $model->getEnd_comp());
        $stmt->execute();
        
    }

    public function update(ClienteModel $model) :void {
            $sql = "UPDATE $this->entity SET nomeCompleto = ?, telefone = ?, end_cep = ?, end_num = ?, end_comp = ? WHERE id = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $model->getNomeCompleto());
            $stmt->bindValue(2, $model->getTelefone());
            $stmt->bindValue(3, $model->getEnd_cep());
            $stmt->bindValue(4, $model->getEnd_num());
            $stmt->bindValue(5, $model->getEnd_comp());
            $stmt->bindValue(6, $model->getId());
            $stmt->execute();
    }
}