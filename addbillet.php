<?php
require_once "config.php";

require_once "billet.php";

if(isset($_POST['submit'])){
    $prix=$_POST['prix'];
    $dateReservation=$_POST['dateReservation'];
    $heureReservation=$_POST['heureReservation'];
    $trajet=$_POST['id_trajet'];
    $dateDepart=$_POST['id_datedepart'];
    $heureDepart=$_POST['id_heuredepart'];
    $classe=$_POST['id_classe'];
    $statut=$_POST['id_statut'];
  // verifier si les champs ne sont pas vides
  if($prix!= "" && $dateReservation != "" && $heureReservation != "" && $trajet != "" && $dateDepart != "" && $heureDepart != "" && $classe != "" && $statut != "") {
    
    $billet->addBillet($prix, $dateReservation, $heureReservation, $trajet, $dateDepart, $heureDepart, $classe, $statut);
  }
}