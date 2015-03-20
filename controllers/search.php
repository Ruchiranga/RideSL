<?php

class Search extends Controller {

    function __construct() {
        parent::__construct();

//        $this->view->js = array('search/js/modernizr.js', 'search/js/multizoom.js', 'search/js/popup.js', 'search/js/resultspage.js.php');
//        $this->view->js = array('search/js/modernizr.js', 'search/js/multizoom.js', 'search/js/popup.js');
//        $this->view->js = array('search/js/modernizr.js','search/js/popup.js');
        $this->view->js = array('search/js/modernizr.js');
    }

    function index() {
        $this->view->render('search/index');
    }

    function resultList() {
        $data = $this->model->resultList();
        $this->view->resultList = $data['results'];
        $this->view->phoneNumbers = $data['phone_numbers'];
        $this->view->comments = $data['comments'];
//        $this->view->resultCount = $this->model->resultList().length;
        $this->view->render('search/index');
    }

}
