<?php
  require_once("users.php");

  $username = htmlentities($_POST['username']);
  $mdp = htmlentities($_POST['mdp']);
  $mdp_conf = htmlentities($_POST['mdp_conf']);
  $email = htmlentities($_POST['email']);

  $erreur = 0;

  if (null !== ($userInit->get($username))) {
    echo "<p>Nom d'utilisateur déjà utilisé.</p> </br></br></br>";
    $erreur = 1;
  }

  if ($mdp != $mdp_conf) {
    echo "<p>Confirmation du mot de passe incorrecte.</p> </br></br></br>";
    $erreur = 1;
  }

  if ($erreur == 1) {
    include("enregistrement.html");
  }

  else {
    echo "<form action=\"validation.php\" method=\"post\">";
    echo "<p>Un mail vous a été envoyé pour confirmer votre adresse.</p>";
    echo "<p>Saisissez le code à 4 chiffres envoyé : </p>";
    echo "<input type=\"text\" id=\"code\" required>";
    $verif = rand(0, 9999);
    mail($email, "code de validation", $verif);

    echo "<input type=\"button\" value=\"Vérifier le code\" onclick=\"verif($verif)\">";

    echo "<script src=\"data/methode.js\"></script>";
    echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
    echo "<input type=\"hidden\" name=\"mdp\" value=\"$mdp\">";
    echo "<input type=\"hidden\" name=\"email\" value=\"$email\">";
    echo "<div id=\"valider\"></div>";
    echo "</form>";
    echo "<div id=\"erreur\"></div>";

  }

?>
