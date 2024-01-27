<?php
namespace src\controllers;
use src\models\ProdutoModel;

class ProdutoController  extends Controller {
    public static function index() {
        $model = new ProdutoModel();
        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_PRODUTO);
        }
        $model->selectAllRows();
        parent::render("modules/Produto/listProduto", $model);
    }

    public static function form() : string {
        $model = new ProdutoModel();
        if(isset($_GET["id"])) {
            $obj = $model->selectById((int) $_GET["id"]);
            $model = parent::setModel($model, $obj);
        }
        return parent::render('modules/Produto/formProduto', $model);
    }

    public static function save() : void {
        $model = new ProdutoModel();    
        $model = parent::setModel($model, $_POST);
        $model->save();
        print_r($_POST);
        header("Location: ".LINK_PRODUTO);
    }
}