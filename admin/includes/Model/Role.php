<?php

namespace Model;

use Helper\Validator as Validator;
use PDO;

class Role extends Validator
{
    private $con;
    public function __construct($con)
    {
        parent::__construct($con);
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

    public function viewAll()
    {
        $roles = $this->con->query("SELECT * FROM `roles`");
        return $roles;
    }

    public function delete($id)
    {
        $query = $this->con->prepare("DELETE FROM `roles` WHERE `id` = :id");
        $result = $query->execute(array(
            ':id' => $id
        ));
        if ($result) {
            echo "ROLE DELETED";
        } else {
            echo "ERROR DELETING ROLE";
        }
    }
    public function status($id)
    {
        $role = $this->getById($id);

        $status = !$role->status;

        $query_update = $this->con->prepare("UPDATE `roles` SET `status` = :status WHERE id = :id");
        $query_update->execute(array(
            ":status" => $status,
            ":id" => $id
        ));
    }
    public function edit($id)
    {
        $role = $this->getById($id);
        return $role;
    }
    public function update($id, $title, $description, $status)
    {
        $query_update = $this->con->prepare("UPDATE `roles` SET `title` = :title, `description` = :description, `status` = :status WHERE id = :id");

        $query_update->execute(array(
            ':title' => $title,
            ':description' => $description,
            ':status' => $status,
            ':id' => $id,
        ));
    }
    public function getById($id)
    {
        $query_get = $this->con->prepare("SELECT * FROM `roles` WHERE `id` =:id");
        $query_get->execute([
            ':id' => $id
        ]);
        $role = $query_get->fetch(PDO::FETCH_OBJ);
        return $role;
    }
    public function getStatus($status)
    {
        if ($status === 1) {
            return 'Active';
        } else {
            return 'Inactive';
        }
    }
}
