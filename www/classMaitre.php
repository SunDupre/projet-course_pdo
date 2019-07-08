<?php
class Maitre{
    //attributs
    //Attributs spécifique au chien
    private $id;
    private $nom;
    private $telephone;
    //Constructure
    // Fonction
    public function __set($name, $value){}
    public function getId()
    {return $this->id;}
    public function getNom()
    {return $this->nom;}
    public function getTelephone()
    {return $this->telephone;} 
}
?>