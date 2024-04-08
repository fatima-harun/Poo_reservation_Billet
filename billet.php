<?php
error_reporting(E_ALL);

require_once "config.php";
require_once "client.php";
class Billet implements Client{
    private $connexion;
private $prix;
private $dateReservation;
private $heureReservation;
private $trajet;
private $dateDepart;
private $heureDepart;
private $classe;
private $statut;

public function __construct($connexion,$prix,$dateReservation,$heureReservation,$trajet,$dateDepart,$heureDepart,$classe,$statut){
    $this->connexion=$connexion;
    $this->prix=$prix;
    $this->dateReservation=$dateReservation;
    $this->heureReservation=$heureReservation;
    $this->trajet=$trajet;
    $this->dateDepart=$dateDepart;
    $this->heureDepart=$heureDepart;
    $this->classe=$classe;
    $this->statut=$statut;
}
public function getPrix(){
    return $this->prix;
}
public function getdateReservation(){
    return $this->dateReservation;
}
public function getheureReservation(){
    return $this->heureReservation;
}
public function getTrajet(){
    return $this->trajet;
}
public function getdateDepart(){
    return $this->dateDepart;
}
public function getheureDepart(){
    return $this->heureDepart;
}
public function getclasse(){
    return $this->classe;
}
public function getstatut(){
    return $this->statut;
}
public function addBillet($prix,$dateReservation,$heureReservation,$trajet,$dateDepart,$heureDepart,$classe,$statut){
    
        
            // Requête pour insérer un nouveau billet
            $sqlInsert="INSERT INTO billet (prix, dateReservation, heureReservation, id_trajet, id_datedepart, id_heuredepart, id_classe, id_statut) 
            VALUES (:prix, :dateReservation, :heureReservation, :trajet, :dateDepart, :heureDepart, :classe, :statut)";
    
            // Préparation de la requête
            $stmtInsert = $this->connexion->prepare($sqlInsert);
    
            // Lier les valeurs aux paramètres avec bindParam
            $stmtInsert->bindParam(':prix', $prix);
            $stmtInsert->bindParam(':dateReservation', $dateReservation);

            $stmtInsert->bindParam(':heureReservation', $heureReservation);
            $stmtInsert->bindParam(':trajet', $trajet);
            $stmtInsert->bindParam(':dateDepart', $dateDepart);
            $stmtInsert->bindParam(':heureDepart', $heureDepart);
            $stmtInsert->bindParam(':classe', $classe);
            $stmtInsert->bindParam(':statut', $statut);
    
            // Exécution de la requête d'insertion
            $stmtInsert->execute();
    
            // Redirection vers la page index.php après une insertion réussie
            header("Location: readbillet.php");
            exit(); // arrêter l'exécution du script après la redirection avec exit()
    
        } 
    public function readBillet(){
        try{
            $sql="SELECT b.prix,b.dateReservation,b.heureReservation,t.libelle AS trajet,dd.libelle AS datedepart,hd.libelle AS heuredepart,
        c.libelle AS classe,s.libelle AS statut
           FROM billet b
            INNER JOIN trajet t ON b.id_trajet = t.id
            INNER JOIN datedepart dd ON b.id_datedepart = dd.id
             INNER JOIN heuredepart hd ON b.id_heuredepart = hd.id
           INNER JOIN classe c ON b.id_classe = c.id
            INNER JOIN statut s ON b.id_statut = s.id";
             //preparation de la requete
             $stmt=$this->connexion->prepare($sql);

             //exécution de la requete
             $stmt->execute();
 
             //recuperation des resultats
             $resultats=$stmt->fetchAll(PDO::FETCH_ASSOC);
             return $resultats;
         } 
         catch (PDOException $e) {
             die("erreur:Impossible d'afficher les habitants" .$e->getMessage());
         }
        }
        public function updatebillet($prix, $dateReservation, $heureReservation, $trajet, $dateDepart, $heureDepart, $classe,$statut){
            try {
                //requete sql de mis à jour 
                $sql= "UPDATE billet SET prix= :prix, dateReservation = :dateReservation, heureReservation = :heureReservation, trajet=:id_trajet, dateDepart=:id_datedepart,heureDepart=:id_heuredepart,classe=:id_classe WHERE id = :id";
        
                $stmt = $this->connexion->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':prix', $prix);
                $stmt->bindParam(':dateReservation', $dateReservation);
                $stmt->bindParam(':heureReservation', $heureReservation);
                $stmt->bindParam(':id_trajet', $trajet);
                $stmt->bindParam(':id_datedepart', $dateDepart);
                $stmt->bindParam(':id_heuredepart', $heureDepart);
                $stmt->bindParam(':id_classe', $classe);
                $stmt->bindParam(':id_statut', $statut);
        
                 $stmt->execute();
        
                
                //retourne true si la MAJ a reussi
                return true;
            
            //rediriger la page 
            header("location: readbillet.php");
            exit();
            } catch (PDOException $e) {
                die("erreur: impossible de faire la mise à jour  des données" .$e->getMessage());
            }
        
          }

    }
    
?>