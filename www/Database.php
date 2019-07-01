<?php
//chemin vers le serveur
$param_hote='loaclhost';
// Le port de connection à la base de données
$param_port='3306';
// Le nom de votre base de données
$param_nom_bd='AnnuaireToutou';
// le nom d'utilisateur
$param_utilisateur='root';
// le mot de passe
$param_mon_passe='Annu@ireT0ut0u';


try{
    $connection = new pdo(
        'mysql:host='.$param_hote.';dbname'.$param_nom_bd,
        $param_utilisateur,
        $param_mon_passe);
    }catch(exception $e){
        echo 'Erreur : '.$e->getMessage().'<br/>';
        echo 'No : '.$e->getCode();
}
?>