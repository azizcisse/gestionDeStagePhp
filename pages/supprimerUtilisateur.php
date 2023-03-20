<?php
session_start();
if (isset($_SESSION['utilisateur'])) {
    require_once "connexiondb.php";
    $idUser = isset($_GET['idUser']) ? $_GET['idUser'] : 0;

    $requete = "DELETE FROM utilisateur WHERE idUser=?";
    $params = array($idUser);

    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);

    header("location: utilisateurs.php");
} else {
    header("location: login.php");
}
