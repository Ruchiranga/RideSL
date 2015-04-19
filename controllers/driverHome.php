<?php

class DriverHome extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $privilege = Session::get('privilege');
        if ($logged == false || $privilege != 'd') {
            Session::destroy();
            header('location: '.URL.'login');
            exit();
        }
        
        $this->view->js = array('driverHome/js/default.js');
    }

    function index() {
        
        $this->view->owner = $this->model->run();
        $this->view->phoneNoList = $this->model->getPhoneNoList();
        
        
        $vehicleList = $this->model->getVehicleList();
        $this->view->vehicleList = $vehicleList;
        
        
        $vehicleSchemeList = $this->model->initVehicleSchemes($vehicleList);
        $this->view->vehicleSchemesList = $vehicleSchemeList;
        
        $this->view->schemeAvailabilityList = $this->model->initSchemeAvailability($vehicleSchemeList);
        $this->view->schemeLocationList = $this->model->initSchemeLocation($vehicleSchemeList);
        
        $this->view->render('driverHome/index');
        
    }

    function logout() {
        Session::destroy();
        header('location: '.URL.'index');
        exit();
    }
    
    function addPhoneNo() {
        $phoneNo = $_POST['phone_no'];
        //TODO error checking
        
        $this->model->addPhoneNo($phoneNo);
        header('location: '.URL.'driverHome');
    }
    
    function editName() {
        $fullName = $_POST['full_name'];
        $array = explode(' ',$fullName,2);
        
        $data = array();
        
        $data['firstName'] = $array[0];
        $data['lastName'] = $array[1];
        //TODO error checking
        
        $this->model->editName($data);
        header('location: '.URL.'driverHome');
    }
    
    function editEmail() {
        $email = $_POST['email'];
        //TODO error checking
        
        $this->model->editEmail($email);
        header('location: '.URL.'driverHome');
    }

    

}
