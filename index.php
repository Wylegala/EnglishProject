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
              <span id="term_1">
                <a href="#">
                  Term 1
                </a>
              </span>
              <span id="term_2">
                <a href="#">
                  Term 2
                </a>
              </span>
              <span id="term_3">
                <a href="#">
                  Term 3
                </a>
              </span>
              <span id="term_4">
                <a href="#">
                  Term 4
                </a>
              </span>
              <br>
              <span id="term_5">
                <a href="#">
                  Term 5
                </a>
              </span>
              <span id="term_6">
                <a href="#">
                  Term 6
                </a>
              </span>
              <span id="term_7">
                <a href="#">
                  Term 7
                </a>
              </span>
              <span id="term_8">
                <a href="#">
                  Term 8
                </a>
              </span>
              <br>
              <span id="term_9">
                <a href="#">
                  Term 9
                </a>
              </span>
              <span id="term_10">
                <a href="#">
                  Term 10
                </a>
              </span>
              <span id="term_11">
                <a href="#">
                  Term 11
                </a>
              </span>
              <span id="term_12">
                <a href="#">
                  Term 12
                </a>
              </span>
              <br>
              <span id="term_13">
                <a href="#">
                  Term 13
                </a>
              </span>
              <span id="term_14">
                <a href="#">
                  Term 14
                </a>
              </span>
              <span id="term_15">
                <a href="#">
                  Term 15
                </a>
              </span>
              <span id="term_16">
                <a href="#">
                  Term 16
                </a>
              </span>
              <br>
              <span id="term_17">
                <a href="#">
                  Term 17
                </a>
              </span>
              <span id="term_18">
                <a href="#">
                  Term 18
                </a>
              </span>
              <span id="term_19">
                <a href="#">
                  Term 19
                </a>
              </span>
              <span id="term_20">
                <a href="#">
                  Term 20
                </a>
              </span>
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
