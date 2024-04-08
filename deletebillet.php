<?php 
require_once "config.php";

//on s'assure que id du billet supprimer est passé dans la requete GET 
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $billet->deleteBillet($id);
} else {
    echo "Id du billet non specifié";
}



?>