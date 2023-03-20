<?php
session_start();
require_once 'connexiondb.php';

$login = isset($_POST['login']) ? $_POST['login'] : "";

$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";

$requete = "SELECT * FROM utilisateur WHERE login='$login' AND pwd=MD5('$pwd')";

$resultat = $pdo->query($requete);

if ($utilisateur = $resultat->fetch()) {

    if ($utilisateur['etat'] == 1) {

        $_SESSION['utilisateur'] = $utilisateur;
        header("location:../index.php");

    } else {

        $_SESSION['erreurLogin'] = "<strong>Erreur!!</strong> Votre compte est désactivé.<br> Veuillez contacter l'administrateur";
        header("location:login.php");
    }
} else {
    $_SESSION['erreurLogin'] = "<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
    header("location:login.php");
}
