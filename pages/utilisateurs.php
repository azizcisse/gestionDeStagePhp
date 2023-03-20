<?php
     require_once "identifier.php";

     require_once "connexiondb.php";
  
    $login=isset($_GET['login'])?$_GET['login']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteUtilisateur="SELECT * FROM utilisateur WHERE login LIKE '%$login%'";
        
    $requeteCount="SELECT count(*) countU FROM utilisateur";

    $resultatUtilisateur=$pdo->query($requeteUtilisateur);
    $requeteUtilisateur=$pdo->query($requeteUtilisateur);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrUtilisateur =$tabCount['countU'];
    $reste=$nbrUtilisateur  % $size;   
    if($reste===0) 
        $nbrpage=$nbrUtilisateur / $size;   
    else
        $nbrpage=floOR($nbrUtilisateur / $size)+1;  
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestion des Utilisateurs</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>

<?php include "menu.php";?>
<div class="container">
<div class="panel panel-success margetop">
      <div class="panel-heading">Rechercher des Utilisateurs...</div>
      <div class="panel-body">
      <form method="get" action="utilisateurs.php" class="form-inline">
            <div class="form-group">
            <input type="text" name="login"
               placeholder="Login"
               class="form-control"
               value="<?php echo $login ?>">
            </div>

                    <button type="submit" class="btn btn-warning">
                    <span class="glyphicon glyphicon-search"></span>
                      Chercher...</button>

                     &nbsp; &nbsp;
                     
                     <?php if($_SESSION['utilisateur']['role'] == 'ADMIN') { ?>
                      <a href="nouvelUtilisateur.php"  class="btn btn-success">
                      <span class="glyphicon glyphicon-plus"></span>
                        Ajouter Utilisateur</a>
                        <?php }?>
         </form>
         </form>
      </div>
    </div>


    <div class="panel panel-primary margetop">
      <div class="panel-heading">Liste des Utilisateurs (<?php echo $nbrUtilisateur  ?> Utilisateurs)</div>
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Login</th> <th>Email</th> <th>Role</th> 
                        <?php if($_SESSION['utilisateur']['role'] == 'ADMIN') { ?>
                        <th>Actions</th>
                        <?php  } ?>
                    </tr>
                </thead>
                <tbody>

                     <?php while ($utilisateur = $resultatUtilisateur->fetch()) {?>

                        <tr class="<?php echo $utilisateur['etat']==1?'success':'danger' ?> ">
                        <td><?php echo $utilisateur["login"] ?></td>
                        <td><?php echo $utilisateur["email"] ?></td>
                        <td><?php echo $utilisateur["role"] ?></td>
                    
                        <?php if($_SESSION['utilisateur']['role'] == 'ADMIN') { ?>
                        <td>
                          <a href="editerUtilisateur.php?idUser=<?php echo $utilisateur["idUser"] ?>">
                          <span class="glyphicon glyphicon-edit btn btn-info"></span>
                        </a>
                        &nbsp; &nbsp;
                        <a onclick="return confirm('Confirmez la Suppression de l\'Utilisateur.')"
                        href="supprimerUtilisateur.php?idUser=<?php echo $utilisateur["idUser"] ?>">
                       <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                      </a>
                      &nbsp; &nbsp;
                      <a href="activerUtilisateur.php?idUser=<?php echo $utilisateur["idUser"] ?>&etat=<?php echo $utilisateur["etat"] ?>" >
                      <?php 
                           if ($utilisateur['etat']==1) 
                               echo '<span class="glyphicon glyphicon-remove btn btn-primary"></span>';
                            else
                               echo '<span class="glyphicon glyphicon-ok btn btn-primary"></span>';
                      ?>
                       </a>
                    </th>
                    <?php  } ?>
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
            <a href="utilisateurs.php?page=<?php echo $i; ?>&login=<?php echo $login ?>">
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
