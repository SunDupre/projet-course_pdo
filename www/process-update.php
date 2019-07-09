<?php
// Page intermediaire => que du php

//récupérer les infos du formulaire avec $_POST
$id=$_POST["id"];
$nom=$_POST["nom"];
$age=$_POST["age"];
$race=$_POST["race"];
// Importer en instancier une database
require_once ("database.php");
$database = new database;
//Appeller la fonvtino insertDogs en lui passant les infos du formulaire
//Récupérer le nouvelle le id du chien
//insertDog($nom, $age, $race, $idMaitre)
$database->updateDog($id, $nom, $age, $race);

//Rediger l'utilisateur vers la page de profile du nouveau chien
header ('location: afficherChien.php?='.$id);
?>