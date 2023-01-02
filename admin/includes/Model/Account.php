<?php

namespace Model;


use Helper\Error as Error;
use Helper\Encrypt as Encrypt;


class Account
{
    private $con;
    private $errors = array();
    public function __construct($con)
    {
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
            $role_id = 5;


            $query = $this->con->prepare("INSERT INTO `users` (`name`, `username`, `email`, `password`,`role_id`) VALUES (:name, :username, :email, :password, :role_id)");
            $query->bindParam(":name", $name);
            $query->bindParam(":username", $username);
            $query->bindParam(":email", $email);
            $query->bindParam(":password", $password);
            //$query->bindParam(":signupdate", time());
            $query->bindParam(":role_id", $role_id);
            return $query->execute();
        }
    }


    public function validateName($input)
    {
        if (strlen($input) < 2 || strlen($input) > 25) {
            array_push($this->errors, Error::$nameValidationError);
        }
    }
    public function validateUsername($input)
    {
        if (strlen($input) < 5 || strlen($input) > 20) {
            array_push($this->errors, Error::$usernameValidationError);
        }
        $query = $this->con->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $query->bindValue(":username", $input);

        $query->execute();

        if ($query->rowCount() != 0) {
            array_push($this->errors, Error::$usernameValidationAlreadyTakenError);
        }
    }
    public function validateEmail($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errors, Error::$emailValidationError);
        }
        $query = $this->con->prepare("SELECT * FROM `users` WHERE `email` = :email ");
        $query->bindValue(":email", $input);
        $query->execute();
        if ($query->rowCount() != 0) {
            array_push($this->errors, Error::$emailValidationAlreadyTakenError);
        }
    }
    public function validatePassword($input, $confirm_input)
    {
        if ($input != $confirm_input) {
            array_push($this->errors, Error::$passwordValidationMismatchedError);
        }
        if (strlen($input) < 5 || strlen($input) > 30) {
            array_push($this->errors, Error::$passwordValidationError);
        }
    }
    public function getError($error)
    {
        if (in_array($error, $this->errors)) {
            return $error;
        }
    }
}
