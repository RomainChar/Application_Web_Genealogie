
<!-- ----- debut ControllerFamille -->
<?php
require_once '../model/ModelFamille.php';


class ControllerFamille {
 // --- Liste des Familles
 public static function FamilleReadAll() {
  $results = ModelFamille::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Famille/viewAll.php';
  if (DEBUG)
   echo ("ControllerFamille : FamilleReadAll : vue = $vue");
  require ($vue);
 }
 // --- Ajout d'une famille (formulaire)
public static function FamilleAdd() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Famille/viewInsert.php';
  require ($vue);
 }
 // --- Confirmation de l'ajout de la famille
 public static function FamilleAdded() {
  $results = ModelFamille::insert(
      htmlspecialchars($_GET['nom'])
  );
  // --- Mise à jour de la session permettant de garder la famille séléctionnée
  $_SESSION['FamilleSelected']=array('id'=>$results,'nom'=>$_GET['nom']);
  ModelIndividu::insert('?', '?', '?');
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Famille/viewInserted.php';
  require ($vue);
 } 
 // Selection d'une famille (formulaire)
 public static function FamilleSelect($args) {
  $results = ModelFamille::getAllId();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Famille/viewSelectId.php';
  require ($vue);
 }
 // Confirmation de la sélection de la famille
 public static function FamilleSelected() {
  $familleid = $_GET['id'];
  $results = ModelFamille::getOne($familleid);
  // --- Mise à jour de la session permettant de garder la famille séléctionnée 
  $_SESSION['FamilleSelected']=$results;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Famille/viewSelected.php';
  require ($vue);
 }
}

?>
<!-- ----- fin ControllerFamille -->


