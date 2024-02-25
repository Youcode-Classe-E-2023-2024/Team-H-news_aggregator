console.log("Youcode");

document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/donnees-graphique')
        .then(response => response.json())
        .then(donnees => {
            console.log("Données récupérées :", donnees);

            var dates = Object.keys(donnees);
            var valeurs = Object.values(donnees);

            var ctx = document.getElementById('graphique').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Nombre d\'enregistrements',
                        data: valeurs,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des données:', error);
        });
});

