<?php require_once "connexiondb.php"; 

$idf = isset($_GET['idF'])?$_GET['idF']:0;

$requeteStag = "SELECT COUNT(*) countStag FROM stagiaire WHERE idFiliere=$idf";
$resultatStag = $pdo->query($requeteStag);
$tabCountStag = $resultatStag->fetch();
$nbrStag = $tabCountStag['countStag'];

if ($nbrStag == 0) {
    $requete = "DELETE FROM filiere WHERE idFiliere=?";
    $params = array($idf);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);
    header("location: filieres.php");
}else {
    $msg = "Suppression impossible : Vous devez d'abord supprimer tous les stagiaires incris dans cette filière";
    header("location: alerte.php?message=$msg");
}

?>

