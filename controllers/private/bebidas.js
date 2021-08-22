// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../api/private/bebidas.php?action=';

function openModal(){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);
    instance.open();
    document.getElementById("modal-form").reset();
    document.getElementById('model-titel').innerHTML = "Agregar Bebida";
};

function updateModal(id,nombre,desc,precio,tipo,img){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);

    document.getElementById("modal-form").reset();

    document.getElementById('model-titel').innerHTML = "Actualizar Bebida";

    document.getElementById('id').value = id;
    document.getElementById('name').value = nombre;
    document.getElementById('desc').value = desc;
    document.getElementById('precio').value = precio;
    document.getElementById('tipo').value = tipo;

    instance.open();
};

document.getElementById('modal-form').addEventListener('submit', function (event) {
    event.preventDefault();
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if ('Agregar Bebida'== document.getElementById('model-titel').innerHTML) {
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
                    sweetAlert(1, response.message, 'bebidas.php');
                    
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


//------------------------------------reportes

function openReport(){
    var Modalelem = document.getElementById('report');
    var instance = M.Modal.init(Modalelem);
    instance.open();
    document.getElementById("report-form").reset();
    document.getElementById('reportOption').style.display ='none';
};

function tipoReporte(x){
    var tipoR1 = document.getElementById('tipoR1');
    var tipoR2 = document.getElementById('tipoR2');
    var tipoR3 = document.getElementById('tipoR3');

    switch(x){
        case 1:
            tipoR1.checked = true;
            tipoR2.checked = false;
            tipoR3.checked = false;
            document.getElementById('reportOption').style.display ='none';
            break;
        case 2:
            tipoR1.checked = false;
            tipoR2.checked = true;
            tipoR3.checked = false;
            document.getElementById('reportOption').style.display ='block';
    
            break;
        case 3:
            tipoR1.checked = false;
            tipoR2.checked = false;
            tipoR3.checked = true;
            document.getElementById('reportOption').style.display ='none';
            break;
    }
    
}

document.getElementById('report-form').addEventListener('submit', function (event) {
    event.preventDefault();
    var tipoR1 = document.getElementById('tipoR1');
    var tipoR2 = document.getElementById('tipoR2');
    var tipoR3 = document.getElementById('tipoR3');

    if(tipoR1.checked == true){
        window.location.href = "../../app/reports/private/bedidas.php";
    }
    else if(tipoR2.checked == true){
        var max = document.getElementById('maxR').value;
        var min = document.getElementById('minR').value;
        window.location.href = "../../app/reports/private/bedidas.php?action=precio&max="+max+"&min="+min;
    }
    else if(tipoR3.checked == true){
        window.location.href = "../../app/reports/private/bebidas_tipo.php";
    }
});