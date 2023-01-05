<?php

namespace Model;

use Helper\Error as Error;
use PDO;
use PDOException;

class Role
{
    private $errors = array();
    private $con;
    private $all;
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

    public function viewAll()
    {
        //$query = $this->con->prepare("SELECT * FROM `roles`");
        //$query->execute();

        $roles = $this->con->query("SELECT * FROM `roles`");
        // $i = 1;
        // while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        //     $this->all .= '
        //             <tr>
        //                     <th scope="row"> ' . $i . ' </th>
        //                     <td>' . $row['title'] . '</td>
        //                     <td>' . $row['description'] . '</td>
        //                     <td>
        //                         <div class="btn-group" role="group" aria-label="Basic example">
        //                             <button type="button" class="btn btn-info">' . $this->getStatus($row['status']) . '</button>
        //                             <button type="button" class="btn btn-warning">Edit</button>
        //                             <button type="button" class="btn btn-danger">Delete</button>
        //                         </div>
        //                     </td>
        //             </tr>';
        //     $i++;
        // }
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
    private function validateTitle($input)
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
    private function validateText($input)
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
