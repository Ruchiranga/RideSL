<?php
class Search extends Controller {

    function __construct() {
        parent::__construct();
        
        $this->view->js = array('searchResult/js/modernizr.js','searchResult/js/multizoom.js','searchResult/js/popup.js','searchResult/js/resultspage.js');
        
    }
    
    function index(){
        $this->view-> render('search/index');
    }

}