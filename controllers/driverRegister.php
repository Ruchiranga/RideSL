<?php

class driverRegister extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('driverRegister/index');
    }
    
    public function changeManufacturer($manufacturer) {
        $models = $this->model->getNewModels($manufacturer);
    }

}
