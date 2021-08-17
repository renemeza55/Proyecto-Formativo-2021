<?php
require_once("../../helpers/dashboard_template.php");
require_once("../../api/private/table.php");
Dashboard_Page::headerTemplate('Administrar reservaciones');
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
        <a href="../../app/reports/private/reservaciones_ocasion.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de reservaciones según ocasión"><i class="material-icons">assignment</i></a>
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>Nombre completo</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Horario</th>
                    <th>Dia</th>
                    <th>Numero de personas</th>
                    <th>Tipo Reservaciones</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    table::tableReservacione();
                ?>
            </tbody>
        </table>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="row">
                <h4 id="model-titel"></h4>
                <p>Finalizar Orden.</p>
                <form id="modal-form" class="col s12" enctype="multipart/form-data">
                    <div class="row">
                        <input class="hide" type="number" name="id" id="id"/>
                        <div class="input-field row">
                            <i class="material-icons prefix">free_breakfast</i>
                            <input id="desc"  name= "desc"  type="text" class="validate" value="" placeholder="Descripción" required>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer"> 
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </div>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('reservaciones');
?>