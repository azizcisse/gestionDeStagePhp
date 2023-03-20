<?php
session_start();

if (!isset($_SESSION['utilisateur'])) {
    header('location:login.php');
    exit();
} else {
    if ($_SESSION['utilisateur']['role'] != 'ADMIN') {
        header('location:seDeconnecter.php');
        exit();
    }
}

?>
