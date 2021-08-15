<?php
    class proveedores extends Validator{
        private $id;
        private $pro;
        private $desc;

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

        public function setDesc($value){

            if ($value != NULL) {
                $this->desc = $value;
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

        public function getDesc()
        {
            return $this->desc;
        }


        public function readAll() {
            $sql = 'SELECT * FROM proveedores';
            $params = null;
            return dataBase::getRows($sql, $params);
        }

        public function createRow(){
            try{
                $sql = 'INSERT INTO proveedores(proveedor,descripcion)
                VALUES (?,?)';
                $params = array($this->pro, $this->desc);
                return dataBase::executeRow($sql, $params);
            } catch (Exception $error){

                die("Error al update datos, acconunt/Models: ".$error ->getMessage()); 
            }
        }

        public function update($id){
            try{
                $sql = 'UPDATE proveedores
                SET proveedor = ? , descripcion = ?
                WHERE id_proveedor = ?';
                $params = array($this->pro, $this->desc,$id);
                return dataBase::executeRow($sql, $params);
            } catch (Exception $error){

                die("Error al update datos, acconunt/Models: ".$error ->getMessage()); 
            }
        }

    }
?>