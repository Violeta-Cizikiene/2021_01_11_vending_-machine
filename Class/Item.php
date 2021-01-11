<?php
// 1
class Item
{
	// 2 _ nurodomos savybes arba properties 
	private $name;
	private $code;
	private $quantity;
	private $price;

	// 3 _ construct vygdomas kaskart sukuriant objekta
	// pvz.: new Item(‘Snickers’, ‘A01’, 2, 0.90) 
	public function __construct($name, $code, $quantity, $price)
	{
		// 4 _ nustatomos properciu reiksmes is argumentu
		$this->name = $name;
		$this->code = $code;
		$this->quantity = $quantity;
		$this->price = $price;
	}
		// 5 _ nurodomi 4 metodai
		// get - gauti properties reiksmes
	public function getName()
	{
		return $this->name;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function getPrice()
	{
		return $this->price;
	}

	// 8 _ sukuriamas metodas, kuris sumažins produkto kieki vienu vienetu
	public function decreaseQuantity()
	{
		$this->quantity = $this->quantity - 1;
	}
}