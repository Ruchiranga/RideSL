<?php

class driverHome_Model extends Model {

    private $username;
    private $first_Name;
    private $last_Name;
    private $email;
    private $rating;
    private $telephone;
    private $vList;

    function __construct() {
        parent::__construct();
    }

    public function run() {
        $this->username = $_SESSION['username'];

        $sth = $this->db->prepare("Select owner_id, first_name, last_name, email, rating from owner natural join account where username = '" . $this->username . "'");
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
        $sth = $this->db->prepare("Select vehicle_reg_no, vehicle_type, manufacturer, model, capacity, vehicle_description, image from owner o natural join vehicle v where o.owner_id = '" . $_SESSION['owner_id'] . "'");
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
            if ($value['category'] === 'station_drop_pickup_scheme' || $value['category'] === 'air_port_drop_pickup_scheme') {

                $sth2 = $this->db->prepare("Select * from scheme natural join air_port_drop_pickup_scheme where vehicle_reg_no = '" . $vehicle_reg_no . "'");
                $sth2->execute();
                $count2 = $sth2->rowCount();

                if ($count2 > 0) {

                    $schemeDetails = $sth2->fetchAll();

                    $schemeList[$i]['luggage_charge'] = $schemeDetails[0]['luggage_charge'];
                    $schemeList[$i]['waiting_charge'] = $schemeDetails[0]['waiting_charge'];
                }
            }

            if ($value['category'] === 'city_taxi_scheme') {
                $schemeList[$i]['category'] = 'City Taxi Scheme';
            } else if ($value['category'] === 'ceremonial_scheme') {
                $schemeList[$i]['category'] = 'Ceremonial Scheme';
            } else if ($value['category'] === 'tours_scheme') {
                $schemeList[$i]['category'] = 'Tours Scheme';
            } else if ($value['category'] === 'air_port_drop_pickup_scheme') {
                $schemeList[$i]['category'] = 'Airport Drop Pickup Scheme';
            } else if ($value['category'] === 'station_drop_pickup_scheme') {
                $schemeList[$i]['category'] = 'Station Drop Pick Scheme';
            } else if ($value['category'] === 'cargo_scheme') {
                $schemeList[$i]['category'] = 'Cargo Scheme';
            } else if ($value['category'] === 'construction_scheme') {
                $schemeList[$i]['category'] = 'Construction Scheme';
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
        $sth = $this->db->prepare("Select * from availability where scheme_id = '" . $scheme_id . "'");
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

    public function editName($data) {

        $sth = $this->db->prepare("update owner set first_name = '" . $data['firstName'] . "', last_name = '" . $data['lastName'] . "' where owner_id = '" . $_SESSION['owner_id'] . "'");

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

}
?>


