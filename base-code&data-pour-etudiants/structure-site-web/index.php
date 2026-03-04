<?php
// Page principale du tableau de bord - Campus IT
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord - Campus IT</title>

    <!-- Notre feuille de style -->
    <link rel="stylesheet" type="text/css" href="style.css" />

    <!-- La librairie Chart.js pour afficher les graphiques -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h1>📊 Tableau de bord – Consommation des ressources IT</h1>

    <!-- ===== BARRE D'ONGLETS ===== -->
    <div class="tab">
        <button class="tablinks active" onclick="openTab(event, 'Tab1')">
            🏆 Top 5 Applications
        </button>
        <button class="tablinks" onclick="openTab(event, 'Tab2')">
            📈 Évolution mensuelle
        </button>
        <button class="tablinks" onclick="openTab(event, 'Tab3')">
            ⚖️ Stockage vs Réseau
        </button>
    </div>

    <!-- ===== ONGLET 1 : Top 5 des applications ===== -->
    <div id="Tab1" class="tabcontent" style="display:block;">
        <h2>Top 5 des applications les plus consommatrices</h2>
        <p>Toutes ressources et tous mois confondus</p>
        <!-- Le canvas est la zone où Chart.js va dessiner le graphique -->
        <div class="chart-container">
            <canvas id="graphTop5"></canvas>
        </div>
    </div>

    <!-- ===== ONGLET 2 : Évolution mensuelle ===== -->
    <div id="Tab2" class="tabcontent">
        <h2>Évolution mensuelle de la consommation</h2>
        <p>Janvier à Juin 2025 – toutes applications et ressources confondues</p>
        <div class="chart-container">
            <canvas id="graphEvolution"></canvas>
        </div>
    </div>

    <!-- ===== ONGLET 3 : Comparaison Stockage vs Réseau ===== -->
    <div id="Tab3" class="tabcontent">
        <h2>Comparaison Stockage vs Réseau</h2>
        <p>Mois par mois – Janvier à Juin 2025</p>
        <div class="chart-container">
            <canvas id="graphComparaison"></canvas>
        </div>
    </div>

    <!-- Notre fichier JavaScript pour les onglets et les graphiques -->
    <script src="script.js"></script>

</body>
</html>