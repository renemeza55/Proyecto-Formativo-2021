<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../helpers/dashboard_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Bienvenidos');
?>

<h6 class="center-align">Aquí podrás realizar acciones como eliminar, crear o modificar registros, además de poder editar perfil y cambiar la contraseña</h6>

<!-- Se muestran las gráficas de acuerdo con algunos datos disponibles en la base de datos -->
<div class="row">
    <div class="col s12 m6">
        <!-- Se muestra una gráfica  con la cantidad de productos por categoría -->
        <canvas id="chart5"></canvas>
    </div>
    <div class="col s12 m6">
        <!-- Se muestra una gráfica de pastel con el porcentaje de productos por categoría -->
        <canvas id="chart2"></canvas>
    </div>
</div>
<!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
<script type="text/javascript" src="../../resources/js/chart.js"></script>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('index.js');
?>