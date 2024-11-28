
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line', // Tipo de gráfico: 'line', 'bar', 'pie', etc.
    data: {
        labels: ['Harina', 'Chocolate', 'Toppings', 'Azucar', 'Chocolate', 'Areq..'], // Etiquetas del eje X
        datasets: [{
            label: 'venta',
            data: [12, 19, 3, 5, 2, 3], // Datos del gráfico
            backgroundColor: 'rgb(123, 116, 116)', // Color de fondo
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