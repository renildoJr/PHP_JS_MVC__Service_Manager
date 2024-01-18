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
    
        $stmt->bindValue(1, $model->nomeCompleto);
        $stmt->bindValue(2, $model->telefone);
        $stmt->bindValue(3, $model->end_cep);
        $stmt->bindValue(4, $model->end_rua);
        $stmt->bindValue(5, $model->end_num);
        $stmt->bindValue(6, $model->end_comp);
        $stmt->bindValue(7, $model->end_bairro);
        $stmt->bindValue(8, $model->end_estado);
        $stmt->bindValue(9, $model->end_cidade);

        int $i = 1;
        foreach($module as $key=>$val) {
          if(
            $stmt->bindValue($i, $model->$key);
        }
    
        //$stmt->execute();
    }

    public function update(ClienteModel $model) {
        $sql = 'UPDATE cliente 
                SET nomecompleto = ?, telefone = ?, end_cep = ?, end_rua = ?, end_num = ?, end_comp = ?, end_bairro = ?, end_estado = ?, end_cidade = ?
                WHERE id = ?';
    
        $stmt = $this->con->prepare($sql);
    
        $stmt->bindValue(1, $model->nomeCompleto);
        $stmt->bindValue(2, $model->telefone);
        $stmt->bindValue(3, $model->end_cep);
        $stmt->bindValue(4, $model->end_rua);
        $stmt->bindValue(5, $model->end_num);
        $stmt->bindValue(6, $model->end_comp);
        $stmt->bindValue(7, $model->end_bairro);
        $stmt->bindValue(8, $model->end_estado);
        $stmt->bindValue(9, $model->end_cidade);
        $stmt->bindValue(10, $model->id);


        for()


        $stmt->execute();
    }

    public function delete(int $id) {
        $sql = 'DELETE FROM cliente WHERE id = ?';
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}