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

$controller = new TripController();
$authController = new AuthController();
$airlineController = new AirlineController();

// tabla de ruteo
switch ($params[0]) {
    case 'home':
        $controller->showHome();
        break;
    case 'login':
        $authController->showFormLogin();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'validate':
        $authController->validateUser();
        break;
    case 'trips':
        $controller->showTrips();
        break;
    case 'aerolineas':
        $airlineController->showAllAirlines();
        break;
    case 'add':
        $airlines = $airlineController->getAll();
        $controller->showFormAdd($airlines);
        break;
    case 'addNew':
        $controller->addTrip();
        break;
    case 'delete':
        $id = $params[1];                        // obtengo el parametro de la acción
        $controller->deleteTrip($id);
        break;
    case 'modify':
        $id = $params[1];
        $airlines = $airlineController->getAll();// esto esta mal
        $controller->showOneTripForModify($id, $airlines);
        break;
    case 'modified':
        $id = $params[1];
        $controller->editTripController($id);
        break;
    case 'showTrip':
        $id = $params[1];
        $controller->showTrip($id);
        break;
    case 'showTripsByAirline':
        $id = $params[1];
        $controller->showTripsByAirlineController($id);
        break;
    case 'deleteAirline':
        $id = $params[1];
        $trips = $controller->showTripsByAirlineController($id);
        $id = $params[1];
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
    case 'addNewAirline':
        $airlineController->showFormAddAirline();
        $airlineController->addAirline();
        break;    
    default:
        header("HTTP/1.0 404 Not Found");
        echo ('404 Page not found');
        break;

}
