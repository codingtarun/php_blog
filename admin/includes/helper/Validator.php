<?php

class Validator
{
    private $errors = array();
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function name($input)
    {
        if (strlen($input) < 5 || strlen($input) > 25) {
            array_push($this->errors, "Error in name");
        }
    }
    public function username($input)
    {
        if (strlen($input) < 5 || strlen($input) > 12) {
            array_push($this->errors, "User name Error");
        }
    }
    public function email($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errors, "Error in email");
        }
        $query = $this->con->prepare("SELECT *  FROM users WHERE email = :email");
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
    }
}
