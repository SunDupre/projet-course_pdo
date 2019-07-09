<?php
// Import de la databse
require_once("database.php");
// Création de la connexion
$database = new Database();
// Récupérer l'id depuis l'url
$id = $_GET["id"];
// Je supprime le chien et je récupere le resultat
$resultat = $database->deleteDog($id);
if($resultat == true){
    // Si la supression a fonctionné je redirige vers la liste des chiens
    // php url redirection
    header('Location: listeChiens.php'); 
}else{
    // Si ca n'a pas fonctionné afficher un message
    echo "Suppression impossible";
}


?>