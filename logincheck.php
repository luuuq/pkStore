<html>
  <HEAD>
    <link href="table-style.css" rel="stylesheet" type="text/css">
  </HEAD>
  <BODY>

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

      <?php
        //Get all the data sent by the form
        $user = $_POST["username"];
        $password = $_POST["Password"];
        //recall our connection helper file
        require_once 'dbController.php';  //recall our connection helper file
        $db_Handle = new dbController();  //get the db controller
        $db_Handle -> login_control($user, $password);
        session_start(); //Create our session or resume an existing one
        $_SESSION["username"] = $user;
        $_SESSION["password"] = $password;
      ?>
  </BODY>
 </html>
