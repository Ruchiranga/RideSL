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
//        require 'models/login_model.php';
//        $model = new Login_Model();
        $this->view->render('driverHome/index');
    }

    function logout() {
        Session::destroy();
        header('location: '.URL.'index');
        exit();
    }

}
