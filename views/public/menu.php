 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../helpers/header_template.php');
require_once("../../api/public/table.php");
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Menu');
?>
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title"> Menu del Dia</h3>

    <div class="row">
      <?php
        table::readMenu();
      ?>
    </div>
  </div>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('');
?>