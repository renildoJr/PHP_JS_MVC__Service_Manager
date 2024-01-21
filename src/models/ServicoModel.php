<?php
namespace src\models;
use src\DAO\ServicoDAO;

class ServicoModel extends Model {
    private string $nome;
    private string $descricao;
    private int $categoriaId;
    private float $preco;
    private int $calculo;

    public function __construct() {
        parent::$dao = new ServicoDAO();
    }

    public function getNome() : string {
        return $this->nome;
    }

    public function setNome(string $nome) : void {
        $this->nome = $nome;
    }

    public function getDescricao() : string {
        return $this->descricao;
    }

    public function setDescricao(string $descricao) : void {
        $this->descricao = $descricao;
    }

    public function getCategoriaId() : int {
        return $this->categoriaId;
    }

    public function setCategoriaId(int $categoriaId) : void {
        $this->categoriaId = $categoriaId;
    }

    public function getPreco() : float {
        return $this->preco;
    }

    public function setPreco(float $preco) : void {
        $this->preco = $preco;
    }

    public function getCalculo() : float {
        return $this->calculo;
    }

    public function setCalculo(float $calculo) : void {
        $this->calculo = $calculo;
    }

}