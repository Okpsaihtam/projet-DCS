<?php
// ===== TOP 5 DES APPLICATIONS LES PLUS CONSOMMATRICES =====
// Retourne les 5 applications ayant le plus consommé
// toutes ressources et tous mois confondus, au format JSON

require __DIR__ . '/connexion.php';

// On additionne les volumes par application
// On trie du plus grand au plus petit et on prend les 5 premiers
$sql = "
    SELECT 
        a.nom AS application,
        ROUND(SUM(c.volume), 2) AS total_consommation
    FROM consommation c
    JOIN application a ON c.app_id = a.app_id
    GROUP BY a.app_id, a.nom
    ORDER BY total_consommation DESC
    LIMIT 5
";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// On envoie les données en JSON au navigateur
header('Content-Type: application/json');
echo json_encode($resultats);
?>