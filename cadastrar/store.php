<?php 
require_once(__DIR__.'/../config.php');
require_once(__DIR__.'/../model/product.php');

if (isset($_POST) && !empty($_POST)) {
	
	$db = new DB();

    $request = [
        'name'        => (string) $_POST['name'],
	    'price'       => (float)  $_POST['price'],
	    'description' => (string) $_POST['description'],
	    'image'       => (array)  $_FILES['image']
    ]; 

    Validator::checkRequest($request);
    
     

    if (Validator::checkRequest($request)) { 
    
	    $request['image'] = Validator::setResource($request['image']); 
	    
		if (save(new Product($request))) {
	        
	        Validator::setMsg('Produto cadastrado com successo!');   
		}
	}
} 

?>