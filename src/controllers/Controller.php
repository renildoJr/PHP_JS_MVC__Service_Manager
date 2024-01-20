<?php
namespace src\controllers;

abstract class Controller {
    protected static function render(string $view, object $model = null) : string {
        $view_file = "src/views/$view.php";
        return file_exists($view_file) ? include $view_file : exit("Arquivo da view não encontrado");
    }
}