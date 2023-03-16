<?php 
$message = isset($_GET['message'])?$_GET['message']:"Erreur";


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Page d'Alerte</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>

<?php include("menu.php"); ?>
<div class="container">
<div class="panel panel-danger margetop">
      <div class="panel-heading">
        <h4>Erreur:</h4>
    </div>
      <div class="panel-body">
      <h3> <?php echo $message ?> </h3>
      <h4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" > Retour >>> </a></h4>
      </div>
    </div>

</body>
</html>
