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
       
         $from='FROM: '.$_POST['email'];
         mail('zetacseuom@gmail.com','Mail from user',$_POST['message'],$from);
         
        $this->view->render('contactUs/index');
    }

}
