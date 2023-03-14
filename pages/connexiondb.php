<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=gestionstage", "root", "");
} catch (Exception $e) {
    die("Erreur de Connexion :" . $e->getMessage());
}
