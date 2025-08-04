<?php

/**
 * Modelo de acceso a datos para la tabla de usuarios.
 */
class UserModel {

    /**
     * @var PDO Conexión a la base de datos.
     */
    private $db;

    /**
     * Constructor. Establece la conexión a la base de datos.
     *
     * @throws PDOException si la conexión falla.
     */
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=db_tpe;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
        }
    }

    /**
     * Obtiene un usuario según su email.
     *
     * @param string $email Email del usuario a buscar.
     * @return object|null Retorna el usuario o null si no existe.
     */
   public function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute([$email]);
       $user = $query->fetch(PDO::FETCH_OBJ);
       return $user ?: null;
    }
    
} 
