
<!-- ----- debut ModelEvenement -->

<?php
require_once 'Model.php';

class ModelEvenement {
 private $famille_id, $id, $iid, $event_type,$event_date,$event_lieu;


 public function __construct($famille_id = NULL,$id = NULL, $iid=NULL, $event_type =NULL, $event_date =NULL, $event_lieu=NULL ) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->famille_id = $famille_id;
   $this->id = $id;
   $this->iid = $iid;
   $this->event_type = $event_type;
   $this->event_date = $event_date;
   $this->event_lieu = $event_lieu;
  }
 }

 public function getFamille_id() {
     return $this->famille_id;
 }

 public function getId() {
     return $this->id;
 }

 public function getIid() {
     return $this->iid;
 }

 public function getEvent_type() {
     return $this->event_type;
 }

 public function getEvent_date() {
     return $this->event_date;
 }

 public function getEvent_lieu() {
     return $this->event_lieu;
 }
 public function setFamille_id($famille_id) {
     $this->famille_id = $famille_id;
 }

 public function setId($id) {
     $this->id = $id;
 }

 public function setIid($iid) {
     $this->iid = $iid;
 }

 public function setEvent_type($event_type) {
     $this->event_type = $event_type;
 }

 public function setEvent_date($event_date){
     $this->event_date = $event_date;
 }

 public function setEvent_lieu($event_lieu) {
     $this->event_lieu = $event_lieu;
 }
 
// Retourne l'ensemble des évènements
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from evenement where famille_id=".$_SESSION['FamilleSelected']['id'];
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelEvenement");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 //Crée un évènement à pour un individu, (naissance ou décès) avec une date et un lieu
 public static function insert($individuid, $event_type,$date,$lieu) {
  try {
   $database = Model::getInstance();
   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from evenement where famille_id=".$_SESSION['FamilleSelected']['id'];
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into evenement value (:famille_id, :id, :iid, :event_type, :date, :lieu)";
   $statement = $database->prepare($query);
   $statement->execute([
     'famille_id' => $_SESSION['FamilleSelected']['id'],
     'id' => $id,
     'iid' => $individuid,
     'event_type' => $event_type,
     'date' => $date,
     'lieu' => $lieu,
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 //Retourne toutes les informations de tous les évènements liés à un individu
 public static function getInfosForOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select event_date, event_lieu from evenement where iid = :iid and famille_id = :famille_id and event_type=:event_type";
   $statement = $database->prepare($query);
   $statement->execute([
     'iid' => $id,
     'famille_id' => $_SESSION['FamilleSelected']['id'],
     'event_type' => 'NAISSANCE',
   ]);
   $naissance = $statement->fetch();
   $statement->execute([
     'iid' => $id,
     'famille_id' => $_SESSION['FamilleSelected']['id'],
     'event_type' => 'DECES',
   ]);
   $deces=$statement->fetch();
   if (empty($naissance)){
       $naissance=array('event_date'=>'?', 'event_lieu'=>'?');
   }
   if (empty($deces)){
       $deces=array('event_date'=>'?', 'event_lieu'=>'?');
   }
   return array('naissance'=>$naissance,'deces'=>$deces);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
<!-- ----- fin ModelEvenement -->
