<?php
require_once("Database.php");
require_once("classChien.php");
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
$dogs = $database->getAllChiens();

foreach($dogs as $test)
{
    echo "<li>" .$test->getNom(), $test->getId(), $test->getRace(). "</li>";
}
?>
