<?php
/*
*	Clase para manejar la tabla usuarios de la base de datos. Es clase hija de Validator.
*/
class Usuarios extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $usuario =null;
    private $clave = null;
    private $codigo = null;
    private $email =null;
    private $estado =null;
    
    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setUsuario($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->email = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estado = $value;
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
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getCorreo()
    {
        return $this->email;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */
    public function checkUser($usuario)
    {
        $sql = 'SELECT id_usuario,id_estado_usuario FROM usuarios
        WHERE usuario = ?';
        $params = array($usuario);

        if ($data = dataBase::getRow($sql, $params)) {

            $this->id = $data['id_usuario'];
            $this->estado = $data['id_estado_usuario'];
            $this->usuario = $usuario;
            return true;

        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        try{
            $sql = 'SELECT clave FROM usuarios WHERE usuario = ?';
            $params = array($this->usuario);
            $data = dataBase::getRow($sql, $params);

            if (password_verify($password, $data['clave'])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $error){

            die("Error al veificar Clave, Login/Models: ".$error ->getMessage()); 
        }
    }

    public function changePassword($id)
    {
        // Se transforma la contraseña a una cadena de texto de longitud fija mediante el algoritmo por defecto.
        $hash = password_hash('mamafina', PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET clave = ? WHERE id_usuario = ?';
        $params = array($hash, $id);
        return Database::executeRow($sql, $params);
    }
    public function readProfile()
    {
        $sql = 'SELECT id_usuario, nombres, apellidos,clave,dui,fecha_nac,telefono,email,apodo_usuario
                FROM usuarios
                WHERE id_usuario = ?';
        $params = array($_SESSION['id_usuario']);
        return Database::getRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE usuarios
                SET nombres = ?, apellidos = ?, dui = ?, telefono=?, email=?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->dui, $this->telefono,$this->email, $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT id_usuario, nombres, apellidos,clave,dui,fecha_nac,telefono,email,apodo_usuario
                FROM usuarios
                WHERE apellidos ILIKE ? OR nombres ILIKE ?
                ORDER BY apellidos';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow(){
        // Se transforma la contraseña a una cadena de texto de longitud fija mediante el algoritmo por defecto.
        $hash = password_hash('mamafina', PASSWORD_DEFAULT);
        $sql = 'INSERT INTO usuarios(nombres,apellidos,clave,email,id_estado_usuario,usuario)
                VALUES (?,?,?,?,?,?)';
        $params = array($this->nombres, $this->apellidos,$hash,$this->email,1,$this->usuario);
        return dataBase::executeRow($sql, $params);
    }

    public function updateEstado($id){
        $sql = 'UPDATE usuarios
        SET id_estado_usuario = ?
        WHERE id_usuario = ?';
        $params = array(3,$id);
        return dataBase::executeRow($sql, $params);
    }

    public function readAll() {
        $sql = 'SELECT u.id_usuario,u.usuario,u.nombres,u.apellidos,u.email,u.id_estado_usuario,e.estado_usuario FROM usuarios u, estado_usuario e
                WHERE u.id_estado_usuario = e.id_estado_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT id_usuario, nombres, apellidos,dui,fecha_nac,telefono,email,apodo_usuario
                FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow($value){
        $sql = 'UPDATE usuarios
        SET nombres = ?, apellidos = ?, email = ?,id_estado_usuario = ?
        WHERE id_usuario = ?';

        $params = array($this->nombres, $this->apellidos, $this->email, $this->estado, $value);
        return dataBase::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
