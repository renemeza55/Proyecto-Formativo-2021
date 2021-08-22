<?php
require_once("../../helpers/dashboard_template.php");
require_once("../../api/private/table.php");

Dashboard_Page::headerTemplate('Administrar usuarios');

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
        <a onClick="opnGrafic();" class="modal-trigger btn waves-effect amber">
            <i class="material-icons left">assessment</i>Grafica de estado usuarios
        </a>
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>E-mail</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_GET['search'])){
                        //table::tableSearchUsuario($_GET['search']);
                    }
                    else{
                        //table::tableUsuario();
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="row">
                <h4 id="model-titel"></h4>
                <p>formulario para agregar usuarios.</p>
                <form id="modal-form" class="col s12" enctype="multipart/form-data">
                    <div class="row">
                        <input class="hide" type="number" name="id" id="id"/>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name"  name= "name" type="text" class="validate" value="" placeholder="Nombre" required>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="lastname"  name= "lastname" type="text" class="validate" value="" placeholder="Apellido" required>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="user"  name= "user" type="text" class="validate" value="" placeholder="Usuario" required>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">email</i>
                            <input id="email" name= "email" type="email" class="validate" value="" placeholder="Email" required>
                        </div>
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <label>Materialize Select</label>
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

    <div id="grafic" class="modal">
        <div class="modal-content">
            <div class="grafic-container">
                <canvas id="chart1"></canvas>
            </div>
        </div>
        <div class="modal-footer"> 
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </div>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('usuarios.js');
?>