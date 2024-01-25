<?php
namespace src\models;
use src\DAO\CategoriaServicoDAO;

class CategoriaServicoModel extends Model {
    private string $nome;
    private string $descricao;

    public function __construct() {
        parent::$dao = new CategoriaServicoDAO();
    }

    // Getters
    public function getNome() : string {
        return !empty($this->nome) ? $this->nome : "";
    }
    
    public function getDescricao() : string {
        return !empty($this->descricao) ? $this->descricao : "";
    }

    // Setters
    public function setDescricao(string $descricao) : void {
        $this->descricao = $descricao;
    }

    public function setNome(string $nome) : void {
        $this->nome = $nome;
    }
}