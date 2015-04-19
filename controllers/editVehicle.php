<?php

class editVehicle extends Controller {

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
        $this->view->js = array('editVehicle/js/default.js');
    }

    public function index() {

        $this->view->owner = $this->model->run();
        $this->view->phoneNoList = $this->model->getPhoneNoList();

        $this->view->vehicleTypesList = $this->model->getVehicleTypes();
        $this->view->manufacturerList = $this->model->getManufacturers();
        
        $vehicle_reg_no = $_SESSION['edit_vehicle_reg_no'];
        $this->view->vehicle_reg_no = $vehicle_reg_no;

        $vehicleDetails = $this->model->getVehicleDetails($vehicle_reg_no);
        $this->view->vehicleDetails = $vehicleDetails;

        $this->view->modelList = $this->model->getModels($vehicleDetails['0']['manufacturer']);

        $vehicleSchemeList = $this->model->initVehicleSchemes($vehicle_reg_no);
        $this->view->vehicleSchemesList = $vehicleSchemeList;

        $nonAllocatedSchemeList = $this->model->getNonAllocatedSchemes($vehicle_reg_no);
        $this->view->nonAllocatedSchemesList = $nonAllocatedSchemeList;

        $this->view->schemeAvailabilityList = $this->model->initSchemeAvailability($vehicleSchemeList, $vehicle_reg_no);
        $this->view->schemeLocationList = $this->model->initSchemeLocation($vehicleSchemeList, $vehicle_reg_no);

        $this->view->render('editVehicle/index');
    }

    public function changeManufacturer($manufacturer) {
        $models = $this->model->getNewModels($manufacturer);
    }
    
    public function updateVehicle() {
        $old_vehicle_reg_no = $_SESSION['edit_vehicle_reg_no'];
        $result = $this->model->updateVehicle($old_vehicle_reg_no);
        header('location: ../driverHome');
    }
    
    //profile details edit
    
    function addPhoneNo() {
        $phoneNo = $_POST['phone_no'];
        $this->model->addPhoneNo($phoneNo);
        header('location: '.URL.'editVehicle');
    }
    
    function editName() {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $this->model->editName($firstName, $lastName);
        header('location: '.URL.'editVehicle');
    }
    
    function editEmail() {
        $email = $_POST['email'];
        $this->model->editEmail($email);
        header('location: '.URL.'editVehicle');
    }
    
    public function updatePhoneNo($data){
        $arr = split(' ', $data);
        $old_phone_no = $arr[1];
        $new_phone_no = $_POST['phone_no'.$data[0]];
        $owner_id = $_SESSION['owner_id'];
        $this->model->updatePhoneNo($owner_id, $old_phone_no, $new_phone_no);
        header('location: '.URL.'editVehicle');
    }
    
    public function dltPhoneNo($phone_no){
        $owner_id = $_SESSION['owner_id'];
        $this->model->dltPhoneNo($owner_id, $phone_no);
        header('location: '.URL.'editVehicle');
    }

}
