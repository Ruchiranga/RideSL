<?php
class admin extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $privilege = Session::get('privilege');
        if ($logged == false || $privilege != 'a') {
            Session::destroy();
            header('location: '.URL.'login');
            exit();
        }
    }

    public function index() {
      
        $this->view->render('admin/index');
       
    }
     function logout() {
        Session::destroy();
        header('location: '.URL.'index');
        exit();
    }

  function vehicleList(){
        $this->view->vehicleBasicInfo=$this->model->vehicleList();
       
        $locationList=array();
        $categoryList=array();
        $isPremium=array();
        $isSuspended=array();
        
      
        foreach ($this->view->vehicleBasicInfo as $key=>$value){
           array_push( $locationList,$this->model->vehicleLocatioList($value['vehicle_reg_no']));
           array_push( $categoryList,$this->model->vehicleSchemeTypes($value['vehicle_reg_no']));
           array_push( $isPremium,$this->model->isPremium($value['vehicle_reg_no']));
           if($value['isactive']==1){
               array_push( $isSuspended ,'Active');
           }
           else {
           array_push( $isSuspended ,'Suspended');
       }
             
              
        }
        $this->view->locationList=$locationList;
                $this->view->categoryList=$categoryList;
                $this->view->isPremium= $isPremium;
                $this->view->isSuspended= $isSuspended;
         $this->view->render('admin/index');
    }
      function vehicleListRefresh(){
        $this->view->vehicleBasicInfo=$this->model->vehicleListRefresh();
       
        $locationList=array();
        $categoryList=array();
        $isPremium=array();
        $isSuspended=array();
        
      
        foreach ($this->view->vehicleBasicInfo as $key=>$value){
           array_push( $locationList,$this->model->vehicleLocatioList($value['vehicle_reg_no']));
           array_push( $categoryList,$this->model->vehicleSchemeTypes($value['vehicle_reg_no']));
           array_push( $isPremium,$this->model->isPremium($value['vehicle_reg_no']));
           if($value['isactive']==1){
               array_push( $isSuspended ,'Active');
           }
           else {
           array_push( $isSuspended ,'Suspended');
       }
             
              
        }
        $this->view->locationList=$locationList;
                $this->view->categoryList=$categoryList;
                $this->view->isPremium= $isPremium;
                $this->view->isSuspended= $isSuspended;
         $this->view->render('admin/index');
    }
public function deleteVehicle($regNo){
    $this->model->deleteVehicle($regNo);
    
    header('Location: '.URL.'admin/vehicleListRefresh');
     
}
function suspendVehicle($regNo){
    $this->model->suspendVehicle($regNo);
      header('Location: '.URL.'admin/vehicleListRefresh');
}
function activateVehicle($regNo){
    $this->model->activateVehicle($regNo);
    header('Location: '.URL.'admin/vehicleListRefresh');
    
}
}
