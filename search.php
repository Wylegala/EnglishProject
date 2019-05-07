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

		<script type="text/javascript" src="top.js"></script>
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
              <a href="about.html">
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
        <div class="heading_block">
          <div class="container">
            Search a Word
          </div>
        </div>

        <div id="term_list">
          <div class="container">

            <div class="body">
							<?php
								//Open DB connection
  							$connection = @new mysqli($host, $db_user, $db_password, $db_name);
								//Error handler
								if ($connection->connect_errno!=0)
  						  {
  						    echo "Error: ".$connection->connect_errno;
  						  }
								//If connected...
  						  else
  						  {
									//DB query to get 20 the most popular terms
                  if ($category = @$connection->query("SELECT category FROM terms GROUP BY category ORDER BY category"))
  								{
										//Count if any results
  									$count_categories = $category->num_rows;
  									if($count_categories>0)
  									{
											//Fetch and display each record
                      foreach($category as $cat)
                      {
												$c = $cat['category'];
												echo "<div id='".$c."' class='term_category'>".$cat['category']."</div>";

												if ($result = @$connection->query("SELECT * FROM terms WHERE category='$c'"))
			  								{
													$count_result = $result->num_rows;
			  									if($count_result>0)
			  									{
														//Fetch and display each record
			                      foreach($result as $term)
			                      {
															echo "<div class='term_name'><a href='results.php?search=".$term['name']."'>".$term['name']."</a></div>";

															$desc = implode(' ', array_slice(explode(' ', $term['description']), 0, 20))."...";
															echo "<div class='term_desc'>".$desc."</div>";
														}
													}
													else
													{
														echo "No terms";
													}
												}
												else
												{
													echo "Database error";
												}
                      }
  									}
  									else
  									{
  										echo "No categories";
  									}
  								}
  								else
  								{
  									echo "Database connection error";
  								}
                }
              ?>

						<button onclick="topFunction()" id="top_btn" title="Go to top">I</button>

            </div>

						<div class="nav">
							<span><a href="#a">A</a></span><br>
							<span><a href="#b">B</a></span><br>
							<span><a href="#c">C</a></span><br>
							<span><a href="#d">D</a></span><br>
							<span><a href="#e">E</a></span><br>
							<span><a href="#f">F</a></span><br>
							<span><a href="#g">G</a></span><br>
							<span><a href="#h">H</a></span><br>
							<span><a href="#i">I</a></span><br>
							<span><a href="#j">J</a></span><br>
							<span><a href="#k">K</a></span><br>
							<span><a href="#l">L</a></span><br>
							<span><a href="#m">M</a></span><br>
							<span><a href="#n">N</a></span><br>
							<span><a href="#o">O</a></span><br>
							<span><a href="#p">P</a></span><br>
							<span><a href="#r">R</a></span><br>
							<span><a href="#s">S</a></span><br>
							<span><a href="#t">T</a></span><br>
							<span><a href="#u">U</a></span><br>
							<span><a href="#w">W</a></span><br>
							<span><a href="#x">X</a></span><br>
							<span><a href="#y">Y</a></span><br>
							<span><a href="#z">Z</a></span>
						</div>

            <div style="clear:both;"></div>
          </div>
        </div>
      </div>

      <!--Footer section-->
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
	$category->free_result();
	$result->free_result();
	$connection->close();
?>
