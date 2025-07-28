<?php
require_once 'libs/smarty-4.2.1/libs/Smarty.class.php';
class TripView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function showHome(){
        $this->smarty->display('templates/home.tpl');
    }

    public function showTrips($trips){

        $this->smarty->assign('trips',$trips);
        $this->smarty->display('templates/showAllTrips.tpl');
    }

    public function showTrip($oneTrip){
      //  var_dump($oneTrip);
        $this->smarty->assign('oneTrip',$oneTrip);
        $this->smarty->display('templates/showOneTrip.tpl');  
    }

    public function showFormAltaViaje($airlines){
        $this->smarty->assign('airlines', $airlines);
        $this->smarty->display('templates/formAltaViaje.tpl');
    }

    public function showAirlines($airlines){
        $this->smarty->assign('airlines',$airlines);
        $this->smarty->display('templates/airlines.tpl');
    }

    public function formModify($trip, $airline){
        $this->smarty->assign('trip',$trip);
        $this->smarty->assign('airlines', $airline);
        $this->smarty->display('templates/formEditViaje.tpl');
    }

    public function showSuccessfully($correct){
        $this->smarty->assign('correct',$correct);
        $this->smarty->display('templates/showSuccessfully.tpl');
    }

    public function showError(String $error){
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/showError.tpl');
    }

    public function formModifyAirline($airline){
        $this->smarty->assign('airline', $airline);
        $this->smarty->display('templates/formEditAirline.tpl');
    }

    public function showFormAltaAirline(){
        $this->smarty->display('templates/formAltaAirline.tpl');
    }
}