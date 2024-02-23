$(document).ready(function(){
    // JavaScript AJAX request
    $.ajax({
        url: '/admin/getUserRegistrationTrend',
        type: 'GET',
        success: function(response) {

            var ctx = document.getElementById('userRegistrationChart').getContext('2d');
            var userRegistrationChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: response.labels,
                    datasets: [{
                        label: 'Nombre d\'utilisateurs enregistrés',
                        data: response.data,
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
        },
        error: function(xhr, status, error) {

            console.error(error);
        }
    });
});
