<?php
// Import de la databse
require_once("database.php");
// Création de la connexion
$database = new Database();
// Récupération de la liste de chiens
$listeChiens = $database->getAllDogs();
?>
<html>
    <header>
        <link rel="stylesheet" href="style.css"> 
    </header>
    <body>
        <h1>Liste des chiens</h1>
        <h2>Annuaire</h2>

        <ul>
            <?php foreach($listeChiens as $chien){ ?>
            <li>
            <?php   echo "<a href=afficherChien.php?id=".$chien->getId().">";
                        echo "Le chien numéro".$chien->getId()." : ".$chien->getNom()
                                            ." de race ".$chien->getRace(); 
                    echo "</a>";
            ?>
            </li>
            <?php } ?>
        </ul>
    </body>
</html>