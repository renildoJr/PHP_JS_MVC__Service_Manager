<?php 
$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$constants = get_defined_constants(true)['user'];
$links = ["/" => NULL];

foreach($constants as $name=>$val) {
    if(strpos($name, "LINK_") === 0) {
        $controller =  "src\controllers\\".ucfirst(strtolower(substr($name, 5, strlen($name))))."Controller";
        if(strrpos($controller, "_") !== false) {
            $controller = str_replace("_", "", ucwords($controller, "_"));
        }
        $links[$val] = [$val, $controller];
    }
}

$link = '/'.explode("/", $url)[1];
if(isset($links[$link])) {
    $Controller = isset($links[$link][1]) ? lcfirst($links[$link][1]) : NULL;
}else {
    $link = "";
}

include PATH_VIEWS.'/includes/header.php';
switch($url) {
    case '/':
        include PATH_VIEWS.'/home.php';
        break;
    case $link:
        $Controller::index();
        break;
    case $link.'/form':
        $Controller::form();
        break;
    case $link.'/form/save':
        $Controller::save();
        break;
    default:
        include PATH_VIEWS.'/404.php';
        break;
}
include PATH_VIEWS.'/includes/footer.php';