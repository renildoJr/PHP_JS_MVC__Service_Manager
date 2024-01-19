<?php
namespace src\models;
use src\DAO\ClienteDAO;

class ClienteModel extends Model {
    public string $nomeCompleto; 
    public int $telefone;
    public int $end_cep;
    public string $end_rua;
    public int $end_num;
    public string $end_comp;
    public string $end_bairro;
    public string $end_estado;
    public string $end_cidade;

    public function __construct() {
        parent::$dao = new ClienteDAO();
    }

}