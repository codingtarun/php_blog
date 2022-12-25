<?php

class Session
{

    public static function logout()
    {
        if (isset($_SESSION['logged_in_user'])) {
            unset($_SESSION['logged_in_user']);
            session_destroy();
        }
    }
}
