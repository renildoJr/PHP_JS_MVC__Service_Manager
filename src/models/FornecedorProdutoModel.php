<?php
namespace src\models;
use src\DAO\FornecedorProdutoDAO;

class FornecedorProdutoModel extends Model {
    public function __construct() {
        parent::$dao = new FornecedorProdutoDAO();
    }

    // public function selectFornecedorProduto() : array {
        // $output = [["fornecedor" => "Armazém Teste"], "produtos" => ["rebite", "arruela", "parafuso"]];

    // }

}