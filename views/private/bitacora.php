<?php
require_once("../../helpers/dashboard_template.php");
require_once("../../api/private/table.php");
Dashboard_Page::headerTemplate('Administrar bitacora');
?>
    <div class="container">
        <form action="bitacora.php" method="GET">
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
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                    <th>usuario</th>
                    <th>Proveedor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    table::tableBitacota();
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
                            <i class="material-icons prefix">local_grocery_store</i>
                            <input id="name"  name= "name" type="text" class="validate" value="" placeholder="Nombre Producto" required>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">monetization_on</i>
                            <input id="precio" name= "precio" type="number" step="any" class="validate" value="" placeholder="Precio" required>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">web_asset</i>
                            <input id="fecha" name= "fecha" type="date" step="any" class="validate" value="" placeholder="Fecha Realizado" readonly>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="usuario" name= "usuario" type="text" step="any" class="validate" value="" placeholder="Realizado por" readonly>
                        </div>
                        <div class="input-field col s12">
                            <select name= "pro" id= "pro">
                                <option value="" disabled selected>Selecciona proveedores</option>
                                <?php
                                        table::comboProveedores();
                                    ?>
                            </select>
                            <label>Proveedores</label>
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
Dashboard_Page::footerTemplate('bitacora.js');
?>