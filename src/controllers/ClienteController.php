<?php

namespace src\controllers;

class ClienteController extends Controller {
    public static function index() {
        parent::render('modules/listCliente');
    }

    public static function form() {
        parent::render('modules/formCliente');
    }

    public static function save() {
        var_dump($_POST);
    }
}