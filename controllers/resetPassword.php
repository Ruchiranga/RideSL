<?php

class resetPassword  extends Controller{
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('resetPassword/index');
    }
    
    function run(){
        $this->model->run();
    }
}
