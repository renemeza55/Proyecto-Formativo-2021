 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Menu');
?>
<hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title"> Menu del Dia
</h3>
<hr style="border: none; border-bottom: 100px solid white;">
<div class="center-align">  
  <div class="row center-align">
    <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/atolmamafina.jpg" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Bebidas</span>
            <p>Échale un ojo a nuestras bebidas tradicionales y enlatadas.</p>
          </div>
          <div class="card-action">
            <a class="orange-text" href="bebidas.php">Ver Bebidas.</a>
          </div>
        </div>
      </div>

      <div class="col s12 l4 m6">
      <div class="card">
          <div class="card-image">
            <img src="../../resources/img/sopamamafina.jpg" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Platillos</span>
            <p>Revisa el amplio menu de platillos</p>
          </div>
          <div class="card-action">
            <a href="platillos.php">Ver platillos...</a>
          </div>
        </div>
      </div>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('menu.js');
?>