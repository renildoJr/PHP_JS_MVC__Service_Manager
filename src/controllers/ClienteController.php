<?php
namespace src\controllers;
use src\models\ClienteModel;

class ClienteController extends Controller {
    public static function index() : string {
        $model = new ClienteModel();

        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_CLIENTE);
        }

        $model->getAllRows();
        return parent::render('modules/Cliente/listCliente', $model);
    }

    public static function form() : string {
        $model = new ClienteModel();
        if(isset($_GET["id"])) {
            $model = $model->getById((int) $_GET["id"]);
        }
        return parent::render('modules/Cliente/formCliente', $model);
    }

    public static function save() : void {
        $model = new ClienteModel();
        foreach($_POST as $key=>$value) {
            $input = str_replace("input_", "", $key);
            if($input == "id") $value = (int) $value;
            $model->$input = $value;
        }
        $model->save();
        header("Location: ".LINK_CLIENTE);
    }
}