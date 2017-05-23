<?php
  require_once("users.php");

  $username = htmlentities($_POST['username']);
  $mdp = htmlentities($_POST['mdp']);
  $email = htmlentities($_POST['email']);

  $user = [$username, $mdp, $email, 0, 1];
  $userInit->add($user);

  echo "<p>Vous êtes enregistré (peut-être)</p>";
?>
