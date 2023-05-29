
<!-- ----- debut ControllerGenealogie -->
<?php

class ControllerGenealogie {
// Affichage de la page d'accueuil
 public static function GenealogieAccueil() {
  include 'config.php';
  // Chemin de la vue de la page d'accueil
  $vue = $root . '/app/view/viewGenealogieAccueil.php';
  if (DEBUG)
   echo ("ControllerGenealogie : GenealogieAccueil : vue = $vue");
  require ($vue);
 }

}

?>
<!-- ----- fin ControllerGenealogie -->


