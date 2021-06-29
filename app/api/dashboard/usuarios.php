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
    if (isset($_SESSION['id_usuario'])) {
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
            case 'readProfile':
                if ($result['dataset'] = $usuario->readProfile()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                }
                break;
            case 'editProfile':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres_perfil'])) {
                    if ($usuario->setApellidos($_POST['apellidos_perfil'])) {
                        if ($usuario->setCorreo($_POST['correo_perfil'])) {
                            if ($usuario->setUsuario($_POST['alias_perfil'])) {
                                if ($usuario->editProfile()) {
                                    $result['status'] = 1;
                                    $_SESSION['alias_usuario'] = $usuario->getUsuario();
                                    $result['message'] = 'Perfil modificado correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'changePassword':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($usuario->checkPassword($_POST['clave_actual'])) {
                        if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                            if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                if ($usuario->changePassword()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Contraseña cambiada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = $usuario->getPasswordError();
                            }
                        } else {
                            $result['exception'] = 'Claves nuevas diferentes';
                        }
                    } else {
                        $result['exception'] = 'Clave actual incorrecta';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'readAll':
                if ($result['dataset'] = $usuario->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay usuarios registrados';
                    }
                }
                break;

            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchRows($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                //print_r($_POST);
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres'])) {
                    if ($usuario->setApellidos($_POST['apellidos'])) {
                            if ($_POST['clave1'] == $_POST['clave2']) {
                                if ($usuario->setClave($_POST['clave1'])) {
                                    if ($usuario->setDui($_POST['dui'])) {
                                        if ($usuario->setFecha_nac($_POST['fecha_nac'])) {
                                            if ($usuario->setTelefono($_POST['telefono'])) {
                                                if ($usuario->setCorreo($_POST['email'])) {
                                                    if ($usuario->setUsuario($_POST['alias'])) {
                                                        if ($usuario->createRow()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Usuario creado correctamente';
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Alias incorrecto';

                                                    }

                                                    }else{
                                                        $result['exception'] = 'Correo incorrecto';
                                                    }
                                                    

                                                    }else{
                                                        $result['exception'] = 'Telefono incorrecto';
                                                    }

                                                    }else{
                                                        $result['exception'] = 'Fecha de nacimiento incorrecto';
                                                    }

                                                }else{
                                                    $result['exception'] = 'Dui incorrecto';
                                                }

                                            }else{
                                                $result['exception'] = $usuario->getPasswordError();
                                            }

                                        } else{
                                                 $result['exception'] = 'Claves diferentes';
                                        }   
                                    
                                }else{
                                    $result['exception'] = 'Apellidos incorrectos';
                                }
                                
                            }else {
                                $result['exception'] = 'Nombre incorrecto';
                            }
                break;
            case 'readOne':
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
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
            case 'delete':
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
                if ($usuario->checkUser($_POST['usuario1'])) {
                    if ($usuario->checkPassword($_POST['clave'])) {
                        $result['status'] = 1;
                        $result['message'] = 'Autenticación correcta';
                        $_SESSION['id_usuario'] = $usuario->getId();
                        $_SESSION['apodo_usuario'] = $usuario->getUsuario();
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    }
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Alias incorrecto';
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
