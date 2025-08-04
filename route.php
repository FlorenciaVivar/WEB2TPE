<?php
require_once 'app/controllers/trip.controller.php';
require_once 'app/controllers/airline.controller.php';
require_once 'app/controllers/auth.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');

$action = 'home'; // acción por defecto para mostrar home
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion
$params = explode('/', $action);

$tripController = new TripController();
$authController = new AuthController();
$airlineController = new AirlineController();

// tabla de ruteo
switch ($params[0]) {
    case 'home':
        $tripController->showHome();
        break;

    // RUTAS AUTENTICACIÓN
    case 'login':
        $authController->showFormLogin();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'validate':
        $authController->validateUser();
        break;

    // RUTAS VIAJES
    case 'trips':
        $tripController->showTrips();
        break;
    case 'addNew':
        $tripController->addTrip();
        break;
    case 'delete':
        $id = $params[1];                        // obtengo el parametro de la acción
        $tripController->deleteTrip($id);
        break;
    case 'modify':
        $id = $params[1];
        $airlines = $airlineController->getAll();
        $tripController->showOneTripForModify($id, $airlines);
        break;
    case 'modified':
        $id = $params[1];
        $tripController->showEditForm($id);
        break;
    case 'showTrip':
        $id = $params[1];
        $tripController->showTrip($id);
        break;
    case 'showTripsByAirline':
        $id = $params[1];
        $tripController->showTripsByAirlineController($id);
        break;

    // RUTAS AEROLÍNEAS
    case 'aerolineas':
        $airlineController->showAllAirlines();
        break;
    case 'addAirline':
        $airlineController->showFormAddAirline();
        break;
    case 'insertAirline':
        $airlineController->addAirline();
        break;
    case 'add':
        $airlines = $airlineController->getAll();
        $tripController->showAddForm($airlines);
        break;
    case 'deleteAirline':
        $id = $params[1];
        $trips = $tripController->getTripsByAirline($id);
        $airlineController->deleteAirline($id, $trips);
        break;
    case 'modifyAirline':
        $id = $params[1];
        $airlineController->showOneAirlineForModify($id);
        break;
    case 'modifiedAirline':
        $id_aerolinea = $params[1];
        $airlineController->editAirlineController($id_aerolinea);
        break;

    // ERROR 404
    default:
        header("HTTP/1.0 404 Not Found");
        echo ('404 Page not found');
        break;

}