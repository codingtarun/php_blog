<?php
include 'includes/Loader.php';

use Model\Crudpdo as Crudpdo;


$crud = new Crudpdo();


echo "<h1>USERS LIST (" . $crud->getUserNumbers() . ")</h1>";

$crud->viewAllUsers();
//$crud->viewAll();

//$crud->store();


echo "<h1>UPDATE RECORD</h1>";

//$crud->update(3092);

//$crud->delete(43);

//$crud->transFun();
