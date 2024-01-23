<?php
namespace src\DAO;
use src\models\ServicoModel;
use ReflectionClass;
use ReflectionMethod;

class ServicoDAO extends DAO {
     public function __construct() {
          parent::__construct();
          $this->entity = "servico";
     }

     public function insert(ServicoModel $model) : void {
          $reflection = new ReflectionClass($model);
          $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);

          $sql = "";
          $sqlPart1 = "";
          $sqlPart2 = "";
          $bindValues = [];

          foreach($methods as $method) {
               if(strpos($method->name, 'get') === 0 && $method->name != 'getId' && $method->name != 'getRows') {
                    $value = $method->invoke($model);
                    $keyName = lcfirst(substr($method->name, 3, strlen($method->name)));
                    $sqlPart1.=$keyName.", ";
                    $sqlPart2.="?, ";
                    array_push($bindValues, $value);
               }
          }

          $sqlPart1 = trim($sqlPart1, ", ");
          $sqlPart2 = trim($sqlPart2, ", ");

          $sql = "INSERT INTO servico ($sqlPart1) VALUES ($sqlPart2)";
          $stmt = $this->con->prepare($sql);

          for($i = 0; $i < count($bindValues); $i++) {
               $stmt->bindValue($i + 1, $bindValues[$i]);
          } 

          $stmt->execute();
     }

     public function update(ServicoModel $model) : void {
          $reflection = new ReflectionClass($model);
          $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);

          $sql = "";
          $sqlPart = "";
          $bindValues = [];

          foreach($methods as $method) {
               if(strpos($method->name, 'get') === 0 && $method->name != 'getId' && $method->name != 'getRows') {
                    $value = $method->invoke($model);
                    $keyName = lcfirst(substr($method->name, 3, strlen($method->name)));
                    $sqlPart.=$keyName." = ?, ";
                    array_push($bindValues, $value);
               }
          }

          $sqlPart = trim($sqlPart, ", ");
          $sql = "UPDATE servico SET $sqlPart WHERE id = ?";
          $stmt = $this->con->prepare($sql);

          for($i = 0; $i < count($bindValues); $i++) {
               $stmt->bindValue($i + 1, $bindValues[$i]);
          }

          $stmt->bindValue(count($bindValues) + 1, $model->getId());
          $stmt->execute();
     }
}