function verif(verif){
  var saisie = document.getElementById('code');
  console.log(saisie.value);
  console.log(verif);
  if (saisie.value == verif) {
   var val = document.getElementById('valider');
   val.innerHTML = "<input type=\"submit\" value=\"Valider l'insciption\">";
   }
   else{
     console.log("dans le else");
     var erreur = document.getElementById('erreur');
     erreur.innerHTML = "mauvais code";
   }
}
