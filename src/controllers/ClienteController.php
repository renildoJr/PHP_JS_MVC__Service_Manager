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
            $obj = $model->getById((int) $_GET["id"]);
            $model = parent::setModel($model, $obj);
        }
        return parent::render('modules/Cliente/formCliente', $model);
    }

    public static function save() : void {
        $model = new ClienteModel();   
        $model = parent::setModel($model, $_POST);
        $model->save();
        header("Location: ".LINK_CLIENTE);
    }
}