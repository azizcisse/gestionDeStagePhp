<?php
require_once "identifier.php";

require_once "connexiondb.php";

$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : 0;

$requete = "SELECT * FROM utilisateur WHERE idUser=$idUser";

$resultat = $pdo->query($requete);
$utilisateur = $resultat->fetch();

$login = $utilisateur['login'];
$email = $utilisateur['email'];

?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un Utilisateur</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include "menu.php";?>

        <div class="container col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-3">

             <div class="panel panel-primary margetop">
                <div class="panel-heading">Edition de l'Utilisateur:</div>
                <div class="panel-body">
                    <form method="post" action="updateUtilisateur.php" class="form">
						<div class="form-group">
                             <!-- label for="idUser">Id de l'Utilisateur :</label!-->
                            <input type="hidden" name="idUser" class="form-control" 
                                   value="<?php echo $idUser ?>"/>
                        </div>

                        <div class="form-group">
                             <label for="login">Login :</label>
                            <input type="text" name="login" placeholder="Login" class="form-control"
                                   value="<?php echo $login ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="email">Email :</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $email ?>"/>
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>

                        &nbsp; &nbsp;

                        <button class="btn btn-warning">
                        <span class="glyphicon glyphicon-erase"></span>
                        <a href="editPwd.php?idUser=<?php echo $idUser ?>">Changer le Mot de Passe</a>
                        </button>
					</form>
                </div>
            </div>
        </div>
    </body>
</html>

                      
