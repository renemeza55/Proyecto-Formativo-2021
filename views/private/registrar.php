<?php
require_once("../../app/helpers/dashboard_template.php");
Dashboard_Page::headerTemplate('Registrarse');
?>
<div class="row">
        <div class="input-field col s12 m6">
          	<i class="material-icons prefix">person</i>
          	<input id="nombres" type="text" name="nombres" class="validate" required/>
          	<label for="nombres">Nombres</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">person</i>
            <input id="apellidos" type="text" name="apellidos" class="validate" required/>
            <label for="apellidos">Apellidos</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">email</i>
            <input id="correo_cliente" type="email" name="correo_cliente" class="validate" required/>
            <label for="correo">Correo</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">person_pin</i>
            <input id="alias" type="text" name="alias" class="validate" required/>
            <label for="alias">Usuario</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">security</i>
            <input id="clave1" type="password" name="clave1" class="validate" required/>
            <label for="clave1">Contraseña</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">security</i>
            <input id="clave2" type="password" name="clave2" class="validate" required/>
            <label for="clave2">Confirmar contraseña</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">perm_identity</i>
            <input id="dui_c" type="text" name="dui" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="validate" required/>
            <label for="dui_c">DUI</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">cake</i>
            <input id="fecha_nacimiento" type="date" name="fecha_nac" class="validate" required/>
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
        </div>
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">phone</i>
            <input id="telefono" type="text" name="telefono" class="validate" required/>
            <label for="telefono">Telefono</label>
        </div>
        
      </div>
    </div>
    <div class="row center-align">
 	    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons">send</i></button>
    </div>
</form>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('registar.js');
?>