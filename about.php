<?php
	//start of php session
	session_start();
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
          <div id="page_title"> <!--page title/logo section-->
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
              <a href="about.php">
                <li class="menu_level_1">
                  About the Lexicon
                </li>
              </a>
              <li style="clear:both;"></li>
            </ul>
          </div>
          <div id="user_box">
						<?php
							require_once "user_box.php";
						?>
					</div>
          <div style="clear:both"></div>
        </div>
      </div>

      <!--Page body-->
      <div id="content">
        <div class="heading_block">
          <div class="container">
            About the lexicon
          </div>
        </div>

        <div id="term_list">
          <div class="container">

          </div>
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
<?php
	//memory clean-up and closing DB connection
	$result->free_result();
	$connection->close();
?>
