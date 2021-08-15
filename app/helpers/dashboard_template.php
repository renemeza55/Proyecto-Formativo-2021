<?php

class Dashboard_page
{

    public static function headerTemplate($title)
    {

        session_start();
        print('<!DOCTYPE html>
    <html>
     <!--Se crea el helper del header privado-->
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title>Dashboard - ' . $title . '</title>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" media="screen,projection" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link rel="shotcut icon" href="../../resources/img/logo.png" type="image/x-icon">
    </head>
    
    <body>');
        $filename = basename($_SERVER['PHP_SELF']);
        if (isset($_SESSION['id_usuario'])) {
            if ($filename != 'index.php' && $filename != 'registrar.php') {
                self::modals();
                print('   <header>
        <nav class="#bf360c deep-orange darken-4" role="navigation">
            <div class="nav-wrapper">
                <li class="material-icons">build</li> <a href="">Dashboard</a>
                <a id="logo-container" href="../../views/dashboard/main.php" class="brand-logo container center">
                
                    MamáFina
                </a>
            </div>
        </nav>
        <ul id="slide-out" class="sidenav">
    <li><a class="subheader">Mantenimientos generales</a></li>
    <li><a href="../dashboard/bitacora.php"><i class="material-icons">content_paste</i>Bitacora</a></li>
    <li><a href="../dashboard/menu.php"><i class="material-icons">restaurant_menu</i>Menú</a></li>
    <li><a href="../dashboard/platillos.php"><i class="material-icons">restaurant</i>Platillos</a></li>
    <li><a href="../dashboard/bebidas.php"><i class="material-icons">local_drink</i>Bebidas</a></li>
    <li><a href="../dashboard/reservaciones.php"><i class="material-icons">list</i>Reservaciones</a></li>
    <li><a href="../dashboard/usuarios.php"><i class="material-icons">perm_identity</i>Usuario</a></li>
    <li><a href="../dashboard/usuarios.php"><i class="material-icons">people_outline</i>Proveedores</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Configuración de la cuenta</a></li>
    <li><a class="dropdown-trigger" href="#" data-target="dropdown-mobile"><i class="material-icons">done_all</i>Usuario: <b>' . $_SESSION['apodo_usuario'] . '</b></a></li>
    <li><a href="#" onclick="openProfileDialog()"><i class="material-icons">person_pin_circle</i>Editar perfil</a></li>
    <li><a href="#" onclick="logOut()"><i class="material-icons">clear</i>Cerrar sesión</a></li>
  </ul>

  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </header>
    <h3 class="center-align">' . $title . '</h3>
    <main>');
            } else {
                header('location: main.php');
            }
        } else {
            if ($filename != 'index.php' && $filename != 'registrar.php') {
                header('location: index.php');
            } else {
                print('    <header>
      <nav class="#0d47a1 blue darken-4" role="navigation">
          <div class="nav-wrapper">
              <li class="material-icons">dashboard</li> <a href="">Dashboard</a>
              <a id="logo-container" href="../../views/dashboard/graficas.php" class="brand-logo container center">
              
                  Mamáfina
              </a>
          </div>
      </nav>
      <ul id="slide-out" class="sidenav">
  <li><div class="user-view">
    <div class="background">
      <img src="../../resources/img/dash.jpg">
    </div>
    <a href="#user"><img class="circle" src="../../resources/img/users/user.png"></a>
    <a href="#name"><span class="white-text name">William</span></a>
    <a href="#email"><span class="white-text email">william@gmail.com</span></a>
  </div></li>
  <li><a href="../dashboard/.php"><i class="material-icons">content_paste</i>Bitacora</a></li>
  <li><a href="../dashboard/.php"><i class="material-icons">restaurant_menu</i>Menú</a></li>
  <li><a href="../dashboard/.php"><i class="material-icons">restaurant</i>Platillos</a></li>
  <li><a href="../dashboard/.php"><i class="material-icons">local_drink</i>Bebidas</a></li>
  <li><a href="../dashboard/.php"><i class="material-icons">list</i>Reservaciones</a></li>
  <li><a href="../dashboard/usuarios.php"><i class="material-icons">perm_identity</i>Usuario</a></li>
  <li><a href="../dashboard/usuarios.php"><i class="material-icons">people_outline</i>Proveedores</a></li>
</ul>');
            }
        }
    }
    public static function footerTemplate($controller)
    {
        if (isset($_SESSION['id_usuario'])) {
            $scripts = '<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
      <script type="text/javascript" src="../../app/controllers/iniciar.js"></script>
      <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
      <script type="text/javascript" src="../../app/helpers/components.js"></script>
      <script type="text/javascript" src="../../app/controllers/account.js"></script>
      <script type="text/javascript" src="../../app/controllers/' . $controller . '"></script>';
        } else {
            $scripts = '<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
        <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
        <script type="text/javascript" src="../../app/helpers/components.js"></script>
        <script type="text/javascript" src="../../app/controllers/iniciar.js"></script>
        <script type="text/javascript" src="../../app/controllers/' . $controller . '"></script>';
        }
        print('</main>
      <!--Se crea el helper del footer-->
      <footer class="#bf360c deep-orange darken-4">
          <div class="container">
              <div class="row">
                  <div class="col l6 s12">
                      <h5 class="white-text">Nuestras redes sociales</h5>
                      <h5 id="logo-container" href="#" class="brand-logo">
                          <i class="material-icons">facebook</i>
                          <h6 class="white-text">MamáFina</h6>
                              <i class="material-icons">linked_camera</i>
                              <h6 class="white-text">@MamaFina</h6>
                  </div>
                  <div class="col l4 offset-l2 s12">
                      <h5 class="white-text">Otros</h5>
                          <i class="material-icons">restaurant</i>
                          <h6 class="white-text">MamáFina</h6>
                  </div>
              </div>
          </div>
          <div class="footer-copyright">
              <div class="container center">
              <h6 class="white-text">Copyright. All rigths reserved</h6>
              </div>
          </div>
      </footer>
      ' . $scripts . '
      </body>
      </html>');
    }
    private static function modals()
    {
        // Se imprime el código HTML de las cajas de dialogo (modals).
        print('
          <!-- Componente Modal para mostrar el formulario de editar perfil -->
          <div id="profile-modal" class="modal">
              <div class="modal-content">
                  <h4 class="center-align">Editar perfil</h4>
                  <form method="post" id="profile-form">
                      <div class="row">
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">person</i>
                              <input id="nombres_perfil" type="text" name="nombres_perfil" class="validate" required/>
                              <label for="nombres_perfil">Nombres</label>
                          </div>
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">person</i>
                              <input id="apellidos_perfil" type="text" name="apellidos_perfil" class="validate" required/>
                              <label for="apellidos_perfil">Apellidos</label>
                          </div>
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">email</i>
                              <input id="correo_perfil" type="email" name="correo_perfil" class="validate" required/>
                              <label for="correo_perfil">Email</label>
                          </div>
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">person_pin</i>
                              <input id="alias_perfil" type="text" name="alias_perfil" class="validate" required/>
                              <label for="alias_perfil">Alias</label>
                          </div>
                      </div>
                      <div class="row center-align">
                      <a href="#" class="btn waves-effect grey tooltipped modal-close">Cancelar</a>
                      <button type="submit" class="btn waves-effect #bf360c deep-orange darken-4 tooltipped" data-tooltip="Guardar">Guardar</button>
                      </div>
                  </form>
              </div>
          </div>
          <!-- Componente Modal para mostrar el formulario de cambiar contraseña -->
          <div id="password-modal" class="modal">
              <div class="modal-content">
                  <h4 class="center-align">Cambiar contraseña</h4>
                  <form method="post" id="password-form">
                      <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                              <i class="material-icons prefix">security</i>
                              <input id="clave_actual" type="password" name="clave_actual" class="validate" required/>
                              <label for="clave_actual">Clave actual</label>
                          </div>
                      </div>
                      <div class="row center-align">
                          <label>CLAVE NUEVA</label>
                      </div>
                      <div class="row">
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">security</i>
                              <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
                              <label for="clave_nueva_1">Clave</label>
                          </div>
                          <div class="input-field col s12 m6">
                              <i class="material-icons prefix">security</i>
                              <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
                              <label for="clave_nueva_2">Confirmar clave</label>
                          </div>
                      </div>
                      <div class="row center-align">
                          <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                          <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                      </div>
                  </form>
              </div>
          </div>
      ');
    }
}
