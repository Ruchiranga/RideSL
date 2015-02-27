<?php

class Error extends Controller {

    function __construct() {
        parent::__construct();
        echo 'this is and error';
    }

    function index() {
        $this->view->msg = 'This is a msgt';
        $this->view->render('error/index');
    }

}
