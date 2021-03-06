<?php
    require_once('../../helpers/database.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/platillos.php');
    
    if (isset($_GET['action'])) {
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
        session_start();
        // Se instancia la clase correspondiente. 
        $model = new platillos;
        // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
        $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
        // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
        if (isset($_SESSION['id'])) { 
            // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
            switch ($_GET['action']) {
                case 'update': 
                    $_POST = $model->validateForm($_POST);
                    if($model->setNombre($_POST['name'])){
                        if($model->setDesc($_POST['desc'])){
                            if($model->setTipo($_POST['tipo'])){
                                if($model->setPrecio($_POST['precio'])){
                                    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                                        if ($model->setImg($_FILES['img'])) {
                                            if ($model->updateImg($_POST['id'])) {
                                                $result['status'] = 1;
                                                if ($model->saveFile($_FILES['img'], $model->getRuta(), $model->getImg())) {
                                                    $result['message'] = 'Bebida actualizada correctamente';
                                                } else {
                                                    $result['message'] = 'Bebida actualizada pero no se guardó la imagen';
                                                } 
                                            } else {
                                                $result['exception'] = dataBase::getException();
                                            }
                                        } else {
                                            $result['exception'] = $model->getImageError();
                                        }
                                    } 
                                    else{
                                        if ($model->update($_POST['id'])) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Bebida actualizada correctamente';
                                        } 
                                        else {
                                            $result['exception'] = dataBase::getException();
                                        }
                                    }
                                }
                                else{
                                    $result['exception'] = 'El precio de la bebida es incorecto';
                                }
                            }
                            else{
                                $result['exception'] = 'El tipo de la bebida es incorecto';
                            }
                        }
                        else{
                            $result['exception'] = 'La descripción de la bebida es incorecto';
                        }
                    }
                    else{
                        $result['exception'] = 'El nombre de la bebida es incorecto';
                    }
                break;
                case 'create': 
                    $_POST = $model->validateForm($_POST);
                    if($model->setNombre($_POST['name'])){
                        if($model->setDesc($_POST['desc'])){
                            if($model->setTipo($_POST['tipo'])){
                                if($model->setPrecio($_POST['precio'])){
                                    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                                        if ($model->setImg($_FILES['img'])) {
                                            if ($model->createRow()) {
                                                $result['status'] = 1;
                                                if ($model->saveFile($_FILES['img'], $model->getRuta(), $model->getImg())) {
                                                    $result['message'] = 'Platillo agregada correctamente';
                                                } else {
                                                    $result['message'] = 'Platillo agregada pero no se guardó la imagen';
                                                } 
                                            } else {
                                                $result['exception'] = dataBase::getException();
                                            }
                                        } else {
                                            $result['exception'] = $model->getImageError();
                                        }
                                    } 
                                    else{
                                        $result['exception'] = 'No se subio la imagen al servidor';
                                    }
                                }
                                else{
                                    $result['exception'] = 'El precio del Platillo es incorecto';
                                }
                            }
                            else{
                                $result['exception'] = 'El tipo del Platillo es incorecto';
                            }
                        }
                        else{
                            $result['exception'] = 'La descripción del Platillo es incorecto';
                        }
                    }
                    else{
                        $result['exception'] = 'El nombre del Platillo es incorecto';
                    }
                    break;
 
                    case 'Platillomascaro':
                        if ($result['dataset'] = $model->Platillomascaro()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No hay registros';
                            }
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

   
