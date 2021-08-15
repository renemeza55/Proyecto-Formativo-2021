 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Reservaciones');
?>
  <hr style="border: none; border-bottom: 38px solid white;">
    <div class="container">
      <!-- Título del contenido principal -->
      <h3 class="center" id="title"> Pasos para realizar Una Reservacion</h3>

      <form id="modal-form" enctype="multipart/form-data">
        <input type="text" value="" name="tipo" id="tipo">
        <div class="row">
          <h5 class="center">Selecciona Una fecha para el evento</h5>
          <div class="input-field col s12 m6">
              <i class="material-icons prefix">date_range</i>
              <input id="infechaini" type="date" name="infechaini"  class="validate" required="required"/>
              <label for="fecha_reservacion">Fecha de Reservacion</label>
          </div>
        </div>

        <div class="row">
          <h5 class="center">Selecciona Una hora para el evento</h5>
          <div class="input-field col s12">
            <select id='h2' name="horario">
              <option value="" disabled selected>Horario de reservación</option>
              <option value="1">7:30 AM - 9:30 AM</option>
              <option value="2">9:30 AM - 11:30 AM</option>
              <option value="3">11:30 AM - 1:30 PM</option>
              <option value="4">1:30 PM - 3:30 PM</option>
              <option value="5">3:30 PM - 5:30 PM</option>
              <option value="6">5:30 PM - 7:30 PM</option>
            </select>
          </div>
        </div>

        <div class="row">
          <h5 class="center">Ingresa la cantidad de personas que asistiran</h5>
          <p class="range-field">
            <input type="range" id="personas" name="personas" min="0" max="200" onChange="aaa(this.value);"/>
          </p>
        </div>

        <h5 class="center">Ingresa tus datos personales</h5>
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
              <input id="correo_cliente" type="email" name="correo" class="validate" required/>
              <label for="correo">Correo</label>
          </div>

          <div class="input-field col s12 m6">
              <i class="material-icons prefix">phone</i>
              <input id="telefono" type="text" name="telefono" class="validate" required/>
              <label for="telefono">Telefono</label>
          </div>

        </div>

        <h5 class="center">tipo de reservacion que deseas</h5>
        <p class="center">VIP (menos de 50 persona)<br>Todo el local (más de 50 persona)<br>Servicio a domicilio (más de 100 persona)</p>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>
      </form>
    </div>

</div>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('reservaciones');
?>