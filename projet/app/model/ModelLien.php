
<!-- ----- debut ModelLien -->

<?php
require_once 'Model.php';

class ModelLien {
 private $famille_id, $id, $iid1, $iid2, $lien_type,$lien_date,$lien_lieu;


 public function __construct($famille_id = NULL,$id = NULL, $iid1=NULL,$iid2=NULL, $lien_type =NULL, $lien_date =NULL, $lien_lieu=NULL ) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->famille_id = $famille_id;
   $this->id = $id;
   $this->iid1 = $iid1;
   $this->iid2 = $iid2;
   $this->lien_type = $lien_type;
   $this->lien_date = $lien_date;
   $this->lien_lieu = $lien_lieu;
  }
 }

 public function getFamille_id() {
     return $this->famille_id;
 }

 public function getId() {
     return $this->id;
 }

 public function getIid1() {
     return $this->iid1;
 }

 public function getIid2() {
     return $this->iid2;
 }

 public function getLien_type() {
     return $this->lien_type;
 }

 public function getLien_date() {
     return $this->lien_date;
 }

 public function getLien_lieu() {
     return $this->lien_lieu;
 }
 public function setFamille_id($famille_id) {
     $this->famille_id = $famille_id;
 }

 public function setId($id){
     $this->id = $id;
 }

 public function setIid1($iid1) {
     $this->iid1 = $iid1;
 }

 public function setIid2($iid2){
     $this->iid2 = $iid2;
 }

 public function setLien_type($lien_type) {
     $this->lien_type = $lien_type;
 }

 public function setLien_date($lien_date){
     $this->lien_date = $lien_date;
 }

 public function setLien_lieu($lien_lieu){
     $this->lien_lieu = $lien_lieu;
 }

// Retourne l'ensemble des liens
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from lien where famille_id=".$_SESSION['FamilleSelected']['id'];
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelLien");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 //Ajoute un lien entre deux individus 
 public static  function add($hommeid, $femmeid, $lien_type, $lien_date, $lien_lieu){
     try {
   $database = Model::getInstance();
   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from lien where famille_id=".$_SESSION['FamilleSelected']['id'];
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into lien value (:famille_id, :id, :iid1, :iid2, :lien_type, :lien_date, :lien_lieu)";
   $statement = $database->prepare($query);
   $statement->execute([
     'famille_id' => $_SESSION['FamilleSelected']['id'],
     'id' => $id,
     'iid1' => $hommeid,
     'iid2' => $femmeid,
     'lien_type' => $lien_type,
     'lien_date' => $lien_date,
     'lien_lieu' => $lien_lieu,
     
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 //Donne tous les liens (mariage, pacs, couple) de l'individu séléctionné
 public static function getInfosForOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select iid2 from lien where iid1 = :iid and famille_id = :famille_id and (lien_type in('MARIAGE','COUPLE', 'PACS'))";
   $statement = $database->prepare($query);
   $statement->execute([
     'iid' => $id,
     'famille_id' => $_SESSION['FamilleSelected']['id'],
   ]);
   $Unions1 = $statement->fetchAll();
   $query = "select iid1 from lien where iid2 = :iid and famille_id = :famille_id and (lien_type in('MARIAGE','COUPLE', 'PACS'))";
   $statement = $database->prepare($query);
   $statement->execute([
     'iid' => $id,
     'famille_id' => $_SESSION['FamilleSelected']['id'],
   ]);
   $Unions2 = $statement->fetchAll();
   $Unions=$Unions1+$Unions2;
   return $Unions;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
<!-- ----- fin ModelLien -->
