<?php

  if (isset($_GET['username']) == true) {
    $username = htmlentities($_GET['username']);
  }
  require_once("users.php");

  echo "<p>$username</p>";

  $user = $userInit->get($username);
  $affiche = $user->username." ".$user->password;
  var_dump($user);
  echo "<p>$affiche</p>";
?>
