<?php

ob_start(); // turns on output buffer / waits until all php code is executed
session_start();
date_default_timezone_set("Asia/Kolkata");

/**
 * Databse Configuration
 */
define('DBNAME', 'php_blog');
define('HOST', 'localhost:3308');
define('USER', 'root');
define('PASSWORD', 'bs09Btcs183@');

/**
 * Trying to connect to database with above mentioned details
 */
try {
    $con = new PDO("mysql:dbname=" . DBNAME . ";host=" . HOST . ";", USER, PASSWORD); // Making databse connection
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //setting error reporting on 
} catch (PDOException $e) {
    exit("Connection failed : " . $e->getMessage());
}
