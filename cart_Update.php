<?php
    session_start(); //[1]
    require_once("item.php"); //[2]
?>		

<html>


<HEAD>
       <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- navbar CSS --> <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
  </HEAD>


<div class="topnav">
  <div class="topnavv">
    <a class="active" href="index.php">Home</a>
  </div>
  <a href="signup.php">sign up</a>

  <?php
	if(!isset($_SESSION["username"]))
	{
		echo "<a href='login.php'>log in</a>";
	}
	else
	{
		echo "<a href='logout.php'>log out</a>";
	}
  ?>

  <a href="catalogo.php">catalogo</a>
  <div class="search-container">
    <form action="search.php" method="post">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

	<body class="cartupdate">
		<?php

			if(!isset($_SESSION["username"]))
			{
				header("Location: login.php");
			}

			//[3]
			if(isset($_POST["type"]) && $_POST["type"]=='add')
			{
				$product_code = $_POST["product_code"]; //[4]
				$product_qty = $_POST["product_qty"];  //[5]
				$product_price = $_POST["product_price"];//[6]
				$product_name = $_POST["product_name"]; //[7]	
			
			    /*[8]*/
			    $cartItem = new CartItem($product_code, $product_name, $product_price, $product_qty);
			    //$cartItem->printItem(); for debug
			    $product =  (serialize($cartItem)); //[8.5]
				if(!isset($_SESSION["products"])) //[9] 
				{
				     $_SESSION["products"] = array($product);//[10]
				}
				else
				{
					//var for check if the element exists
					$exists = false;
					foreach ($_SESSION["products"] as $key => $cart_itm) {
						$obj = unserialize($cart_itm);
						//check if the identifier match
						if($obj-> getIdentifier() == $product_name){
							echo $obj->getQty();
							//update the quantity wit our fuction (pass the new quantity and index of the element)
							updateQtyCArt($obj -> getQty() + $product_qty, $key);
							$exists = true;
							break;
						}
					}
					if (!$exists)
					{
						array_push($_SESSION["products"], $product);
					}
				}
			}

			if(isset($_POST["type"]) && $_POST["type"] == "modify"){
				//check all the elements and get the index
				foreach ($_SESSION["products"] as $key => $cart_itm) {
					$obj = unserialize($cart_itm);
					//check if the identifier match
					if($obj -> getID() == $_POST["product_code"] ){
						//run our function
						updateQtyCart($_POST["newqty"], $key);
						break;
					}
				}
			}

			function updateQtyCart($newQty, $key){
				//create a new cart item with the parameters
				$cartItem = new CartItem($_POST["product_code"], $_POST["product_name"], $_POST["product_price"], $newQty);
				//substitute the old element with the new
				$_SESSION["products"] [$key] = serialize($cartItem);
	
				//here we can print the cart
			}
	
			
			if (isset($_POST["type"]) && $_POST["type"]=='empty') //[12]
			{
				session_unset(); //[13]
				echo "<p class ='cartEmpty'>The cart is empty</p>";
			}
			
			if(isset($_SESSION["products"]))  //[14]
			{
			//Print the cart Table

			echo "<table class= 'table table-striped table-dark'>";
			echo "<thead>";
			  echo "<tr>";
			  echo "<th>". "Product name" . "</th>";
			  echo "<th>". "Product price" . "</th>";
			  echo "<th>". "Quantity" . "</th>";
			  echo "<th>". "Delete" . "</th>"; 
			  echo "</tr>";
			echo "</thead>";

			echo "<tbody>";
			$priceSub = 0;
				foreach ($_SESSION["products"] as $cart_itm)
					{
						echo "<tr>";
						$obj = unserialize($cart_itm);
						$obj->printItemAsTr();

						//increment the sum variable with th e single price (price * quantity)
						//if(is_numeric($obj->getPrice()) && is_numeric($obj->getQty()))
						//{
						$priceSub = $priceSub + ( intval($obj->getPrice()) * intval($obj->getQty()) );
						//}
						echo "</tr>";
						

					}  

				//print the total price
				echo "<tr> <td> Total Price: </td><td>". $priceSub."</td </tr>";
			echo "</tbody>";
			echo "</table>"; 
         	}	


		if(isset($_POST["type"]) && $_POST["type"] == "delete"){
			foreach ($_SESSION["products"] as $key => $cart_itm) {
				//checkif the the identifier match
				if($obj->getID() == $_POST["newid"]){
					unset($_SESSION["products"][$key]);
				}
			}

			//here we can print out cart
		}


    ?>	
	

    <!-- Print the button empty cart -->	
    <form method="post" action="cart_update.php">
        <input type="submit" value="Empty" />
        <input type="hidden" name="type" value="empty" />
    </form>
</body>
</html>