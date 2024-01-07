<?php

class ProdutoModel {
    public $id, $nome, $desc;
    public $rows;

    public function selectAll() {
        include "DAO/ProdutoDAO.php";
        $dao = new ProdutoDAO();
        $this->rows = $dao->select(); 
    }

    public function selectById(int $id) {
        // include "DAO/ProdutoDAO.php";
        // $dao = new ProdutoDAO();
        // $dao->select($id); 
    }

    public function insert() {
        include "DAO/ProdutoDAO.php";
        $dao = new ProdutoDAO();
        $dao->insert($this);
    }
}