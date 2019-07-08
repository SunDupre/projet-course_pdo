<?php
require_once("database.php");
// Importe class database
$database = new Database();
//
$maitre = $database->getAllMasters();
?>
<html>
<header>
</header>

<body>

<h1>Nouveau chien</h1>

<br><br>

<form action="process-create.php" methode = "post">
<label for="nomChien">Nom</label>
<input type="Text" id="nomChien" name="nom" placefolder="Nolly">
<br><br>
<label for="ageChien">Age</label>
<input type="Text" id="ageChien" name="race" min="1" max="25" placefolder="2">
<br><br>
<label for="raceChien">Race</label>
<input type="Text" id="raceChien" name="race" placefolder="Bulldog">
<br><br>
<label for="choixMaitre">Maitre</label>
<select id="choixMaitre" name="idMaitre">

<?php

foreach ($Maitres as $maitre){
  echo "<option value=".$maitre->getId().">".$maitre->getNom()."</option>";
}
?>

</select>

<input type="Submit">

</form>
</body>
</html>