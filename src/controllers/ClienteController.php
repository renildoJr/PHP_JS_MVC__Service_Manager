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
       
        $model->setId((int) $_POST["input_id"]);
        $model->setNomeCompleto((string) $_POST["input_nomeCompleto"]);
        $model->setTelefone((int) $_POST["input_telefone"]);
        $model->setEnd_cep((int) $_POST["input_end_cep"]);
        $model->setEnd_num((int) $_POST["input_end_num"]);
        $model->setEnd_comp((string) $_POST["input_end_comp"]);
        
        $model->save();
        header("Location: ".LINK_CLIENTE);
    }
}