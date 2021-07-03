<?php

class Public_Page {

    public static function headerTemplate($title) {
    print('
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="utf-8">
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <title>MamaFina - ' . $title . '</title>
            <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" media="screen,projection" />
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            
            <link rel="shotcut icon" href="../../resources/img/logo.png" type="image/x-icon">
        </head>
        
        <body>

        <header>
        <div class="navbar-fixed">
            <nav class="#bf360c deep-orange darken-4" role="navigation">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo"><img src="../../resources/img/logo.png" height="60"></a>
                    <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="reservaciones.php">Reservaciones</a></li>
                        <li><a href="menu.php">Menú</a></li>
                        <li><a href="acerca.php" class="btn white brown-text waves-effect waves-white-grey lighten-1" >Acerca de nosotros</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <ul class="sidenav" id="nav-mobile">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="reservaciones.php">Reservaciones</a></li>
        <li><a href="menu.php">Menú</a></li>
        <li><a href="acerca.php" class="btn white brown-text waves-effect waves-white-grey lighten-1" >Acerca de nosotros</a></li>
        </ul>
    </header>
    <main>
        ');
    }

    public static function footerTemplate($controller) {
        print('</main>
        <!--Se crea el helper del footer publico-->
        <footer class="page-footer #bf360c deep-orange darken-4">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Contactanos</h5>
                        <h5 id="logo-container" href="https://www.facebook.com/cocinamamaFina/?ref=page_internal" class="brand-logo">
                            <i class="material-icons">facebook</i>
                            MaMamá Fina
                            </a>
                            <h5 id="logo-container" href="#" class="brand-logo"></h5>
                                <i class="material-icons">linked_camera</i>
                                MamaFina
                                </a>
                                <h5 id="logo-container" href="#" class="brand-logo"></h5>
                                    <i class="material-icons">mail</i>
                                    www.cocinacafemamafina@gmail.com
                                    </a>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Otros</h5>
                        <h5 id="logo-container" href="#" class="brand-logo"></h5>
                            <i class="material-icons">landscape</i>
                            MamaFina
                            </a>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container center">
                    © 2021 Copyright Text
                </div>
            </div>
        </footer>
        
        </body>
        </html>');
    
    }
}  
?>

  