<?php 

class DB 
{
	
	private static $conn;


	
	function __construct( ) { DB::getConn(); }

	public static function getConn() {
		
		if (!isset(self::$conn)) {   
		    
		    try {
		    		self::$conn = new PDO("mysql:host=localhost;dbname=database_teste",'root','',[\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
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
    	
    	//var_dump($paramets); exit;
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
        // $stmt = self::$conn->prepare($rowQuery);

        // $this->select("SELECT found_rows() as total");

        // $stmt->execute();

        // return $stmt->fetch();

        return $this->count;
    }

    private function config() {
        return [ 
          'host' => 'localhost', 
          'dbname' => 'database_teste', 
          'username' => 'root', 
          'pass' => ''
        ];
    }

    
}




