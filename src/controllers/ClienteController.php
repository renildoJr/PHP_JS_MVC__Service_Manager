<?php

namespace src\controllers;

use src\models\ClienteModel;

class ClienteController extends Controller {
    public static function index() {
        $model = new ClienteModel();

        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_CLIENTE);
        }

        $model->getAllRows();
        parent::render('modules/Cliente/listCliente', $model);
    }

    public static function form() {
        $model = new ClienteModel();

        if(isset($_GET["id"])) {
            $model = $model->getById((int) $_GET["id"]);
        }

        parent::render('modules/Cliente/formCliente', $model);
    }

    public static function save() {
        $model = new ClienteModel();


        var_dump($_POST);

        $model->id = $_POST["input_id"];
        $model->nomeCompleto = $_POST["input_nomeCompleto"];
        $model->telefone = $_POST["input_telefone"];
        $model->end_cep = $_POST["input_end_cep"];
        $model->end_rua = $_POST["input_end_rua"];
        $model->end_num = $_POST["input_end_num"];
        $model->end_comp = $_POST["input_end_comp"];
        $model->end_bairro = $_POST["input_end_bairro"];
        $model->end_estado = $_POST["input_end_estado"];
        $model->end_cidade = $_POST["input_end_cidade"];

        $model->save();
    }
}