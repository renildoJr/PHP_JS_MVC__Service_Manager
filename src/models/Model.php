<?php
namespace src\models;

abstract class Model {
    private int $id;
    private array $rows; 
    protected static object $dao;

    public function selectAllRows() : void {
        $this->setRows(self::$dao->select());
    }

    public function selectById(int $id) : object {
        $obj = self::$dao->selectById($id);
        return ($obj) ? $obj : new ServicoModel();
    }

    public function save() : void {
        if(empty($this->id)) {
            self::$dao->insert($this);
        }else {
            self::$dao->update($this);
        }
    }

    public function delete(int $id) : void {
        self::$dao->delete($id);
    }

    // Getters
    public function getId() : int | NULL {
        return !empty($this->id) ? $this->id : NULL;
    }

    public function getRows() : array | NULL {
        return $this->rows ? $this->rows : NULL;
    }

    // Setters
    public function setId(int | string $id) : void {
        $this->id = (int) $id;
    }

    private function setRows($rows) {
        $this->rows = $rows;
    }

}