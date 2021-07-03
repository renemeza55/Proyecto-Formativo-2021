 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Inicio');
?>

<div class="slider">
  <ul class="slides">

  </ul>
</div>

<hr style="border: none; border-bottom: 100px solid white;">
<div class="center-align">  
  <div class="row center-align">
    <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/comida.jpg" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Menú</span>
            <p>Échale un ojo a nuestras deliciosas comidas.</p>
          </div>
          <div class="card-action">
            <a class="orange-text" href="#">Ver el menú..</a>
          </div>
        </div>
      </div>
      <div class="col s12 l4 m6">
      <div class="card">
          <div class="card-image">
            <img src="../../resources/img/comida.jpg" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">book</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Reservaciones</span>
            <p>Haz una reservacion de tu visita a nuestras instalaciones</p>
          </div>
          <div class="card-action">
            <a href="#">Hacer una reservación...</a>
          </div>
        </div>
      </div>
      <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/comida.jpg" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">crop_original</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Contenido multimedia</span>
            <p>Mira el contenido multimedia de nuestras instalaciones y fiestas especiales.</p>
          </div>
          <div class="card-action">
            <a href="#">Ver más...</a>
          </div>
  </div>
</div>

     
<div class="row">
<p>
<br>
<br>
<hr style="border: none; border-bottom: 105px solid white;">
<br>
        <div class="col l4 s12">
          <div class="icon-block">
            <h2 class="center black-text"><i class="material-icons">cake</i></h2>
            <font face="verdana" color="brown light"><h5 class="center">¿Qué tipo de celebraciones cubrimos?</h5>

            <p class="light">Cubrimos todo tipo de eventos sociales y empresariales...
Celebración de 15 años, bodas, cumpleaños, baby shower, bautizos, capacitaciones y eventos de fin de año, etc.</p>
          </div>
        </div>

        <div class="col l4 s12">
          <div class="icon-block">
            <h2 class="center black-text"><i class="material-icons">local_dining</i></h2>
            <h5 class="center">¿Qué tipo de comidas sirven?</h5>

            <p class="center">Nuestro menú es muy variado, servimos diferentes tipos de almuerzos, desayunos y cenas</p>
          </div>
        </div>

        <div class="col l4 s12">
          <div class="icon-block">
            <h2 class="center black-text"><i class="material-icons">map</i></h2>
            <h5 class="center">¿En dónde se encuentran?</h5>

            <p class="center">Dirección: 1ª av. Norte, calle Roosevelt #6 Soyapango. Esquina opuesta a la alcaldía de Soyapango. 503 Soyapango, El Salvador.</p>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    </p>
  </div>
  



  <hr style="border: none; border-bottom: 35px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h4 class="center" id="title">Horario</h4>
</div>
<hr style="border: none; border-bottom: 50px solid white;">
  <div class="container white" style="height: 50vh">
  <table class="striped centered responsive-table">
        <thead>
        </thead>
        <tbody>
          <tr>
            <td>Lunes</td>
            <td>07:00 - 19:00</td>
          </tr>
          <tr>
            <td>Martes</td>
            <td>07:00 - 19:00</td>
          </tr>
          <tr>
            <td>Jueves</td>
            <td>07:00 - 19:00</td>
          </tr>
          <tr>
            <td>Viernes</td>
            <td>07:00 - 19:00</td>
          </tr>
          <tr>
            <td>Sábado</td>
            <td>07:00 - 19:00</td>
          </tr>
          <tr>
            <td>Domingo</td>
            <td>07:00 - 13:30</td>
          </tr>
        </tbody>
      </table>

<hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h4 class="center" id="title">Platillos del día</h4>
</div>




<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('index.js');
?>