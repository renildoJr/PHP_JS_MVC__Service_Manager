<?php

class ProdutoDAO {
    private $con;

    public function __construct() {
        include "config.php";
        $this->con = $con;
    }

    public function select(int $id = null) {
        $sql = "SELECT * FROM produto";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id) {
        include_once "Model/ProdutoModel.php";
        $sql = "SELECT * FROM produto WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function insert(ProdutoModel $model) {
        $sql = "INSERT INTO produto (nome, descricao) VALUES (?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->desc);
        $stmt->execute();
    }
}