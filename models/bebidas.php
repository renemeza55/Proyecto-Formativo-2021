<?php
    class bebidas extends Validator{
        private $id;
        private $nombre;
        private $desc;
        private $precio;
        private $tipo;
        private $img;
        private $ruta = '../../resources/img/bebidas/';

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

        public function setNombre($value){

            if ($this->validateAlphabetic($value, 1, 50)) {
                $this->nombre = $value;
                return true;
            } else {
                return false;
            }
        }

        public function setDesc($value){

            if ($value != NULL) {
                $this->desc = $value;
                return true;
            } else {
                return false;
            }
        }

        public function setTipo($value){

            if ($this->validateNaturalNumber($value)) {
                $this->tipo = $value;
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

        public function setImg($file){
            if ($file != null) {
                $name = $file['name'];
                $this->img = $name;
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

        public function getNombres()
        {
            return $this->nombre;
        }

        public function getDesc()
        {
            return $this->desc;
        }

        public function getTipo()
        {
            return $this->tipo;
        }

        public function getImg()
        {
            return $this->img;
        }
        public function getRuta(){
            return $this->ruta;
        }


        public function readAll() {
            $sql = 'SELECT b.id_bebida,b.nombre_bebida,b.descripcion,b.precio, b.id_tipo_bebida,t.tipo_bebida,b.img FROM bebidas b ,tipo_bebidas t
            WHERE b.id_tipo_bebida = t.id_tipo_bebida';
            $params = null;
            return dataBase::getRows($sql, $params);
        }

        public function readOne($value) {
            $sql = 'SELECT b.id_bebida,b.nombre_bebida,b.descripcion,b.precio, b.id_tipo_bebida,t.tipo_bebida,b.img
            FROM bebidas b ,tipo_bebidas t
            WHERE b.id_tipo_bebida = t.id_tipo_bebida
            AND b.id_bebida = ?';
            $params = array($value);
            return dataBase::getRows($sql, $params);
        }

        public function createRow(){
            try{
                $sql = 'INSERT INTO bebidas(nombre_bebida,descripcion,precio,id_tipo_bebida,img)
                VALUES (?,?,?,?,?)';
                $params = array($this->nombre, $this->desc, $this->precio,$this->tipo,$this->img);
                return dataBase::executeRow($sql, $params);
            } catch (Exception $error){

                die("Error al update datos, acconunt/Models: ".$error ->getMessage()); 
            }
        }

        public function updateImg($id){
            try{
                $sql = 'UPDATE bebidas
                SET nombre_bebida = ?,descripcion = ?,precio = ?,id_tipo_bebida = ?,img =?
                WHERE id_bebida = ?';
                $params = array($this->nombre, $this->desc, $this->precio,$this->tipo,$this->img,$id);
                return dataBase::executeRow($sql, $params);
            } catch (Exception $error){

                die("Error al update datos, acconunt/Models: ".$error ->getMessage()); 
            }
        }

        public function update($id){
            try{
                $sql = 'UPDATE bebidas
                SET nombre_bebida = ?,descripcion = ?,precio = ?,id_tipo_bebida = ?
                WHERE id_bebida = ?';
                $params = array($this->nombre, $this->desc, $this->precio,$this->tipo,$id);
                return dataBase::executeRow($sql, $params);
            } catch (Exception $error){

                die("Error al update datos, acconunt/Models: ".$error ->getMessage()); 
            }
        }
    }
?>