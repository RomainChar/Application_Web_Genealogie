
<!-- ----- debut ControllerIndividu -->
<?php
require_once '../model/ModelIndividu.php';
require_once '../model/ModelEvenement.php';
require_once '../model/ModelLien.php';


class ControllerIndividu {
 // --- Liste des Individus
 public static function IndividuReadAll() {
  $results = ModelIndividu::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Individu/viewAll.php';
  if (DEBUG)
   echo ("ControllerIndividu : IndividuReadAll : vue = $vue");
  require ($vue);
 }
 // --- Ajout d'un individu (formulaire)
 public static function IndividuAdd() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Individu/viewInsert.php';
  require ($vue);
 }
 // --- Confirmation de l'ajout d'un individu
 public static function IndividuAdded() {
  $results = ModelIndividu::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['sexe']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Individu/viewInserted.php';
  require ($vue);
 } 
 // Sélection d'un individu (formulaire)
 public static function IndividuPage() {
  $results = ModelIndividu::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Individu/viewSelect.php';
  require ($vue);
 } 
 // Affichage de la page d'un individu
 public static function IndividuSelected() {
  $results = ModelIndividu::getInfosForOne($_GET['individuid']); // Infos de l'individu sélectionné
  $event=ModelEvenement::getInfosForOne($_GET['individuid']); //Naissance et éventuel décès de l'individu
  $Pere = ModelIndividu::getInfosForOne($results['pere']);//Infos du père de l'individu
  $Mere = ModelIndividu::getInfosForOne($results['mere']);//Infos de la mère de l'individu
  $Unions = ModelLien::getInfosForOne($_GET['individuid']);//Liste des tous les individus avec lesquels l'individu sélectionné a eu une union
  foreach($Unions as $IndividuUnionId){
      $InfosUnions[$IndividuUnionId[0]]=ModelIndividu::getInfosForOne($IndividuUnionId[0]);//infos de tous les individus "union" précédemment sélectionnés
      $InfosEnfants[$IndividuUnionId[0]]=ModelIndividu::getEnfantsForTwo($_GET['individuid'], $IndividuUnionId[0]);//Infos des enfants pour chaque union
  }
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/Individu/viewIndividuPage.php';
  require ($vue);
 } 
}

?>
<!-- ----- fin ControllerIndividu -->


