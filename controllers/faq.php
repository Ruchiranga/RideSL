<?php

class Faq extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('faq/index');
    }

}
