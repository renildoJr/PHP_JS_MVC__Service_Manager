<?php
namespace src\controllers;

use src\models\Model;

abstract class Controller {
    protected static function render(string $view, $model = null) : string {
        $view_file = "src/views/$view.php";
        return file_exists($view_file) ? include $view_file : exit("Arquivo da view não encontrado");
    }

    protected static function setModel(object $model, object | array $list) : object {
        $model = new $model();
        foreach($list as $key=>$val) {
            $setter = "set".ucfirst($key);
            if(method_exists($model, $setter)) {
                $model->$setter($val);
            }
        }
        return $model;
    }
}