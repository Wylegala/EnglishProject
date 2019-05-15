<?php
  if (isset($_SESSION['logged']) && $_SESSION['logged'] == true)
  {
    echo "<a href='logout.php'>Logout</a>";
  }
  else
  {
    echo "<a href='login.php'>Login</a>";
  }
?>
