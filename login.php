<?php
  require_once("dbController.php");
  $dbHandler = new dbcontroller();
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
<body class="login">

  <div class="topnav">
    <div class="topnavv">
      <a class="active" href="index.php">Home</a>
    </div>
    <a href="signup.php">sign up</a>
    <a href="login.php">log in</a>
    <a href="catalogo.php">catalogo</a>
    <div class="search-container">
      <form action="search.php" method="post">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>


<p class = "login">login</p>

<div class="form-login">
 <form action="logincheck.php" method="post" >
   <div class="form-group">
     <label for="username"><b>Username</b></label>
     <input type="text" class="form-control" name="username" placeholder="Username">
   </div>
  <div class="form-group">
    <label for="Password"><b>Password</b></label>
    <input type="password" class="form-control" name="Password" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1"><b>Remain logged</b></label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>


</body>
</html>
