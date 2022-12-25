<?php
class User extends Validator
{
    public $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function store($name, $username, $email, $password, $confirmpassword)
    {
        $role_id = 5;
        $name = $this->name($name);
        $password = Encrypt::hash($password);
        $query = $this->con->prepare("INSERT INTO `users` (`name`, `userid`, `email`, `password`,`role_id`) VALUES (:name, :userid, :email, :password, :role_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR);
        $query->bindParam(":userid", $username, PDO::PARAM_STR);
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        //$query->bindParam(":signupdate", time());
        $query->bindParam(":role_id", $role_id, PDO::PARAM_INT);
        return $query->execute();
        //return $query->execute();
    }
}
