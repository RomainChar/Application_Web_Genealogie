
<!-- ----- debut ModelIndividu -->

<?php
require_once 'Model.php';

class ModelIndividu {
 private $famille_id, $id, $nom,$prenom,$sexe, $pere,$mere;


 public function __construct($famille_id = NULL,$id = NULL, $nom = NULL, $prenom = NULL,$sexe=NULL, $pere = NULL, $mere = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->famille_id = $famille_id;
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->sexe = $sexe;
   $this->pere = $pere;
   $this->mere = $mere;
  }
 }

 public function getFamille_id() {
     return $this->famille_id;
 }

 public function getId() {
     return $this->id;
 }

 public function getNom() {
     return $this->nom;
 }

 public function getPrenom() {
     return $this->prenom;
 }
public function getSexe() {
     return $this->sexe;
 }
 public function getPere() {
     return $this->pere;
 }

 public function getMere() {
     return $this->mere;
 }
 public function setFamille_id($famille_id) {
     $this->famille_id = $famille_id;
 }

 public function setId($id){
     $this->id = $id;
 }

 public function setNom($nom){
     $this->nom = $nom;
 }

 public function setPrenom($prenom){
     $this->prenom = $prenom;
 }
public function setSexe($sexe){
     $this->sexe = $sexe;
 }

 public function setPere($pere){
     $this->pere = $pere;
 }

 public function setMere($mere){
     $this->mere = $mere;
 }



// Retourne l'ensemble des individus
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from individu where famille_id=".$_SESSION['FamilleSelected']['id']." and id!=0";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 //Retourne l'ensemble des Hommes
 public static function getAllHomme() {
  try {
   $database = Model::getInstance();
   $query = "select * from individu where famille_id=".$_SESSION['FamilleSelected']['id']." and sexe='H'";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 //Retourne l'ensemble des femmes
 public static function getAllFemme() {
  try {
   $database = Model::getInstance();
   $query = "select * from individu where famille_id=".$_SESSION['FamilleSelected']['id']." and sexe='F'";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 //Modifie le père ou la mère lié à un individu séléctionné
  public static function update($idenfant, $idparent) {
  try {
   $database = Model::getInstance();
   $query = "select sexe from individu where famille_id=".$_SESSION['FamilleSelected']['id']." and id=".$idparent;
   $statement = $database->prepare($query);
   $statement->execute();
   $SexeParent = $statement->fetch();
   $SexeParent = $SexeParent['sexe'];
   if ($SexeParent =='H'){
       $query = "update individu set pere=".$idparent." where famille_id=".$_SESSION['FamilleSelected']['id']." and id=".$idenfant;
   }
   elseif ($SexeParent =='F'){
       $query = "update individu set mere=".$idparent." where famille_id=".$_SESSION['FamilleSelected']['id']." and id=".$idenfant;
   }
   $statement = $database->prepare($query);
   $statement->execute();
   return $SexeParent;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 //Ajoute un nouvel individu
 public static function insert($nom, $prenom,$sexe) {
  try {
   $database = Model::getInstance();
   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from individu where famille_id=".$_SESSION['FamilleSelected']['id'];
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   if ($tuple[0]==NULL){
       $id=0;
   }
   else{
   $id = $tuple[0];
   $id++;
   }
   
   // ajout d'un nouveau tuple;
   $query = "insert into individu value (:famille_id, :id, :nom, :prenom, :sexe, :pere, :mere)";
   $statement = $database->prepare($query);
   $statement->execute([
     'famille_id' => $_SESSION['FamilleSelected']['id'],
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'sexe' => $sexe,
     'pere' => 0,
     'mere' => 0,
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 //Donne toutes les infos liées à un individu (Id, Nom, Prénom, Père, Mère)
 public static function getInfosForOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from individu where id = :id and famille_id = :famille_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'famille_id' => $_SESSION['FamilleSelected']['id'],
   ]);
   $results = $statement->fetch();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 //Donne la liste des enfants de deux individus séléctionnés
 public static function getEnfantsForTwo($parent1, $parent2) {
  try {
   $database = Model::getInstance();
   $query = "select * from individu where ((pere = :id1 and mere=:id2) or (pere = :id2 and mere= :id1)) and famille_id = :famille_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id1' => $parent1,
     'id2' => $parent2,
     'famille_id' => $_SESSION['FamilleSelected']['id'],
   ]);
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
<!-- ----- fin ModelIndividu -->
