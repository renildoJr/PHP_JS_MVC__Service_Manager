<?php

namespace src\DAO;
use \PDO;
use src\Model\ProdutoModel;

class ProdutoDAO {
    private $con;

    public function __construct() {
        include "config.php";
        $this->con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    }

    public function select() {
        $sql = "SELECT * FROM produto";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id) {
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
        $stmt->bindValue(2, $model->descricao);
        $stmt->execute();
    }

    public function update(ProdutoModel $model) {
        $sql = "UPDATE produto SET nome = ?, descricao = ? WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }

    public function delete(int $id) {
        $sql = "DELETE FROM produto WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}