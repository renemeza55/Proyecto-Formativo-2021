// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../../api/private/menu.php?action=';

const id = document.getElementById('id').value;

function openModal(){
    var Modalelem = document.getElementById('modal');
    var instance = M.Modal.init(Modalelem);
    instance.open();
    document.getElementById("modal-form").reset();
    document.getElementById('model-titel').innerHTML = "Agregar Platillo o Bebida";
    document.getElementById('checkBebidas').checked = false;
    document.getElementById('checkPlatillos').checked = false;

    document.getElementById('selectBebida').value = 0;
    document.getElementById('comboBebida').style.display = 'none';

    document.getElementById('selectPlatillo').value = 0;
    document.getElementById('comboPlatillo').style.display = 'none';

};

document.getElementById('checkBebidas').addEventListener('change' , function() {

    if (this.checked) {
        document.getElementById('checkPlatillos').checked = false;

        document.getElementById('selectPlatillo').value = 0;
        document.getElementById('comboPlatillo').style.display = 'none';

        document.getElementById('selectBebida').value = 0;
        document.getElementById('comboBebida').style.display = 'block';
    } else {
        document.getElementById('checkBebidas').checked = false;
        document.getElementById('checkPlatillos').checked = false;

        document.getElementById('selectBebida').value = 0;
        document.getElementById('comboBebida').style.display = 'none';

        document.getElementById('selectPlatillo').value = 0;
        document.getElementById('comboPlatillo').style.display = 'none';
    }

});

document.getElementById('checkPlatillos').addEventListener('change' , function() {

    if (this.checked) {
        document.getElementById('checkBebidas').checked = false;

        document.getElementById('selectBebida').value = 0;
        document.getElementById('comboBebida').style.display = 'none';

        document.getElementById('selectPlatillo').value = 0;
        document.getElementById('comboPlatillo').style.display = 'block';
    } else {
        document.getElementById('checkBebidas').checked = false;
        document.getElementById('checkPlatillos').checked = false;

        document.getElementById('selectBebida').value = 0;
        document.getElementById('comboBebida').style.display = 'none';

        document.getElementById('selectPlatillo').value = 0;
        document.getElementById('comboPlatillo').style.display = 'none';
    }

});

document.getElementById('modal-form').addEventListener('submit', function (event) {
    event.preventDefault();
    
    swal({
        text: '¿Está seguro que quieres agregar al menú?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        if (value) {
            fetch(API + 'addMenuDes', {
                method: 'POST',
                body: new FormData(document.getElementById('modal-form'))
            }).then(function (request) {
                if (request.ok) {
                    request.json().then(function (response) {
                        if (response.status) {
                            sweetAlert(1, response.message, 'menuLista.php?list='+id);
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
});

function eliminar(f){
    const data = new FormData();
    data.append('id', f);

    swal({
        text: '¿Está seguro que quieres eliminar la bebida/plato?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(function (value) {
        if (value) {
            fetch( API + 'delete', {
                method: 'POST',
                body: data,
            }).then(function (request) {
                if (request.ok) {
                    request.json().then(function (response) {
                        if (response.status) {
                            sweetAlert(1, response.message, 'menuLista.php?list='+id);
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


