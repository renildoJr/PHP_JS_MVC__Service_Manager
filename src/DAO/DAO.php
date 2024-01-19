<?php
namespace src\DAO;
use \PDO;

abstract class DAO {
    protected $con, $entity, $class;

    public function __construct() {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $this->con = new PDO($dsn, DB_USER, DB_PASS);
    }

    public function select() {
        $sql = "SELECT * FROM $this->entity";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id) {
        $sql = "SELECT * FROM $this->entity WHERE id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function delete(int $id) {
        $sql = "DELETE FROM $this->entity WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
   
    protected function insertOrUpdate(object $model, int $id = null) {
        $sqlBinds = "";
        $sqlArgs = "";

        if(empty($id)) {
            foreach($model as $key=>$val) {
                if($key != "id") {
                    $sqlArgs.=$key.", ";
                    $sqlBinds.= ":".$key.", ";
                }
            }
            $sqlArgs = rtrim($sqlArgs, ", ");
            $sqlBinds = rtrim($sqlBinds, ", ");

            $sql = "INSERT INTO $this->entity ($sqlArgs) VALUES ($sqlBinds)";
            $stmt = $this->con->prepare($sql);

            $sqlArgsArr = explode(", ", $sqlArgs);

            foreach($sqlArgsArr as $arg) {
               $stmt->bindValue(":".$arg, $model->$arg);
            }

        }else {

            foreach($model as $key=>$val) {
                if($key != "id") {
                    $sqlArgs.=$key." = :$key, ";
                    $sqlBinds.= ":".$key.", ";
                }
            }

            $sqlArgs = rtrim($sqlArgs, ", ");
            $sqlBinds = rtrim($sqlBinds, ", ");
            $sql = "UPDATE $this->entity SET $sqlArgs WHERE id = :id";
            $stmt = $this->con->prepare($sql);

            $sqlArgsArr = explode(", ", $sqlArgs);

            foreach($sqlArgsArr as $arg) {
                $stmt->bindValue(":".$arg, $model->$arg);
             }

            $stmt->bindValue(":id", $model->id);
            
        }

        $stmt->execute();
    }

}