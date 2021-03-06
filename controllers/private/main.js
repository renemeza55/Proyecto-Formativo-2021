const API_RESERVACIONES = '../../api/public/recervaciones.php?action=';
const API_PLATILLOS = '../../api/private/platillos.php?action=';
const API_BEBIDAS = '../../api/private/bebidas.php?action=';



document.addEventListener('DOMContentLoaded', function () {
    graficaReservacionesRecientes();
    graficaLineaPlatillos();
    graficaBebidasmascaras();
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

// Función para mostrar el top 10 de productos mas vendidos en una gráfica de linea.
function graficaLineaPlatillos() {
    fetch(API_PLATILLOS + 'Platillomascaro', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let Platillo = [];
                    let precio = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        Platillo.push(row.nombre_platillo);
                        precio.push(row.precio);
                    });
                    // Se llama a la función que genera y muestra una gráfica de linea . Se encuentra en el archivo components.js
                    lineGraph('chart4', Platillo ,precio,'Precio de platillo', 'Top 10 Platillos mas caros');

                } else {
                    document.getElementById('chart4').remove();
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
// Función para mostrar el top 10 de productos mas vendidos en una gráfica de linea.
function graficaBebidasmascaras() {
    fetch(API_BEBIDAS + 'Bebidamascara', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let Bebida = [];
                    let precio = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        Bebida.push(row.nombre_bebida);
                        precio.push(row.precio);
                    });
                    // Se llama a la función que genera y muestra una gráfica de linea . Se encuentra en el archivo components.js
                    polarGraph('chart3', Bebida ,precio,'Precio de bebida', 'Top 10 bebidas mas caras');

                } else {
                    document.getElementById('chart3').remove();
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