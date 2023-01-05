<?php

namespace Model;

use Exception;
use PDO;
use PDOException;
use Helper\Faker as Faker;

class Crudpdo
{
    /**
     * 
     * PDO : PHP Data Objects : a data abstraction layer which unifies the communication between the DB and the appication.
     * It reduces the amount of work by providing a consistent API.
     * It has DNS which is an easy yet fancy way of connectinf to database.
     * 
     * WHY PDO ?
     * 1. Security : useabble prepare statements
     * 2. Usability : functions to automate routine operations
     * 3. Reuseabliity : Unified API to access multitudw od DB 
     * 4. Organised and clearer code.
     * 
     * 
     * SUPPORTS : 
     * 1. YySQL
     * 2. PostgreSQL
     * 3. Oracle.
     * 4. IBM
     * 5. MS SQL Server.
     * 6. SQlite
     * 
     * 
     * MAIN PDO CLASSES : 
     * 1. PDO : represents the connection between PHP and PDO
     * 2. PDOStatement : Represents a prepared statement and after execution an associated result.
     * 3. PDOException : Represents errors raised by PDO.
     * 
     */

    private $PDO_CONN;
    public function __construct()
    {
        /**
         * Connecting to database using PDO
         */



        $host = "localhost";
        $db_name = "php_blog";
        $user = "root";
        $password = "";

        try {
            /**
             * Using PDO to connect to databse
             */
            $this->PDO_CONN =  new PDO("mysql:host=" . $host . ";dbname=" . $db_name . ";", $user, $password);
            /**
             * Turn on PDO error reporitng
             */
            $this->PDO_CONN->setAttribute(PDO::ERR_NONE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            /**
             * If errors then show error
             */
            die("ERROR CONNECTING TO DATABSE: " . $e->getMessage());
        }

        /**
         * Checking for the connection (not the best way)
         */
        // if ($this->PDO_CONN) {
        //     echo "CONNECTION IS OK";
        // } else {
        //     echo "SOMETHING WENT WRONG";
        // }

        /**
         * using try/catch to check for DB connection
         */
    }

    /**
     * Method 1 : Simplest method fetch
     */
    public function viewAll()
    {
        /**
         * View all records
         */

        /**
         * Method 1 : using while loop & fetch
         */
        $rows_while = $this->PDO_CONN->query("SELECT * FROM `roles`");
        echo "USING WHILE LOOP WITH  FETCH() METHOD RETURNS INDEX + ASSOCIATIVE ARRAY<br>";
        while ($row = $rows_while->fetch()) { // fetch() only gets one data at a time that's why we need tp use 'while' with it.

            //echo $row['title'] . "<br>";
            echo "<pre>";
            var_dump($row);
            echo "</pre>";
        }


        /**
         * Method 2 : using foreach loop
         */
        echo "USING FOREACH METHOD GIVE BOTH ASSOCIATIVE + INDEX ARRAY<br>";
        $rows_foreach = $this->PDO_CONN->query("SELECT * FROM `roles`");
        foreach ($rows_foreach as $row) {
            //echo $row['title'] . "<br>";
            echo "<pre>";
            print_r($row);
            echo "</pre>";
        }

        /**
         * Method 3 : USIGN PDO
         * 
         * PDO::FETCH_NUM (default) -> returned enumerated array i.e array with index
         * PDO::FETCH_ASSOC (most preffered) -> return as n associative array i.e key => value pair value
         * PDO::FETCH_BOTH -> returns as both enumerated & associative array
         * PDO::FETCH_OBJ -> returns as an object
         * PDO::FETCH_LAZY -> allows all enumerated, associative & as object without memory overhead.  
         */

        /**
         * PDO::FETCH_NUM
         */
        echo "PDO::FETCH_NUM ONLY RETURNS INDEX ARRAY";
        $rows_fetch_num = $this->PDO_CONN->query("SELECT * FROM `roles`");
        while ($row = $rows_fetch_num->fetch(PDO::FETCH_NUM)) {
            //echo $row['title'] . "<br>";
            echo "<pre>";
            print_r($row);
            echo "</pre>";
        }

        /**
         * PDO::FETCH_ASSOC
         */
        echo "PDO::FETCH_ASSOC ONLY RETURNS ASSOCIATIVE ARRAY";
        $rows_fetch_assoc = $this->PDO_CONN->query("SELECT * FROM `roles`");
        while ($row = $rows_fetch_assoc->fetch(PDO::FETCH_ASSOC)) {
            //echo $row['title'] . "<br>";
            echo "<pre>";
            print_r($row);
            echo "</pre>";
        }

        /**
         * PDO::FETCH_OBJ
         */
        echo "PDO::FETCH_OBJ ONLY RETURNS OBJECT ARRAY";
        $rows_fetch_obj = $this->PDO_CONN->query("SELECT * FROM `roles`");
        while ($row = $rows_fetch_obj->fetch(PDO::FETCH_OBJ)) {
            //echo $row['title'] . "<br>";
            echo "<pre>";
            print_r($row);
            echo "</pre>";
        }

        /**
         * fetchColumn
         */

        echo "fetchColumn RETUNS ONLY ONE VALUE FROM COLUMN FROM FIRST ROW<br>";
        $rows_fetchColumn = $this->PDO_CONN->query("SELECT * FROM `roles`");
        $data = $rows_fetchColumn->fetchColumn(1);

        echo $data . "<br>";

        /**
         * fetchAll
         */
        echo "fetchAll() RETURNS ALL OF THE DATA WITH INDEX + ASSOCIATIVE ARRAY ";
        $rows_fetchAll = $this->PDO_CONN->query("SELECT * FROM `roles`");
        $data_fetchAll = $rows_fetchAll->fetchAll(PDO::FETCH_OBJ);
        //$data_fetchAll = $rows_fetchAll->fetchAll();
        echo "<pre>";
        print_r($data_fetchAll);
        echo "</pre>";
        echo $data_fetchAll[3]->title . "<br>"; // useing data objects
    }
    public function viewAllUsers()
    {
        $users_list = '';

        $users = $this->PDO_CONN->query("SELECT * FROM `users` LIMIT 20");
        $users_list .= "<ol>";
        while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
            $users_list .= "<li><a href='#'>" . $user['name'] . " </a> | <a href='#' style='text-decoration:none;color:gray;'>edit</a> | <a href='#' style='text-decoration:none;color:red;'>delete</a></li>";
        }
        $users_list .= "</ol>";


        echo $users_list;
    }
    public function store()
    {
        /**
         * PREPARED STATEMENTS : DATA HANDLERS TO HANDLE THE DATA THAT GETS INSERTED INTO DATABASE
         * SANITIZE INPUTS
         * PREVENTS SQL INJECTIONS
         */
        $faker = new Faker();
        $name = $faker->fakeName() . " " . $faker->fakeName();
        $username =  $faker->fakeUsername();
        $email = $faker->fakeEmail();
        $password = $faker->fakePassword();

        $query_store = $this->PDO_CONN->prepare("INSERT INTO `users` (`name`,`username`,`email`,`password`) VALUES (:name, :username , :email, :password)");
        $result = $query_store->execute(array(
            ':name' => $name,
            ':email' => $email,
            ':username' => $username,
            ':password' => $password,
        ));
        $this->PDO_CONN->lastInsertId();

        if ($result) {
            echo "NEW DATA INSERTED WITH ID:" . $this->PDO_CONN->lastInsertId();
        } else {
            echo "DATA NOT INSERTED";
        }
    }
    public function view()
    {
    }
    public function update($id)
    {
        $name = "EDITED NAME";
        $username = "USERNAME";
        $query_edit = $this->PDO_CONN->prepare("UPDATE `users` SET `name` = :name, `username` = :username WHERE id = :id");

        $query_edit->execute(array(
            ':name' => $name,
            ':username' => $username,
            ':id' => $id,
        ));
    }
    public function delete($id)
    {
        $query_delete = $this->PDO_CONN->prepare("DELETE FROM `users` WHERE id = :id");

        $query_delete->execute(array(
            ':id' => $id,
        ));
    }

    public function getUserNumbers()
    {
        /**
         * ROW COUNT : count number of results returned forma SQL query
         */
        $users = $this->PDO_CONN->query("SELECT * FROM `users`");

        return $users->rowCOunt();
    }
    public function transFun()
    {
        /**
         * Transaction : if a query fails to exectue then all dependent queries will be rollback and throw the error.
         */

        try {
            $this->PDO_CONN->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->PDO_CONN->beginTransaction();
            $this->PDO_CONN->query("INSERT INTO `users` (`name`,`username`,`email`,`password`) VALUES ('nurat1','nurat1','nurat1@gmail.com', 'nurat1@123')");
            $this->PDO_CONN->query("INSERT INTO `users` (`name`,`username`,`email`,`password`) VALUES ('nurat3','nurat3','nurat3@gmail.com', 'nurat3@123')");
            $this->PDO_CONN->commit();
        } catch (Exception $e) {
            $this->PDO_CONN->rollBack();
            echo $e->getMessage();
        }
    }
}
