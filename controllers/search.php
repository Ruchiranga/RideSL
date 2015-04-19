<?php

class Search extends Controller {

    function __construct() {
        parent::__construct();

//        $this->view->js = array('search/js/modernizr.js', 'search/js/multizoom.js', 'search/js/popup.js', 'search/js/resultspage.js.php');
//        $this->view->js = array('search/js/modernizr.js', 'search/js/multizoom.js', 'search/js/popup.js');
//        $this->view->js = array('search/js/modernizr.js','search/js/popup.js');
        $this->view->js = array('search/js/modernizr.js','search/js/jquery-1.11.2.js','search/js/ko.js');
    }

    function index() {
        $this->view->render('search/index');
    }

    function resultList() {
//        $data = $this->model->resultList();
//        $this->view->resultList = $data['results'];
//        $this->view->phoneNumbers = $data['phone_numbers'];
//        $this->view->comments = $data['comments'];
//        $this->view->resultCount = $this->model->resultList().length;
        $this->view->render('search/index');
    }
    
    function getResultList() {
        $data = $this->model->resultList();
        echo json_encode($data);
        return ;
    }
    

    function addComment(){
        if(isset($_POST['vehicle_reg_no']) && isset($_POST['username']) && isset($_POST['comment'])){
//            $this->model->addComment('"'.$_POST['vehicle_reg_no'].'"','"'.$_POST['username'].'"','"'.$_POST['comment'].'"');
//            echo 'Comment posted successfully';
            if($this->model->addComment($_POST['vehicle_reg_no'],$_POST['username'],$_POST['comment'])){
                echo 'success';
            }else{
                echo '';
            }
        }else{
            echo '';
        }
        return ;

    }

}
