<?php
namespace src\models;
use src\DAO\FornecedorDAO;

class FornecedorModel extends Model {
    private string $nome;
    private string $descricao;

    public function __construct() {
        parent::$dao = new FornecedorDAO();
    }

    public function getNome() : string {
        return !empty($this->nome) ? $this->nome : "";
    }
    
    public function getDescricao() : string {
        return !empty($this->descricao) ? $this->descricao : "";
    }

    // Setters
    public function setNome(string $nome) : void {
        $this->nome = $nome;
    }

    public function setDescricao(string $descricao) : void {
        $this->descricao = $descricao;
    }
}