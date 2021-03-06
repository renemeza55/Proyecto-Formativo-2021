// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../api/private/usuarios.php?action=';

window.addEventListener("load", function(){
    vergrafica();
});

function openModal(){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);
    instance.open();
    document.getElementById("modal-form").reset();
    document.getElementById('model-titel').innerHTML = "Agregar usuario";
    document.getElementById('estado').style.display = 'none'
    document.getElementById('user').disabled = false;
};

function updateModal(id,user,name,last,email,estado){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);

    document.getElementById("modal-form").reset();

    document.getElementById('model-titel').innerHTML = "Actualizar usuario";

    document.getElementById('id').value = id;
    document.getElementById('name').value = name;
    document.getElementById('lastname').value = last;
    document.getElementById('user').value = user;
    document.getElementById('user').disabled = true;
    document.getElementById('email').value = email;
    document.getElementById('estado').style.display = 'block'
    document.getElementById('estado').value = estado;

    instance.open();
};

document.getElementById('modal-form').addEventListener('submit', function (event) {
    event.preventDefault();
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if ('Agregar usuario'== document.getElementById('model-titel').innerHTML) {
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
                    sweetAlert(1, response.message, 'usuarios.php');
                    
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


function reset(idUser){
    const data = new FormData();
    data.append('id', idUser);

    swal({
        text: '¿Está seguro de restaurar la contraseña del usuario?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        if (value) {
            fetch(API_USUARIOS + 'restaurar', {
                method: 'POST',
                body: data,
            }).then(function (request) {
                if (request.ok) {
                    request.json().then(function (response) {
                        if (response.status) {
                            sweetAlert(1, response.message, 'usuarios.php');
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

function deletaProduct(idUser){
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id', idUser);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    delateData(API_USUARIOS, data, 'bodega.php');
}


function opnGrafic(){
    var Modalelem = document.getElementById('grafic');
    var instance = M.Modal.init(Modalelem);
    instance.open();
};

function vergrafica(){
    fetch(API_USUARIOS + 'graficaEstado', {
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
                        tipo.push(row.estado_usuario);
                        cantidad.push(row.cantidad)
                    });
                    // Se llama a la función que genera y muestra una gráfica de linea . Se encuentra en el archivo components.js
                    barGraph('chart1', tipo, cantidad,'Cantidad de usuarios por estado', 'Muestra la cantadad de usuarios y la clasifica por los estados corespondientes.');
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