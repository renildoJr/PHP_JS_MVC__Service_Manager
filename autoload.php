<?php
spl_autoload_register(function ($className) {
    $class_controller = "Controller/{$className}.php";
    $class_model = "Model/{$className}.php";
    $class_dao = "Dao/{$className}.php";
    if(file_exists($class_controller)) {
        include $class_controller;
    }else if(file_exists($class_model)) {
        include $class_model;
    }else if(file_exists($class_dao)) {
        include $class_dao;
    }
});