<?php
    class bitacoras extends Validator{
        private $id;
        private $pro;
        private $precio;
        private $fecha;
        private $usuario;
        private $proveedor;

        /*
        *   Métodos para validar y asignar valores de los atributos.
        */
        public function setId($value){

            if ($this->validateNaturalNumber($value)) {
                $this->id = $value;
                return true;
            } else {
                return false;
            }
        }

        public function setPro($value){

            if ($this->validateAlphabetic($value, 1, 40)) {
                $this->pro = $value; 
                return true;
            } else {
                return false;
            }
        }

        public function setPrecio($value){

            if ($this->validateMoney($value)) {
                $this->precio = $value;
                return true;
            } else {
                return false;
            }
        }

        public function setFecha($value){

            if ($this->validateDate($value)) {
                $this->fecha = $value;
                return true;
            } else {
                return false;
            }
        }

        public function setUsuario($value){

            if ($this->validateNaturalNumber($value)) {
                $this->usuario = $value;
                return true;
            } else {
                return false;
            }
        }

        public function setProveedor($value){

            if ($this->validateNaturalNumber($value)) {
                $this->proveedor = $value;
                return true;
            } else {
                return false;
            }
        }


        /*
        *   Métodos para obtener valores de los atributos.
        */
        public function getId()
        {
            return $this->id;
        }

        public function getPro()
        {
            return $this->pro;
        }


        public function readAll() {
            $sql = 'SELECT b.id_bitacora,b.producto,b.precio_prodcuto,b.fecha_bitacora,b.id_usuario,u.usuario,b.id_proveedor,p.proveedor
            FROM bitacora_compras b, usuarios u,  proveedores p
            WHERE b.id_usuario = u.id_usuario 
            AND b.id_proveedor = p.id_proveedor';

            $params = null;
            return dataBase::getRows($sql, $params);
        }

        public function createRow(){
            try{
                $fecha = date("Y").'-'.date("m").'-'.date("d") ;

                $sql = 'INSERT INTO bitacora_compras(producto,precio_prodcuto,fecha_bitacora,id_usuario,id_proveedor)
                VALUES (?,?,?,?,?)';
                $params = array($this->pro, $this->precio, $fecha,$_SESSION['id'],$this->proveedor);
                return dataBase::executeRow($sql, $params);
            } catch (Exception $error){

                die("Error al update datos, acconunt/Models: ".$error ->getMessage()); 
            }
        }

        public function update($id){
            try{
                $sql = 'UPDATE bitacora_compras
                SET producto = ?, precio_prodcuto = ?, id_proveedor = ?
                WHERE id_bitacora = ?';

                $params = array($this->pro, $this->precio,$this->proveedor,$id);
                return dataBase::executeRow($sql, $params);
            } catch (Exception $error){

                die("Error al update datos, acconunt/Models: ".$error ->getMessage()); 
            }
        }

    }
?>