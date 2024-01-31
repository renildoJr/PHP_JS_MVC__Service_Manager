<?php
namespace src\controllers;
use src\models\FornecedorProdutoModel;

class FornecedorProdutoController extends Controller {
    public static function index() : string {
        $model = new FornecedorProdutoModel();

        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_FORNECEDOR_PRODUTO);
        }

        $model->selectAllRows(true, "fornecedor", "produto");
        return parent::render('modules/FornecedorProduto/listFornecedorProduto', $model);
    }

    public static function form() : string {
        $model = new FornecedorProdutoModel();
        if(isset($_GET["id"])) {
            $obj = $model->selectById((int) $_GET["id"]);
            $model = parent::setModel($model, $obj);
        }
        return parent::render('modules/FornecedorProduto/formFornecedorProduto', $model);
    }

    public static function save() : void {
        $model = new FornecedorProdutoModel();    
        $model = parent::setModel($model, $_POST);
        $model->save();
        print_r($_POST);
        header("Location: ".LINK_FORNECEDOR_PRODUTO);
    }
}