<?php
require_once("../../helpers/dashboard_template.php");
require_once("../../api/private/table.php");
Dashboard_Page::headerTemplate('Administrar proveedores');
?>
<div class="container">
    <form action="proveedor.php" method="GET">
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s10">
                        <i class="material-icons prefix">search</i>
                        <input type="text" name="search" id="aa">
                        <label for="aa">Buscar</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">Buscar</button>
                </div>
            </div>
        </div>
    </form>
    <a onClick="openModal();" class="modal-trigger waves-effect waves-light btn">
        <i class="material-icons left">add</i>Nuevo
    </a>
    <table class="responsive-table highlight">
        <thead>
            <tr>
                <th>Nombre Proveedor</th>
                <th>Descripción</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                    table::tableProveedor();
                ?>
        </tbody>
    </table>
</div>
<div id="modal" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4 id="model-titel"></h4>
            <p>formulario para agregar Proveedor.</p>
            <form id="modal-form" class="col s12" enctype="multipart/form-data">
                <div class="row">
                    <input class="hide" type="number" name="id" id="id" />
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" name="name" type="text" class="validate" value=""
                            placeholder="Nombre Proveedor" required>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="desc" name="desc" type="text" class="validate" value="" placeholder="Descripción"
                            required>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
<div id="graph-modal" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4>Gráfica de proveedores</h4>
            <div id="proveedor" class="col s12">
                <p id="mensaje_proveedor"></p>
                <!-- Se muestra una gráfica  con la cantidad de productos por categoría -->
                <canvas id="chart1"></canvas>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </div>
    <!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
    <script type="text/javascript" src="../../resources/js/chart.js"></script>
    <?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('proveedor.js');
?>