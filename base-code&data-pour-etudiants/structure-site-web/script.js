// ===== GESTION DES ONGLETS =====
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;

    // On cache tous les contenus d'onglets
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // On retire la classe active de tous les boutons
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // On affiche l'onglet cliqué et on active son bouton
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// ===== CHARGEMENT DES GRAPHIQUES AU DÉMARRAGE =====
document.addEventListener('DOMContentLoaded', function () {

    // ---- ONGLET 1 : Top 5 des applications ----
    // On appelle le fichier PHP qui retourne les données en JSON
    fetch('api/top5.php')
        .then(response => response.json())
        .then(data => {
            // On extrait les noms des applications et leurs consommations totales
            var labels = data.map(item => item.application);
            var valeurs = data.map(item => item.total_consommation);

            // On crée le graphique en barres dans le canvas graphTop5
            new Chart(document.getElementById('graphTop5'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Consommation totale (toutes unités confondues)',
                        data: valeurs,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                }
            });
        });

    // ---- ONGLET 2 : Évolution mensuelle ----
    // On appelle le fichier PHP qui retourne l'évolution mois par mois
    fetch('api/evolution.php')
        .then(response => response.json())
        .then(data => {
            // On extrait les mois et les totaux de consommation
            var labels = data.map(item => item.mois_label);
            var valeurs = data.map(item => item.total_consommation);

            // On crée le graphique en courbe dans le canvas graphEvolution
            new Chart(document.getElementById('graphEvolution'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Consommation totale mensuelle',
                        data: valeurs,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.3,
                        fill: true
                    }]
                }
            });
        });

    // ---- ONGLET 3 : Comparaison Stockage vs Réseau ----
    // On appelle le fichier PHP qui retourne les données Stockage et Réseau
    fetch('api/comparaison.php')
        .then(response => response.json())
        .then(data => {
            // On sépare les données Stockage et Réseau
            var stockage = data.filter(item => item.ressource === 'Stockage');
            var reseau   = data.filter(item => item.ressource === 'Réseau');
            // Les labels sont les mois (on les prend depuis Stockage)
            var labels   = stockage.map(item => item.mois_label);

            // On crée le graphique en barres groupées dans le canvas graphComparaison
            new Chart(document.getElementById('graphComparaison'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Stockage (Go)',
                            data: stockage.map(item => item.total),
                            backgroundColor: 'rgba(255, 99, 132, 0.6)'
                        },
                        {
                            label: 'Réseau (Go)',
                            data: reseau.map(item => item.total),
                            backgroundColor: 'rgba(255, 205, 86, 0.6)'
                        }
                    ]
                }
            });
        });
});