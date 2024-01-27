<?php
namespace src\controllers;
use src\models\CategoriaProdutoModel;

class CategoriaProdutoController extends Controller {
    public static function index() : string {
        $model = new CategoriaProdutoModel();

        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_CATEGORIA_PRODUTO);
        }
        
        $model->selectAllRows();
        return parent::render('modules/CategoriaProduto/listCategoriaProduto', $model);
    }

    public static function form() : string {
        $model = new CategoriaProdutoModel();
        if(isset($_GET["id"])) {
            $obj = $model->selectById((int) $_GET["id"]);
            $model = parent::setModel($model, $obj);
        }
        return parent::render('modules/CategoriaProduto/formCategoriaProduto', $model);
    }

    public static function save() : void {
        $model = new CategoriaProdutoModel();    
        $model = parent::setModel($model, $_POST);
        $model->save();
        header("Location: ".LINK_CATEGORIA_PRODUTO);
    }
}