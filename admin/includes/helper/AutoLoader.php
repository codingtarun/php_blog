<?php

function autoloader($class_name)
{
    $directoryList = [
        'includes/controller/',
        'includes/helper/',
        'includes/model/'
    ];

    foreach ($directoryList as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            include_once($directory . $class_name . '.php');
        }
    }
}

spl_autoload_register('autoloader');
