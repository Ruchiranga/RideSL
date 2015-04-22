<?php

class Admin_Model extends Model {

    private $telephoneNo;
    private $regNo;
  
            
                function __construct() {
//                    session_start();
        parent::__construct();
               
    }

    public function vehicleList() {
        
        $this->telephoneNo = $_POST['telephoneNo'];
        $this->regNo = $_POST['regNo'];
        $_SESSION['TP']=$_POST['telephoneNo'];
        $_SESSION['RN']=$_POST['regNo'];
       ///$GLOBALS['telephoneNo']=$_POST['telephoneNo'];
   //$GLOBALS['telephoneNumber']=$_POST['telephoneNo'];
     //   $GLOBALS['registerNo']=$_POST['regNo'];
     $_POST['telephoneNo']=NULL;
      $_POST['regNo']=NULL;
   
        if ($this->regNo == "" && $this->telephoneNo != null) {
            $sth = $this->db->prepare('Select distinct vehicle_reg_no,manufacturer,model,OwnerName,isActive,Date_of_registration,vehicle_type  from vehicle_owner_tp natural left join scheme natural left join scheme_location where telephone_number = :telNo');
            $sth->execute(array(
                ':telNo' => $this->telephoneNo
            ));
        } else if ($this->regNo != null && $this->telephoneNo == "") {
            $sth = $this->db->prepare('Select distinct vehicle_reg_no,manufacturer,model,OwnerName,isActive,Date_of_registration,vehicle_type from vehicle_owner_tp natural left join scheme natural left join scheme_location where vehicle_reg_no = :regNo');
           
            $sth->execute(array(
                ':regNo' => $this->regNo
            ));
        } else if ($this->regNo != null && $this->telephoneNo != null) {
            $sth = $this->db->prepare('Select distinct vehicle_reg_no,manufacturer,model,OwnerName,isActive,Date_of_registration,vehicle_type from vehicle_owner_tp natural left join scheme natural left join scheme_location where telephone_number = :telNo and vehicle_reg_no = :regNo');
            $sth->execute(array(
                ':telNo' => $this->telephoneNo,
                ':regNo' => $this->regNo
            ));
        } else {
            $sth = null;
            return null;
        }
        
      return $sth->fetchAll();

        
    }
    
    
    public function vehicleListRefresh() {
       
    
       $this->telephoneNo= $_SESSION['TP'];
       $this->regNo= $_SESSION['RN'];
      
        if ($this->regNo == "" && $this->telephoneNo != null) {
            $sth = $this->db->prepare('Select distinct vehicle_reg_no,manufacturer,model,OwnerName,isActive,Date_of_registration,vehicle_type  from vehicle_owner_tp natural left join scheme natural left join scheme_location where telephone_number = :telNo');
            $sth->execute(array(
                ':telNo' => $this->telephoneNo
            ));
        } else if ($this->regNo != null && $this->telephoneNo == "") {
            $sth = $this->db->prepare('Select distinct vehicle_reg_no,manufacturer,model,OwnerName,isActive,Date_of_registration,vehicle_type from vehicle_owner_tp natural left join scheme natural left join scheme_location where vehicle_reg_no = :regNo');
           
            $sth->execute(array(
                ':regNo' => $this->regNo
            ));
        } else if ($this->regNo != null && $this->telephoneNo != null) {
            $sth = $this->db->prepare('Select distinct vehicle_reg_no,manufacturer,model,OwnerName,isActive,Date_of_registration,vehicle_type from vehicle_owner_tp natural left join scheme natural left join scheme_location where telephone_number = :telNo and vehicle_reg_no = :regNo');
            $sth->execute(array(
                ':telNo' => $this->telephoneNo,
                ':regNo' => $this->regNo
            ));
        } else {
            $sth = null;
            return null;
        }
        
      return $sth->fetchAll();

        
    }
    
    
    
     public function vehicleLocatioList($regNo) {
        
            $sth = $this->db->prepare('Select distinct location  from scheme natural join scheme_location where vehicle_reg_no = :regNo');
            $sth->execute(array(
                ':regNo' => $regNo
            ));
 
        
      return $sth->fetchAll();

        
    }
      public function vehicleSchemeTypes($regNo) {
        
            $sth = $this->db->prepare('Select distinct category  from scheme  where vehicle_reg_no = :regNo');
            $sth->execute(array(
                ':regNo' => $regNo
            ));
 
        
      return $sth->fetchAll();

        
    }
  
     public function isPremium($regNo) {
        
            $sth = $this->db->prepare('Select * from premiumpayment where vehicle_reg_no = :regNo');
            $sth->execute(array(
                ':regNo' => $regNo
            ));
 
        if($sth->rowCount()>0){
      $output= 'Premium vehicle';
        }
      else{
       $output= 'Not a premium vehicle';
      }
return $output;

        
    }
    
    
    function deleteVehicle($regNo){
        $sth = $this->db->prepare('delete from vehicle  where vehicle_reg_no = :regNo');
            $sth->execute(array(
                ':regNo' => $regNo
            ));
           
    }
    function suspendVehicle($regNo){
         $sth = $this->db->prepare("update vehicle set isactive=0 where vehicle_reg_no = :regNo");
            $sth->execute(array(
                ':regNo' => $regNo
            ));
 
        
    }
function activateVehicle($regNo){
    $sth = $this->db->prepare("update vehicle set isactive=1 where vehicle_reg_no = :regNo");
            $sth->execute(array(
                ':regNo' => $regNo
            ));
 
        
    }

    

}
