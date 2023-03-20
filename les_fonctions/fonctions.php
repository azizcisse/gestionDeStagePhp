<?php

function rechercher_par_login($login){
    global $pdo;
    $requete=$pdo->prepare("SELECT * FROM utilisateur WHERE login =?");
    $requete->execute(array($login));
    return $requete->rowCount();
}

function rechercher_par_email($email){
    global $pdo;
    $requete=$pdo->prepare("SELECT * FROM utilisateur WHERE email =?");
    $requete->execute(array($email));
    return $requete->rowCount();
}

function rechercher_user_par_email($email){
    global $pdo;

    $requete=$pdo->prepare("SELECT * FROM utilisateur WHERE email =?");

    $requete->execute(array($email));

    $utilisateur=$requete->fetch();

    if($utilisateur)
        return $utilisateur;
    else
        return null;
}
