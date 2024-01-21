<?php
namespace src\DAO;
use src\models\ServicoModel;

class ServicoDAO extends DAO {
     public function __construct() {
          parent::__construct();
          $this->entity = "servico";
     }

     public function insert(ServicoModel $model) : void {
          $sql = "INSERT INTO $this->entity (nome, descricao, categoriaId, preco, calculo) VALUES (?, ?, ?, ?, ?)";
          $stmt = $this->con->prepare($sql);
          $stmt->bindValue(1, $model->getNome());
          $stmt->bindValue(2, $model->getDescricao());
          $stmt->bindValue(3, $model->getCategoriaId());
          $stmt->bindValue(4, $model->getPreco());
          $stmt->bindValue(5, $model->getCalculo());
          $stmt->execute();
     }

     public function update(ServicoModel $model) :void {
          $sql = "UPDATE $this->entity SET nome = ?, descricao = ?, categoriaId = ?, preco = ?, calculo = ? WHERE id = ?";
          $stmt = $this->con->prepare($sql);
          $stmt->bindValue(1, $model->getNome());
          $stmt->bindValue(2, $model->getDescricao());
          $stmt->bindValue(3, $model->getCategoriaId());
          $stmt->bindValue(4, $model->getPreco());
          $stmt->bindValue(5, $model->getCalculo());
          $stmt->bindValue(6, $model->getId());
          $stmt->execute();
     }
}