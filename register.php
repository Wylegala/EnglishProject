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

      <div id="register">
        <?php
          if(isset($_SESSION['register']) && $_SESSION['register'] == true)
          {
            echo "<div id='register_success'>";
              echo "<span>Successfully registered!</span>";
              echo "<a href='login.php'>Login now</a>";
            echo "</div>";

            unset($_SESSION['register']);
          }
          else
          {
            if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['pass_1']) && isset($_POST['pass_2']))
            {
              $connection = @new mysqli($host, $db_user, $db_password, $db_name);
              if ($connection->connect_errno!=0)
              {
                //Error handler in case of unsuccessfull connection
                echo "Error: ".$connection->connect_errno;
              }
              else
              {
                $login = $_POST['login'];
                $email = $_POST['email'];
                $pass_1 = $_POST['pass_1'];
                $pass_2 = $_POST['pass_2'];

                $login = htmlentities($login, ENT_QUOTES, "UTF-8");
                $email = htmlentities($email, ENT_QUOTES, "UTF-8");
                $pass_1 = htmlentities($pass_1, ENT_QUOTES, "UTF-8");
                $pass_2 = htmlentities($pass_2, ENT_QUOTES, "UTF-8");

                if ($pass_1 != $pass_2)
                {
                  $_SESSION['error'] = "Passwords are not equal";
                  header('Location: register.php');
                  exit();
                }
                else
                {
                  if ($result = @$connection->query(
                  sprintf("SELECT * FROM users WHERE login='%s'",
                  mysqli_real_escape_string($connection,$login))))
                  {
                    $count_logins = $result->num_rows;
                    if($count_logins==0)
                    {
                      if ($result = @$connection->query(
                      sprintf("SELECT * FROM users WHERE email='%s'",
                      mysqli_real_escape_string($connection,$email))))
                      {
                        $count_emails = $result->num_rows;
                        if($count_emails==0)
                        {
                          if ($connection->query("INSERT INTO users (login, pass, email, type) VALUES ('$login', '$pass_1', '$email', 'user')"))
                          {
                            $_SESSION['register'] = true;
                            header('Location: register.php');
                            exit();
                          }
                        }
                        else
                        {
                          $_SESSION['error'] = "Email is already in use";
                          header('Location: register.php');
                          exit();
                        }
                      }
                    }
                    else
                    {
                      $_SESSION['error'] = "Login is already in use";
                      header('Location: register.php');
                      exit();
                    }

										$result->free_result();
                  }
                }

								$connection->close();
              }
            }
            else
            {
              echo "<form action='register.php' method='post'>
              <div class='inputs'>
              <input type='text' name='login' placeholder='Login' maxlength='15' required>
              <input type='email' name='email' placeholder='Email' maxlength='40' required>
              <input type='password' name='pass_1' placeholder='Password' maxlength='35' required>
              <input type='password' name='pass_2' placeholder='Repeat Password' maxlength='35' required>
              </div>

              <button type='submit'>Register</button>

              <div style='clear:both;'></div>
              </form>";

              echo "<span class='form_error'>";
                if(isset($_SESSION['error']))
                {
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                }
              echo "</span>";

              echo "<div class='login_links'>
              <a href='login.php'>Already have an account? Sign in</a>
              </div>";
            }
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
