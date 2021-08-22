const API = '../../api/public/recervaciones.php?action=';

function finalizar(id,nombre,desc){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);

    document.getElementById("modal-form").reset();

    document.getElementById('id').value = id;

    instance.open();
}

window.addEventListener("load", function(){
    vergrafica();
});

document.getElementById('modal-form').addEventListener('submit', function (event) {
   
    event.preventDefault();

    fetch( API+'update', {
        method: 'POST',
        body: new FormData(document.getElementById('modal-form')),
    }).then(function (request) {
        //Valida si la peticion es correcta de lo contrario muestra un error.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'reservaciones.php');
                    
                } else {
                    sweetAlert(2, response.exception, null);
                    
                }
            });
        } else {    
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) { 
        console.log(error);
    });
});

function vergrafica(){
    fetch(API + 'graficaTipo', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let tipo = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        tipo.push(row.tipo_reserv);
                        cantidad.push(row.cantidad)
                    });
                    // Se llama a la función que genera y muestra una gráfica de linea . Se encuentra en el archivo components.js
                    barGraph('chart1', tipo, cantidad,'Cantidad de reservacion por tipo', 'Muestra todas las reservaciones hechas y clasificadas por los tipos.');
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

function opnGrafic(){
    var Modalelem = document.getElementById('grafic');
    var instance = M.Modal.init(Modalelem);
    instance.open();
};