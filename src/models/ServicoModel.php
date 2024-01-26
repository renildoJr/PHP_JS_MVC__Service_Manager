<?php
namespace src\models;
use src\DAO\ServicoDAO;
use src\models\CategoriaServicoModel;

class ServicoModel extends Model {
    private string $nome;
    private string $descricao;
    private int $categoriaId;
    private float $preco;
    private int $calculo;
    private array $catgRows;

    public function __construct() {
        $catgModel = new CategoriaServicoModel();
        $catgModel->selectAllRows();
        $this->setCategoriaRows($catgModel->getRows());
        parent::$dao = new ServicoDAO();

    }

    // Getters
    public function getCategoriaRows() : array {
        return $this->catgRows;
    }

    public function getNome() : string {
        return !empty($this->nome) ? $this->nome : "";
    }
    
    public function getDescricao() : string {
        return !empty($this->descricao) ? $this->descricao : "";
    }

    public function getCategoriaId() : int | string {
        return !empty($this->categoriaId) ? $this->categoriaId : "";
    }

    public function getPreco() : float | string {
        return !empty($this->preco) ? $this->preco : "";
    }
    
    public function getCalculo() : int {
        return !empty($this->calculo) ? $this->calculo : 1;
    }

    // Setters
    public function setCategoriaRows($catgRows) {
        $this->catgRows = $catgRows;
    }

    public function setDescricao(string $descricao) : void {
        $this->descricao = $descricao;
    }

    public function setCategoriaId(int | string $categoriaId) : void {
        $this->categoriaId = (int) $categoriaId;
    }
    
    public function setNome(string $nome) : void {
        $this->nome = $nome;
    }

    public function setPreco(float $preco) : void {
        $this->preco = $preco;
    }

    public function setCalculo(float $calculo) : void {
        $this->calculo = $calculo;
    }

}