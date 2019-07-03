<?php
//chemin vers le serveur
//$param_hote='mariadb';
// Le port de connection à la base de données
//$param_port='3306';
// Le nom de votre base de données
//$param_nom_bd='AnnuaireToutou';
// le nom d'utilisateur
//$param_utilisateur='AdminToutou';
// le mot de passe
//$param_mon_passe='Annu@ireT0ut0u';
//try{$connection = new pdo('mysql:host='.$param_hote.';dbname'.$param_nom_bd,$param_utilisateur,$param_mon_passe);
//}catch(exception $e){echo 'Erreur : '.$e->getMessage().'<br/>';echo 'No : '.$e->getCode();}
public function __construct();

public function getConnexion(){return $this->Connexion};

public function insertMaster($name, $phone){
    $insertrequest = "INSERT INTO Maitre (nom, telephone) VALUE (:nom, :telephone)";
    $pdostatement = $this->connexion->prepare($insertrequest);
    $pdostatement->execute(array("nom" => $name, "telephone" => $phone));
    var_dump($postadement->errorInfo());
    echo $this->connection->lastInsertId
};
//public fonction insertChien($monchien, $agechien, $larace, $lemaitre);
//$pdostatement = $this->connexion->prepare($insertrequest);
//$pdostatement->execute(array("nom" => $monchien, "age" => $agechien, "race" => $larace, "id_maitre" => $lemaitre));
//var_dump($pdostadement->errorInfo());
//echo $thid->connection->lastInsertId();
public function insertDog();
//
$pdostatement = $this->connexion->prepare(

);

$pdostatement->execute(array("nom" => $monchien, "age" => $agechien, "race" => $larace, "id_maitre" => $lemaitre));

?>