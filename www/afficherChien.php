<html>
    <head>
        <title>Afficher tous les chiens</title>
		<meta charset="UTF-8">
    </head>
</html>
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
    <input href="create-chien.php" type="Submit">  nouveau chien</a>
    <br>
        <h1>Liste de tous les chiens</h1>
        <h2>Annuaire</h2>

        <ul>
            <?php foreach($listeChiens as $chien){ ?>
            <li>
            <?php   echo "<a href=afficherChien.php?id=".$chien->getId().">";
                        echo "Le chien numéro : ".$chien->getId()." Nom : ".$chien->getNom()
                                            ." de race ".$chien->getRace(); 
                    echo "</a>";
            ?>
            </li>
            <?php } ?>
        </ul>
    </body>
</html>