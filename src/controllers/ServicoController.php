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
            $model = $model->getById((int) $_GET["id"]);
        }
        return parent::render('modules/Servico/formServico', $model);
    }

    public static function save() : void {
        $model = new ServicoModel();;
        foreach($_POST as $key=>$value) {
            $input = str_replace("input_", "", $key);
            if($input == "id") $value = (int) $value;
            $model->$input = $value;
        }
        $model->save();
        header("Location: ".LINK_SERVICO);
    }
}