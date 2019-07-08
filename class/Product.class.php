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

		$this->name = $request['name'];
		
		$this->price = $request['price'];
		
		$this->description = $request['description'];

		if (isset($request['image'])) { 
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