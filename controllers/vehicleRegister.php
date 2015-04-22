<?php

class vehicleRegister extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $this->view->manufacturerList = $this->model->getManufacturers();
        
        $this->view->render('vehicleRegister/index');
        
        
        
//        $manufactList = $this->model->getAllModels($manufacturer) ;
//        $this->view->manufacturerList = $manufactList;
//        $models = $this->model->getNewModels($manufacturer);
    }
    
    public function changeManufacturer($manufacturer) {
        $models = $this->model->getNewModels($manufacturer);
    }

}
