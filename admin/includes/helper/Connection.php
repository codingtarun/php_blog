<?php

ob_start(); // turns on output buffer / waits until all php code is executed
session_start();
print_r($_SESSION);
date_default_timezone_set("Asia/Kolkata");

define('DBNAME', 'php_blog');
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
try {
    $con = new PDO(
        "mysql:dbname=" . DBNAME . ";host=" . HOST . ";",
        USER,
        PASSWORD
    ); // Making databse connection
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //setting error reporting on 
} catch (PDOException $e) {
    exit("Connection failed : " . $e->getMessage());
}
