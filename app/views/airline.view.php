<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';


/**
 * Vista de aerolíneas. Usa Smarty para mostrar información de las aerolíneas.
 */
class AirlineView {
    private $smarty;

    /**
     * Constructor de la vista de aerolíneas.
     */
    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('./templates/');
    }

    /**
     * Muestra la lista de aerolíneas.
     *
     * @param array $airlines Lista de objetos de aerolíneas.
     * @return void
     */
    public function showAirlines($airlines) {
        $this->smarty->assign('airlines', $airlines);
        $this->smarty->display('airlines.tpl');
    }

    /**
     * Muestra el formulario para modificar una aerolínea.
     *
     * @param object $airline Objeto de la aerolínea a editar.
     * @return void
     */
    public function showFormModifyAirline($airline) {
        $this->smarty->assign('airline', $airline);
        $this->smarty->display('formEditAirline.tpl');
    }

    /**
     * Muestra el formulario para dar de alta una nueva aerolínea.
     *
     * @return void
     */
    public function showFormAltaAirline() {
        $this->smarty->display('formAltaAirline.tpl');
    }

    /**
     * Muestra un mensaje de éxito.
     *
     * @param string $correct Mensaje de éxito.
     * @return void
     */
    public function showSuccessfully($correct) {
        $this->smarty->assign('correct', $correct);
        $this->smarty->display('showSuccessfully.tpl');
    }

    /**
     * Muestra un mensaje de error.
     *
     * @param string $error Mensaje de error.
     * @return void
     */
    public function showError(String $error) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('showError.tpl');
    }
}
