<?php

namespace Model;

use Helper\Error as Error;


class Role
{
    private $errors = array();
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function store($title, $description, $status)
    {
        $this->validateTitle($title);
        $this->validateText($description);
        if ($status === 'Active') {
            $status = 1;
        } else {
            $status = 0;
        }
        if (empty($this->errors)) {
            $query = $this->con->prepare("INSERT INTO `roles` (`title`,`description`,`status`) VALUES (:title, :description, :status) ");
            $query->bindParam(":title", $title);
            $query->bindParam(":description", $description);
            $query->bindParam(":status", $status);
            return $query->execute();
        }
    }

    public function validateTitle($input)
    {
        if (strlen($input) < 2 || strlen($input) > 10) {
            array_push($this->errors, Error::$invalidTitleLength);
        }
        $query = $this->con->prepare("SELECT * FROM `roles` WHERE `title` = :title ");
        $query->bindValue(":title", $input);
        $query->execute();
        if ($query->rowCount() != 0) {
            array_push($this->errors, ERROR::$titleAlreadyExist);
        }
    }
    public function validateText($input)
    {
        if (strlen($input) < 5 || strlen($input) > 200) {
            array_push($this->errors, Error::$textLengthTooLong);
        }
    }
    public function getError($error)
    {
        if (in_array($error, $this->errors)) {
            return $error;
        }
    }
}
