<?php
namespace src\models;
use src\DAO\ClienteDAO;

class ClienteModel extends Model {
    private string $nomeCompleto; 
    private int $telefone;
    private int $end_cep;
    private int $end_num;
    private string $end_comp;

    public function __construct() {
        parent::$dao = new ClienteDAO();
    }

    public function getNomeCompleto() : string {
        return !empty($this->nomeCompleto) ? $this->nomeCompleto : "";
    }

    // Getters
    public function getTelefone() : int | string {
        return !empty($this->telefone) ? $this->telefone : "";
    }
    
    public function getEnd_cep() : int | string {
        return !empty($this->end_cep) ? $this->end_cep : "";
    }
        
    public function getEnd_num() : int | string {
        return !empty($this->end_num) ? $this->end_num : "";
    }

    public function getEnd_comp() : string {
        return !empty($this->end_comp) ? $this->end_comp : "";
    }

    // Setters
    public function setNomeCompleto(string $nomeCompleto) : void {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function setTelefone(int $telefone) : void {
        $this->telefone = $telefone;
    }

    public function setEnd_cep(int $end_cep) : void {
        $this->end_cep = $end_cep;
    }

    public function setEnd_num(int $end_num) : void {
        $this->end_num = $end_num;
    }

    public function setEnd_comp(string $end_comp) : void {
        $this->end_comp = $end_comp;
    }
}