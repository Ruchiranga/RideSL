<?php

class PassengerSignup extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
//        require 'models/login_model.php';
//        $model = new Login_Model();
        $this->view->render('passengerSignup/index');
    }

}
