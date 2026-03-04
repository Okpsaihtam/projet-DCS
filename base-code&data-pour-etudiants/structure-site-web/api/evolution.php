<?php
// ===== ÉVOLUTION MENSUELLE DE LA CONSOMMATION =====
// Retourne la consommation totale du campus mois par mois
// entre janvier et juin 2025, au format JSON

require 'connexion.php';

// On additionne toutes les consommations par mois
// sur la période janvier à juin 2025
$sql = "
    SELECT 
        DATE_FORMAT(mois, '%M %Y') AS mois_label,
        ROUND(SUM(volume), 2) AS total_consommation
    FROM consommation
    WHERE mois BETWEEN '2025-01-01' AND '2025-06-30'
    GROUP BY mois
    ORDER BY mois ASC
";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// On envoie les données en JSON au navigateur
header('Content-Type: application/json');
echo json_encode($resultats);
?>