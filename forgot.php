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

      <div id="forgot">
        <?php

					$connection = @new mysqli($host, $db_user, $db_password, $db_name);
					if ($connection->connect_errno!=0)
					{
						//Error handler in case of unsuccessfull connection
						echo "Error: ".$connection->connect_errno;
					}
					else
					{
						if (isset($_POST['pass_1']) && isset($_POST['pass_2']) && isset($_POST['login']) && isset($_POST['email']))
						{
							$pass_1 = $_POST['pass_1'];
							$pass_2 = $_POST['pass_2'];
							$login = $_POST['login'];
							$email = $_POST['email'];

							if ($pass_1 != $pass_2)
							{
								$_SESSION['error'] = "Passwords are not equal";

								header('Location: forgot.php?login='.$login.'&email='.$email);
								exit();
							}
							else
							{
								$connection->query("UPDATE users SET pass = '$pass_1' WHERE login = '$login'");

								echo "<div id='forgot_success'>";
		              echo "<span>Successfully set a new password!</span>";
		              echo "<a href='login.php'>Login now</a>";
		            echo "</div>";
							}
						}
						elseif (isset($_POST['login']) && isset($_POST['email']) || isset($_GET['login']) && isset($_GET['email']))
	        	{
							if(isset($_POST['login']) && isset($_POST['email']))
							{
								$login = $_POST['login'];
								$email = $_POST['email'];
							}
							elseif(isset($_GET['login']) && isset($_GET['email']))
							{
								$login = $_GET['login'];
								$email = $_GET['email'];
							}

							$login = htmlentities($login, ENT_QUOTES, "UTF-8");
							$email = htmlentities($email, ENT_QUOTES, "UTF-8");

							if ($result = @$connection->query(
							sprintf("SELECT login, email FROM users WHERE login='%s' AND email='%s'",
							mysqli_real_escape_string($connection,$login),
							mysqli_real_escape_string($connection,$email))))
							{
								$count_users = $result->num_rows;
								if($count_users>0)
								{
									echo "<span class='forgot_title'>Set new password</span>";
									echo "<form action='forgot.php' method='post'>
									<div class='inputs'>
									<input type='password' name='pass_1' placeholder='Password' maxlength='30' required>
									<input type='password' name='pass_2' placeholder='Repeat Password' maxlength='30' required>
									<input style='display: none;' type='text' name='login' value='".$login."'>
									<input style='display: none;' type='email' name='email' value='".$email."'>
									</div>

									<button type='submit'>Go -></button>

									<div style='clear:both;''></div>
									</form>";

									echo "<span class='form_error'>";
										if(isset($_SESSION['error']))
										{
											echo $_SESSION['error'];
											unset($_SESSION['error']);
										}
									echo "</span>";
								}
								else
								{
									$_SESSION['error'] = "There isn't such user in a system. Provide correct data!";
									header('Location: forgot.php');
									exit();
								}

								$result->free_result();
							}
						}
						else
						{
							echo "<span class='forgot_title'>Remind password</span>";
							echo "<form action='forgot.php' method='post'>
							<div class='inputs'>
							<input type='text' name='login' placeholder='Login' maxlength='15' required>
							<input type='email' name='email' placeholder='Email' maxlength='40' required>
							</div>

							<button type='submit'>Go -></button>

							<div style='clear:both;''></div>
							</form>";

							echo "<span class='form_error'>";
								if(isset($_SESSION['error']))
								{
									echo $_SESSION['error'];
									unset($_SESSION['error']);
								}
							echo "</span>";
						}

						$connection->close();
					}
        ?>

      </div>

      <div id="footer">
        <div class="container">
          Footer placeholder
        </div>
      </div>
    </div>
  </body>
</html>
