<?php
require_once('utils/JwtUtils.php');

class JwtFilter
{
    var JwtUtils $jwtUtils;

    function __construct()
    {
        $this->jwtUtils = new JwtUtils();
    }

    public function isAuthenticated(): bool
    {
        if (isset($_COOKIE['accessToken'])) {
            $result = $this->jwtUtils->isTokenValid($_COOKIE['accessToken']);
            if ($result) {
                return true;
            } else {
                setcookie('msg', 'Token không hợp lệ', time() + 1);
                return false;
            }
        } else {
            setcookie('msg', 'Phiên đăng nhập đã hết hạn', time() + 1);
            return false;
        }
    }

}
