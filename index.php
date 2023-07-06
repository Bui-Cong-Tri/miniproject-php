<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('utils/JwtFilter.php');
include_once('enumeration/Permission.php');
include_once('utils/JwtUtils.php');
$httpMethod = $_SERVER['REQUEST_METHOD'];
$mod = $_GET['mod'] ?? 'product';
$act = $_GET['act'] ?? 'list';

$result = Permission::isNeedAuthenticate($mod, $act);
if ($result) {
    $filter = new JwtFilter();
    if (!$filter->isAuthenticated()) {
        $mod = 'authentication';
        $act = 'login';
    }
}

$controllerClassName = ucfirst($mod) . 'Controller';
$controllerFile = "controllers/" . $controllerClassName . '.php';

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
