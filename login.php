<?php
	session_start();

	if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
	{
		header('Location: index.php');
		exit();
	}
	require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IT Lexicon</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css"> <!--main css stylesheet-->
    <link rel="stylesheet" href="css/fontello.css"> <!--Fontello icons-->
    <link rel="stylesheet" href="css/bootstrap.css"> <!--additional css code based on bootstrap-->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Germania+One" rel="stylesheet"> <!--google fonts-->
  </head>
  <body>
    <div>
      <!--Page header-->
      <div id="header">
        <div class="container">
          <!--page title/logo section-->
          <div id="page_title">
            <a href="index.php">
              IT Lexicon
            </a>
          </div>
          <!--menu section-->
          <div id="menu">
            <ul class="menu_list" type="none">
              <a href="index.php">
                <li class="menu_level_1">
                  <i class="icon-home"></i>
                </li>
              </a>
              <a href="search.php">
                <li class="menu_level_1">
                  Search a Word
                </li>
              </a>
              <a href="abb.php">
                <li class="menu_level_1">
                  Abbreviations
                </li>
              </a>
              <a href="about.html">
                <li class="menu_level_1">
                  About the Lexicon
                </li>
              </a>
              <li style="clear:both;"></li>
            </ul>
          </div>
          <div id="user_box">
            <a href="login.php">Login</a>
          </div>
          <div style="clear:both"></div>
        </div>
      </div>

      <div id="login">
        <?php
        	if (isset($_POST['login']) && isset($_POST['pass']))
        	{
            //$pass = password_hash($_POST['pass'], 2);
            //echo $pass;
        	}
        ?>

        <form action="login.php" method="post">
          <div class="inputs">
            <input type="text" name="login" placeholder="Login" maxlength="50" required>
            <input type="password" name="pass" placeholder="Password" maxlength="35" required>
          </div>

          <button type="submit">Go -></button>

          <div style="clear:both;"></div>
        </form>

        <div class="login_links">
          <a href="forgot.php">Forgot password?</a>
          <a href="register.php">Don't have account yet? Register</a>
        </div>

      </div>

      <div id="footer">
        <div class="container">
          Footer placeholder
        </div>
      </div>
    </div>
  </body>
</html>
