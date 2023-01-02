<?php

namespace Helper;

use Helper\Error as Error;

class Validator
{
    private $errors = array();
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
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
