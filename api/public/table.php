<?php
    require_once('../../helpers/database.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/usuarios.php'); 
    require_once('../../models/bebidas.php'); 
    require_once('../../models/platillos.php'); 
    require_once('../../models/proveedor.php');
    require_once('../../models/bitacora.php'); 
    require_once('../../models/menu.php'); 

    class table{

        public static function readMenu(){

            $model = new menu;
            $model1 = new platillos;
            $model2 = new bebidas;
            if ($menu = $model->readAllMenuPublic()){
                foreach($menu as $menu){
                    if($desc = $model->readAllMenuDesc($menu['id_menu'])){
                        foreach($desc as $desc){
                            if($desc['id_platillos'] != null){
                                if($data = $model1->readOne($desc['id_platillos'])){
                                    foreach($data as $data){
                                        print(
                                            '
                                            <div class="col s12 l4 m6">
                                                <div class="card">
                                                    <div class="card-image waves-effect waves-block waves-light">
                                                        <img class="activator" src="../../resources/img/platillos/'.$data['img'].'">
                                                    </div>
                                                    <div class="card-content">
                                                        <span class="card-title activator grey-text text-darken-4">'.$data['nombre_platillo'].'</span>
                                                        <p>'.$data['descripcion'].'</p>
                                                        <p>$'.$data['precio'].'</p>
                                                    </div>
                                                </div>  
                                            </div>
                                            '
                                        );
                                    }
                                }
                            }
                            else{
                                if($data2 = $model2->readOne($desc['id_bebida'])){
                                    foreach($data2 as $data2){
                                        print(
                                            '
                                            <div class="col s12 l4 m6">
                                                <div class="card">
                                                    <div class="card-image waves-effect waves-block waves-light">
                                                        <img class="activator" src="../../resources/img/bebidas/'.$data2['img'].'">
                                                    </div>
                                                    <div class="card-content">
                                                        <span class="card-title activator grey-text text-darken-4">'.$data2['nombre_bebida'].'</span>
                                                        <p>'.$data2['descripcion'].'</p>
                                                        <p>$'.$data2['precio'].'</p>
                                                    </div>
                                                </div>  
                                            </div>
                                            '
                                        );
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
            }
        }

    }
?>