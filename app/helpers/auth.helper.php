<?php

class AuthHelper {

    public function __construct() {}

    /**
     * Inicia sesión y guarda los datos del usuario.
     *
     * @param object $user Objeto con al menos los campos id y username.
     */
    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO

        $_SESSION['USER_ID'] = $user->id;// arreglo para guardar datos
        $_SESSION['USERNAME'] = $user->username;
    }

    /**
     * Cierra la sesión del usuario actual.
     */
    public function logout() {
        session_start();
        session_destroy();
    }

    /**
     * Verifica si el usuario está logueado.
     * Redirige al login si no lo está.
     */
    public function checkLoggedIn() {
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . LOGIN);
            die();
        }       
    }

    /**
     * Obtiene el nombre de usuario logueado.
     *
     * @return string Nombre de usuario .
     */
    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['USER_ID'];
    }
}
