<?php
class user extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->userList=array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        $this->view->render('user/index');
       
    }
 
}