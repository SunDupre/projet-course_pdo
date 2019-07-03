<?php
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
    public function getAllchiens()
}

//Fin database
?>