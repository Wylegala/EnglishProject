<script type="text/javascript" src="js/menu.js"></script>

<?php
  if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
  {
    echo "<p>Hi ".$_SESSION['user']."!</p>";
    echo "<a onclick='menu()' id='menu_trigger'>M</a>";
    echo "<div id='menu_content'>";
      echo "<a href='#'><span>Profile</span></a>";
      echo "<a href='#'><span>Add new term</span></a>";
      echo "<a href='logout.php'><span>Log Out</span></a>";
    echo "</div>";
    echo "<a style='clear:both; display:none;'></a>";
  }
  else
  {
    echo "<a href='login.php'>Sign in</a>";
    echo "<a href='register.php'>Register</a>";
    echo "<a style='clear:both; display:none;'></a>";
  }
?>
