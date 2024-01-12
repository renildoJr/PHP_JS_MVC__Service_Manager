<?php

class ProdutoController {
    public static function index() {
        $model = new ProdutoModel();
        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_VIEW_PRODUTOS);
        }
        $model->getAllRows();
        $model->rows;
        include "View/modules/Produto/listProdutos.php";
    }

    public static function form() {
        $model = new ProdutoModel();
        if(isset($_GET["id"])) {
            $model = $model->getById((int) $_GET["id"]);
        }
        include "View/modules/Produto/formProdutos.php";
    }
    
    public static function save() {
        $model = new ProdutoModel();
        $model->id = $_POST["prod_id"];
        $model->nome = $_POST["prod_nome"];
        $model->descricao = $_POST["prod_desc"];
        $model->save();
        header("Location: ".LINK_VIEW_PRODUTOS);
    }
}