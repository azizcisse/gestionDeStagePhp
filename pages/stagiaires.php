<?php
     require_once("connexiondb.php");
  
    $prenomNom=isset($_GET['prenomNom'])?$_GET['prenomNom']:"";
    $idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteFiliere="SELECT * FROM filiere";

    if($idfiliere==0){
        $requeteStagiaire="SELECT idStagiaire,prenom,nom,nomFiliere,photo,civilite 
                FROM filiere AS f,stagiaire AS s
                WHERE f.idFiliere=s.idFiliere
                AND (nom LIKE '%$prenomNom%' OR prenom LIKE '%$prenomNom%')
                ORDER BY idStagiaire
                LIMIT $size
                OFFSET $offset";
        
        $requeteCount="SELECT count(*) countS FROM stagiaire
                WHERE prenom LIKE '%$prenomNom%' OR nom LIKE '%$prenomNom%'";
    }else{
         $requeteStagiaire="SELECT idStagiaire,prenom,nom,nomFiliere,photo,civilite 
                FROM filiere AS f,stagiaire AS s
                WHERE f.idFiliere=s.idFiliere
                AND (prenom LIKE '%$prenomNom%' OR nom LIKE '%$prenomNom%')
                AND f.idFiliere=$idfiliere
                ORDER BY idStagiaire
                LIMIT $size
                OFFSET $offset";
        
        $requeteCount="SELECT count(*) countS FROM stagiaire
                WHERE (prenom LIKE '%$prenomNom%' OR nom LIKE '%$prenomNom%')
                AND idFiliere=$idfiliere";
    }

    $resultatFiliere=$pdo->query($requeteFiliere);
    $resultatStagiaire=$pdo->query($requeteStagiaire);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrstagiaire =$tabCount['countS'];
    $reste=$nbrstagiaire  % $size;   
    if($reste===0) 
        $nbrpage=$nbrstagiaire / $size;   
    else
        $nbrpage=floOR($nbrstagiaire / $size)+1;  
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewpORt" content="width=device-width, initial-scale=1">
<title>Gestion des Stagiaires</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>

<?php include "menu.php";?>
<div class="container">
<div class="panel panel-success margetop">
      <div class="panel-heading">Rechercher des Stagiaires...</div>
      <div class="panel-body">
      <form method="get" action="stagiaires.php" class="form-inline">
            <div class="form-group">
            <input type="text" name="prenomNom"
               placeholder="Prénom et Nom"
               class="form-control"
               value="<?php echo $prenomNom ?>">
            </div>
            <label for="idfiliere"> Filière : </label>
            <select name="idfiliere" class="form-control" id="idfiliere"
                                onchange="this.form.submit()">
                                <option value=0>Toutes les filières</option>
                                    
                                    <?php while ($filiere=$resultatFiliere->fetch()) { ?>
                                    
                                        <option value="<?php echo $filiere['idFiliere'] ?>"
                                        
                                            <?php if($filiere['idFiliere']===$idfiliere) echo "selected" ?>>
                                            
                                            <?php echo $filiere['nomFiliere'] ?> 
                                            
                                        </option>
                                        
                                    <?php } ?>                
                        </select>

                    <button type="submit" class="btn btn-warning">
                    <span class="glyphicon glyphicon-search"></span>
                      Chercher...</button>

                     &nbsp; &nbsp;

                     <button class="btn btn-success">
                      <a href="nouveauStagiaire.php">
                      <span class="glyphicon glyphicon-plus"></span>
                        Ajouter Stagiaire</a></button>
         </form>
      </div>
    </div>


    <div class="panel panel-primary margetop">
      <div class="panel-heading">Liste des Stagiaires (<?php echo $nbrstagiaire  ?> Stagiaires)</div>
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Numéro Stagiaire</th> <th>Prénom</th> <th>Nom</th> <th>Civilité</th>
                        <th>Filière</th> <th>Photo</th> <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                     <?php while ($stagiaire = $resultatStagiaire->fetch()) {?>

                        <tr>
                        <td><?php echo $stagiaire["idStagiaire"] ?></td>
                        <td><?php echo $stagiaire["prenom"] ?></td>
                        <td><?php echo $stagiaire["nom"] ?></td>
                        <td><?php echo $stagiaire["civilite"] ?></td>
                        <td><?php echo $stagiaire["nomFiliere"] ?></td>
                        <td><img src="../images/<?php echo $stagiaire['photo']?>"
                                  width="50px" height="50px" class="img-circle"></td>
                        <th>
                          <a href="editerStagiaire.php?idS=<?php echo $stagiaire["idStagiaire"] ?>">
                          <span class="glyphicon glyphicon-edit btn btn-info"></span>
                        </a>
                        &nbsp; &nbsp;
                        <a onclick="return confirm('Confirmez la Suppression du Stagiaire.')"
                        href="supprimerStagiaire.php?idS=<?php echo $stagiaire["idStagiaire"] ?>">
                       <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                      </a>
                    </th>
                        </tr>

                        <?php }?>

                </tbody>
            </table>
            <div>
              <ul class="pagination">
              <?php fOR ($i = 1; $i <= $nbrpage; $i++) {?>
                <li class="<?php if ($i == $page) {
                  echo 'active';
                }?>">
            <a href="stagiaires.php?page=<?php echo $i; ?>&prenomNom=<?php echo $prenomNom ?>&idfiliere=<?php echo $idfiliere ?>">
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
