 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Reservaciones');
?>
<hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title"> Pasos para realizar Una Reservacion
</h3>
</div>
<h5 class="center">Selecciona Una fecha para el evento</h5>
<div class="container">
    <div class="row">
<div class="input-field col s12 m6">
            <i class="material-icons prefix">date_range</i>
            <input id="fecha_reservacion" type="date" name="fecha_reservacion" class="validate" required/>
            <label for="fecha_reservacion">Fecha de Reservacion</label>
        </div>
        </div>
        <div class="row">
        <h5 class="center">Selecciona Una hora para el evento</h5>
                    <div class="input-field col s12">
                        <input id="hora_reservacion" class="timepicker" type="time">
                    </div>
                </div>
                <h5 class="center">Ingresa una descripcion sobre el evento</h5>
                <div class="row">
    <form class="col s12"> 
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1 text-white" class="materialize-textarea"></textarea>
          <label for="textarea1">
        </div>
        <h5 class="center">Ingresa la cantidad de personas que asistiran</h5>
        <form class="col s12"> 
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea2 text-white" class="materialize-textarea"></textarea>
          <label for="textarea2">
        </div>
        <h5 class="center">Ingresa tus datos personales</h5>
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
            <i class="material-icons prefix">phone</i>
            <input id="telefono" type="text" name="telefono" class="validate" required/>
            <label for="telefono">Telefono</label>
        </div>
        <h5 class="center">Ingresa el tipo de reservacion que deseas</h5>
        <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
                <div class="input-field col s12">
                  <select class="browser-default">
        </div>
        <div class="row center-align">
 	    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons">send</i></button>
     </div>
        </div>

       
       




<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('reservaciones.js');
?>