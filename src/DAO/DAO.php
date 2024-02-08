<?php
namespace src\DAO;
use \PDO;
use PDOException;
use src\models\Model;
use ReflectionClass;
use ReflectionMethod;

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

    public function select(bool $join = false, string $entity2 = "", string $entity3 = "") : array {
        if($join && $entity2 && $entity3) {
            $sql = "SELECT $entity2.nome AS tituloFornecedor, GROUP_CONCAT(DISTINCT $entity3.id, $entity3.nome) AS produtos_fornecidos
                FROM $entity2
                JOIN $this->entity ON $entity2.id = $this->entity.{$entity2}Id
                LEFT JOIN $entity3 ON $this->entity.{$entity3}Id = {$entity3}Id
                GROUP BY $entity2.id";
        }else {
            $sql = "SELECT * FROM $this->entity";
        }
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

    public function insert(Model $model) : void {
        $reflection = new ReflectionClass($model);
        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
    
        $sql = "";
        $sqlPart1 = "";
        $sqlPart2 = "";
        $bindValues = [];
    
        foreach($methods as $method) {
            if(strpos($method->name, 'get') === 0 && $method->name != 'getId' && $method->name != 'getRows' && $method->name != 'getCategoriaRows') {
                $value = $method->invoke($model);
                $keyName = lcfirst(substr($method->name, 3, strlen($method->name)));
                $sqlPart1.=$keyName.", ";
                $sqlPart2.="?, ";
                array_push($bindValues, $value);
            }
        }
    
        $sqlPart1 = trim($sqlPart1, ", ");
        $sqlPart2 = trim($sqlPart2, ", ");
    
        $sql = "INSERT INTO $this->entity ($sqlPart1) VALUES ($sqlPart2)";
        $stmt = $this->con->prepare($sql);
    
        for($i = 0; $i < count($bindValues); $i++) {
            $stmt->bindValue($i + 1, $bindValues[$i]);
        } 
    
        $stmt->execute();
    }

    public function update(Model $model) : void {
        $reflection = new ReflectionClass($model);
        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
    
        $sql = "";
        $sqlPart = "";
        $bindValues = [];
    
        foreach($methods as $method) {
            if(strpos($method->name, 'get') === 0 && $method->name != 'getId' && $method->name != 'getRows' && $method->name != 'getCategoriaRows') {
                $value = $method->invoke($model);
                $keyName = lcfirst(substr($method->name, 3, strlen($method->name)));
                $sqlPart.=$keyName." = ?, ";
                array_push($bindValues, $value);
            }
        }
        
        $sqlPart = trim($sqlPart, ", ");
        $sql = "UPDATE $this->entity SET $sqlPart WHERE id = ?";
        $stmt = $this->con->prepare($sql);

        for($i = 0; $i < count($bindValues); $i++) {
            $stmt->bindValue($i + 1, $bindValues[$i]);
        }
    
        $stmt->bindValue(count($bindValues) + 1, $model->getId());
        $stmt->execute();
    }
}