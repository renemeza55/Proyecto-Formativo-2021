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
    private $clave = null;
    private $dui=null;
    private $fecha_nac=null;
    private $telefono=null;
    private $email=null;
    private $apodo_usuario=null;

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
    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setDUI($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setNacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_nac = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setTelefono($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono = $value;
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
    

    public function setAlias($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->apodo_usuario = $value;
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
    public function getDUI()
    {
        return $this->dui;
    }
    public function getNacimiento()
    {
        return $this->fecha_nac;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getCorreo()
    {
        return $this->email;
    }

    public function getAlias()
    {
        return $this->apodo_usuario;
    }

    

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */
    public function checkUser($apodo_usuario)
    {
        $sql = 'SELECT id_usuario FROM usuarios WHERE apodo_usuario = ?';
        $params = array($apodo_usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_usuario'];
            $this->alias = $alias;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT clave FROM usuarios WHERE id_usuario = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        // Se verifica si la contraseña coincide con el hash almacenado en la base de datos.
        if (password_verify($password, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        // Se transforma la contraseña a una cadena de texto de longitud fija mediante el algoritmo por defecto.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET clave = ? WHERE id_usuario = ?';
        $params = array($hash, $_SESSION['id_usuario']);
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

    public function createRow()
    {
        // Se transforma la contraseña a una cadena de texto de longitud fija mediante el algoritmo por defecto.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO usuarios(nombres, apellidos,dui,fecha_nac,telefono,email,apodo_usuario,clave)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombres, $this->apellidos, $this->dui, $this->fecha_nac,$this->telefono,$this->email,$this->apodo_usuario, $hash);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT id_usuario, nombres, apellidos,dui,fecha_nac,telefono,email,apodo_usuario
                FROM usuarios
                ORDER BY apellidos_usuario';
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

    public function updateRow()
    {
        $sql = 'UPDATE usuarios 
                SET nombres = ?, apellidos = ?, dui = ?, telefono=?, email=?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->dui,$this->telefono,$this->email, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
