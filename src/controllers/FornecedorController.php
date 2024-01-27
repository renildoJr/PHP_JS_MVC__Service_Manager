<?php
namespace src\controllers;
use src\models\FornecedorModel;

class FornecedorController extends Controller {
    public static function index() : string {
        $model = new FornecedorModel();

        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_FORNECEDOR);
        }

        $model->selectAllRows();
        return parent::render('modules/Fornecedor/listFornecedor', $model);
    }

    public static function form() : string {
        $model = new FornecedorModel();
        if(isset($_GET["id"])) {
            $obj = $model->selectById((int) $_GET["id"]);
            $model = parent::setModel($model, $obj);
        }
        return parent::render('modules/Fornecedor/formFornecedor', $model);
    }

    public static function save() : void {
        $model = new FornecedorModel();    
        $model = parent::setModel($model, $_POST);
        $model->save();
        print_r($_POST);
        header("Location: ".LINK_FORNECEDOR);
    }
}