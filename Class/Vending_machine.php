<?php

// 6
class VendingMachine
{
	// 13 _ sukuriamas naujas private propertie
	private $products;

	// 12 _ kuriamas konstruktorius su argumentais
	public function __construct($products)
	{
		$this->products = $products;

	}
	// 7 _ sukuriama f-ja vend su prekes kodo ir pinigu sumos argumentais
	// 21 _ $moneySum pasalinamas ir paliekamas, tik $code argumentas
	// 29 _ irasomas papildomas argumentas $moneySum
	public function vend($code, $moneySum)
	{
		// 22 _ kuriamas naujas kintamasis
		// iskvieciama f-ja i public function findProduct($code)
		$product = $this->findProduct($code);

		// 23 _ tikrinama ar produktas egzituoja
		if($product !== false) {
			//32 _ uzkomentuojamas returnas
			// return $product->getName();
			// 31 _ tikrinama ar pakankamas produktu kiekis
			if($product->getQuantity() === 0) {
				return "<span class='error'>" . $product->getName() . " is Out of Stock!" . "</span>";
			}
			// 33 _ tikrinama ar imesta per mažai pinigų
			if($product->getPrice() > $moneySum) {
				return "<span class='error'>" . "Not enough Money!" . "</span>";
			}
			// 34 _ tikrinama ar imesta per daug pinigų ir sukuriama graza($change)
			if($product->getPrice() < $moneySum) {
				// 35 _ paskaiciuoja graza
				$change = $moneySum - $product->getPrice();
				return "<span class='ok'>" . $product->getName() . " Vending: your change is " . $change . "</span>";
			}
			// 37 _ suma lygi prekes kainai
			return "<span class='ok'>" . $product->getName() . " Vending" . "</span>";	
			// 24 _ jei neegzistuoja
		} else {
			return "<span class='error'>" . "Invalid Selection!" . "</span>";
		}
	}

	// 18 _ sukuriamas public metodas, kuris pagal 
	// paduota produkto koda, patikrina ar toks produktas egzistuoja
	public function findProduct($code)
	{
		// 19 _ tikrinama ar egzistuoja kodas, jei taip - grazinamas produktas
		foreach ($this->products as $key => $item) {
			if($item->getCode() === $code) {
				return $item;
			}
		}
		// 20 _ jei kodas neegzistuoja, grazinamas false
		return false;
	} 

}