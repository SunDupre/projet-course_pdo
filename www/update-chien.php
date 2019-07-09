<?php
require_once("database.php");
// Importe class database
$database = new Database();
//
$id = $_GET["id"];
// Récupérer l'id dans l'url
$Chien = $database->getDogById();
var_dump($id);
//Récupération de la liste des chiens

?>
<html>
<header>
</header>

<body>

<h1>Modification chien</h1>

<br><br>
<form action="process-update.php" methode = "post">
<input type="hidden" name="id" value="<?php echo $Chien->getId();?>">
<label for="nomChien">Nom</label>
<input type="Text" id="nomChien" name="nom" value="<?php echo $Chien->getNom();?>"> required
<br><br>
<label for="ageChien">Age</label>
<input type="Text" id="ageChien" name="race" value="<?php echo $Chien->getAge();?>"> required
<br><br>
<label for="raceChien">Race</label>
<input type="Text" id="raceChien" name="race" value="<?php echo $Chien->getRace();?>"> required
<br><br>

<input type="submit" value="Mettre à jour">

</form>
</body>
</html>