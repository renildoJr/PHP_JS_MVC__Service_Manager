<?php
namespace src\models;

abstract class Model {
    public int $id;
    public array $rows; 
    protected static object $dao;

    public function getAllRows() {
        $this->rows = self::$dao->select();
    }

    public function getById(int $id) {
        $obj = self::$dao->selectById($id);
        return ($obj) ? $obj : new ClienteModel();
    }

    public function save() {
        if(empty($this->id)) {
            self::$dao->insert($this);
        }else {
            self::$dao->update($this);
        }
    }

    public function delete(int $id) {
        self::$dao->delete($id);
    }
}