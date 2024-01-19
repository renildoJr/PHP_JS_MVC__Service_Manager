<?php
namespace src\controllers;

abstract class Controller {
    protected static function render(string $view, object $model = null) {
        $view_file = "src/views/$view.php";
        if(file_exists($view_file)) {
            include $view_file;
        }else {
            exit("<div class='msg-top msg--error'>Erro: Arquivo não encontrado.</div>");
        }
    }
}