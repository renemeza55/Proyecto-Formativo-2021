<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/usuarios.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente. 
    $usuario = new Usuarios;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'logOut':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
            case 'restaurar':
                if ($result['dataset'] = $usuario->changePassword($_POST['id'])) {
                    $result['status'] = 1;
                    $result['message'] = 'El usuario a sido actualizado.';
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setNombres($_POST['name'])){
                    if($usuario->setApellidos($_POST['lastname'])){
                        if($usuario->setEstado($_POST['estado'])){
                            if($usuario->setCorreo($_POST['email'])){
                                if($usuario->updateRow($_POST['id'])){
                                    $result['status'] = 1;
                                    $result['message'] = 'El usuario se actualizo correctamente.';
                                }
                                else{
                                    $result['exception'] = dataBase::getException();
                                }
                            }
                            else{
                                $result['exception'] = 'El Correo es incoreccto.'; 
                            }
                        }
                        else{
                            $result['exception'] = 'El Estado del usuario es incoreccto.'; 
                        }
                    }
                    else{
                        $result['exception'] = 'El Apellido es incoreccto.'; 
                    }
                }
                else{
                    $result['exception'] = 'El nombre es incoreccto.';   
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setNombres(strtoupper($_POST['name']))){
                    if($usuario->setApellidos(strtoupper($_POST['lastname']))){
                        if($usuario->setUsuario($_POST['user'])){
                            if($usuario->setCorreo($_POST['email'])){
                                if($usuario->createRow()){
                                    $result['status'] = 1;
                                    $result['message'] = 'El usuario se agrego correctamente.';
                                }
                                else{
                                    $result['exception'] = dataBase::getException();
                                }
                            }
                            else{
                                $result['exception'] = 'El Correo es incoreccto.'; 
                            }
                        }
                        else{
                            $result['exception'] = 'El Usuario es incoreccto.'; 
                        }
                    }
                    else{
                        $result['exception'] = 'El Apellido es incoreccto.'; 
                    }
                }
                else{
                    $result['exception'] = 'El nombre es incoreccto.';   
                }
                break;
            
                case 'update':
                    $_POST = $usuario->validateForm($_POST);
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->readOne()) {
                            if ($usuario->setNombres($_POST['nombres'])) {
                                if ($usuario->setApellidos($_POST['apellidos'])) {
                                    if ($usuario->setCorreo($_POST['correo_usuario'])) {
                                        if ($usuario->setTelefono($_POST['telefono'])) {
                                            if ($usuario->setDui($_POST['dui'])) {
                                                if ($usuario->updateRow()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Usuario modificado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = 'Dui incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Telefono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Correo incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Apellido Incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Nombre incorrecto';
                            }
                        } else{
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else{
                        $result['exception'] = 'Usuario incorrecto';
                    }
                    break;                          
            case 'bloquear':
                if ($_POST['id_usuario'] != $_SESSION['id_usuario']) {
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->readOne()) {
                            if ($usuario->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Usuario eliminado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($usuario->readAll()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    if (Database::getException()) {
                        $result['error'] = 1;
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen usuarios registrados';
                    }
                }
                break;
            case 'register':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres'])) {
                    if ($usuario->setApellidos($_POST['apellidos'])) {
                        if ($usuario->setCorreo($_POST['email'])) {
                            if ($usuario->setAlias($_POST['alias'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($usuario->setClave($_POST['clave1'])) {
                                        if ($usuario->setTelefono($_POST['telefono'])) {
                                            if ($usuario->setDui($_POST['dui'])) {
                                                if ($usuario->setFecha_nac($_POST['fecha_nac'])) {
                                                    if ($usuario->createRow()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Usuario registrado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = 'Fecha Incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Dui incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Telefono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = $usuario->getPasswordError();
                                    }
                                } else {
                                    $result['exception'] = 'Contraseña Diferente';
                                }
                            } else {
                                $result['exception'] = 'Alias incorrectos';
                            }  
                        }else{
                            $result['exception'] = 'Correo incorrecto';
                        }

                        }else{
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                        
                    }else{
                        $result['exception'] = 'Nombre incorrecto';
                    }

                  break;

                                        
                                       
            case 'logIn':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkUser($_POST['user'])) {
                    if ($usuario->checkPassword($_POST['password'])) {
                        if($estado = $usuario->getEstado()){
                            switch($estado){
                                case 1:
                                    $result['status'] = 1;
                                    $result['message'] = 'Autenticación correcta';

                                    $_SESSION['id'] = $usuario->getId();
                                    $_SESSION['usuario'] = $usuario->getUsuario();
                                    break;
                                case 2:
                                    $result['exception'] = 'El usuario ya tiene un session activa';
                                    break;
                                default:
                                    $result['exception'] = 'El usuario esta bloqueado, solicite el aceso al administrador.';
                            }
                        }
                        
                    } else {

                        if (dataBase::getException()) {
                            $result['exception'] = dataBase::getException();
                        } else {
                            $result['exception'] = 'clave incorrecta';
                        }

                    }
                } else {

                    if (dataBase::getException()) {

                        $result['exception'] = dataBase::getException();

                    } else {
                        
                        $result['exception'] = 'usuario incorrecto';
                    }
                }
                break;
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
