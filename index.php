<?php
include_once('utils/JwtFilter.php');
include_once('enumeration/Permission.php');

$httpMethod = $_SERVER['REQUEST_METHOD'];
$mod = $_GET['mod'] ?? 'product';
$act = $_GET['act'] ?? 'list';
$controllerClassName = ucfirst($mod) . 'Controller';
$controllerFile = "controllers/" . $controllerClassName . '.php';

if (!Permission::isNeedAuthenticate($mod, $act)) {
    $tokenFilter = new JwtFilter();
//    $tokenFilter->authFilter();
}

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    if (class_exists($controllerClassName)) {
        $controllerObject = new $controllerClassName();
        if (method_exists($controllerObject, $act)) {
            call_user_func_array([$controllerObject, $act], array());
        } else {
            echo '404 Not Found';
        }
    } else {
        echo '404 Not Found';
    }
} else {
    echo '404 Not Found';
}
