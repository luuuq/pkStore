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

<body class="index">
  <!-- NAVBAR html -->

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

<p class = "index-par">Poke Store</p>
  
</body>
</html>

