<?php require_once "connexiondb.php"; 

$idf = isset($_POST['idF'])?$_POST['idF']:0;
$nomf = isset($_POST['nomF'])?$_POST['nomF']:"";
$niveau = isset($_POST['niveau'])?$_POST['niveau']:"";

$requete = "UPDATE filiere SET nomFiliere=?, niveau=? WHERE idFiliere=?";
$params = array($nomf, $niveau, $idf);
$resultat = $pdo->prepare($requete);
$resultat->execute($params);


header("location: filieres.php");
?>

