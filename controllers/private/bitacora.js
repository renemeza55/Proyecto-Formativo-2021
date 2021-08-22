// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../../api/private/bitacora.php?action=';

function openModal(){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);
    instance.open();
    document.getElementById("modal-form").reset();
    document.getElementById('model-titel').innerHTML = "Agregar Bitacora";
};

function updateModal(id,nombre,precio,fecha,usuario,proveedor){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);

    document.getElementById("modal-form").reset();

    document.getElementById('model-titel').innerHTML = "Actualizar Bitacora";

    document.getElementById('id').value = id;
    document.getElementById('name').value = nombre;
    document.getElementById('precio').value = precio;
    document.getElementById('fecha').value = fecha;
    document.getElementById('usuario').value = usuario;
    document.getElementById('pro').value = proveedor;

    instance.open();
};

document.getElementById('modal-form').addEventListener('submit', function (event) {
    event.preventDefault();
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if ('Agregar Bitacora'== document.getElementById('model-titel').innerHTML) {
        action = 'create';
    } else {
        action = 'update';
    }

    fetch( API  + action, {
        method: 'POST',
        body: new FormData(document.getElementById('modal-form'))
    }).then(function (request) {
        //Valida si la peticion es correcta de lo contrario muestra un error.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'bitacora.php');
                    
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
    document.getElementById('reportOption1').style.display ='none';
    document.getElementById('reportOption2').style.display ='none';
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
            document.getElementById('reportOption1').style.display ='none';
            document.getElementById('reportOption2').style.display ='none';
            break;
        case 2:
            tipoR1.checked = false;
            tipoR2.checked = true;
            tipoR3.checked = false;
            document.getElementById('reportOption1').style.display ='block';
            document.getElementById('reportOption2').style.display ='none';
    
            break;
        case 3:
            tipoR1.checked = false;
            tipoR2.checked = false;
            tipoR3.checked = true;
            document.getElementById('reportOption1').style.display ='none';
            document.getElementById('reportOption2').style.display ='block';
            break;
    }
    
}


document.getElementById('report-form').addEventListener('submit', function (event) {
    event.preventDefault();
    var tipoR1 = document.getElementById('tipoR1');
    var tipoR2 = document.getElementById('tipoR2');
    var tipoR3 = document.getElementById('tipoR3');

    if(tipoR1.checked == true){
        window.location.href = "../../app/reports/private/bitacoras.php";
    }
    else if(tipoR3.checked == true){
        var max = document.getElementById('maxR').value;
        var min = document.getElementById('minR').value;
        window.location.href = "../../app/reports/private/bitacoras.php?action=rango&max="+max+"&min="+min;
    }
    else if(tipoR2.checked == true){

        var v = document.getElementById('f').value;
        if(v != ''){
            window.location.href = "../../app/reports/private/bitacoras.php?action=fecha&value="+v;
        }
        else{
            sweetAlert(2, 'Ingrese una fecha por favor', null);
        }
    }
});