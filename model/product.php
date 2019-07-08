<?php 
require_once('../config.php');

function save(Product $product, $method = 'insert') {
	
	$db = new DB();
    
	if ($method === 'insert') {

		$db->query("INSERT INTO {$product->table} (name, price, description, url_image) VALUES (:name, :price, :description, :image)", 
			[
			    ':name'        => $product->getName(),
			    ':price'       => $product->getPrice(),
			    ':description' => $product->getDescription(),
			    ':image'       => $product->getImage()
			]
		);  

	} else {

		$db->query("UPDATE products SET name = :name, price = :price, description = :description, url_image = :image WHERE id = :id", [
		        ':id'          =>  $product->getId(),
		        ':name'        =>  $product->getName(),
		        ':price'       =>  $product->getPrice(),
		        ':description' =>  $product->getDescription(),
		        ':image'       =>  $product->getImage()
		    ]
		);

    }
   
	return !! $db->getCount(); 		
}

function show($id) {
    
    $db = new DB();

    return $db->select("SELECT * FROM products WHERE id = :id", [':id' => $id]); 
}

function delete($id) {
    
    $db = new DB();

    $db->query("DELETE FROM products WHERE id = :id", [':id' => (int) $id ]); 

    return !! $db->getCount();  
}

function Paginate($table, $page, $search = '', $itemsPerPage = 3) {  
        
    $db = new DB();

    $start = 0;
     
    if (isset($page) && !empty($page)) {
    
        $start = ($page - 1) * $itemsPerPage;
    } 

    $where = (!empty($search)) ? " WHERE name LIKE :search" : '';

    $products = (array) $db->select("SELECT sql_calc_found_rows * FROM $table $where ORDER BY id LIMIT $start, $itemsPerPage", [
            ':search' => '%'.$search.'%' ]);

    $totalRows = $db->select('SELECT found_rows() as totalCount')[0];

    return [
        'rows'        => $products,
        'paginate'    => ceil($totalRows['totalCount'] / $itemsPerPage),
        'total'       => $totalRows['totalCount'],
        'currentPage' => $page 
    ];   
}


