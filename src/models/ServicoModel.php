<?php
namespace src\models;
use src\DAO\ServicoDAO;

class ServicoModel extends Model {
    public string $nome;
    public string $descricao;
    public int $categoriaId;

    public function __construct() {
        parent::$dao = new ServicoDAO();
    }

}