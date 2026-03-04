<?php
// ===== COMPARAISON STOCKAGE VS RÉSEAU =====
// Retourne la consommation du Stockage (res_id=1) 
// et du Réseau (res_id=3) mois par mois
// entre janvier et juin 2025, au format JSON

require 'connexion.php';

// On filtre uniquement sur Stockage et Réseau
// On groupe par mois et par ressource
$sql = "
    SELECT 
        DATE_FORMAT(c.mois, '%M %Y') AS mois_label,
        r.nom AS ressource,
        ROUND(SUM(c.volume), 2) AS total
    FROM consommation c
    JOIN ressource r ON c.res_id = r.res_id
    WHERE c.res_id IN (1, 3)
      AND c.mois BETWEEN '2025-01-01' AND '2025-06-30'
    GROUP BY c.mois, r.res_id, r.nom
    ORDER BY c.mois ASC, r.res_id ASC
";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// On envoie les données en JSON au navigateur
header('Content-Type: application/json');
echo json_encode($resultats);
?>
```

Sauvegardez (`Ctrl+S`)

---

## ✅ Vérification finale de l'arborescence

À ce stade votre dossier `structure-site-web` doit ressembler à ça :
```
structure-site-web/
├── index.php        ✅
├── style.css        ✅
├── script.js        ✅
└── api/
    ├── connexion.php  ✅
    ├── top5.php       ✅
    ├── evolution.php  ✅
    └── comparaison.php ✅