<?php
require_once "connexiondb.php";

$requete = "SELECT * FROM filiere";
$resultatF = $pdo->query($requete);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestion des Filières</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
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
            <input type="text" name="name" placeholder="Taper le nom de la filière" class="form-control">
            </div>
            Niveau :
              <select>
                        <option>Tous les niveaux</option>
                        <option>Développeur Web / mobile</option>
                        <option>It Sécurité</option>
                        <option>Technicien Réseaux</option>
                        <option>Comptabilité</option>
                        <option>Ressources Humaines</option>
                        <option>Qualification</option>
                    </select>
                    <input type="submit" value="Rechercher...">
            

         </form>
      </div>
    </div>

    <div class="panel panel-primary margetop">
      <div class="panel-heading">Liste des Filières</div>
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id Filières</th> <th>Nom de la Filière</th> <th>Niveau</th>
                    </tr>
                </thead>
                <tbody>

                     <?php while ($filiere = $resultatF->fetch()) {?>

                        <tr>
                        <td><?php echo $filiere["idFiliere"] ?></td>
                        <td><?php echo $filiere["nomFiliere"] ?></td>
                        <td><?php echo $filiere["niveau"] ?></td>
                        </tr>

                        <?php }?>

                </tbody>
            </table>
        </div>

      </div>
    </div>
</div>


</body>
</html>
