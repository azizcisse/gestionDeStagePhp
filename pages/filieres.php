<?php
require_once "connexiondb.php";

/*
if (isset($_GET['nomF']))
$nomf=$_GET['nomF'];
else
$nomf="";
 */
$nomf = isset($_GET['nomF']) ? $_GET['nomF'] : "";
$niveau = isset($_GET['niveau']) ? $_GET['niveau'] : "all";

$size = isset($_GET['size']) ? $_GET['size'] : 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;

if ($niveau == "all") {
    $requete = "SELECT * FROM filiere
  WHERE nomFiliere LIKE '%$nomf%' LIMIT $size offset $offset";

    $requeteCount = "SELECT COUNT(*) countF
  FROM filiere WHERE nomFiliere LIKE '%$nomf%' ";
} else {
    $requete = "SELECT * FROM filiere WHERE nomFiliere
  LIKE '%$nomf%' AND niveau='$niveau' LIMIT $size offset $offset";

    $requeteCount = "SELECT COUNT(*) countF FROM filiere
  WHERE nomFiliere LIKE '%$nomf%' AND niveau='$niveau' ";

}

$resultatF = $pdo->query($requete);

$resultatCount = $pdo->query($requeteCount);
$tabCount = $resultatCount->fetch();
$nbrfiliere = $tabCount['countF'];
$reste = $nbrfiliere % $size;
if ($reste === 0) {
    $nbrpage = $nbrfiliere / $size;
} else {
    $nbrpage = floor($nbrfiliere / $size) + 1;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestion des Filières</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>

<?php include "menu.php";?>
<div class="container">
<div class="panel panel-success margetop">
      <div class="panel-heading">Rechercher des Filières...</div>
      <div class="panel-body">
      <form method="get" action="filieres.php" class="form-inline">
            <div class="form-group">
            <input type="text" name="nomF"
               placeholder="Taper le nom de la filière"
               class="form-control"
               value="<?php echo $nomf ?>">
            </div>
            <label for="niveau"> Niveau : </label>
            <select name="niveau" class="form-control" id="niveau"
                                onchange="this.form.submit()">

                        <option value="all" <?php if ($niveau === "all") 
                        {echo "selected";} ?>>Tous les niveaux</option>

                        <option value="master" <?php if ($niveau === "master") 
                        {echo "selected";} ?>>Master</option>

                        <option value="licence" <?php if ($niveau === "licence")
                         {echo "selected";} ?>>Licence</option>

                        <option value="brevet de technicien superieur"<?php if ($niveau === "brevet de technicien superieur") 
                        {echo "selected";} ?>>Brevet de Technicien Supérieur</option>

                        <option value="technicien specialise" <?php if ($niveau === "technicien specialise") 
                        {echo "selected";} ?>>Technicien Spécialisé</option>

                        <option value="doctorat" <?php if ($niveau === "doctorat")
                        {echo "selected";} ?>>Doctorat</option>

                        <option value="qualification" <?php if ($niveau === "qualification") 
                        {echo "selected";} ?>>Qualification</option>
                      </select>

                    <button type="submit" class="btn btn-warning">
                    <span class="glyphicon glyphicon-search"></span>
                      Chercher...</button>

                     &nbsp; &nbsp;

                     <button class="btn btn-success">
                      <a href="nouvelleFiliere.php">
                      <span class="glyphicon glyphicon-plus"></span>
                        Ajouter Filière</a></button>
         </form>
      </div>
    </div>


    <div class="panel panel-primary margetop">
      <div class="panel-heading">Liste des Filières (<?php echo $nbrfiliere ?> Filières)</div>
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Numéro Filière</th> <th>Nom de la Filière</th> <th>Niveaux</th> <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                     <?php while ($filiere = $resultatF->fetch()) {?>

                        <tr>
                        <td><?php echo $filiere["idFiliere"] ?></td>
                        <td><?php echo $filiere["nomFiliere"] ?></td>
                        <td><?php echo $filiere["niveau"] ?></td>
                        <th>
                          <a href="editerFiliere.php?idF=<?php echo $filiere["idFiliere"] ?>">
                          <span class="glyphicon glyphicon-edit btn btn-info"></span>
                        </a>
                        &nbsp; &nbsp;
                        <a onclick="return confirm('Confirmez la Suppression de la filière.')"
                        href="supprimerFiliere.php?idF=<?php echo $filiere["idFiliere"] ?>">
                       <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                      </a>
                    </th>
                        </tr>

                        <?php }?>

                </tbody>
            </table>
            <div>
              <ul class="pagination">
              <?php for ($i = 1; $i <= $nbrpage; $i++) {?>
                <li class="<?php if ($i == $page) {
                  echo 'active';
                }?>">
            <a href="filieres.php?page=<?php echo $i; ?>&nomF=<?php echo $nomf ?>&niveau=<?php echo $niveau ?>">
                 <?php echo $i; ?>
            </a>
            </li>
              <?php }?>
              </ul>
            </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>
