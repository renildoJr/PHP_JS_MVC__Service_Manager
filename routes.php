<?php 
use src\controllers\ClienteController;
use src\controllers\ServicoController;

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

include LINK_VIEWS.'/includes/header.php';

switch($url) {
    case '/':
        include LINK_VIEWS.'/home.php';
        break;
    case LINK_CLIENTE:
        ClienteController::index();
        break;
    case LINK_CLIENTE.'/form':
        ClienteController::form();
        break;
    case LINK_CLIENTE.'/form/save':
        ClienteController::save();
        break;
    case LINK_SERVICO:
        ServicoController::index();
        break;
    case LINK_SERVICO.'/form':
        ServicoController::form();
        break;
    case LINK_SERVICO.'/form/save':
        ServicoController::save();
        break;
    default:
        include LINK_VIEWS.'/404.php';
        break;
}

include LINK_VIEWS.'/includes/footer.php';