<?php

class recentlyAdded_Model extends Model {

    private $startingDate;
    private $endingDate;
 
            
            
                function __construct() {
        parent::__construct();
    }

    public function vehicleList() {
        $this->startingDate = $_POST['startingDate'];
        $this->endingDate = $_POST['endingDate'];
        //$_POST['startingDate']=NULL;
        //$_POST['endingDate']=NULL;
        
            $sth = $this->db->prepare('Select distinct vehicle_reg_no,manufacturer,model,OwnerName,isActive,Date_of_registration,vehicle_type,register_date  from vehicle_owner_tp natural left join scheme natural left join scheme_location natural left join vehicle where  DATE(register_date) BETWEEN :date1 and :date2'); 
                 
            $sth->execute(array(
                ':date1' => $this->startingDate,
                ':date2' => $this->endingDate
            ));
        
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
