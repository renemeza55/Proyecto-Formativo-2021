const API = '../../api/public/recervaciones.php?action=';

function finalizar(id,nombre,desc){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);

    document.getElementById("modal-form").reset();

    document.getElementById('id').value = id;

    instance.open();
}

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
