<?php 

/**
 * 
 */
class Product 
{
	private $name;
	private $price;
	private $description;
	private $image;

	public $table = 'products';

	function __construct($request = []) 
	{
		if (isset($request['id']) && !empty($request['id'])) { 
		    $this->id = $request['id'];
		}

		if (isset($request['name']) && is_string($request['name']) && !empty($request['name'])) { 
		    $this->name = $request['name'];
		}

		if (isset($request['price']) && !empty($request['price'])) { 
		    $this->price = (float) $request['price'];
		}

		if (isset($request['description']) && is_string($request['description']) && !empty($request['description'])) { 
		    $this->description = $request['description'];
		}
        

		if (isset($request['image']) && is_string($request['image']) && !empty($request['image'])) { 
		    $this->setImage($request['image']);
		}

	}

	public function getId() 
	{
		return $this->id;
	}

	public function getName() 
	{
		return $this->name;
	}

	public function getPrice() 
	{
		return $this->price;
	}

	public function getDescription() 
	{
		return $this->description;
	}

	public function setImage($image)
	{
        $this->image = $image;    
	}

	public function getImage() 
	{
		return $this->image;
	}
}

?>