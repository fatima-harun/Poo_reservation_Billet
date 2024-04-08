<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réservations</title>
</head>
<body>
    <?php
     $sql="SELECT b.prix,b.dateReservation,b.heureReservation,t.libelle ,dd.libelle ,hd.libelle,c.libelle ,s.libelle 
        FROM billet b
         INNER JOIN trajet t ON b.id_trajet = t.id
         INNER JOIN datedepart dd ON b.id_datedepart = dd.id
          INNER JOIN heuredepart hd ON b.id_heuredepart = hd.id
        INNER JOIN classe c ON b.id_classe = c.id
         INNER JOIN statut ON b.id_statut = s.id";
    ?>
    <div class="container">
        <h1>Liste des billets réservés</h1>
        <table>
            <tr>
                <th>Prix</th>
                <th>Trajet</th>
                <th>Date de départ</th>
                <th>Heure de départ</th>
                <th>Date de réservation</th>
                <th>Heure de réservation</th>
                <th>Classe</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>

            <?php if ($resultats !== null) { ?>
    <?php foreach ($resultats as $billet) { ?>
        <tr>
            <td><?php echo $billet['prix']?></td>
            <td><?php echo $billet['trajet']?></td>
            <td><?php echo $billet['datedepart']?></td>
            <td><?php echo $billet['heuredepart']?></td> 
            <td><?php echo $billet['dateReservation']?></td>
             <!-- au niveau des crochets il faut mettre le nom de l'alia donné lors de la jointure -->
            <td><?php echo $billet['heureReservation']?></td>      
            <td><?php echo $billet['classe']?></td> 
            <td><?php echo $billet['statut']?></td>
            <td><button class="btn btn-delete"><a href="updatebillet.php?id=<?php echo $billet ['id']; ?>">Modifier</a></button></td>
               <td><button class="btn btn-delete"><a href="deletebillet.php?id=<?php echo $billet ['idBillet']; ?>">Supprimer</a></button></td>
        </tr>
    <?php } ?>
<?php } ?>
<div class="from-row">
    <div class="form-group">
      <button><a href="index.php">Retour</a></button>
    </div>
</div>
       

    
<style>
        /* Reset des styles par défaut */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Styles pour le conteneur principal */
.container {
    font-family: Arial, sans-serif; 
    margin-top:30px;
}

/* Styles pour le titre */
h1 {
    text-align: center;
    margin-bottom: 20px;
}

/* Styles pour le tableau */
table {
    width: 100%;
    border-collapse: collapse;
}

/* Styles pour les en-têtes de colonne */
th {
    background-color:#f39c12;
    padding: 10px;
    text-align: left;
    border-bottom: 2px solid #ccc;
    color:white
}

/* Styles pour les cellules */
td {
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

/* Styles pour les lignes impaires du tableau */
tr:nth-child(odd) {
    background-color: #f9f9f9;
}

/* Styles pour les liens */
a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
    color: #0056b3;
}
button{
    padding:
}
    </style>
</body>
</html>
