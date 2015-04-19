<?php

class contactUs extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('contactUs/index');
    }
     public function sendMail() {
         
         //sending mail part goes here
         
        $this->view->render('contactUs/index');
    }

}
