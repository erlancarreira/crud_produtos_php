<?php 
    require_once(__DIR__.'/../config.php');
    require_once(__DIR__.'/../model/product.php');
    
    $id = (isset($_GET['id']) && !empty($_GET['id'])) ? (int) addslashes($_GET['id']) : '';

    $product = show($id); 

    if (isset($_POST) && !empty($_POST)) {
        
    	$request = [
	        'id'          => $id,
	        'name'        => (string) $_POST['name'],
		    'price'       => (float)  $_POST['price'],
		    'description' => (string) $_POST['description'],
            'image'       => (Validator::checkImage($_FILES['image_file'])) ? Validator::setResource((array) $_FILES['image_file']): $product->getImage()  
		    
	    ]; 

      
	    
	    $product = new Product($request);

    	if (save($product, $id)) {     

    		Validator::setMsg('Produto atualizado com successo!');  
            echo "<script> window.location.href = ".$_SERVER['HTTP_HOST']." </script>";
    	} 
       
    }
?>   