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
        
        $model->setId((int) $_POST["input_id"]);
        $model->setNome((string) $_POST["input_nome"]);
        $model->setDescricao((string) $_POST["input_descricao"]);
        $model->setCategoriaId((int) $_POST["input_categoriaId"]);
        $model->setPreco((float) $_POST["input_preco"]);
        $model->setCalculo((int) $_POST["input_calculo"]);

        $model->save();
        header("Location: ".LINK_SERVICO);
    }
}