<?php

if (!defined('URL')) { define('URL', "http://".$_SERVER['HTTP_HOST']); }

spl_autoload_register(function() {
    
    if(file_exists('../env.php')) {
        include_once('../env.php');
    }
   
    if(!function_exists('env')) {
    	
	    function env($key, $default = null)
	    {
	        
	        $value = getenv($key);

	        if ($value === false) {
	            return $default;
	        }

	        return $value;
	    }
	}   
});

spl_autoload_register(function($value) {
    

    $class = __DIR__.DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR.$value.".class.php";
    
    if(file_exists($class)) {
        require_once($class);   
    }
    
});




