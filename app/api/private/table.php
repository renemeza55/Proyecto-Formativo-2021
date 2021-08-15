<?php
    require_once('../../helpers/database.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/usuarios.php'); 
    require_once('../../models/bebidas.php'); 
    require_once('../../models/platillos.php'); 
    require_once('../../models/proveedor.php');
    require_once('../../models/bitacora.php'); 
    require_once('../../models/menu.php');
    require_once('../../models/reservaciones.php');  

    class table{


        public static function tableSearchUsuario($value){
            $model = new Usuarios;
            
            if($model->searchUsuarios($value)){
                
            }
            else{
                if($model->searchNombre($value)){

                }
            }
        }


        public static function tableBebida(){

            $model = new bebidas;
            if ($data = $model->readAll()){

                foreach($data as $data){
                    $id = "'".$data["id_bebida"]."'";
                    $nombre = "'".$data["nombre_bebida"]."'";
                    $desc = "'".$data["descripcion"]."'";
                    $precio = "'".$data["precio"]."'";
                    $tipo = "'".$data["id_tipo_bebida"]."'";
                    $img = "'".$data["img"]."'";
                    print(
                        '<tr>
                            <td>'.$data["nombre_bebida"].'</td>
                            <td>'.$data["descripcion"].'</td>
                            <td>$'.$data["precio"].'</td>
                            <td>'.$data["tipo_bebida"].'</td>
                            <td><img class="img-tables" src="../../resources/img/bebidas/'.$data["img"].'" alt=""></td>
                            <td>
                                <a onClick="updateModal('.$id.','.$nombre.','.$desc.','.$precio.','.$tipo.','.$img.');"class="btn-floating btn-Medium waves-effect waves-light yellow">
                                    <i class="material-icons">border_color</i>
                                </a>
                            </td>
                        </tr>'
                    );
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else { 
                    $result['exception'] = 'No hay productos registrados';
                }
            }
        } 
        public static function comboBebida(){

            $model = new bebidas;
            if ($data = $model->readAll()){
                foreach($data as $data){
                    print(
                        '<option value="'.$data['id_bebida'].'">'.$data['nombre_bebida'].'</option>'
                    );
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
            }
        }

        public static function tablePlatillos(){

            $model = new platillos;
            if ($data = $model->readAll()){

                foreach($data as $data){
                    $id = "'".$data["id_platillo"]."'";
                    $nombre = "'".$data["nombre_platillo"]."'";
                    $desc = "'".$data["descripcion"]."'";
                    $precio = "'".$data["precio"]."'";
                    $tipo = "'".$data["id_tipo_platillos"]."'";
                    $img = "'".$data["img"]."'";
                    print(
                        '<tr>
                            <td>'.$data["nombre_platillo"].'</td>
                            <td>'.$data["descripcion"].'</td>
                            <td>$'.$data["precio"].'</td>
                            <td>'.$data["tipo_platillo"].'</td>
                            <td><img class="img-tables" src="../../resources/img/platillos/'.$data["img"].'" alt=""></td>
                            <td>
                                <a onClick="updateModal('.$id.','.$nombre.','.$desc.','.$precio.','.$tipo.','.$img.');"class="btn-floating btn-Medium waves-effect waves-light yellow">
                                    <i class="material-icons">border_color</i>
                                </a>
                            </td>
                        </tr>'
                    );
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
            }
        }

        public static function comboPlatillos(){

            $model = new platillos;
            if ($data = $model->readAll()){
                foreach($data as $data){
                    print(
                        '<option value="'.$data['id_platillo'].'">'.$data['nombre_platillo'].'</option>'
                    );
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
            }
        }


        public static function tableProveedor(){

            $model = new proveedores;
            if ($data = $model->readAll()){

                foreach($data as $data){
                    $id = "'".$data["id_proveedor"]."'";
                    $nombre = "'".$data["proveedor"]."'";
                    $desc = "'".$data["descripcion"]."'";
                    print(
                        '<tr>
                            <td>'.$data["proveedor"].'</td>
                            <td>'.$data["descripcion"].'</td>
                            <td>
                                <a onClick="updateModal('.$id.','.$nombre.','.$desc.');"class="btn-floating btn-Medium waves-effect waves-light yellow">
                                    <i class="material-icons">border_color</i>
                                </a>
                            </td>
                        </tr>'
                    );
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
            }
        
        }

        public static function comboProveedores(){

            $model = new proveedores;
            if ($data = $model->readAll()){

                foreach($data as $data){
                    print(
                        '<option value="'.$data['id_proveedor'].'" >'.$data["proveedor"].'</option>'
                    );
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
            }
        
        }

        public static function tableBitacota(){

            $model = new bitacoras;
            if ($data = $model->readAll()){
 
                foreach($data as $data){
                    $id = "'".$data["id_bitacora"]."'";
                    $producto = "'".$data["producto"]."'";
                    $precio = "'".$data["precio_prodcuto"]."'";
                    $fecha = "'".$data["fecha_bitacora"]."'";
                    $usuario = "'".$data["id_usuario"]."'";
                    $proveedor = "'".$data["id_proveedor"]."'";
                    print(
                        '<tr>
                            <td>'.$data["producto"].'</td>
                            <td>$'.$data["precio_prodcuto"].'</td>
                            <td>'.$data["fecha_bitacora"].'</td>
                            <td>'.$data["usuario"].'</td>
                            <td>'.$data["proveedor"].'</td>
                            <td>
                                <a onClick="updateModal('.$id.','.$producto.','.$precio.','.$fecha.','.$usuario.','.$proveedor.');"class="btn-floating btn-Medium waves-effect waves-light yellow">
                                    <i class="material-icons">border_color</i>
                                </a>
                            </td>
                        </tr>'
                    );
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
            }
        }


        public static function tableMenu(){

            $model = new menu;
            if ($data = $model->readAllMenu()){

                foreach($data as $data){
                    $fecha = "'".$data["fecha"]."'";
                    $desc = "'".$data["descripcion"]."'";
                    print(
                        '<tr>
                            <td>'.$data["fecha"].'</td>
                            <td>'.$data["descripcion"].'</td>
                            <td>
                                <a onClick="updateModal('.$data['id_menu'].','.$fecha.','.$desc.');"class="btn-floating btn-Medium waves-effect waves-light yellow">
                                    <i class="material-icons">border_color</i>
                                </a>
                                <a href="menuLista.php?list='.$data['id_menu'].'" class="btn-floating btn-Medium waves-effect waves-light blue modal-trigger" href="#modal1">
                                    <i class="material-icons">autorenew</i>
                                </a>
                            </td>
                        </tr>'
                    );
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
            }
            
        
        }

        public static function tableMenuList($menu){

            $model = new menu;

            if ($data = $model->readAllMenuDesc($menu)){

                foreach($data as $data){
                    $idPro;
                    $producto;
                    
                    if($data['id_platillos'] != null){
                        if($data2 = $model->readProducto($data['id_platillos'])){
                            $producto = $data2['nombre_platillo'];
                            $idPro = $data['id_platillos'];
                        }
                    }
                    else if($data['id_bebida'] != null){
                        if($data2 = $model->readBebida($data['id_bebida'])){
                            $producto = $data2['nombre_bebida'];
                            $idPro = $data['id_bebida'];
                        }
                    }
                    print(
                        '<tr>
                            <td>'.$producto.'</td>
                            <td>
                                <a onClick="eliminar('.$data['id_menu_desc'].');" class="btn-floating btn-Medium waves-effect waves-light red " href="#modal1">
                                    <i class="material-icons">close</i>
                                </a>
                            </td>
                        </tr>'
                    );
                }
            } else {
                if (dataBase::getException()) {
                    $result['exception'] = dataBase::getException();
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
            }
            
        
        }

        public static function tableReservacione(){

            $model = new reservaciones;

            if ($data = $model->readAll()){

                foreach($data as $data){
                    $id;

                    print(
                        '<tr>
                            <td>'.$data['nombres'].' '.$data['apellidos'].'</td>
                            <td>'.$data['telefono'].'</td>
                            <td>'.$data['email'].'</td>
                            <td>'.$data['horario'].'</td>
                            <td>'.$data['dia'].'</td>
                            <td>'.$data['personas'].'</td>
                            <td>'.$data['tipo_reserv'].'</td>
                            <td>'.$data['descripcion'].'</td>
                            <td>'.$data['estado_reserv'].'</td>
                            <td>
                                <a onClick="finalizar('.$data['id_reservacion'].')" class="btn-floating btn-Medium waves-effect waves-light  " href="#modal1">
                                    <i class="material-icons">close</i>
                                </a>
                            </td>
                        </tr>'
                    );
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