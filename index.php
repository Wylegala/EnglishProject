<?php
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
        <!--Search section-->
        <div id="search_section">
          <div class="container">
            <div id="search_teaser">
              <p>Do not hesitate...</p>
              <p>...unleash IT terms<br>and abbreviations now!</p>
            </div>
            <div id="search_box">
              <div id="search_title">
                IT Lexicon
              </div>
              <div id="search">
                <form action="results.php" method="post">
                  <input type="text" name="search" placeholder="Search..." maxlength="25">
                  <button type="submit">
                    <i class="icon-search"></i>
                  </button>
                  <div style="clear:both;"></div>
                </form>
              </div>
            </div>
            <div style="clear:both;"></div>
          </div>
        </div>
        <div id="popular_section">
          <div class="container">
            <div class="section_title">
              The most popular searches
            </div>
            <div id="popular_terms">
              <?php
  							$connection = @new mysqli($host, $db_user, $db_password, $db_name);
  						  if ($connection->connect_errno!=0)
  						  {
  						    echo "Error: ".$connection->connect_errno;
  						  }
  						  else
  						  {
                  if ($result = @$connection->query("SELECT * FROM terms ORDER BY popularity DESC LIMIT 20"))
  								{
  									$count_results = $result->num_rows;
  									if($count_results>0)
  									{
                      $i = 1;
                      foreach($result as $term)
                      {
                        echo "<span id='term_".$i."'>";
                          echo "<a href='#'>";
                            echo $term['name'];
                          echo "</a>";
                        echo "</span>";
                        switch($i)
                        {
                          case 4:
                          {
                            echo "<br>";
                            break;
                          }
                          case 8:
                          {
                            echo "<br>";
                            break;
                          }
                          case 12:
                          {
                            echo "<br>";
                            break;
                          }
                          case 16:
                          {
                            echo "<br>";
                            break;
                          }
                        }
                        $i++;
                      }
  									}
  									else
  									{
  										echo "Database connection error";
  									}
  								}
  								else
  								{
  									echo "Database connection error";
  								}
                }
              ?>
            </dv>
          </div>
        </div>
      </div>
      <!--Footer section-->
      <div id="footer">
        <div class="container">
          Footer plaholder
        </div>
      </div>
    </div>
  </body>
</html>
