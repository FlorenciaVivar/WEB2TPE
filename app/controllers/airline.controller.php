<?php
//incluimos model y view
require_once './app/views/airline.view.php';
require_once './app/models/airline.model.php';
require_once './app/helpers/auth.helper.php';

class AirlineController{

    private $model;
    private $view;
    private $authHelper;

    public function __construct(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $this->model = new AirlineModel();
        $this->view = new AirlineView();
        $this->authHelper = new AuthHelper();
    }

    public function getAll() {
        return $this->model->getAll();
    }

    public function showAllAirlines(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 4;
        $offset = ($page - 1) * $limit;

        $airlines = $this->model->getAirlinesPaginated($limit, $offset);
        $totalAirlines = $this->model->countAirlines();
        $totalPages = ceil($totalAirlines / $limit);
        // //actualizo la vista
        $this->view->showAirlines($airlines,$page,$totalPages);
    }

    public function deleteAirline($id, $trips) {
        $this->authHelper->checkLoggedIn();

        if (!isset($id)) {
            $this->view->showError("ID de aerolínea no especificado");
            return;
        }

        if (!empty($trips)) {
            $this->view->showError("No se puede eliminar la aerolínea, ya que tiene viajes asociados");
            return;
        }

        $this->model->deleteAirlineModel($id);
        $this->view->showSuccessfully("Aerolínea eliminada con éxito");
    }

    public function showOneAirlineForModify($id){
        //barrera para el que este logueado
        $this->authHelper->checkLoggedIn();
        $airline = $this->model->getOneAirline($id);
        $this->view->showFormModifyAirline($airline);
    }

    public function editAirlineController($id){

        //barrera para el que este logueado
        $this->authHelper->checkLoggedIn();
        if (isset($_POST['nombre']) && trim($_POST['nombre']) !== '')  {
            if ($_FILES['imagenAerolinea']['type'] == "image/jpg" 
            || $_FILES['imagenAerolinea']['type'] == "image/jpeg" 
            || $_FILES['imagenAerolinea']['type'] == "image/png") {

                $nombre = $_POST['nombre']; //lo que va despues del POSt adentro de [] tiene q ser igual a lo q hay en mi DB
                $imagenAerolinea = $_FILES['imagenAerolinea']['tmp_name'];
                $this->model->editAirlineModel($id, $nombre, $imagenAerolinea);
                $this->view->showSuccessfully('Aerolinea editada con éxito!');
            } else {
                $this->view->showError("Formato de imagen no permitido");
            }
        }
    }
    public function showFormAddAirline(){

        //barrera para el que este logueado
        $this->authHelper->checkLoggedIn();
        $this->view->showFormAltaAirline();
    }

    public function addAirline()
    {
        //barrera para el que este logueado
        $this->authHelper->checkLoggedIn();
        //verificar si todo llego $_post

        if (isset($_POST['nombre'])&& isset($_FILES['imagenAerolinea']['tmp_name'])) {
            if ($_FILES['imagenAerolinea']['type'] == "image/jpg" 
            ||$_FILES['imagenAerolinea']['type'] == "image/jpeg" 
            || $_FILES['imagenAerolinea']['type'] == "image/png") {

                //despues lo mandas al model para que haga un create 
                $nombre = $_POST['nombre'];
                $imagenAerolinea = $_FILES['imagenAerolinea']['tmp_name'];
                $this->model->insertAirline($nombre, $imagenAerolinea);
                header("Location: " . BASE_URL . "airlines");
                exit();
            } else {
                $this->view->showError("Formato de imagen no permitido");
                exit();

            }
        }
    }

}
