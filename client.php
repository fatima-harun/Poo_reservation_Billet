<?php
error_reporting(E_ALL);

require_once "config.php";
interface Client{
    public function addBillet($prix,$dateReservation,$heureReservation,$trajet,$dateDepart,$heureDepart,$classe,$statut);
    public function readBillet();
    // public function deleteBillet();
    public function updateBillet($prix,$dateReservation,$heureReservation,$trajet,$dateDepart,$heureDepart,$classe,$statut);
    // public function deleteBillet($id);
}

