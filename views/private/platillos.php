<?php
require_once("../../helpers/dashboard_template.php");
require_once("../../api/private/table.php");
Dashboard_Page::headerTemplate('Administrar platillos');
?>
    <div class="container">
        <form action="usuarios.php" method="GET">
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
                    <th>Platillo</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Tipo de Platillo</th>
                    <th>Imagen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    table::tablePlatillos();
                ?>
            </tbody>
        </table>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="row">
                <h4 id="model-titel"></h4>
                <p>formulario de platillos.</p>
                <form id="modal-form" class="col s12" enctype="multipart/form-data">
                    <div class="row">
                        <input class="hide" type="number" name="id" id="id"/>
                        <div class="input-field row">
                            <i class="material-icons prefix">free_breakfast</i>
                            <input id="name"  name= "name"  type="text" class="validate" value="" placeholder="Nombre de Platillo" required>
                        </div>
                        
                        <div class="input-field row">
                            <i class="material-icons prefix">chat_bubble</i>
                            <input id="desc" name= "desc" type="text" class="validate" value="" placeholder="Descripcción" required>
                        </div>
                        <div class="input-field row">
                            <i class="material-icons prefix">monetization_on</i>
                            <input id="precio" name= "precio" type="number" step="any" class="validate" value="" placeholder="Precio" required>
                        </div>
                        <div class="input-field row">
                            <select class="browser-default" id="tipo" name="tipo">
                                <option value="00" disabled selected>Categorias</option>
                                <option value="1"  >Carnes</option>
                                <option value="2"  >Mariscos</option>
                                <option value="3"  >Acompañamientos</option>
                                <option value="4"  >Ensalada</option>
                                <option value="5"  >Sopas</option>
                                <option value="6"  >Pastas</option>
                                <option value="7"  >Tipicos</option>   
                                <option value="8"  >Aves</option>   
                                <option value="9"  >Postres</option>   
                            </select>
                        </div>
                        <div class="row">
                            <label>Imagen de Referencia</label>
                            <div class = "file-field input-field">
                                <div class="btn">
                                    <span>Buscar Imagen</span>
                                    <input type="file" name="img">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text"  placeholder="Upload file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                                    <i class="material-icons right">send</i>
                            </button>
                        </div>
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
Dashboard_Page::footerTemplate('platillos');
?>