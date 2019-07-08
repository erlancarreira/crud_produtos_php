<?php 
    require_once(__DIR__.'/../config.php');
    require_once(__DIR__.'/../model/product.php');

    $db = new DB();
    
    $id = (isset($_GET['id']) && !empty($_GET['id'])) ? (int) addslashes($_GET['id']) : '';

    if (isset($_POST) && !empty($_POST)) {
        
    	$request = [
	        'id'          => $id,
	        'name'        => (string) $_POST['name'],
		    'price'       => (float)  $_POST['price'],
		    'description' => (string) $_POST['description'],
		    'image'       => (string) (Validator::checkImage($_FILES['image']) ?: $_POST['currentImage']),
		    'success'     => (bool)   true 
	    ]; 
	    
	    $Product = new Product($request);
    	
    	if(save($Product, 'update')) {

    		Validator::setMsg('Produto atualizado com successo!');   
    	
    	} 
    }

    $product = show($id); 
?>   