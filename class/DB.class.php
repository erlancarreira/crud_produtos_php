<?php 

class DB 
{
	
	private static $conn;

	
	function __construct() { 
        
        if (!defined('URL')) { define('URL', "http://".$_SERVER['HTTP_HOST']); }
        
        DB::getConn(); 
    }

	public static function getConn() {
		
		if (!isset(self::$conn)) {   
		    
		    try {
		    		self::$conn = new PDO("mysql:host=localhost;dbname=shop",'root','',[\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
		    	} catch (Exception $e) {
		    	
		    	print "Erro: ".$e->getMessage(); 	
		    }		    
	    }

	    return self::$conn; 	
	} 

	private function setParams($statement, $paramets = array())  
	{
       
        foreach ($paramets as $key => $value) {
          	
          	$this->bindParam($statement, $key, $value);
        
        }
	}

    private function bindParam($statement, $key, $value) 
    {  
        $statement->bindParam($key, $value); 
    }

    public function query($rowQuery, $paramets = array()) 
    {
    	
        $stmt = self::$conn->prepare($rowQuery);
     
    	$this->setParams($stmt, $paramets);

    	$stmt->execute();

        return $this->setCount($stmt->rowCount()); 
    }

    public function select($rowQuery, $params = array()) 
    {
        $stmt = self::$conn->prepare($rowQuery); 

        $this->setParams($stmt, $params);

        $stmt->execute();
        
        $this->setCount($stmt->rowCount()); 

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function setCount($count) 
    {
        $this->count = $count;
    }

    public function getCount() 
    {
        return $this->count;
    }
    



    

    
}




