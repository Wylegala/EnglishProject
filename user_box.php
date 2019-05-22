<script type="text/javascript" src="js/menu.js"></script>

<?php
  if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
  {
    echo "<p>Hi ".$_SESSION['user']."!</p>";
    echo "<a onclick='menu()' id='menu_trigger'><i class='icon-menu'></i></a>";
    echo "<div id='menu_content'>";
      echo "<a href='#'><span>Profile</span></a>";
      echo "<a href='#'><span>Add new term</span></a>";
      echo "<a href='logout.php'><span>Log Out</span></a>";
    echo "</div>";
    echo "<a style='clear:both; display:none;'></a>";
  }
  else
  {
    echo "<a id='sign_in' href='login.php'>Sign in</a>";
    echo "<a href='register.php'>Register</a>";
    echo "<a style='clear:both; display:none;'></a>";
  }
?>
