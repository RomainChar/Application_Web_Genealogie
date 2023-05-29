
<!-- ----- debut ControllerLien -->
<?php
require_once '../model/ModelLien.php';
require_once '../model/ModelIndividu.php';

class ControllerLien {
 // --- Liste des Liens
 public static function LienReadAll() {
  $results = ModelLien::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Lien/viewAll.php';
  if (DEBUG)
   echo ("ControllerLien : LienReadAll : vue = $vue");
  require ($vue);
 }
 //Ajout d'un lien parent (formulaire de sélection d'un parent et un enfant)
public static function LienAddParent() {
  $resultsIndividus = ModelIndividu::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Lien/viewInsertParent.php';
  require ($vue);
 }
 //Confirmation de l'ajout du parent
public static function LienAddedParent() {
  $SexeParent = ModelIndividu::update(
      htmlspecialchars($_GET['enfant']), htmlspecialchars($_GET['parent']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Lien/viewInsertedParent.php';
  require ($vue);
 } 
 //Ajout d'un lien Union entre une femme et un homme (formulaire)
 public static function LienAddUnion() {
     //Liste des Hommes affichés dans le formulaire
  $resultsHomme = ModelIndividu::getAllHomme();
  //Liste des femmes affichées dans le formulaire
  $resultsFemme = ModelIndividu::getAllFemme();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Lien/viewInsertUnion.php';
  require ($vue);
 }
 //Confirmation de l'ajout de l'union
 public static function LienAddedUnion() {
  $results = ModelLien::add(
      htmlspecialchars($_GET['homme']), htmlspecialchars($_GET['femme']), htmlspecialchars($_GET['type']), htmlspecialchars($_GET['date']), htmlspecialchars($_GET['lieu']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Lien/viewInsertedUnion.php';
  require ($vue);
 } 
}


?>
<!-- ----- fin ControllerLien -->


