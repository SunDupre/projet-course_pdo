<?php

require_once("classChien.php");
require_once("classMaitre.php");
class Database{
    // Attributs
    private $connexion;

    // Le constructeur
    public function __construct(){
        $PARAM_hote = "mariadb";
        $PARAM_port = "3306";
        $PARAM_nom_bd = "AnnuaireToutou";
        $PARAM_utilisateur = "AdminToutou";
        $PARAM_mot_passe = "Annu@ireT0ut0u";

        try{
            // Le code qu'on essaye de faire
            $this->connexion = new PDO('mysql:dbname='.$PARAM_nom_bd.';host='.$PARAM_hote,
                                $PARAM_utilisateur,
                                $PARAM_mot_passe);
        }catch(Exception $monException){
            echo "Erreur : ".$monException->getMessage()."<br/>";
            echo "Code : ".$monException->getCode();
        }

    }

    // Affiche le nom de la base de données utilisée
    public function getDBName(){
        return $this->connexion->query('select database()')->fetchColumn();
    }

    // Les fonctions (le comportement)
    public function getConnexion(){
        return $this->connexion;
    }

    // Fonction pour insérer un nouveau maitre
    public function insertMaster($nomMaitre, $telMaitre){
        // Je prepare la requete
        $pdoStatement = $this->connexion->prepare(
            "INSERT INTO Maitres (nom, telephone) VALUES (:paramNom, :paramTel)");
        
        // J'exécute la requete
        // En lui passant les valeurs en paramètres
        $pdoStatement->execute(array(
            "paramNom" => $nomMaitre,
            "paramTel" => $telMaitre
        ));

        // Pour débugger et verifier que tout s'est bien pasé
        //var_dump($pdoStatement->errorInfo());

        // Je récupère l'id qui a été créé par la base de données
        $id = $this->connexion->lastInsertId();
        return $id;

    }// fin fonction insertMaster

    // Insert un nouveau chien
    public function insertDog($nom, $age, $race, $idMaitre){
        // Je prepare la requete
        $pdoStatement = $this->connexion->prepare(
            "INSERT INTO Chiens (nom, age, race, id_maitre) 
                VALUES (:nomChien, :ageChien, :raceChien, :idMaitre)"
        );

        // J'exécute la requete
        // En lui passant les valeurs en paramètres
        $pdoStatement->execute(array(
            "nomChien" => $nom,
            "ageChien" => $age,
            "raceChien" => $race,
            "idMaitre" => $idMaitre
        ));

        // Pour débugger et verifier que tout s'est bien pasé
        //var_dump($pdoStatement->errorInfo());

        // Je récupère l'id qui a été créé par la base de données
        $id = $this->connexion->lastInsertId();
        return $id;
    } // fin fonction insertDog

    // Fonction pour récupérer tous les chiens
    public function getAllDogs(){
        // On prépare la requete
        $pdoStatement = $this->connexion->prepare(
            "SELECT id, nom, race, idMaitre FROM Chiens"
        );

        // On exécute la requete
        $pdoStatement->execute();

        // On stocke en php le résultat de la requete
        $chiens = $pdoStatement->fetchAll(PDO::FETCH_CLASS, "Chien");

        // Je retourne la liste de chiens
        return $chiens;
    }

    // Fonction qui récupère un chien en fonction de son id
    public function getDogById($id){
        // Je prépare ma requete
        $pdoStatement = $this->connexion->prepare(
            "SELECT c.id, c.nom, c.age, c.race, m.nom as nomMaitre, m.telephone
            FROM Chiens c
            INNER JOIN Maitres m
            ON c.id_maitre = m.id
            WHERE c.id = :idChien"
        );

        // J'exécute la requete
        $pdoStatement->execute(
            array("idChien" => $id)
        );

        // Je recupere et je stocke le resultat
        $monChien = $pdoStatement->fetchObject("Chien");
        //var_dump($monChien);
        return $monChien;
    }

    // Fonction pour supprimer un chien grace à son id
    public function deleteDog($id){
        // Je prépare ma requete
        $pdoStatement = $this->connexion->prepare(
            "DELETE FROM Chiens WHERE id = :idChien"
        );

        // J'execute la requete
        $pdoStatement->execute(
            array("idChien" => $id)
        );

        // Récupère le code de retour de l'execution de la requete
        $errorCode = $pdoStatement->errorCode();
        if($errorCode == 0){
            // Si ca c'est bien passé renvoyer true
            return true;
        }else{
            // Si ca c'est mal passé renvoyer false
            return false;
        }

    }
    
    // Fonction pour mettre a jour les infos d'un chien
    public function updateDog($id, $nom, $age, $race){
        // Préparation de la requête
        $pdoStatement = $this->connexion->prepare(
            'UPDATE Chiens 
            SET nom = :nomChien, age = :ageChien, race = :raceChien
            WHERE id = :idChien'
        );
        // Exécution de la requete et mapping des valeurs
        $pdoStatement->execute(
            array(
                "nomChien" => $nom,
                "ageChien" => $age,
                "raceChien" => $race,
                "idChien" => $id
            )
        );
        // Récupère le code de retour de l'execution de la requete
        $errorCode = $pdoStatement->errorCode();
        if($errorCode == 0){
            // Si ca c'est bien passé renvoyer true
            return true;
        }else{
            // Si ca c'est mal passé renvoyer false
            return false;
        }
    }
    // function maitres
    public function getAllMasters(){
        // Je prépare ma requete
        $pdoStatement = $this->connexion->prepare(
            "SELECT * FROM Maitres"
        );
        // J'exécute la requete
        $pdoStatement->execute();

        // Je recupere et je stocke le resultat
        $listeMaitres = $pdoStatement->fetchAll(PDO::FETCH_CLASS,"Maitre");
        //var_dump($monChien);
        return $listeMaitres;
    }
    
}//Fin database

?>
