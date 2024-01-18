<?php 

use src\controllers\ClienteController;

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

include LINK_VIEWS.'/includes/header.php';

switch($url) {
    case '/':
        include LINK_VIEWS.'/home.php';
        break;
    case LINK_CLIENTE:
        ClienteController::index();
        break;
    case LINK_CLIENTE_FORM:
        ClienteController::form();
        break;
    case LINK_CLIENTE_FORM.'/save':
        ClienteController::save();
        break;
    default:
        include LINK_VIEWS.'/404.php';
        break;
}

include LINK_VIEWS.'/includes/footer.php';