<?php
// Import des fichiers nécessaires aux tests
require_once ("Database.php");
// Affiche le titre de ma page
echo "<h1> Je créer une database : </h1>";
// J'instancie une nouvelle connexion à ma base de données
//$database = new Database();
// 
//var_dump($database);
//
//if($database->getConnexion() == null){echo "<p>La connexion a </p>";}else{echo "<p>Connexion réussie</p>";}
// J'insert nouveau maitre et prend l'id
//$nouvelId = $database->insertMaster("Bob", "0796786789");
//echo "<p>Un nouveau maitre inséré avec le numero : $nouvelId </p>";
//
//public function insertMaster($monMaitre, $telMaitre){
//$pdostadement = $this->connexion->prepare("INSERT INTO maitre (nom, telephone) VALUE (:paramNom, :paramTel)");
//$pdostadement->execute(array("paraNom" => $monMaitre, "paramTel" => $telMaitre));
// var_dump($pdostadement->errorInfo());}
//$id = $this->connexion->lastInsertId(); return $id;}
//Fonction pour insérer un nouveau maitre
public function insertMaster($name, $phone){

    // Je prepare la requête
    $pdostadement = $this->connexion->prepare
    ("INSERT INTO maitres (nom, telephone) 
    VALUE (:nom, :telephone)");

    // J'exécute la requête
    $pdostadement->execute(array("nom" => $namr, "telephone" => $phone));
};

$id = $this->connexion->insertDog();
echo "<p>Un nouveau maiter inséré avec le numero : $IdChien </p>"
?>