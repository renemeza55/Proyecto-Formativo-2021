 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Contenido Multimedia');
?>
<hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title"> Fotos de Eventos
</h3>

<div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/Mamafina3.jpg">
          <span class="card-title">Evento de bautizo</span>
        </div>
        <div class="card-content">
          <p></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/mamafina2.jpg">
          <span class="card-title">Celebracion con mariachis</span>
        </div>
        <div class="card-content">
          <p></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/mamafina4.jpg">
          <span class="card-title">Fiesta Rosa</span>
        </div>
        <div class="card-content">
          <p></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/mamafina5.jpg">
          <span class="card-title">Local</span>
        </div>
        <div class="card-content">
          <p></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/mamafina6.jpg">
          <span class="card-title">Celebracion dia de la madre</span>
        </div>
        <div class="card-content">
          <p></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="../../resources/img/mamafina1.jpg">
          <span class="card-title">Fiesta de aniversario</span>
        </div>
        <div class="card-content">
          <p></p>
        </div>
      </div>
    </div>
  </div>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('contenidoMulti.js');
?>