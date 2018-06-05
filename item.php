<?php
class CartItem {
	public $id;
	public $identifier;
	public $qty;
	public $price;

	function __construct($id, $identifier, $price, $qty) {
		$this->id = $id;
		$this->identifier=$identifier;
		$this->qty = $qty;
		$this->price = $price;
	}
	
	function  printItem() //usefull for debugging
	{
	    echo $this->id. " ". $this->identifier. " " . $this->price . " " . $this->qty;
	}
	

	function printItemAsTr(){
		echo '<td>'. $this->identifier. '</td><td>'. $this->price. '</td><td>'. $this->qty. '</td>';
		echo '<td>';
		echo '<form action= "" method="POST">';
			echo '<input type="text" name="newqty" value="'. $this->qty.'"/>';
			echo '<input type="hidden" name="type" value="modify" />';
			echo '<input type="hidden" name="product_code" value="'. $this->id.'" />';
			echo '<input type="hidden" name="product_name" value="'. $this->identifier.'" />';
			echo '<input type="hidden" name="product_qty" value="'. $this->qty.'" />';
			echo '<input type="hidden" name="product_price" value="'. $this->price.'" />';
			echo '<button type="submit"> Set</button>';
			echo '</form>';

			echo '<form action= "" method="POST">';
			echo '<input type="text" name="newid" value="'. $this->id.'"/>';
			echo '<input type="hidden" name="type" value="delete" />';
			echo '<input type="hidden" name="product_code" value="'. $this->id.'" />';
			echo '<input type="hidden" name="product_name" value="'. $this->identifier.'" />';
			echo '<input type="hidden" name="product_qty" value="'. $this->qty.'" />';
			echo '<input type="hidden" name="product_price" value="'. $this->price.'" />';
			echo '<button type="submit"> Delete</button>';
			echo '</form>';
		echo '</td>';
	}

	function getID()
	{
		return $this->id;
	}

	function getPrice(){
		return $this->price;
	}

	function getQty(){
		return $this->qty;
	}

	function getIdentifier(){
		return $this->identifier;
	}
}
?>