<?php

class Validator
{
    public $errors = array();
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function validate()
    {
        return "<h1>Validate</h1>";
    }
    public function name($input)
    {
        if (strlen($input) < 5 || strlen($input) > 25) {
            array_push($this->errors, "MINIMUM_5_WORDS");
        }
    }
    public function username($input)
    {
        if (strlen($input) < 5 || strlen($input) > 12) {
            array_push($this->errors, "User name Error");
        }
    }
    public function email($input, $con)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errors, "Error in email");
        }
        $query = $con->prepare("SELECT *  FROM users WHERE email = :email");
        $query->bindValue(":email", $input);
        $query->execute();
        if ($query->rowCount() != 0) {
            array_push($this->errors, "Email Id Already Exists");
        }
    }
    public function password($input, $confirm_input)
    {
        if ($input !== $confirm_input) {
            array_push($this->errors, "PASSWORD MISSMATCHED");
        }
        if (strlen($input) < 5 || strlen($input) > 20) {
            array_push($this->errors, "PASSWORD LENGTH ERROR");
        }
    }

    public function getError($error)
    {
        if (in_array($error, $this->errors)) {
            return $error;
        }
    }
}
