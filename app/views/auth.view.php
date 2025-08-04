<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

/**
 * Clase AuthView
 * Se encarga de mostrar la vista de autenticación (login) usando Smarty.
 */
class AuthView {
    private $smarty;

    /**
     * Constructor.
     * Inicializa Smarty y define el directorio de plantillas.
     */
    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('./templates/');
    }

    /**
     * Muestra el formulario de login.
     *
     * @param string|null $error Mensaje de error opcional (por ejemplo, contraseña incorrecta).
     */
    function showFormLogin($error=null) {
        //$error=null-> puedo o no pasarlo al mensaje de error contrase;a incorrects
        $this->smarty->assign("error", $error);
        $this->smarty->display('formUser.tpl');
    }
}
