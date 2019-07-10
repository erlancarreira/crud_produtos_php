<?php 
require_once(__DIR__.'/../config.php');


class Validator
{
 	const MSG   = 'msg';

 	public static function setMsg($msg, $class = 'alert-success') 
    {
    	$_SESSION[Validator::MSG] = ['text' => $msg, 'class' => $class];  
    }

    public static function getMsg() 
    {
        $msg = (isset($_SESSION[Validator::MSG]) && !empty($_SESSION[Validator::MSG])) ? $_SESSION[Validator::MSG] : "";

        Validator::clearMsg();

        return $msg;
    }

    public static function clearMsg() 
    {
        $_SESSION[Validator::MSG] = NULL;
    }

    public static function checkRequest($request) {   
        
        $success = true;
        
        switch ($request) {
	    	case !isset($request['name']) || empty($request['name']):
	    		Validator::setMsg('O campo nome deve ser preenchido!', 'alert-danger'); 		
	    		$success = false;
                break;
	    	
	    	case !isset($request['price']) || empty($request['price']):
	    		Validator::setMsg('O campo preço é requerido!', 'alert-danger'); 
	    		$success = false;
                break;

	    	case !isset($request['description']) || empty($request['description']):
	    		Validator::setMsg('A descrição é requerida!', 'alert-danger'); 
	    		$success = false;
                break;	

            case !self::checkImage($request['image']):
                Validator::setMsg('Imagem não enviada ou formato não permitido', 'alert-danger'); 
                $success = false;
                break;         
	    }    

        return $success;   
    }

    public static function checkImage(array $image) 
    {        
        $res = false;

        if (isset($image) && !empty($image['tmp_name'])) {
           
            $image_tmpName = $image['tmp_name'];

            $image = getimagesize($image_tmpName);
            
            $extesions = ['jpg','jpeg','png'];
            
            if ($image['mime']) {

                $types = explode('/', $image['mime']);   

                $res = (isset($types[1]) && in_array($types[1], $extesions)) ? true : false; 
            } 
        }
        
        return $res;         
    }     

    public static function setResource($image) 
    {
        $url_upload = "..\\assets\\images\\";

        $image_id = md5(time()).'.jpg';               
                
        if (move_uploaded_file($image['tmp_name'], $url_upload . $image_id)) {

            return $image_id;
        }
    }
    

}