<?php
spl_autoload_register(function (string $className){
    $class_file = str_replace('\\', '/', $className).'.php';
    if(file_exists($class_file)) {
        include $class_file;
    }else {
        echo "$class_file<br>";
        exit("<div class='msg-top msg--error'>Erro: Arquivo da classe não encontrado.</div>");
    }
});