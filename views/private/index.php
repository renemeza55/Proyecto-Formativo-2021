<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../helpers/dashboard_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Iniciar Sesion');
?>

<div class="container">
    <div class="row"> 
        <!-- Formulario para iniciar sesión -->
        <form method="post" id="session-form">
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">person_pin</i>
                <input id="user" type="text" name="user" class="validate" required/>
                <label for="usuario">Usuario</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">security</i>
                <input id="password" type="password" name="password" class="validate" required/>
                <label for="contra">Contraseña</label>
            </div>
            <div class="col s12 center-align">
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Ingresar"><i class="material-icons">send</i></button>
            </div>
        </form>
    </div>
</div>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('index');
?>