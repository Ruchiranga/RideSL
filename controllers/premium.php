<?php
class premium extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('premium/index');
    }
     public function addPremium($regNo) {
         
        $this->view->basicInfo= $this->model->basicInfo($regNo);
       

        $this->view->telephoneNo= $this->model->telephoneNo($regNo);

        
        $this->view->render('premium/index');
    }
    
    public function editPremium($regNo) {
        $this->view->basicPaymentInfo=  $this->model->basicPaymentInfo($regNo);
        $this->view->basicInfo= $this->model->basicInfo($regNo);
      

        $this->view->telephoneNo= $this->model->telephoneNo($regNo);

        $this->view->render('premium/index');
    }
    
public function saveChanges($vehicle_reg_no){
    $amount=(int)$_POST["amount"];
    $commencingDate=$_POST["commencingDate"];
    $duration=(int)$_POST["period"];
    $this->model->saveChanges($amount,$commencingDate,$duration,$vehicle_reg_no);
   

  $_SESSION['TP']="";
        $_SESSION['RN']=$vehicle_reg_no;
        
  
     header("Location: ".URL."admin/vehicleListRefresh");
}
public function addToPremium($vehicle_reg_no){
    $amount=(int)$_POST["amount"];
  $commencingDate=$_POST["commencingDate"];
  
    $duration=(int)$_POST["period"];
    $this->model->addToPremium($amount,$commencingDate,$duration,$vehicle_reg_no);

     $_SESSION['TP']="";
        $_SESSION['RN']=$vehicle_reg_no;
        
  
     header("Location: ".URL."admin/vehicleListRefresh");
  
    
}
}
