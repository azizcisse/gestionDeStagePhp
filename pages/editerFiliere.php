<?php
 require_once "connexiondb.php";

 $idf = isset($_GET['idF'])?$_GET['idF']:0;
 $requete ="SELECT * FROM filiere WHERE idFiliere=$idf";
 $resultat = $pdo->query($requete);
 $filiere = $resultat->fetch(); 
 $nomf = $filiere['nomFiliere'];
 $niveau = $filiere['niveau'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Formulaire d'Edition des Filières</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>

<?php include("menu.php"); ?>
<div class="container col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-3">
    <div class="panel panel-primary margetop">
      <div class="panel-heading">Modification de la Filière</div>
      <div class="panel-body"> 
        <form method="post" action="updateFiliere.php" class="form">
            
            
            <div class="form-group">
            <label for="idF"> Id de la filière:</label>
            <input type="hidden" name="idF" class="form-control" value="<?php echo $idf ?>"/>
            </div>

            <div class="form-group">
            <label for="nomFiliere"> Nom de la filière:</label>
            <input type="text" name="nomF" placeholder="Taper le nom de la filière" class="form-control" value="<?php echo $nomf ?>"/>
            </div>

            <div class="form-group">
            <label for="niveau"> Niveau : </label>
            <select name="niveau" class="form-control" id="niveau">

                        <option value="MASTER" <?php if($niveau=="MASTER") echo "selected" ?>>Master</option>

                        <option value="LICENCE" <?php if($niveau=="LICENCE") echo "selected" ?>>Licence</option>

                        <option value="BREVET DE TECHNICIEN SUPERIEUR" <?php if($niveau=="BREVET DE TECHNICIEN SUPERIEUR") echo "selected" ?>>Brevet de Technicien Supérieur</option>

                        <option value="TECHNICIEN SPECIALISE" <?php if($niveau=="TECHNICIEN SPECIALISE") echo "selected" ?>>Technicien Spécialisé</option>

                        <option value="DOCTORAT" <?php if($niveau=="DOCTORAT") echo "selected" ?>>Doctorat</option>

                        <option value="QUALIFICATION" <?php if($niveau=="QUALIFICATION") echo "selected" ?>>Qualification</option>
                      </select>
                      </div>
                

                    <button type="submit" class="btn btn-success mb-3">
                    <span class="glyphicon glyphicon-save"></span>
                      Ajouter</button>
         </form>
        </div>
    </div>
</div>

</body>
</html>
