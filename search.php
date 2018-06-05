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

<body class="search">
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


<div class="bordTab">
    <?php
      session_start(); //Create our session or resume an existing one
      $_SESSION["search"] = $_POST['search'];
      $search = $_SESSION["search"];
      require_once("dbController.php");
      $db_handle = new dbcontroller();
      $sth = $db_handle -> runQuery("SELECT * FROM pokemon WHERE  identifier LIKE '%".$search."%' ");

      echo "<table class= 'table table-striped table-dark'>";
      echo "<thead>";
        echo "<tr>";
        echo "<th>". "id" . "</th>";
        echo "<th>". "image" . "</th>";
        echo "<th>". "name" . "</th>";
        echo "<th>". "height" . "</th>";
        echo "<th>". "weight" . "</th>";
        echo "</tr>";
      echo "</thead>";

      echo "<tbody>";
        while($result = $sth->fetch())
        {
          echo "<tr>";

          echo "<td>" . $result['id']. "</td>
          <td>
          
          <form method='GET' action='pokedetails.php'>
            <input type='hidden' name='idPoke' value=".$result['id']. " />
            <button type='submit'> <img src='main-sprites/". $result['id']. ".png'/> </button>
          </form>
          
          </td><td>" . $result['identifier']. "</td>
          <td>" . $result['height'] ."</td>
          <td>" .$result['weight'] . "</td>";

          echo "</tr>";
        }
        echo "</tbody>";
      echo "</table>";

echo"</div>";
?>
  </body>
</html>
