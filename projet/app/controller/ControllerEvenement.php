
<!-- ----- debut ControllerEvenement -->
<?php
require_once '../model/ModelEvenement.php';
require_once '../model/ModelIndividu.php';


class ControllerEvenement {
 // --- Liste des Evenements
 public static function EvenementReadAll() {
  $results = ModelEvenement::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Evenement/viewAll.php';
  if (DEBUG)
   echo ("ControllerEvenement : EvenementReadAll : vue = $vue");
  require ($vue);
 }
// --- Ajout d'un évènement (formulaire)
 public static function EvenementAdd() {
  $resultsIndividus = ModelIndividu::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Evenement/viewInsert.php';
  require ($vue);
 }
  // --- Confirmation de l'ajout de l'évènement
 public static function EvenementAdded() {
  $results = ModelEvenement::insert(
      htmlspecialchars($_GET['individu']), htmlspecialchars($_GET['event_type']), htmlspecialchars($_GET['date']),htmlspecialchars($_GET['lieu'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Evenement/viewInserted.php';
  require ($vue);
 } 
}

?>
<!-- ----- fin ControllerEvenement -->


