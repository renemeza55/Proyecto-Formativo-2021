const API_RESERVACIONES = '../../api/public/recervaciones.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    graficaReservacionesRecientes();
});

// Función para mostrar los prodcutos mas caros en una gráfica de linea.
function graficaReservacionesRecientes() {
    // Se relaciona la api con la gráfica
    fetch(API_RESERVACIONES + 'reservacionesMasRecientes', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let dia = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        dia.push(row.dia);
                        cantidad.push(row.cantidad)
                    });
                    // Se llama a la función que genera y muestra una gráfica de linea . Se encuentra en el archivo components.js
                    barGraph('chart1', dia, cantidad,'Cantidad de reservaciones', 'Top 10 fechas con más reservaciones');
                //Si no se cumple, se borra la gráfica y no la muestra
                } else {
                    document.getElementById('chart1').remove();
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
        // Se captura el estado del comentario 
    }).catch(function (error) {
        console.log(error);
    });

}