<?php
    require_once('../../helpers/database.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/bitacora.php');
    
    if (isset($_GET['action'])) {
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
        session_start(); 
        // Se instancia la clase correspondi ente. 
        $model = new bitacoras;
        // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
        $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
        // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
        if (isset($_SESSION['id'])) { 
            // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
            switch ($_GET['action']) {
                case 'update': 
                    $_POST = $model->validateForm($_POST);
                    if($model->setPro($_POST['name'])){
                        if($model->setPrecio($_POST['precio'])){
                            if($model->setProveedor($_POST['pro'])){
                                if($model->update($_POST['id'])){
                                    $result['status'] = 1;
                                    $result['message'] = 'La bitacora a sido actualizada correctamente';
                                }
                                else{
                                    $result['exception'] = dataBase::getException();
                                }
                            }
                            else{
                                $result['exception'] = 'El proveedor del producto es incorecto';
                            }
                        }
                        else{
                            $result['exception'] = 'El precio del producto es incorecto';
                        }
                    }
                    else{
                        $result['exception'] = 'El nombre del producto es incorecto';
                    }
                break;
                case 'create': 
                    $_POST = $model->validateForm($_POST);
                    if($model->setPro($_POST['name'])){
                        if($model->setPrecio($_POST['precio'])){
                            if($model->setProveedor($_POST['pro'])){
                                if($model->createRow($_POST['id'])){
                                    $result['status'] = 1;
                                    $result['message'] = 'La bitacora a sido agregada correctamente';
                                }
                                else{
                                    $result['exception'] = dataBase::getException();
                                }
                            }
                            else{
                                $result['exception'] = 'El proveedor del producto es incorecto';
                            }
                        }
                        else{
                            $result['exception'] = 'El precio del producto es incorecto';
                        }
                    }
                    else{
                        $result['exception'] = 'El nombre del producto es incorecto';
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
        case 'comprasMasRecientes':
            if ($result['dataset'] = $compras->comprasMasRecientes()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay cliente registrado';
                }
            }
            break;
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Recurso no disponible'));
    }
    
?>