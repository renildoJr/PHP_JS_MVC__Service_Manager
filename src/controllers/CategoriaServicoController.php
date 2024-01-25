<?php
namespace src\controllers;
use src\models\CategoriaServicoModel;

class CategoriaServicoController extends Controller {
    public static function index() : string {
        $model = new CategoriaServicoModel();

        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_CATEGORIA_SERVICO);
        }
        
        $model->selectAllRows();
        return parent::render('modules/CategoriaServico/listCategoriaServico', $model);
    }

    public static function form() : string {
        $model = new CategoriaServicoModel();
        if(isset($_GET["id"])) {
            $obj = $model->selectById((int) $_GET["id"]);
            $model = parent::setModel($model, $obj);
        }
        return parent::render('modules/CategoriaServico/formCategoriaServico', $model);
    }

    public static function save() : void {
        $model = new CategoriaServicoModel();    
        $model = parent::setModel($model, $_POST);
        $model->save();
        header("Location: ".LINK_CATEGORIA_SERVICO);
    }
}