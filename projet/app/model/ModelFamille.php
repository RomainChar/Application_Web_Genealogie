
<!-- ----- debut ModelFamille -->

<?php
require_once 'Model.php';

class ModelFamille {
 private $id, $nom;


 public function __construct($id = NULL, $nom = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setNom($nom) {
  $this->nom = $nom;
 }

 function getId() {
  return $this->id;
 }

 function getNom() {
  return $this->nom;
 }
 
// Retourne l'ensemble des familles
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from famille";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelFamille");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 //Retourne les informations d'une fammille sélectionnée
 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from famille where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetch();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 //Crée une nouvelle famille du nom donné
public static function insert($nom) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from famille";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into famille value (:id, :nom)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 // retourne une liste des id des familles
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id,nom from famille";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
<!-- ----- fin ModelFamille -->
