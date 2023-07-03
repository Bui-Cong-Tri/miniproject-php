<?php
include_once('utils/JwtUtils.php');

class JwtFilter
{
    private JwtUtils $jwtUtils;

    function __construct()
    {
        $jwtUtils = new JwtUtils();
    }
    private function isAuthenticated(): bool
    {
        $authorizationHeader = $_SERVER['HTTP_AUTHORIZATION'];
        if (str_starts_with($authorizationHeader, 'Bearer')) {
            $token = substr($authorizationHeader, 7);
            if ($this->jwtUtils->isTokenValid($token)) {
                echo "Authenticated";
                return true;
            } else {
                echo "Invalid token";
                return false;
            }
        } else {
            echo "Anonymous";
            return false;
        }
    }

    public function authFilter(): void
    {
        if (!$this->isAuthenticated()) {
            include 'views/login-form.php';
            exit();
        }
    }
}
