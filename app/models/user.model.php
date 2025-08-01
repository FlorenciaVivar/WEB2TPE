<?php

class UserModel {
//UserModel xq es la tabla usuario, deberiamos tener una tabla por modelo
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root', '');
    }

/*  TRAE EL USUARIO SEGUN SU EMAIL  */
    function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
} 
