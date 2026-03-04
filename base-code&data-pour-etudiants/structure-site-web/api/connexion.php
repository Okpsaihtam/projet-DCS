<?php
// ===== CONNEXION À LA BASE DE DONNÉES =====
// Ce fichier est inclus dans tous les fichiers de l'API
// Il suffit de modifier ici si les identifiants changent

$host     = 'localhost';
$dbname   = 'campus_it';
$user     = 'root';
$password = ''; // À adapter avec le mot de passe MariaDB de la VM

try {
    // Création de la connexion PDO
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $password
    );
    // Active l'affichage des erreurs SQL pour faciliter le débogage
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // En cas d'erreur on arrête tout et on affiche le message d'erreur
    die(json_encode(['erreur' => 'Connexion impossible : ' . $e->getMessage()]));
}
?>