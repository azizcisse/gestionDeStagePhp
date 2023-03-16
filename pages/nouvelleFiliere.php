<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Formulaire d'Ajout des Filières</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>

<?php include("menu.php"); ?>
<div class="container">
    <div class="panel panel-primary margetop">
      <div class="panel-heading">Ajouter Une Nouvelle Filière</div>
      <div class="panel-body"> 
        <form method="post" action="insertFiliere.php" class="form">

            <div class="form-group">
            <label for="nomFiliere"> Nom de la filière:</label>
            <input type="text" name="nomF" placeholder="Taper le nom de la filière" class="form-control"/>
            </div>
            <div class="form-group">
            <label for="niveau"> Niveau : </label>
            <select name="niveau" class="form-control" id="niveau">

                        <option value="MASTER">Master</option>

                        <option value="LICENCE">Licence</option>

                        <option value="BREVET DE TECHNICIEN SUPERIEUR">Brevet de Technicien Supérieur</option>

                        <option value="TECHNICIEN SPECIALISE">Technicien Spécialisé</option>

                        <option value="DOCTORAT">Doctorat</option>

                        <option value="QUALIFICATION">Qualification</option>
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
