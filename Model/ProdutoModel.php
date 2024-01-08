<?php

class ProdutoModel {
    public $id, $nome, $desc;
    public $rows;

    public function selectAll() {
        include "DAO/ProdutoDAO.php";
        $dao = new ProdutoDAO();
        $this->rows = $dao->select(); 
    }

    public function getById(int $id) {
        include "DAO/ProdutoDAO.php";
        $dao = new ProdutoDAO();
        $obj = $dao->selectById($id); 
        return ($obj) ? $obj : new ProdutoModel();
    }

    public function insert() {
        include "DAO/ProdutoDAO.php";
        $dao = new ProdutoDAO();
        $dao->insert($this);
    }
}