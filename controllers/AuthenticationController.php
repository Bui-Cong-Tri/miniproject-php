<?php
require_once('models/Product.php');

class AuthenticationController
{
    var $model;

    function __construct()
    {
        $this->model = new Product();
    }

    public function login()
    {
            echo "running";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->authenticateUser($username, $password)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                echo 'Đăng nhập thành công!';
            } else {
                echo 'Tên đăng nhập hoặc mật khẩu không chính xác!';
            }
        } else {
            include 'views/login-form.php';
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        echo 'Đăng xuất thành công!';
        include 'views/login-form.php';
    }

    private function authenticateUser($username, $password): boolean
    {

        return false;
    }
}