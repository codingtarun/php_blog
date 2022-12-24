<?php
class User
{
    public function __construct()
    {
        echo "USER";
        echo Encrypt::hash("Tarun");
    }
    public static function store($name, $username, $email, $password)
    {
        $name = Validator::name($name);
        return $name;
    }
}
