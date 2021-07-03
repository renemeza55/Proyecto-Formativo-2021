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


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('menu.js');
?>