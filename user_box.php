<?php
  if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
  {
    echo "<p>Hi ".$_SESSION['user']."!</p>";
    echo "<a id='user_menu' href='logout.php'>M</a>";
    echo "<a style='clear:both; display:none;'></a>";
  }
  else
  {
    echo "<a href='login.php'>Sign in</a>";
    echo "<a href='register.php'>Register</a>";
    echo "<a style='clear:both; display:none;'></a>";
  }
?>
