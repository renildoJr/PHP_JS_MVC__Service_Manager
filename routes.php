<?php
define("LINK_HOST", "http://localhost:3000");
define("LINK_VIEW_PRODUTOS", "/produtos");
define("LINK_VIEW_PRODUTOS_FORM", "/produtos/form");

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($url) {
    case "/":
        include "home.php";
        break;
    case LINK_VIEW_PRODUTOS:
        ProdutoController::index();
        break;
    case LINK_VIEW_PRODUTOS_FORM:
        ProdutoController::form();
        break;
    case LINK_VIEW_PRODUTOS_FORM."/save":
        ProdutoController::save();
}