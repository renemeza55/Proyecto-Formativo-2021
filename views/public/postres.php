 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Postres');
?>
<hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title"> Postres
</h3>
<hr style="border: none; border-bottom: 100px solid white;">
<div class="center-align">  
  <div class="row center-align">
    <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/postre1.png" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Tres leches</span>
            <p>Porcion de riquisimo tres leches.</p>
          </div>
        </div>
      </div>

      <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/postre2.jpg" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Budin</span>
            <p>Porcion de Budin.</p>
          </div>
        </div>

      </div>
      <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/postre3.png" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Cheesecake</span>
            <p>Porcion de cheesecake bañado en salsa de fresa</p>
          </div>
        </div>
      </div>
      

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('postres.js');
?>