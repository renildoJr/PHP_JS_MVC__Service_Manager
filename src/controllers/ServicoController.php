<?php
namespace src\controllers;
use src\models\ServicoModel;

class ServicoController extends Controller {
    public static function index() : string {
        $model = new ServicoModel();

        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_SERVICO);
        }

        $model->getAllRows();
        return parent::render('modules/Servico/listServico', $model);
    }

    public static function form() : string {
        $model = new ServicoModel();
        if(isset($_GET["id"])) {
            $obj = $model->getById((int) $_GET["id"]);
            $model = parent::setModel($model, $obj);
        }
        return parent::render('modules/Servico/formServico', $model);
    }

    public static function save() : void {
        $model = new ServicoModel();    
        $model = parent::setModel($model, $_POST);
        $model->save();
        header("Location: ".LINK_SERVICO);
    }
}