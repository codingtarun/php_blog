<?php

namespace Model;

use Helper\Validator;
use PDO;

class Blog extends Validator
{
    private $con;
    public function __construct($con)
    {
        parent::__construct($con);
        $this->con = $con;
    }
    public function store($title, $excrept, $body, $status, $user_id)
    {
        $this->validateBlogTitle($title);
        $this->validateExcrept($excrept);
        $this->validateBody($body);
        $user_id = $user_id;
        if ($status == 'Active') {
            $status = 1;
        } else {
            $status == 0;
        }
        if (empty($this->errors)) {
            $query = $this->con->prepare("INSERT INTO `blog` (`title`,`excrept`,`body`,`user_id`,`status`) VALUES (:title,:excrept, :body, :user_id, :status)");
            $query->execute(array(
                ':title' => $title,
                ':excrept' => $excrept,
                ':body' => $body,
                ':user_id' => $user_id,
                ':status' => $status
            ));
        }
    }
    public function viewAll()
    {
        $blogs = $this->con->query("SELECT * FROM  `blog`");
        return $blogs;
    }

    public function status($id)
    {
        $blog = $this->getById($id);

        $status = !$blog->status;

        $query_status = $this->con->prepare("UPDATE `blog` SET `status` = :status WHERE `id` =:id");
        $query_status->execute(array(
            ":id" => $id,
            ":status" => $status,
        ));
    }

    public function delete($id)
    {
        $query_delete = $this->con->prepare("DELETE FROM `blog` WHERE `id` =:id");
        $query_delete->execute(array(
            ':id' => $id,
        ));
    }
    public function edit($id)
    {
        $blog = $this->getById($id);
        return $blog;
    }
    public function update($title, $excrept, $body, $status, $user_id, $id)
    {
        $query_update = $this->con->prepare("UPDATE `blog` SET `title` = :title, `excrept` = :excrept,`body` =:body ,`status` = :status WHERE id = :id");

        $query_update->execute(array(
            ':title' => $title,
            ':excrept' => $excrept,
            ':body' => $body,
            ':status' => $status,
            ':id' => $id,
        ));
    }
    public function getById($id)
    {
        $query_get = $this->con->prepare("SELECT * FROM `blog` WHERE `id`=:id");
        $query_get->execute(array(
            ':id' => $id,
        ));
        $blog = $query_get->fetch(PDO::FETCH_OBJ);
        return $blog;
    }
    public function getStatus($status)
    {
        if ($status === 1) {
            $status = 'Active';
        } else {
            $status = 'Inactive';
        }
        return $status;
    }
}
