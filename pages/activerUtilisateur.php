<?php
session_start();
if (isset($_SESSION['utilisateur'])) {

    require_once "connexiondb.php";

    $idUser = isset($_GET['idUser']) ? $_GET['idUser'] : 0;

    $etat = isset($_GET['etat']) ? $_GET['etat'] : 0;

    if ($etat == 1) {
        $newEtat = 0;
    } else {
        $newEtat = 1;
    }

    $requete = "UPDATE utilisateur SET etat=?  WHERE idUser=?";

    $params = array($newEtat, $idUser);

    $resultat = $pdo->prepare($requete);

    $resultat->execute($params);

    header('location:utilisateurs.php');
} else {
    header("location: login.php");
}
