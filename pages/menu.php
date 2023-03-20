<?php 
 require_once "identifier.php";
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">GESTION-STAGIAIRE</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="stagiaires.php">Les Stagiaires</a></li>
      <li><a href="filieres.php">Les Filières</a></li>
      <li><a href="utilisateurs.php">Les Utilisateurs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="btn-info" href="editerUtilisateur.php?idUser=<?php echo $_SESSION['utilisateur']['idUser'] ?>">
      <i class="glyphicon glyphicon-user"></i>
     <?php echo ' ' . $_SESSION['utilisateur']['login'] ?></a></li>
    &nbsp; &nbsp; 
      <li><a href="seDeconnecter.php" class="btn-danger"><i class="glyphicon glyphicon-log-out"></i>
       Se Déconnecter</a></li>
    </ul>
  </div>
</nav>