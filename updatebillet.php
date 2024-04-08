<?php
error_reporting(E_ALL);
require_once "config.php";
require_once "billet.php";
if(isset($_POST['submit'])){
    //recuperation des données
    $id = $_GET["id"];//recuparation de l'id du voyageur à partir du get 
    $prix=$_POST['prix'];
    $dateReservation=$_POST['dateReservation'];
    $heureReservation=$_POST['heureReservation'];
    $trajet=$_POST['id_trajet'];
    $heuredepart=$_POST['idheuredepart'];
     $classe=$_POST['id_classe'];
    $statut=$_POST['id_statut'];
   
    

    //appel de la methode update
    $billet->updatebillet($prix,$dateReservation,$heureReservation,$trajet,$dateDepart,$heureDepart,$classe,$statut);
    //rediriger la page vers index
    header("location: readbillet.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de billet</title>
</head>
<body>
<form action="addbillet.php" method="POST" class="reservation-form">
    <div class="form-row">
        <div class="form-group">
            <label for="pays">Trajet :</label>
            <select name="id_trajet" id="pays" onchange="calculerPrix()">
            <option value="">Choisissez votre Trajet</option>
                <?php foreach ($trajets as $traj) :?>
                <option value="<?php echo $traj['id']; ?>"><?php echo $traj['libelle']; ?></option>
                <?php endforeach; ?>
                </select>
        </div>
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="">Date de départ :</label>
            <select name="id_datedepart" id="">
            <option value="">Choisissez une date de départ disponible</option>
                <?php foreach ($depart as $departs) :?>
                <option value="<?php echo $departs['id']; ?>"><?php echo $departs['libelle']; ?></option>
                <?php endforeach; ?>
                </select>
        </div>
        <div class="form-group">
            <label for="">Heure de départ :</label>
            <select name="id_heuredepart" id="">
            <option value="economique">Choisissez une heure disponible</option>
                <?php foreach ($heures as $hour) :?>
                <option value="<?php echo $hour['id']; ?>"><?php echo $hour['libelle']; ?></option>
                <?php endforeach; ?>
                </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="date_depart">Date de réservation :</label>
            <input type="date" id="" name="dateReservation" value="<?php echo date('Y-m-d'); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Heure de réservation :</label>
            <?php
         date_default_timezone_set('Africa/Dakar')
         ?>
        <input type="text" id="heure_reservation" name="heureReservation" value="<?php echo date('H:i:s'); ?>" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="classe">Classe :</label>
            <select id="classe" name="id_classe" required>
                <option value="economique">Choisissez votre class</option>
                <?php foreach ($classes as $clas) :?>
                <option value="<?php echo $clas['id']; ?>"><?php echo $clas['libelle']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="statut">Statut:</label>
            <select name="id_statut" id="">
            <option value="economique">Choisissez un statut</option>
                <?php foreach ($statu as $status) :?>
                <option value="<?php echo $status['id']; ?>"><?php echo $status['libelle']; ?></option>
                <?php endforeach; ?>
                </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <button type="submit" name="submit" >Réserver</button>
        </div>
    </div>
</form>
<style>
        .reservation-form {
    display: flex;
    flex-direction: column;
    max-width: 600px;
    margin: 0 auto;
}

.form-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.form-group {
    flex: 0 0 calc(50% - 10px); 
}

label {
    display: block;
    margin-bottom: 5px;
}

input, select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>
<script src="script.js"></script>
</body>
</html>