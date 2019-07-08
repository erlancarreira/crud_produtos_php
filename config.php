<?php 

define('URL', 'http://'.$_SERVER['HTTP_HOST']);

spl_autoload_register(function($value) {

    $class_url = __DIR__.DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR."{$value}.class.php";
    
    if(file_exists($class_url)) {
        require_once($class_url);   
    }
    
});