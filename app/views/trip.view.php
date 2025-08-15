<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';


/**
 * Clase TripView
 * Encargada de mostrar vistas relacionadas con los viajes.
 */
class TripView{

    private $smarty;

    /**
     * Constructor.
     * Inicializa el motor de plantillas Smarty.
     */
    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('./templates/');
    }

    /**
     * Muestra la página de inicio.
     */
    public function showHome(){
        $this->smarty->display('home.tpl');
    }

    /**
     * Muestra todos los viajes disponibles paginado.
     *
     * @param array $trips Lista de viajes paginado.
     */
    public function showTrips($trips, $currentPage = 1, $totalPages = 1){
        if (empty($trips)) {
            $this->showError("No hay viajes disponibles.");
            return;
        }
        $this->smarty->assign('trips', $trips);
        $this->smarty->assign('currentPage', $currentPage);
        $this->smarty->assign('totalPages', $totalPages);
        $this->smarty->display('showAllTrips.tpl');
    }


    /**
     * Muestra los detalles de un viaje específico.
     *
     * @param object $oneTrip Objeto con la info del viaje.
     */
    public function showTrip($oneTrip){
      //  var_dump($oneTrip);
        $this->smarty->assign('oneTrip',$oneTrip);
        $this->smarty->display('showOneTrip.tpl');
    }

    /**
     * Muestra el formulario para crear un nuevo viaje.
     *
     * @param array $airlines Lista de aerolíneas disponibles.
     */
    public function showFormAltaViaje($airlines){
        $this->smarty->assign('airlines', $airlines);
        $this->smarty->display('formAltaViaje.tpl');
    }

    /**
     * Muestra el formulario para modificar un viaje.
     *
     * @param object $trip Datos del viaje a modificar.
     * @param array $airline Lista de aerolíneas.
     */
    public function showFormEditTrip($trip, $airline){
        $this->smarty->assign('trip',$trip);
        $this->smarty->assign('airlines', $airline);
        $this->smarty->display('formEditViaje.tpl');
    }

    /**
     * Muestra un mensaje de éxito.
     *
     * @param string $correct Mensaje de éxito.
     */
    public function showSuccessfully($correct){
        $this->smarty->assign('correct',$correct);
        $this->smarty->display('showSuccessfully.tpl');
    }

    /**
     * Muestra un mensaje de error.
     *
     * @param string $error Mensaje de error.
     */
    public function showError(String $error){
        $this->smarty->assign('error',$error);
        $this->smarty->display('showError.tpl');
    }
}