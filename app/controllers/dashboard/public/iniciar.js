/*
*   Este controlador es de uso general en las páginas web del sitio público. Se importa en la plantilla del pie del documento.
*   Sirve para inicializar los componentes del framework que son comunes en las páginas web.
*/

//Metodo que sirve para agregar un controlador de eventos cuando el contenido del documento ha sido cargado
var options={};
document.addEventListener('DOMContentLoaded', function () {
    //Se inicializa el menú responsivo
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);


    //Se inicializa el slider 
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, options);
    });


// Se inicailiza el menú
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });


  

  //Se inicia el modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });

 
