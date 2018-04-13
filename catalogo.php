<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- navbar CSS --> <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>

<body class="catalogo">
  <!-- NAVBAR html -->

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


<div class="bordTab">
    <?php
      require_once("dbController.php");
      $db_handle = new dbcontroller();
      $sth = $db_handle -> runQuery("SELECT * FROM pokemon limit 18");


      $x_pag = 10;  //write here how many rows for each page        
      if (isset($_GET['pag']))   // Recovery actual page number if we have a page number 
      {                          // You can also use: 
          $pag = $_GET['pag'];   // $pag = isset($_GET['pag']) ? $_GET['pag'] : 1;
      }
      else
      {
         $pag  = 1;    
      }
      
      if (!$pag || !is_numeric($pag))  // check if $pag has no value or is not numeric
      {
          $pag = 1;
      }
      
      $all_rows = $db_handle->numRows("SELECT * FROM pokemon"); // How many rows is there in my table?
      
      //echo $all_rows;  //Try it before continue !!!!!!
      
      $all_pages = ceil($all_rows / $x_pag); // Find the numer of pages that I need 
                                             // (ceil Round fractions up to the next highest integer)
      $first = ($pag-1) * $x_pag;  // Compute the first record
      
      
      $pokeSelect = "SELECT * FROM pokemon LIMIT $first, $x_pag"; // Use the limit command bounded 
      
      $result = $db_handle->runQuery($pokeSelect);  //use our db util 
      $nr = $db_handle->numRows($pokeSelect); //use our db util
  


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
        while($row = $result->fetch())
        {
          echo "<tr>";

          echo "<td>" . $row['id']. "</td><td> <img class='sprites' src='main-sprites/" . $row['id']. ".png'> </td><td>" . $row['identifier']. "</td><td>" . $row['height'] ."</td><td>" .$row['weight'] . "</td>";

          echo "</tr>";
        }
        echo "</tbody>";
      echo "</table>";

echo"</div>";


echo "<div class='center'>";
  echo "<div class='pagination'>";
if ($all_pages > 1){
  if ($pag > 1){
      echo "<a class='button' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag - 1) . "\"> &laquo; </a>";
  }
  // for each page ….      
  for ($p=$pag+1; $p<$pag+7; $p++) {
      echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . $p . "\" class='active'>";
      echo $p . "</a>;";
  }
  
  if ($all_pages > $pag){
      echo "<a class='button' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag + 1) . "\"> &raquo; </a>";
  }
}
 echo"</div>";
echo "</div>";
?>
  </body>
</html>