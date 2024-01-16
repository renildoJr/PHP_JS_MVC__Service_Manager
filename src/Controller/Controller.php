<?php

namespace src\Controller;

abstract class Controller {
    protected static function render(string $view, object $model = NULL) {
        $arquivo_view = VIEW."/modules/$view.php";
        
        if(file_exists($arquivo_view)) {
            include $arquivo_view;
        }else {
            exit("Arquivo não encontrado.");
        }
    }
}