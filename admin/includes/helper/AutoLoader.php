<?php

function autoloader($class_name)
{
    // echo "AUTOLOADER " . $class_name;
    $class_name = str_replace('\\', '/', $class_name);
    // echo "<br>FULL PATH :includes/" . $class_name . '.php';
    // $directoryList = [
    //     __DIR__ . 'includes/',
    //     __DIR__ . 'includes/',
    //     __DIR__ . 'includes/'
    // ];
    //foreach ($directoryList as $directory) {
    if (file_exists('includes/' . $class_name . '.php')) {
        include_once('includes/' . $class_name . '.php');
    }
    //}
}

spl_autoload_register('autoloader');
