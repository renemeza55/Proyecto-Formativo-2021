<?php
    require_once('../../helpers/database.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/menu.php');
    
    if (isset($_GET['action'])) {
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
        session_start(); 
        // Se instancia la clase correspondi ente. 
        $model = new menu;
        // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
        $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
        // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
        if (isset($_SESSION['id'])) { 
            // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
            switch ($_GET['action']) {
                case 'delete': 
                    $_POST = $model->validateForm($_POST);
                    if($model->delete($_POST['id'])){
                        $result['status'] = 1;
                        $result['message'] = 'Bebida o platillo eliminado correctemente';
                    }
                    else{
                        $result['exception'] = dataBase::getException();
                    }
                    break;
                break;
                case 'add': 
                    $_POST = $model->validateForm($_POST);
                    if($model->createRow()){
                        $result['status'] = 1;
                        $result['message'] = 'Menu agregado correctamente';
                    }
                    else{
                        $result['exception'] = dataBase::getException();
                    }
                    break;
                case 'addMenuDes': 
                    $_POST = $model->validateForm($_POST);
                    if(isset($_POST['bebidas'])){
                        if($model->addRowB($_POST['id'],$_POST['bebidas'])){
                            $result['status'] = 1;
                            $result['message'] = 'Bebida Agregada Al Menu correctamente';
                        }
                        else{
                            $result['exception'] = dataBase::getException();
                        }
                    }
                    else if($_POST['platillos']){
                        if($model->addRowP($_POST['id'],$_POST['platillos'])){
                            $result['status'] = 1;
                            $result['message'] = 'Platillo Agregado Al Menu correctamente';
                        }
                        else{
                            $result['exception'] = dataBase::getException();
                        }
                    }
                    else{
                        $result['exception'] = 'Seleccione un platillo o bebida.';
                    }
                    break;
                default:
                    $result['exception'] = 'Acción no disponible dentro de la sesión';
            }
        } else {
            // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
            switch ($_GET['action']) {
                default:
                    $result['exception'] = 'Acción no disponible fuera de la sesión';
            }
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Recurso no disponible'));
    }
    
?>