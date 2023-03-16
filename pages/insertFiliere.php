<?php require_once "connexiondb.php"; 

$nomf = isset($_POST['nomF'])?$_POST['nomF']:"";
$niveau = isset($_POST['niveau'])?$_POST['niveau']:"";

$requete = "INSERT INTO filiere(nomFiliere, niveau) VALUES(?, ?)";
$params = array($nomf, $niveau);
$resultat = $pdo->prepare($requete);
$resultat->execute($params);


header("location: filieres.php");
?>

