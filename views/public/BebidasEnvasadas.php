<!-- Se manda a llamar el helper del header -->
<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Bebidas Envasadas');
?>
<hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title"> Bebidas Envasadas
</h3>
<hr style="border: none; border-bottom: 100px solid white;">
<div class="center-align">  
  <div class="row center-align">
    <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/cocacola.jpeg" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Bebida Envasada Coca Cola</span>
            <p>Coca cola en presentacion de 355 ml.</p>
          </div>
        </div>
      </div>

      <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/7up.jpg" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Bebida Envasada 7UP</span>
            <p>7UP en presentacion de 355 ml.</p>
          </div>
        </div>

      </div>
      <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/salvacola.jpg" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Bebida Envasada Salva Cola</span>
            <p>Salva cola en presentacion de 358 ml.</p>
          </div>
        </div>
      </div>
      
      
      

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('bebidasenvasadas.js');
?>