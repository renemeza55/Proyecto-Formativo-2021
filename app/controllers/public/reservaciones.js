const API = '../../api/public/recervaciones.php?action=';

var elDate = document.getElementById('infechaini');
var elForm = document.getElementById('modal-form');
var elSubmit = document.getElementById('submit');


function aaa(v){
    console.log('aa'+v);

    if(v < 50){
        console.log('menos 50');
        document.getElementById('tipo').value = 1;
    }
    else if(v >= 50 && v < 100){
        console.log('mas 50 memos 100');
        document.getElementById('tipo').value = 2;
    }
    else if (v >= 100){
        console.log('mass 100');
        document.getElementById('tipo').value = 3;
    }
}

document.getElementById('modal-form').addEventListener('submit', function (event) {
   
    event.preventDefault();

    fetch( API+'create', {
        method: 'POST',
        body: new FormData(document.getElementById('modal-form')),
    }).then(function (request) {
        //Valida si la peticion es correcta de lo contrario muestra un error.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, '../public/');
                    
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
