<?php
  session_start(); //Create our session or resume an existing one
  require_once("dbController.php"); //Import our dbcontroller
  $db_handle = new dbcontroller(); // Create the new class instance 
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

    <link href="table-style.css" rel="stylesheet" type="text/css">
  </HEAD>

  <BODY class="pokedetails">


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





    <?php
        if (isset($_GET['idPoke'])) // [1]
        {                                
            $idPoke = $_GET['idPoke'];  
        }
        else
        {
           $idPoke  = 1;    
        }

      // NOTE:Instead of this if/else You could use: $idPoke = isset($_GET['idPoke'])?
       
      //[2]
    	$result = $db_handle->runQuery("SELECT * FROM pokemon WHERE id='" .  $idPoke . "'");
    	$row = $result->fetch(); //we should have just one item
        
    	//Formatting example
    	
      $productId=$row[0]; //[3]
      $productPrice=$row[5];  // in our example we are pretending that the base experience is the price
      $productName=$row[1]; //[4]

        echo "<table class= 'table table-striped table-dark'>";
        echo "<thead>";
          echo "<tr>";
          echo "<th>". "id" . "</th>";
          echo "<th>". "image" . "</th>";
          echo "<th>". "name" . "</th>";
          echo "<th>". "height" . "</th>";
          echo "<th>". "weight" . "</th>";
          echo "<th>". "price" . "</th>";
          echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
          echo "<tr>";
          echo "<td>" . $row[0]. "</td>";
          echo "<td>".  " <img src='main-sprites/". $row[0]. ".png'/> </td>";
          echo "<td>" . $row[1]. "</td>";
          echo "<td>" . $row[3]. "</td>";
          echo "<td>" . $row[4]. "</td>";
          echo "<td>" . $row[5]. "</td>";
          echo "</tr>";   
        echo "</tbody>";
      echo "</table>";

        
      echo '<form method="post" action="cart_update.php">';
      echo "Qty <input type='text' name='product_qty' value=1 size='3' />"; //[4]
	    echo "<input type='submit' value='Add to cart' />"; //[5]
      echo "<input type='hidden' name='product_code' value=$productId />"; //[6]
      echo "<input type='hidden' name='product_price' value=$productPrice />"; //[7]
      echo "<input type='hidden' name='product_name' value=$productName />"; //[8]              
      echo "<input type='hidden' name='type' value='add' />"; //[9]
      echo "</form>";
    ?>    
    </BODY>
</HTML>
