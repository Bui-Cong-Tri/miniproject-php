<?php
$mod = $_GET['mod'] ?? 'user';
$act = $_GET['act'] ?? 'list';

if ($mod == 'user') {
    require_once('controllers/UserController.php');
    $user_controller = new userController();

    switch ($act) {
        case 'list':
            $user_controller->list();
            break;
        case 'add':
            $user_controller->add();
            break;
        case 'store':
            $user_controller->store();
            break;
        case 'detail':
            $user_controller->detail();
            break;
        case 'edit':
            $user_controller->edit();
            break;
        case 'update':
            $user_controller->update();
            break;
        case 'delete':
            $user_controller->delete();
            break;
        default:
            echo "<br>không có gì hết.";
            break;
    }
}
?>