<?php
require_once("Database.php");
/*
echo "<h1> Test de la database : </h1>"; 
$database = new Database(); 

if($database->getConnexion() == null)
{ 
    echo "<p> La connexion a échoé <p>"; 
} else { echo "<p> Connexion réussie <p>"; 
} 

var_dump($database); 
$nouveauId = $database->insertMaster("Bob", "07988767654"); 
echo "<p> Un nouveau maitre inséré avec le numéro : $nouveauId </p>"; 
//2 way to send data; //httpd://localhost/TestDatabase.php?nom="tutu"&tel="07846" 

$nouveauIdChien = $database->insertDog("gui", 7, "Staffie", 1); 
echo "<p> Un nouveau Chien inséré avec le numéro : $nouveauIdChien </p>"; 
*/
// teste la récupération de la liste des chiens
$listeChiens = $database->getAllDogs();
echo "<ul>";
foreach($listeChiens as $chien){
    echo "<li>";
    echo "Le numéro du chien : ".$chien->getId()." : ".$chien->getNom()
    ." de race ".$chien->getRace();
    echo "</li>";
};
//var_dump($listeChiens->errorInfo());
echo "</ul>";
// Appel de la function delete
$resultat = $database ->deleteDog(2);
if($resultat == true){
    
}
?>
