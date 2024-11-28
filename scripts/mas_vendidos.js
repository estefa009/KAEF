
var ctx = document.getElementById('mas_vendidos').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie', // Tipo de gráfico: 'line', 'bar', 'pie', etc.
    data: {
        labels: ['DonasMix', 'ChocoDonas', 'DonasArequi'], // Etiquetas del eje X
        datasets: [{
            
            data: [60, 25, 15], // Datos del gráfico
            backgroundColor: '#ce7b8e', // Color de fondo
            borderColor: 'rgb(123, 116, 116)', // Color del borde
            borderWidth: 2 ,// Ancho del borde
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true // Empieza el eje Y desde cero
            }
        }
    }
});