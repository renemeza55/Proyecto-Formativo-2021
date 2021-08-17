 // Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../api/private/proveedor.php?action=';

function openModal(){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);
    instance.open();
    document.getElementById("modal-form").reset();
    document.getElementById('model-titel').innerHTML = "Agregar Proveedor";
};

function updateModal(id,nombre,desc){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);

    document.getElementById("modal-form").reset();

    document.getElementById('model-titel').innerHTML = "Actualizar Proveedor";

    document.getElementById('id').value = id;
    document.getElementById('name').value = nombre;
    document.getElementById('desc').value = desc;

    instance.open();
};

document.getElementById('modal-form').addEventListener('submit', function (event) {
    event.preventDefault();
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if ('Agregar Proveedor'== document.getElementById('model-titel').innerHTML) {
        action = 'create';
    } else {
        action = 'update';
    }

    fetch( API_USUARIOS  + action, {
        method: 'POST',
        body: new FormData(document.getElementById('modal-form'))
    }).then(function (request) {
        //Valida si la peticion es correcta de lo contrario muestra un error.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'proveedor.php');
                    
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

function graphModal(id_proveedor) {
    var Modalelem = document.getElementById('graph-modal');
    var instance = M.Modal.init(Modalelem);
    instance.open();
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_proveedor', id_proveedor);
    // Se relaciona la api con la gráfica
    fetch(API_USUARIOS + 'comprasMasRecientes', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let fecha_bitacora = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        fecha_bitacora.push(row.fecha_bitacora);
                        cantidad.push(row.cantidad)
                    });
                    document.getElementById('proveedor').innerHTML = '';
                    document.getElementById('proveedor').innerHTML = '<canvas id="chart1"></canvas>';
                    // Se llama a la función que genera y muestra una gráfica de linea . Se encuentra en el archivo components.js
                    barGraph('chart1', fecha_bitacora, cantidad,'Cantidad de compras', 'Top 10 de fechas con más compras');
                //Si no se cumple, se borra la gráfica y no la muestra
                } else {
                    document.getElementById('mensaje_proveedor').textContent = response.exception;
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
