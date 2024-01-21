<?php
namespace src\DAO;
use \PDO;
use PDOException;

abstract class DAO {
    protected object $con;
    protected string $entity;

    public function __construct() {
        try {
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            $this->con = new PDO($dsn, DB_USER, DB_PASS);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "ERRO: ".$e->getMessage();
        }
    }

    public function select() : array {
        $sql = "SELECT * FROM $this->entity";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id) : object {
        $sql = "SELECT * FROM $this->entity WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function delete(int $id) : void {
        $sql = "DELETE FROM $this->entity WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}