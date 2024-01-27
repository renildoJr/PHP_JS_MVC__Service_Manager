<?php
namespace src\models;
use src\DAO\ProdutoDAO;

class ProdutoModel extends Model {
    private string $nome;
    private string $descricao;
    private int $categoriaId;
    private array $catgRows;

    public function __construct() {
        $catgModel = new CategoriaProdutoModel();
        $catgModel->selectAllRows();
        $this->setCategoriaRows($catgModel->getRows());
        parent::$dao = new ProdutoDAO();
    }

    // Getters
    public function getNome() : ?string {
        return !empty($this->nome) ? $this->nome : "";
    }

    public function getDescricao() : ?string {
        return !empty($this->descricao) ? $this->descricao : "";
    }

    public function getCategoriaId() : ?string {
        return !empty($this->categoriaId) ? $this->categoriaId : "";
    }

    public function getCategoriaRows() : array {
        return $this->catgRows;
    }

    // Setters
    public function setNome(string $nome) {
        $this->nome = $nome;
    }
    
    public function setDescricao(string $descricao) {
        $this->descricao = $descricao;
    }

    public function setCategoriaId(int | string $categoriaId) : void {
        $this->categoriaId = (int) $categoriaId;
    }

    public function setCategoriaRows($catgRows) {
        $this->catgRows = $catgRows;
    }

}