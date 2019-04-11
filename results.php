<?php
	session_start();

	if (!isset($_POST['search']))
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
              <a href="#">
                <li class="menu_level_1">
                  Search a Word
                </li>
              </a>
              <a href="#">
                <li class="menu_level_1">
                  Abbreviations
                </li>
              </a>
              <a href="#">
                <li class="menu_level_1">
                  About the Lexicon
                </li>
              </a>
              <li style="clear:both;"></li>
            </ul>
          </div>
          <div style="clear:both"></div>
        </div>
      </div>
      <!--Page body-->
      <div id="content">
        <?php
					$connection = @new mysqli($host, $db_user, $db_password, $db_name);
				  if ($connection->connect_errno!=0)
				  {
				    echo "Error: ".$connection->connect_errno;
				  }
				  else
				  {
						$search = $_POST['search'];

						$search = htmlentities($search, ENT_QUOTES, "UTF-8");

						if ($result = @$connection->query(
						sprintf("SELECT * FROM terms WHERE name='%s'",
						mysqli_real_escape_string($connection,$search))))
						{
							$count_results = $result->num_rows;
							if($count_results>0)
							{
								echo "Jest hasło w bazie";
							}
							else {
								echo "Nie ma hasła w bazie";
							}
						}
						else {
							header('Location: index.php');
							exit();
						}
				  }
				?>



      </div>
      <!--Footer section-->
      <div id="footer">
        <div class="container">
          Footer
        </div>
      </div>
    </div>
  </body>
</html>
<?php
	$connection->close();
?>
