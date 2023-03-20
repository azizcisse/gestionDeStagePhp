<?php
require_once "identifier.php";

require_once "connexiondb.php";

$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
$nom = isset($_POST['nom']) ? $_POST['nom'] : "";
$civilite = isset($_POST['civilite']) ? $_POST['civilite'] : "F";
$idFiliere = isset($_POST['idFiliere']) ? $_POST['idFiliere'] : 1;

$nomPhoto = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
$imageTemp = $_FILES['photo']['tmp_name'];
move_uploaded_file($imageTemp, "../images/" . $nomPhoto);

$requete = "insert into stagiaire(prenom,nom,civilite,idFiliere,photo) values(?,?,?,?,?)";
$params = array($prenom, $nom, $civilite, $idFiliere, $nomPhoto);
$resultat = $pdo->prepare($requete);
$resultat->execute($params);

header('location:stagiaires.php');
