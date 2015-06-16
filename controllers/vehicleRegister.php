<?php

class vehicleRegister extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $privilege = Session::get('privilege');
        if ($logged == false || $privilege != 'd') {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit();
        }
    }
    
    

    public function index() {
        
        $this->view->owner = $this->model->run();
        $this->view->phoneNoList = $this->model->getPhoneNoList();        
       
        $vehicleList = $this->model->getVehicleList();
        $this->view->vehicleList = $vehicleList;
        
        if($vehicleList != NULL){
            $vehicleSchemeList = $this->model->initVehicleSchemes($vehicleList);
            $this->view->vehicleSchemesList = $vehicleSchemeList;
        
//            $this->view->schemeAvailabilityList = $this->model->initSchemeAvailability($vehicleSchemeList);
//            $this->view->schemeLocationList = $this->model->initSchemeLocation($vehicleSchemeList);
        }        
        
        $this->view->render('vehicleRegister/index');
        
        
        

    }
    
    
    
    function addPhoneNo() {
        $phoneNo = $_POST['phone_no'];
        $this->model->addPhoneNo($phoneNo);
        header('location: '.URL.'vehicleRegister');
    }
    
    function editName() {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        
        $this->model->editName($firstName, $lastName);
        header('location: '.URL.'vehicleRegister');
    }
    
    function editEmail() {
        $email = $_POST['email'];
        $this->model->editEmail($email);
        header('location: '.URL.'vehicleRegister');
    }
    
    public function updatePhoneNo($data){
        $arr = split(' ', $data);
        $old_phone_no = $arr[1];
        $new_phone_no = $_POST['phone_no'.$data[0]];
        $owner_id = $_SESSION['owner_id'];
        $this->model->updatePhoneNo($owner_id, $old_phone_no, $new_phone_no);
        header('location: '.URL.'vehicleRegister');
    }
    
    public function dltPhoneNo($phone_no){
        $owner_id = $_SESSION['owner_id'];
        $this->model->dltPhoneNo($owner_id, $phone_no);
        header('location: '.URL.'vehicleRegister');
    }
    
    function logout() {
        Session::destroy();
        header('location: '.URL.'index');
        exit();
    }

}
