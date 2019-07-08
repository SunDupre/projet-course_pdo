<?php
require_once("classChien.php");
class Database{
    //attributs
    private $connexion;
    //le constructeur
    public function __construct(){
        // le chemin vers le serveur
        $PARAM_hote="mariadb";
        // le port de connexion à la base de donnée
        $PARAM_port="3306";
        // le nom de votre base de données
        $PARAM_nom_bd="AnnuaireToutou";
        // nom d'utilisateur pour se connecter
        $PARAM_utilisateur="AdminToutou";
        // mot de passe de l'utilisateur pour se connecter
        $PARAM_mot_de_passe="Annu@ireT0ut0u";
        
        try{
            $this->connexion =new PDO(
                "mysql:host=".$PARAM_hote.";dbname=".$PARAM_nom_bd,
                $PARAM_utilisateur,
                $PARAM_mot_de_passe);
        }catch(Exception $monException){
            echo "Erreur: ".$monException->getMessage()."<br/>";
            echo "Code :".$monException->getCode();
        }
    }
    //les fonctions (le comportement)
    public function getConnexion(){
        return $this->connexion;
    }
    //Fonction pour insérer un nouveau maitre
        public function insertMaster($nomMaitre, $telMaitre){
        // Je prépare la requête
        $pdoStatement = $this->connexion->prepare(
            "INSERT INTO Maitres (nom,telephone) VALUES (:paramNom,:paramTel)");

            //J'exécute la requête
            $pdoStatement->execute(array("paramNom" => $nomMaitre, "paramTel" => $telMaitre));

            //Pour débugger et verifier que tout s'est bien passé
            var_dump($pdoStatement->errorInfo());
        
            //Je récupère l'id qui a été crée par la base de données
            $id=$this->connexion->lastInsertId();
                return $id;
            
    }
    //Fonction pour insérer un nouveau Chien
    public function insertDog($nomChien,$ageChien,$raceChien,$idMaitre){
        // Je prépare la requête
        $pdoStatement = $this->connexion->prepare(
            "INSERT INTO Chiens (nom,age,race,id_maitre) VALUES (:nom,:age,:race,:id_maitre)");

            //J'exécute la requête
            $pdoStatement->execute(
                array(
                    "nom" => $nomChien, 
                    "age" => $ageChien, 
                    "race" => $raceChien, 
                    "id_maitre" => $idMaitre));
        //Pour débugger et verifier que tout s'est bien passé
        var_dump($pdoStatement->errorInfo());
                //Je récupère l'id qui a été crée par la base de données
        $id=$this->connexion->lastInsertId();
            return $id;
    }
    // Fonction pour récupérer tous les chiens
    public function getAllDogs(){
        //On prépare la requet
        $pdoStatement = $this->connexion->prepare(
            "SELECT id,nom,race FROM Chiens"
        );
        //On execute la requete
        $pdoStatement->execute();
        //On stocke en php le résultat de la requete
        $Chiens = $pdoStatement->felchAll(PDO::FELCH_CLASS, "Chiens");
        //je retourne la liste de chiens
        return $Chiens;
    }
    //Fonction qui récupère un chien en fonction de son Id
    public function getDogById(){
        //On prépare la requet
        $pdoStatement = $this->connexion->prepare(
            "SELECT c.id, c.nom, c.race, m.nom AS nomMaitre, m.telephone 
            FROM Chiens c INNER JOIN Maitres m ON Chiens.id_maitre = maitre.id -- list
            WHERE c.id = idChien"
        );
        //On execute la requete
        $pdoStatement->execute(
            array("idChien" => $id
        ));
        //On stocke en php le résultat de la requete
        $nomChiens = $pdoStatement->felchObjet("Chien");
        //je retourne la liste de chiens
        return $monChiens;
    }
    public function deleteDog($id){
        //On prépare la requet
        $pdoStatement = $this->connexion->prepare(
            "DELETE  FROM `Chiens` WHERE id = 1");
        //On execute la requete
        $pdoStatement->execute(
            array("idChien" => $id)
        );
        $errorCode = var_dump $pdoStatement->errorCode();
        if($errorCode == 0){
            return true;
        }else{
            return false;
        }

    }
}
//Fin database
?>