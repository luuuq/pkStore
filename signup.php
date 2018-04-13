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
<body class ="signup">

  <div class="topnav">
    <div class="topnavv">
      <a class="active" href="index.html">Home</a>
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


  <p class ="signup">Sign up</p>
  <div class="form-signup">
 <form action="./signup-succesfully.php" method="post" >
   <div class="form-group">
     <label for="Name"><b>Name</b></label>
     <input type="text" class="form-control" name="name" placeholder="Name">
   </div>
   <div class="form-group">
     <label for="Surname"><b>Surname</b></label>
     <input type="text" class="form-control" name="surname" placeholder="Surname">
   </div>
   <div class="form-group">
     <label for="username"><b>username</b></label>
     <input type="text" class="form-control" name="username" placeholder="username">
   </div>
  <div class="form-group">
    <label for="Email"><b>Email address</b></label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted"><b>Noi ci teniamo alla tua privacy.</b></small>
  </div>
  <div class="form-group">
    <label for="Password"><b>Password</b></label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1"><b>Remain logged</b></label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


</body>
</html>
