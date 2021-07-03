<!-- Se manda a llamar el helper del header -->
<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Platillos');
?>
<hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title"> Tipos de platillos
</h3>
<hr style="border: none; border-bottom: 100px solid white;">
<div class="center-align">  
  <div class="row center-align">
    <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/desayuno.png" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Desayunos</span>
            <p>Revisa la variedad de desayunos que se ofrecen</p>
          </div>
          <div class="card-action">
            <a href="desayunos.php">Ver desayunos...</a>
          </div>
        </div>
      </div>

      <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/almuerzos.png" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Almuerzos</span>
            <p>Revisa los ricos y tradicionales almuerzos.</p>
            <div class="card-action">
            <a href="almuerzos.php">Ver Almuerzos...</a>
          </div>
          </div>
        </div>

      </div>
      <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/tipico.png" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Tipicos</span>
            <p>Hecha un vista a la variedad de tipicos.</p>
            <div class="card-action">
            <a href="tipicos.php">Ver tipicos...</a>
          </div>
          </div>
        </div>

        <div class="col s12 l4 m6">
        <div class="card">
          <div class="card-image">
            <img src="../../resources/img/postres.png" alt="">
            <a href="#" class="btn-floating #bf360c deep-orange darken-4">
              <i class="material-icons">free_breakfast</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Postres</span>
            <p>Revisa la variedad de postres disponibles.</p>
            <div class="card-action">
            <a href="postres.php">Ver Postres...</a>
          </div>
          </div>
        </div>
      </div>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('platillos.js');
?>