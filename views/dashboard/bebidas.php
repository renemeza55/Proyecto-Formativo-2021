<?php
require_once("../../app/helpers/dashboard_template.php");
Dashboard_Page::headerTemplate('Administrar bebidas');
?>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('bebidas.js');
?>