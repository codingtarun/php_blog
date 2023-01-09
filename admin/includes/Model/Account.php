<?php

namespace Model;


use Helper\Error as Error;
use Helper\Encrypt as Encrypt;
use Helper\Validator;

class Account extends Validator
{
    private $con;
    //private $errors = array();
    public function __construct($con)
    {
        parent::__construct($con);
        $this->con = $con;
    }

    public function login($username, $password)
    {
        $password = Encrypt::hash($password);
        $query = $this->con->prepare("SELECT * FROM `users` WHERE username=:username AND password =:password");
        $query->bindValue(":username", $username);
        $query->bindValue(":password", $password);

        $query->execute();

        if ($query->rowCount() == 1) {
            return true;
        }
        array_push($this->errors, Error::$userNotFoundError);
        return false;
    }
    public function store($name, $email, $username, $password, $confirmpassword)
    {
        /**
         * Validating the inputs
         */
        $this->validateName($name);
        $this->validateEmail($email);
        $this->validateUsername($username);
        $this->validatePassword($password, $confirmpassword);
        /**
         * Storing the user if there is no error
         */
        if (empty($this->errors)) {
            $password = Encrypt::hash($password);
            $role_id = $_SESSION['user_id'];
            $query = $this->con->prepare("INSERT INTO `users` (`name`, `username`, `email`, `password`,`role_id`) VALUES (:name, :username, :email, :password, :role_id)");
            $query->bindParam(":name", $name);
            $query->bindParam(":username", $username);
            $query->bindParam(":email", $email);
            $query->bindParam(":password", $password);
            $query->bindParam(":role_id", $role_id);
            return $query->execute();
        }
    }
}
