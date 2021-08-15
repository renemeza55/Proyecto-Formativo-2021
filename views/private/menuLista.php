<?php
require_once("../../helpers/dashboard_template.php");
require_once("../../api/private/table.php");
Dashboard_Page::headerTemplate('Menú Lista');
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
        <a onClick="openModal();" class="modal-trigger waves-effect waves-light btn">
            <i class="material-icons left">add</i>Nuevo
        </a>
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>Platillo / Bebida</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_GET)){
                        table::tableMenuList($_GET['list']);
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php
        if(isset($_GET)){
            print(
                '<div id="modal" class="modal">
                    <div class="modal-content">
                        <div class="row">
                            <h4 id="model-titel"></h4>
                            <p>Agrega Platillos o Bebidas al menú.</p>
                            <form id="modal-form" class="col s12" enctype="multipart/form-data">
                                <div class="row">
                                    <input class="hide" type="number" name="id" id="id" value="'.$_GET['list'].'"/>
                                    <div class="input-field col s6">
                                        <label>
                                            <input id="checkBebidas"type="checkbox" class="filled-in" checked="checked" />
                                            <span>Agregar Bebida</span>
                                        </label>
                                    </div>
                                    <div class="input-field col s6">
                                        <label>
                                            <input id="checkPlatillos"type="checkbox" class="filled-in" checked="checked" />
                                            <span>Agregar Platillos</span>
                                        </label>
                                    </div>
                                    <br><br><br>
                                    <div id="comboBebida" class="input-field col s12">
                                        <select id="selectBebida" name="bebidas">
                                            <option value="0" disabled selected>Selecciona una Bebida</option>
                                            ');
                                                table::comboBebida();
                                        print('</select>
                                        <label>Bebidas</label>
                                    </div>
                                    <div id="comboPlatillo" class="input-field col s12">
                                        <select id="selectPlatillo" name="platillos">
                                            <option value="0" disabled selected>Selecciona un platillo</option>
                                            ');
                                            table::comboPlatillos();
                                        print('</select>
                                        <label>Platillos</label>
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
                </div>'
            );
        }
    ?>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('menuLista');
?>