<?php   
    require_once(__DIR__.'/../config.php');
    require_once(__DIR__.'/../model/product.php');
    
    $db = new DB();

    $page   = (isset($_GET['page']) && !empty($_GET['page'])) ? (int) addslashes($_GET['page']) : 1;
    $search = (isset($_GET['search']) && !empty($_GET['search'])) ? (string) addslashes($_GET['search']) : '';   

    if (isset($_POST['id']) && !empty($_POST['id'])) {
 
        if (delete($_POST['id'])) {
        
            Validator::setMsg('Produto deletado com successo!'); 

            $page = 0;  
        }
    }
    
	$products = Paginate('products', $page, $search);
?>