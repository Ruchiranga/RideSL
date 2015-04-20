<?php

class premium_Model extends Model {

    private $regNo;

    function __construct() {
        parent::__construct();
    }

    function addPremium($regNo) {
        
    }

    function basicPaymentInfo($regNo) {
        $this->regNo = $regNo;
        $sth = $this->db->prepare('Select amount,commencing_date,period  from premiumpayment where vehicle_reg_no = :reg_no');
        $sth->execute(array(
            ':reg_no' => $this->regNo
        ));

        return $sth->fetchAll();
    }

    function basicInfo($regNo) {
        $this->regNo = $regNo;
        $sth = $this->db->prepare('Select distinct ownerName,date_of_registration,manufacturer,vehicle_reg_no,model  from vehicle_owner_tp where vehicle_reg_no = :reg_no');
        $sth->execute(array(
            ':reg_no' => $this->regNo
        ));

        return $sth->fetchAll();
    }

    function telephoneNo($regNo) {
        $this->regNo = $regNo;
        $sth = $this->db->prepare('Select distinct telephone_number from vehicle_owner_tp where vehicle_reg_no = :reg_no');
        $sth->execute(array(
            ':reg_no' => $regNo
        ));

        return $sth->fetchAll();
    }

    function saveChanges($amount, $commencingDate, $period, $vehicle_reg_no) {
        $val = 1;
       
       $sth = $this->db->prepare('update premiumpayment set amount=:amount ,commencing_date=:commencing_date,period=:period where vehicle_reg_no=:vehicle_reg_no');
  
            $sth->execute(array(
                ':amount' => $amount,
                ':commencing_date' => $commencingDate,
                ':period' => $period,
                ':vehicle_reg_no' => $vehicle_reg_no
            ));
       
    }

    function addToPremium($amount, $commencingDate, $duration, $vehicle_reg_no) {
       
        $sth = $this->db->prepare("insert into premiumpayment (amount,category,commencing_date,vehicle_reg_no,period) values (:amount ,1,:commencing_date,:vehicle_reg_no,:period)");
        $sth->execute(array(
            ':amount' => $amount,
            ':commencing_date' => $commencingDate,
            ':period' => $duration,
            ':vehicle_reg_no' => $vehicle_reg_no
        ));

     
    }

}
