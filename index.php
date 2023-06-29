<?php
session_start();

// Lấy thông tin về phương thức và URI hiện tại
$httpMethod = $_SERVER['REQUEST_METHOD'];
$mod = $_GET['mod'] ?? 'product';
$act = $_GET['act'] ?? 'list';
// Xóa phần tử đầu tiên và thứ hai khỏi mảng segments
// Gán các giá trị còn lại trong segments vào mảng params
$controllerClassName = ucfirst($mod) . 'Controller';
$controllerFile = "controllers/" . $controllerClassName . '.php';

// Kiểm tra sự tồn tại của file controller
if (file_exists($controllerFile)) {
    // Include file controller
    require_once $controllerFile;
        print_r($controllerFile);

    // Kiểm tra sự tồn tại của class controller
    if (class_exists($controllerClassName)) {
        // Tạo đối tượng controller
        $controllerObject = new $controllerClassName();
        // Kiểm tra sự tồn tại của action trong controller
        if (method_exists($controllerObject, $act)) {
            // Gọi action và truyền các tham số
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