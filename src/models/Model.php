<?php
namespace src\models;

abstract class Model {
    private int $id;
    public array $rows; 
    protected static object $dao;

    public function getAllRows() : void {
        $this->rows = self::$dao->select();
    }

    public function getById(int $id) : object {
        $obj = self::$dao->selectById($id);
        return ($obj) ? $obj : new ClienteModel();
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

    public function getId() : int {
        return $this->id;
    }

    public function setId($id) : void {
        $this->id = $id;
    }
}