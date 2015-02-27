<?php

class Help extends Controller {

    function __construct() {
        parent::__construct();
        
    }
    
    function index(){
        $this->view-> render('faq/index');
    }

    public function getHelp($from = 'no one') {
        
        require 'models/help_model.php';
        $model = new Help_Model();
        
        $this->view->genHelpMsg = $model->genHelp();
        
    }

}
