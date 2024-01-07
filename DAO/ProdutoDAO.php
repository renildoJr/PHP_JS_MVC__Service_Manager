<?php

class ProdutoDAO {
    private $con;

    public function __construct() {
        include "config.php";
        $this->con = $con;
    }

    public function select(int $id = null) {
        if($id != null) {
            $sql = "SELECT * FROM produto WHERE id = $id";
        }else {
            $sql = "SELECT * FROM produto";
        }
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert(ProdutoModel $model) {
        $sql = "INSERT INTO produto (nome, descricao) VALUES (?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->desc);
        $stmt->execute();
    }
}