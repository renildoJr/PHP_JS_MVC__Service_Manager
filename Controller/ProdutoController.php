<?php

class ProdutoController {
    public static function index() {
        include "Model/ProdutoModel.php";
        $model = new ProdutoModel();
        $model->selectAll();
        $model->rows;

        include "View/modules/Produto/listProdutos.php";
    }

    public static function form() {
        include "Model/ProdutoModel.php";
        $model = new ProdutoModel();
        
        if(isset($_GET["id"])) {
            $model = $model->getById((int) $_GET["id"]);
        }

        include "View/modules/Produto/formProdutos.php";
    }
    
    public static function save() {
        include "Model/ProdutoModel.php";
        $model = new ProdutoModel();
        $model->nome = $_POST["prod_nome"];
        $model->desc = $_POST["prod_desc"];
        $model->insert();
        header("Location: ".LINK_VIEW_PRODUTOS);
    }
}