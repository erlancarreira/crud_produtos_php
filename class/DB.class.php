<?php 

class DB 
{
	
	private static $conn;

	
	function __construct() { 
       
        DB::getConn();

    }

	public static function getConn() {
		
		if (!isset(self::$conn)) {   

		    try {
	    		self::$conn = new PDO( 
                    env('DB_DRIVER')
                    .":host=".
                    env('DB_HOST')
                    .":".
                    env('DB_PORT')
                    .";dbname=".
                    env('DB_NAME'), 
                    env('DB_USERNAME'), 
                    env('DB_PASSWORD'), 
                    [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
                );

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




