<?php
class Trajet{
    private $connexion;
    private $libelle;

    public function __construct($connexion,$libelle){
        $this->connexion=$connexion;
        $this->libelle=$libelle;
    }
    public function getLibelle(){
        return $this->$libelle;
    }

    public function AfficheTrajet(){
        try{
            $sql="SELECT * FROM trajet";
            // Préparation de la requête
          $stmt = $this->connexion->prepare($sql);

          //executer la requete
          $stmt ->execute();

          //Retoune
            return $stmt ->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        
        die("Erreur : Impossible d'insérer une classe. " . $e->getMessage());
        }
    }
}

?>