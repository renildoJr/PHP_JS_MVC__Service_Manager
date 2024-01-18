<?php

namespace src\DAO;
use \PDO;
use src\models\ClienteModel;

class ClienteDAO extends DAO {
    public function __construct() {
        parent::__construct();
    }

    public function select() {
        $sql = 'SELECT * FROM cliente';
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id) {
        $sql = 'SELECT * FROM cliente WHERE id = ?';
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    public function insert(ClienteModel $model) {
        $sql = 'INSERT INTO cliente (nomecompleto, telefone, end_cep, end_rua, end_num, end_comp, end_bairro, end_estado, end_cidade) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        
        $stmt = $this->con->prepare($sql);
        
        $index = 1;
        foreach($model as $key=>$val) {
            if($key != "id"){
                $stmt->bindValue($index, $model->$key);
                $index ++;
            }
        }

        $stmt->execute();
    }

    public function update(ClienteModel $model) {
        $sql = 'UPDATE cliente 
                SET nomecompleto = ?, telefone = ?, end_cep = ?, end_rua = ?, end_num = ?, end_comp = ?, end_bairro = ?, end_estado = ?, end_cidade = ?
                WHERE id = ?';
    
        $stmt = $this->con->prepare($sql);

        $index = 1;
        foreach($model as $key=>$val) {
            if($key != "id"){
                $stmt->bindValue($index, $model->$key);
                $index ++;
            }
        }

        $stmt->bindValue($index, $model->id);
        $stmt->execute();
    }

    public function delete(int $id) {
        $sql = 'DELETE FROM cliente WHERE id = ?';
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}