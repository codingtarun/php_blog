<?php

namespace Controller;

class Session
{

    public static function login($username)
    {
        //session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = 12;
        header("location:index.php");
    }
    public static function logout()
    {
        if (isset($_SESSION['username'])) {
            unset($_SESSION['username']);
            session_destroy();
            header("location:login.php");
        }
    }
}
