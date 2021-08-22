// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../../api/private/menu.php?action=';

window.addEventListener("load", function(){
    graficaTopPlatillos();
    graficaTopBebidas();
});


function updateModal(id,fecha,desc){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);

    document.getElementById("modal-form").reset();

    document.getElementById('model-titel').innerHTML = "Actualizar Menu";

    document.getElementById('id').value = id;
    document.getElementById('fecha').value = fecha;
    document.getElementById('desc').value = desc;
    instance.open();
};

function insertMenu(){
    swal({
        text: '¿Está seguro que quieres agregar un menú?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        if (value) {
            fetch(API + 'add', {
            }).then(function (request) {
                if (request.ok) {
                    request.json().then(function (response) {
                        if (response.status) {
                            sweetAlert(1, response.message, 'menu.php');
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
        } 
    });
}

document.getElementById('modal-form').addEventListener('submit', function (event) {
    event.preventDefault();

    fetch( API  + 'update', {
        method: 'POST',
        body: new FormData(document.getElementById('modal-form'))
    }).then(function (request) {
        //Valida si la peticion es correcta de lo contrario muestra un error.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'menu.php');
                    
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


function opnGrafic(){
    var Modalelem = document.getElementById('grafic');
    var instance = M.Modal.init(Modalelem);
    instance.open();
};

function opnGrafic2(){
    var Modalelem = document.getElementById('grafic2');
    var instance = M.Modal.init(Modalelem);
    instance.open();
};

function graficaTopPlatillos(){
    fetch(API + 'graficaTopPlatillos', {
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
                        tipo.push(row.nombre_platillo);
                        cantidad.push(row.cantidad)
                    });
                    // Se llama a la función que genera y muestra una gráfica de linea . Se encuentra en el archivo components.js
                    barGraph('chart1', tipo, cantidad,'Top 10 de platillos en el menu', 'Muestra los 10 platillos mas frecuentes en el menu.');
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

function graficaTopBebidas(){
    fetch(API + 'graficaTopBebidas', {
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
                        tipo.push(row.nombre_bebida);
                        cantidad.push(row.cantidad)
                    });
                    // Se llama a la función que genera y muestra una gráfica de linea . Se encuentra en el archivo components.js
                    barGraph('chart2', tipo, cantidad,'Top 10 de platillos en el menu', 'Muestra los 10 platillos mas frecuentes en el menu.');
                //Si no se cumple, se borra la gráfica y no la muestra
                } else {
                    document.getElementById('chart2').remove();
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