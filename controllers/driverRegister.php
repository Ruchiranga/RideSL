<?php

class driverRegister extends Controller {

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
    }

    public function index() {
        $this->view->render('driverRegister/index');
    }
    
    public function changeManufacturer($manufacturer) {
        $models = $this->model->getNewModels($manufacturer);
    }

}
