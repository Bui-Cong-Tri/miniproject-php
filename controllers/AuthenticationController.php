<?php
require_once('models/User.php');
require_once('utils/JwtUtils.php');

class AuthenticationController
{
    var User $model;
    var JwtUtils $jwtUtils;

    function __construct()
    {
        $this->model = new User();
        $this->jwtUtils = new JwtUtils();
    }

    public function login(): void
    {
        include 'views/login-form.php';
    }

    public function logout(): void
    {
        setcookie('accessToken', '', time() - 3600, '/');
        header('location: index.php?mod=authentication&act=login');
    }

    public function authenticate(): void
    {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];
        $result = $this->model->authenticate(array("email" => $username, "password" => $password));
        if ($result) {
            setcookie('accessToken', $this->jwtUtils->generateToken(array("code" => $result["code"], "email" => $result["email"]), $remember), time() + JwtUtils::$expirationTime, '/');
            header("location: index.php");
        } else {
            setcookie('msg', 'Đăng nhập không thành công', time() + 1);
            header("location: index.php?mod=authentication&act=login");
        }
    }

    public function register(): void
    {
        include 'views/register-form.php';
    }

    public function createAccount(): void
    {
        $data = $_POST;
        try {
            $status = $this->model->insert($data);
            if ($status) {
                setcookie('msg', 'Tạo tài khoản thành công', time() + 1);
                header('location: index.php?mod=product&act=list');
            } else {
                setcookie('msg', 'Tạo tài khoản không thành công', time() + 1);
                header('location: index.php?mod=authentication&act=register');
            }
        } catch (FormValidationException $e) {
            setcookie('msg', $e->getMessage(), time() + 1);
            header('location: index.php?mod=authentication&act=register');
        }
    }
}