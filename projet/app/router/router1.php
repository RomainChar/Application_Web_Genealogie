
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerGenealogie.php');
require ('../controller/ControllerFamille.php');
require ('../controller/ControllerEvenement.php');
require ('../controller/ControllerIndividu.php');
require ('../controller/ControllerLien.php');

session_start();
  //Si aucune famille n'est sélectionnée, la session est quand même avec l'id -1
if (isset($_SESSION['FamilleSelected'])==False){
    $_SESSION['FamilleSelected']=array('nom'=>'','id'=>'-1');
}
// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

//Modufication du routeur pour prendre en compte l'ensemble des paramètres
$action = $param['action'];

//On supprime l'élément action de la structure
unset($param['action']);

//Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 case "FamilleReadAll" :
 case "FamilleAdd" :
 case "FamilleAdded" :
 case "FamilleSelect" :
 case "FamilleSelected" :
  ControllerFamille::$action($args);
  break;
 case "EvenementReadAll" :
 case "EvenementAdd" :
 case "EvenementAdded" :
  ControllerEvenement::$action($args);
  break;
 case "LienReadAll" :
 case "LienAddParent" :
 case "LienAddedParent" :
 case "LienAddUnion" :
 case "LienAddedUnion" :
  ControllerLien::$action($args);
  break;
 case "IndividuReadAll" :
 case "IndividuAdd" :
 case "IndividuAdded" :
 case "IndividuPage" :
 case "IndividuSelected" :
  ControllerIndividu::$action($args);
  break;
 // Tache par défaut (affichage de la page d'accueil)
 default:
  $action = "GenealogieAccueil";
  ControllerGenealogie::$action();
}
?>
<!-- ----- Fin Router1 -->

