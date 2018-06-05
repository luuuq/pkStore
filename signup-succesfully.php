
<?php
    require_once("dbController.php");
     $dbHandler = new dbcontroller();
    //Get all the data sent by the form
    session_start();
    error_reporting(E_ALL);
    ini_set('display_error', 'on');
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $user = $_POST["username"];
    $password = $_POST["password"];

    $insertOk =  $dbHandler->register($name, $surname, $user, $email, $password);
?>

<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- navbar CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body class ="signup">

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

    if(isset($_POST["name"])){
    $_SESSION["name"] = $_POST["name"];
    }

    if ($insertOk == true){
      echo "<p class ='signup-success'>Registered successfully </p>";
    }
  ?>


</body>
</html>
