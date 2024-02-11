<?php
namespace src\controllers;
use src\models\FornecedorModel;
use src\models\FornecedorProdutoModel;
use src\models\ProdutoModel;

class FornecedorProdutoController extends Controller {
    public static function index() : string {
        $model = new FornecedorProdutoModel();
        

        if(isset($_GET["id"])) {
            $model->delete((int) $_GET["id"]);
            header("Location: ".LINK_FORNECEDOR_PRODUTO);
        }

        $model->selectAllRows(true, "fornecedor", "produto");
        $model = $model->getRows();

        $fornecedores = [];
        $output = [];

        for($i = 0; $i < count($model); $i++) {
            $fornecedorId = $model[$i]->fornecedorId;
            $produtoId = $model[$i]->produtoId;
            if(isset($fornecedores[$fornecedorId])) {
                array_push($fornecedores[$fornecedorId], $produtoId);
            }else {
                $fornecedores[$fornecedorId] = [$produtoId];
            }
        }

        $model = new FornecedorModel();
        foreach($fornecedores as $key => $val) {
            array_push($output, ["fornecedor" => ["id" => $key, "nome" => $model->selectById($key)->nome]]);
        }

        $model = new ProdutoModel();
        for($i = 0; $i < count($fornecedores); $i++) {
            $output[$i]["produtos"] = []; 
            $fornecedorId = $output[$i]["fornecedor"]["id"];
            foreach($fornecedores[$fornecedorId] as $prod) {
                array_push($output[$i]["produtos"], ["id" => $prod, "nome" => $model->selectById($prod)->nome]);
            }
        }

        $model = $output;
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