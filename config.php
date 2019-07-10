<?php

spl_autoload_register(function($value) {
    
    $class = __DIR__.DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR.$value.".class.php";
    
    if(file_exists($class)) {
        require_once($class);   
    }
});
