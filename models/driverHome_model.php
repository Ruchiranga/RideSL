<?php

class driverHome_Model extends Model {

    private $username;

    private $vList;

    function __construct() {
        parent::__construct();
    }

    public function run() {
        $this->username = $_SESSION['username'];


        $sth = $this->db->prepare("Select owner_id, first_name, last_name, email from owner natural join account where username = '" . $this->username . "'");

        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {

            $data = $sth->fetch();
            $_SESSION['owner_id'] = $data['owner_id'];
            return $data;
        } else {
            return NULL;
        }
    }

    public function getPhoneNoList() {
        $sth = $this->db->prepare("Select p.telephone_number from owner o inner join telephone_number p on p.owner_id = o.owner_id where o.owner_id = '" . $_SESSION['owner_id'] . "'");
        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {
            return $sth->fetchAll();
        } else {
            return NULL;
        }
    }

    public function getVehicleList() {

        $sth = $this->db->prepare("Select vehicle_reg_no, vehicle_type, manufacturer, model, capacity, vehicle_description, image, rating from owner o natural join vehicle v where o.owner_id = '" . $_SESSION['owner_id'] . "' and isActive='1'");
        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {
            $this->vList = $sth->fetchAll();
            return $this->vList;
        } else {
            return NULL;
        }
    }
    
    public function getSuspendedVehicleList() {
        $sth = $this->db->prepare("Select vehicle_reg_no, vehicle_type, manufacturer, model, capacity, vehicle_description, image, rating from owner o natural join vehicle v where o.owner_id = '" . $_SESSION['owner_id'] . "' and isActive='0'");

        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {
            $this->vList = $sth->fetchAll();
            return $this->vList;
        } else {
            return NULL;
        }
    }

    public function initVehicleSchemes($vehicleList) {

        $vechileSchemesList = array(array());

        foreach ($vehicleList as $key => $value) {
            $vehicle_reg_no = $value['vehicle_reg_no'];
            $vechileSchemesList[$vehicle_reg_no] = $this->getVehicleSchemes($vehicle_reg_no);
        }

        return $vechileSchemesList;
    }

    public function getVehicleSchemes($vehicle_reg_no) {
        $sth1 = $this->db->prepare("Select scheme_id, vehicle_reg_no, pricing_category, ac_price, non_ac_price, descrption, category from vehicle natural join scheme where vehicle_reg_no='" . $vehicle_reg_no . "'");
        $sth1->execute();
        $count1 = $sth1->rowCount();

        if ($count1 > 0) {
            $schemeList = $sth1->fetchAll();
            return $this->getVehicleSchemeDetails($schemeList, $vehicle_reg_no);
        } else {
            return NULL;
        }
    }

    public function getVehicleSchemeDetails($schemeList, $vehicle_reg_no) {

        $i = 0;

        foreach ($schemeList as $key => $value) {

            if ($value['category'] === 'Station Drop Pickup Scheme' || $value['category'] === 'Airport Drop Pickup Scheme') {
                if($value['category'] === 'Station Drop Pickup Scheme'){
                     $sth2 = $this->db->prepare("Select * from scheme natural join station_drop_pickup_scheme where vehicle_reg_no = '" . $vehicle_reg_no . "'");
                }else{
                    $sth2 = $this->db->prepare("Select * from scheme natural join air_port_drop_pickup_scheme where vehicle_reg_no = '" . $vehicle_reg_no . "'");
                }

                $sth2->execute();
                $count2 = $sth2->rowCount();

                if ($count2 > 0) {

                    $schemeDetails = $sth2->fetchAll();

                    $schemeList[$i]['luggage_charge'] = $schemeDetails[0]['luggage_charge'];
                    $schemeList[$i]['waiting_charge'] = $schemeDetails[0]['waiting_charge'];
                }
            }


            $i++;
        }
        return $schemeList;
    }

    public function initSchemeAvailability($vehicleSchemeList) {

        $schemeAvailabilityList = array(array());

        foreach ($this->vList as $key => $value) {
            foreach ($vehicleSchemeList[$value['vehicle_reg_no']] as $key => $valueScheme) {
                $scheme_id = $valueScheme['scheme_id'];
                $schemeAvailabilityList[$scheme_id] = $this->getSchemeAvaliabilityDetails($scheme_id);
            }
        }
        return $schemeAvailabilityList;
    }

    public function getSchemeAvaliabilityDetails($scheme_id) {

        $sth = $this->db->prepare("Select day, DATE_FORMAT(start_time,'%h:%i %p') AS start_time, DATE_FORMAT(end_time,'%h:%i %p') AS end_time from availability where scheme_id = '" . $scheme_id . "'");

        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {
            return $sth->fetchAll();
        } else {
            return NULL;
        }
    }
    
    public function initSchemeLocation($vehicleSchemeList) {

        $schemeLocationList = array(array());

        foreach ($this->vList as $key => $value) {
            foreach ($vehicleSchemeList[$value['vehicle_reg_no']] as $key => $valueScheme) {
                $scheme_id = $valueScheme['scheme_id'];
                $schemeLocationList[$scheme_id] = $this->getSchemeLocation($scheme_id);
            }
        }
        return $schemeLocationList;
    }

    public function getSchemeLocation($scheme_id) {
        $sth = $this->db->prepare("Select * from scheme_location where scheme_id = '" . $scheme_id . "'");
        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {
            return $sth->fetchAll();
        } else {
            return NULL;
        }
    }

    public function addPhoneNo($phoneNo) {

        $sth = $this->db->prepare("insert into telephone_number values ('" . $_SESSION['owner_id'] . "', '" . $phoneNo . "')");

        $sth->execute();

        if ($sth->rowCount() == 1) {
            echo 'updated successfully';
        } else {
            echo 'update failed';
        }
    }


    public function editName($firstName, $lastName) {

        $sth = $this->db->prepare("update owner set first_name = '" . $firstName . "', last_name = '" . $lastName . "' where owner_id = '" . $_SESSION['owner_id'] . "'");

        $sth->execute();

        if ($sth->rowCount() == 1) {
            echo 'updated successfully';
        } else {
            echo 'update failed';
        }
    }

    public function editEmail($email) {

        $sth = $this->db->prepare("update owner set email = '" . $email . "' where owner_id = '" . $_SESSION['owner_id'] . "'");

        $sth->execute();

        if ($sth->rowCount() == 1) {
            echo 'updated successfully';
        } else {
            echo 'update failed';
        }
    }

    
    public function deleteScheme($scheme_id){
        $sth = $this->db->prepare("delete from scheme where scheme_id = '" . $scheme_id . "'");

        $sth->execute();

        if ($sth->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function suspendVehicle($vehicle_reg_no){
        $sth = $this->db->prepare("update vehicle set isActive = '0' where vehicle_reg_no = '" . $vehicle_reg_no . "'");

        $sth->execute();

        if ($sth->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function makeActiveVehicle($vehicle_reg_no){
        $sth = $this->db->prepare("update vehicle set isActive = '1' where vehicle_reg_no = '" . $vehicle_reg_no . "'");

        $sth->execute();

        if ($sth->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updatePhoneNo($owner_id, $old_phone_no, $new_phone_no){
        $sth = $this->db->prepare("update telephone_number set telephone_number = '" . $new_phone_no . "' where telephone_number = '" . $old_phone_no . "' and owner_id='".$owner_id."'");
        $sth->execute();
        if ($sth->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function dltPhoneNo($owner_id, $phone_no){
        $sth = $this->db->prepare("delete from telephone_number where telephone_number = '" . $phone_no . "' and owner_id='".$owner_id."'");
        $sth->execute();
        if ($sth->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }


}
?>


