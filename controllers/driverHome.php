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
        
//        $this->view->js = array('driverHome/js/default.js');
    }

    function index() {
        
        $this->view->owner = $this->model->run();
        $this->view->phoneNoList = $this->model->getPhoneNoList();
        
        $vehicleList = $this->model->getVehicleList();
        $this->view->vehicleList = $vehicleList;
        
        if($vehicleList != NULL){
            $vehicleSchemeList = $this->model->initVehicleSchemes($vehicleList);
            $this->view->vehicleSchemesList = $vehicleSchemeList;
        
            $this->view->schemeAvailabilityList = $this->model->initSchemeAvailability($vehicleSchemeList);
            $this->view->schemeLocationList = $this->model->initSchemeLocation($vehicleSchemeList);
        }
              
        $suspendedVehicleList = $this->model->getSuspendedVehicleList();
        $this->view->suspendedVehicleList = $suspendedVehicleList;
        
        if($suspendedVehicleList != NULL){
            $suspendedVehicleSchemeList = $this->model->initVehicleSchemes($suspendedVehicleList);
            $this->view->suspendedVehicleSchemesList = $suspendedVehicleSchemeList;
        
            $this->view->suspendedSchemeAvailabilityList = $this->model->initSchemeAvailability($suspendedVehicleSchemeList);
            $this->view->suspendedSchemeLocationList = $this->model->initSchemeLocation($suspendedVehicleSchemeList);
        }
        
        $this->view->render('driverHome/index');
        
    }

    function logout() {
        Session::destroy();
        header('location: '.URL.'index');
        exit();
    }

    //profile details edit
    
    function addPhoneNo() {
        $phoneNo = $_POST['phone_no'];
        $this->model->addPhoneNo($phoneNo);
        header('location: '.URL.'driverHome');
    }
    
    function editName() {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        
        $this->model->editName($firstName, $lastName);
        header('location: '.URL.'driverHome');
    }
    
    function editEmail() {
        $email = $_POST['email'];
        $this->model->editEmail($email);
        header('location: '.URL.'driverHome');
    }
    
    public function updatePhoneNo($data){
        $arr = split(' ', $data);
        $old_phone_no = $arr[1];
        $new_phone_no = $_POST['phone_no'.$data[0]];
        $owner_id = $_SESSION['owner_id'];
        $this->model->updatePhoneNo($owner_id, $old_phone_no, $new_phone_no);
        header('location: '.URL.'driverHome');
    }
    
    public function dltPhoneNo($phone_no){
        $owner_id = $_SESSION['owner_id'];
        $this->model->dltPhoneNo($owner_id, $phone_no);
        header('location: '.URL.'driverHome');
    }
    
    //vehicle details edit
    
    function editVehicle($reg_no){
        $_SESSION['edit_vehicle_reg_no'] = $reg_no;
        header('location: '.URL.'editVehicle');
    }
    
    public function deleteScheme($scheme_id){
        $deleted = $this->model->deleteScheme($scheme_id);
        if($deleted == true){
            header('location: '.URL.'driverHome');
        }else{
            echo 'error';
        }
    }
    
    public function suspendVehicle($vehicle_reg_no){
        $deleted = $this->model->suspendVehicle($vehicle_reg_no);
        if($deleted == true){
            header('location: '.URL.'driverHome');
        }else{
            echo 'error';
        }
        
    }
    
    public function makeActiveVehicle($vehicle_reg_no){
        $deleted = $this->model->makeActiveVehicle($vehicle_reg_no);
        if($deleted == true){
            header('location: '.URL.'driverHome');
        }else{
            echo 'error';
        }
        
    }
    
    

    

}
