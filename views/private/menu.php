<?php
require_once("../../helpers/dashboard_template.php");
require_once("../../api/private/table.php");
Dashboard_Page::headerTemplate('Administrar menú');
?>
    <div class="container">
        <form action="menu.php" method="GET">
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
        <a onClick="insertMenu();" class="waves-effect waves-light btn">
            <i class="material-icons left">add</i>Nuevo
            <a href="../../app/reports/private/menu_fecha.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de Menu por platillos"><i class="material-icons">assignment</i></a>
        </a>
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>Dia del Menu</th>
                    <th>Descripción</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    table::tableMenu();
                ?>
            </tbody>
        </table>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="row"> 
                <h4 id="model-titel"></h4>
                <p>formulario para agregar Bitacora.</p>
                <form id="modal-form" class="col s12" enctype="multipart/form-data">
                    <div class="row">
                        <input class="hide" type="number" name="id" id="id"/>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">web_asset</i>
                            <input id="fecha" name= "fecha" type="date" step="any" class="validate" value="" placeholder="Fecha Realizado" readonly>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">mode_edit</i>
                            <input id="desc" name= "desc" type="text" step="any" class="validate" value="" placeholder="Realizado por">
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
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('menu.js');
?>