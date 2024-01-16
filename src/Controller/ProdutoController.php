<?php

namespace src\Controller;
use src\Model\ProdutoModel;

class ProdutoController extends Controller {
    public static function index() {
        $model = new ProdutoModel();
        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_VIEW_PRODUTOS);
        }
        $model->getAllRows();
        $model->rows;
        // include "src/View/modules/Produto/listProdutos.php";
        parent::render("Produto/listProdutos", $model);
    }

    public static function form() {
        $model = new ProdutoModel();
        if(isset($_GET["id"])) {
            $model = $model->getById((int) $_GET["id"]);
        }
        parent::render("Produto/formProdutos", $model);
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