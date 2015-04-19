<?php

class editVehicle_Model extends Model {

    private $username;

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

    public function getVehicleDetails($vehicle_reg_no) {
        $sth = $this->db->prepare("Select vehicle_type, manufacturer, model, capacity, vehicle_description, image, rating from owner o natural join vehicle v where o.owner_id = '" . $_SESSION['owner_id'] . "' and v.vehicle_reg_no='" . $vehicle_reg_no . "'");
        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {
            return $sth->fetchAll();
        } else {
            return NULL;
        }
    }

    public function initVehicleSchemes($vehicle_reg_no) {

        $vechileSchemesList = array(array());
        $vechileSchemesList[$vehicle_reg_no] = $this->getVehicleSchemes($vehicle_reg_no);
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
            if ($value['category'] == 'Station Drop Pickup Scheme' || $value['category'] == 'Airport Drop Pickup Scheme') {
                if ($value['category'] == 'Station Drop Pickup Scheme') {
                    $sth2 = $this->db->prepare("Select * from scheme natural join station_drop_pickup_scheme where vehicle_reg_no = '" . $vehicle_reg_no . "'");
                } else {
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

    public function initSchemeAvailability($vehicleSchemeList, $vehicle_reg_no) {

        $schemeAvailabilityList = array(array());

        foreach ($vehicleSchemeList[$vehicle_reg_no] as $key => $valueScheme) {
            $scheme_id = $valueScheme['scheme_id'];
            $schemeAvailabilityList[$scheme_id] = $this->getSchemeAvaliabilityDetails($scheme_id);
        }

        return $schemeAvailabilityList;
    }

    public function getAllocatedVehicleSchemes($vehicle_reg_no) {
        $sth1 = $this->db->prepare("Select scheme_id, category from vehicle natural join scheme where vehicle_reg_no='" . $vehicle_reg_no . "'");
        $sth1->execute();
        $count = $sth1->rowCount();

        if ($count > 0) {
            return $sth1->fetchAll();
        } else {
            return NULL;
        }
    }

    public function getNonAllocatedSchemes($vehicle_reg_no) {

        $sth = $this->db->prepare("Select * from scheme_category where category not in (select category from scheme where vehicle_reg_no = '" . $vehicle_reg_no . "')");
        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {
            return $sth->fetchAll();
        } else {
            return NULL;
        }
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

    public function initSchemeLocation($vehicleSchemeList, $vehicle_reg_no) {

        $schemeLocationList = array(array());

        foreach ($vehicleSchemeList[$vehicle_reg_no] as $key => $valueScheme) {
            $scheme_id = $valueScheme['scheme_id'];
            $schemeLocationList[$scheme_id] = $this->getSchemeLocation($scheme_id);
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

    public function getVehicleTypes() {
        $sth = $this->db->prepare("Select * from vehicle_type");
        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {
            return $sth->fetchAll();
        } else {
            return NULL;
        }
    }

    public function getManufacturers() {
        $sth = $this->db->prepare("Select distinct manufacturer from brand_model");
        $sth->execute();

        $count = $sth->rowCount();

        if ($count > 0) {
            return $sth->fetchAll();
        } else {
            return NULL;
        }
    }

    public function getModels($manufacturer) {
        if ($manufacturer != NULL) {
            $sth = $this->db->prepare("Select distinct model from brand_model where manufacturer='" . $manufacturer . "'");
            $sth->execute();

            $count = $sth->rowCount();

            if ($count > 0) {
                return $sth->fetchAll();
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }

    public function getNewModels($manufacturer) {
        if ($manufacturer != NULL) {
            $sth = $this->db->prepare("Select distinct model from brand_model where manufacturer='" . $manufacturer . "'");
            $sth->execute();

            $count = $sth->rowCount();

            if ($count > 0) {
                $data = $sth->fetchAll();   //json format return
                echo json_encode($data);
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }

    public function updateVehicle($old_vehicle_reg_no) {

        //initiate variables
        $new_vehicle_reg_no = $_POST['new_vehicle_reg_no'];
        $vehicle_type = $_POST['vehicle_type'];
        $manufacturer = $_POST['manufacturer'];
        $model = $_POST['model'];
        $capacity = $_POST['capacity'];
        $vehicle_description = $_POST['vehicle_description'];

        $allocated_schemes = $this->getAllocatedVehicleSchemes($old_vehicle_reg_no);
        $non_allocated_schemes = $this->getNonAllocatedSchemes($old_vehicle_reg_no);

        if ($old_vehicle_reg_no != NULL && $new_vehicle_reg_no != NULL) {
            try {
                $sth = $this->db->prepare("SET AUTOCOMMIT=0");
                $sth->execute();
                $sth = $this->db->prepare("start transaction");
                $sth->execute();

                $sth_vehicle = $this->db->prepare("Update vehicle set vehicle_reg_no = '" . $new_vehicle_reg_no . "', vehicle_type='" . $vehicle_type . "', manufacturer='" . $manufacturer . "', model='" . $model . "', capacity='" . $capacity . "', vehicle_description='" . $vehicle_description . "' where vehicle_reg_no='" . $old_vehicle_reg_no . "'");
                $sth_vehicle->execute();
                $_SESSION['edit_vehicle_reg_no'] = $new_vehicle_reg_no;
                if ($allocated_schemes != NULL) {
                    foreach ($allocated_schemes as $key => $value) {
                        $found = false;
                        for ($i = 0; $i < 7; $i++) {
                            if (isset($_POST['scheme' . $i])) {
                                if ($_POST['scheme' . $i] == $value['category']) {

                                    //scheme to be updated
                                    $scheme_id = $value['scheme_id'];
                                    $this->setSchemeVariables($i);

                                    $this->updateScheme($scheme_id, $value['category']);
                                    $this->updateAvailability($scheme_id, $i);
                                    $this->updateLocations($scheme_id, $i);

                                    $found = true;
                                    break;
                                }
                            }
                        }
                        if ($found == false) {
                            //scheme to be deleted
                            $sth_dlt_scheme = $this->db->prepare("delete from scheme where scheme_id='" . $value['scheme_id'] . "'");
                            $sth_dlt_scheme->execute();
                        }
                    }
                }


                if ($non_allocated_schemes != NULL) {
                    foreach ($non_allocated_schemes as $key => $value) {
                        for ($i = 0; $i < 7; $i++) {
                            if (isset($_POST['scheme' . $i])) {

                                if ($_POST['scheme' . $i] == $value['category']) {
                                    //scheme to be added
                                    $this->setSchemeVariables($i);
                                    $count = $this->addScheme($new_vehicle_reg_no);

                                    if ($count > 0) {

                                        $sth_scheme_id = $this->db->prepare("Select scheme_id from scheme where vehicle_reg_no='" . $new_vehicle_reg_no . "' and category='" . $this->category . "'");
                                        $sth_scheme_id->execute();

                                        $count = $sth_scheme_id->rowCount();

                                        if ($count > 0) {
                                            $data_scheme_id = $sth_scheme_id->fetchAll();
                                            if ($data_scheme_id != NULL) {

                                                //Scheme Details
                                                if ($this->category == 'Airport Drop Pickup Scheme') {
                                                    $this->addSchemeDetail('air_port_drop_pickup_scheme',$data_scheme_id[0]['scheme_id']);
                                                } else if ($this->category == 'Station Drop Pickup Scheme') {
                                                    $this->addSchemeDetail('station_drop_pickup_scheme',$data_scheme_id[0]['scheme_id']);
                                                }
                                                //Locations
                                                $this->addLocations($data_scheme_id[0]['scheme_id'], $i);

                                                //Availability
                                                $this->addAvailability($data_scheme_id[0]['scheme_id'], $i);
                                            }
                                        } else {
                                            break;
                                        }
                                    } else {
                                        break;
                                    }
                                    break;
                                }
                            }
                        }
                    }
                }
                $sth = $this->db->prepare("commit");
                $sth->execute();
            } catch (Exception $e) {
                $sth = $this->db->prepare("rollback");
                $sth->execute();
            }
        } else {
            return false;
        }
    }

    public function setSchemeVariables($i) {
        $this->category = $_POST['scheme' . $i];

        if (isset($_POST['ac_checkbox' . $i])) {
            $this->ac_price = $_POST['ac_text' . $i];
            $this->per = $_POST['per_combo_ac' . $i];
        } else {
            $this->ac_price = NULL;
            $this->per = NULL;
        }

        if (isset($_POST['non_ac_checkbox' . $i])) {
            $this->non_ac_price = $_POST['non_ac_text' . $i];
            $this->per = $_POST['per_combo_non_ac' . $i];
        } else {
            $this->non_ac_price = NULL;
        }

        $this->description = $_POST['scheme_description' . $i];

        if ($this->category == 'Airport Drop Pickup Scheme' || $this->category == 'Station Drop Pickup Scheme') {
            if (isset($_POST['luggage_checkbox' . $i])) {
                $this->luggage_price = $_POST['luggage_text' . $i];
            } else {
                $this->luggage_price = NULL;
            }

            if (isset($_POST['waiting_checkbox' . $i])) {
                $this->waiting_price = $_POST['waiting_text' . $i];
            } else {
                $this->waiting_price = NULL;
            }
        }
    }

    public function addScheme($new_vehicle_reg_no) {
        if ($this->ac_price == NULL && $this->non_ac_price == NULL) {
            $sth_scheme = $this->db->prepare("Insert into scheme (descrption,category,vehicle_reg_no) values ('" . $this->description . "','" . $this->category . "','" . $new_vehicle_reg_no . "')");
        } else if ($this->ac_price == NULL && $this->non_ac_price != NULL) {
            $sth_scheme = $this->db->prepare("Insert into scheme (pricing_category,descrption,category,vehicle_reg_no,non_ac_price) values ('" . $this->per . "','" . $this->description . "','" . $this->category . "','" . $new_vehicle_reg_no . "','" . $this->non_ac_price . "')");
        } else if ($this->ac_price != NULL && $this->non_ac_price == NULL) {
            $sth_scheme = $this->db->prepare("Insert into scheme (pricing_category,descrption,category,vehicle_reg_no,ac_price) values ('" . $this->per . "','" . $this->description . "','" . $this->category . "','" . $new_vehicle_reg_no . "','" . $this->ac_price . "')");
        } else {
            $sth_scheme = $this->db->prepare("Insert into scheme (pricing_category,descrption,category,vehicle_reg_no,ac_price,non_ac_price) values ('" . $this->per . "','" . $this->description . "','" . $this->category . "','" . $new_vehicle_reg_no . "','" . $this->ac_price . "','" . $this->non_ac_price . "')");
        }
        $sth_scheme->execute();
        $count = $sth_scheme->rowCount();
        return $count;
    }

    public function addSchemeDetail($table, $scheme_id) {
        if ($this->luggage_price == NULL && $this->waiting_price == NULL) {
            $sth_scheme = $this->db->prepare("Insert into ".$table." values ('" . $scheme_id . "',NULL,NULL)");
        } else if ($this->luggage_price == NULL && $this->waiting_price != NULL) {
            $sth_scheme = $this->db->prepare("Insert into ".$table." values ('" . $scheme_id . "',NULL,'" . $this->waiting_price . "')");
        } else if ($this->luggage_price != NULL && $this->waiting_price == NULL) {
            $sth_scheme = $this->db->prepare("Insert into ".$table." values ('" . $scheme_id . "','" . $this->luggage_price . "',NULL)");
        } else {
            $sth_scheme = $this->db->prepare("Insert into ".$table." values ('" . $scheme_id . "','" . $this->luggage_price . "','" . $this->waiting_price . "')");
        }
        $sth_scheme->execute();
    }

    public function addLocations($scheme_id, $i) {
        $loc_string = $_POST['mytags' . $i];
        if ($loc_string != '') {
            $locations = explode(',', $loc_string);
            for ($l = 0; $l < count($locations); $l++) {
                $sth_locations = $this->db->prepare("Insert into scheme_location values ('" . $scheme_id . "','" . $locations[$l] . "')");
                $sth_locations->execute();
            }
        }
    }

    public function addAvailability($scheme_id, $i) {
        for ($k = 0; $k < 7; $k++) {
            if (isset($_POST['day' . $i . $k])) {
                $day = $_POST['day' . $i . $k];
                $start_time = $_POST['start_day' . $i . $k];
                $end_time = $_POST['end_day' . $i . $k];
                $sth_availability = $this->db->prepare("Insert into availability values ('" . $scheme_id . "','" . $day . "','" . $start_time . "','" . $end_time . "')");
                $sth_availability->execute();
            }
        }
    }

    public function updateScheme($scheme_id, $category) {

        $query = "update scheme set pricing_category='" . $this->per . "', descrption='" . $this->description . "', category='" . $this->category . "',";
        if ($this->ac_price == NULL) {
            $query .= "ac_price = NULL,";
        } else {
            $query .= "ac_price = '" . $this->ac_price . "',";
        }
        if ($this->non_ac_price == NULL) {
            $query .= "non_ac_price = NULL";
        } else {
            $query .= "non_ac_price = '" . $this->non_ac_price . "'";
        }
        $query .= " where scheme_id='" . $scheme_id . "'";
        $sth_scheme_update = $this->db->prepare($query);
        $sth_scheme_update->execute();

        $airport_station = false;
        $query = "";

        if ($category == 'Airport Drop Pickup Scheme') {
            $airport_station = true;
            $query .= "update air_port_drop_pickup_scheme set ";
        } else if ($category == 'Station Drop Pickup Scheme') {
            $airport_station = true;
            $query .= "update station_drop_pickup_scheme set ";
        }

        if ($airport_station) {
            if ($this->luggage_price == NULL) {
                $query .= "luggage_charge=NULL, ";
            } else {
                $query .= "luggage_charge='" . $this->luggage_price . "', ";
            }
            if ($this->waiting_price == NULL) {
                $query .= "waiting_charge=NULL";
            } else {
                $query .= "waiting_charge='" . $this->waiting_price . "'";
            }
            $query .= " where scheme_id='" . $scheme_id . "'";
            $sth_scheme_details_update = $this->db->prepare($query);
            $sth_scheme_details_update->execute();
        }
    }

    public function updateLocations($scheme_id, $i) {
        //update locations
        $loc_string = $_POST['mytags' . $i];

        if ($loc_string != '') {
            $locations = explode(',', $loc_string);
            $existing_locations = $this->getSchemeLocation($scheme_id);

            if ($existing_locations != NULL) {
                foreach ($existing_locations as $key => $value) {
                    $found = false;
                    for ($l = 0; $l < count($locations); $l++) {
                        if ($locations[$l] == $value['location']) {
                            $found = true;
                            break;
                        }
                    }
                    if ($found == false) {
                        //delete location
                        $sth_dlt_loc = $this->db->prepare("Delete from scheme_location where scheme_id='" . $scheme_id . "' and location='" . $value['location'] . "'");
                        $sth_dlt_loc->execute();
                    }
                }
            }

            for ($l = 0; $l < count($locations); $l++) {
                $present = false;
                if ($existing_locations != NULL) {
                    foreach ($existing_locations as $key => $value) {
                        if ($locations[$l] == $value['location']) {
                            $present = true;
                            break;
                        }
                    }
                }
                if ($present == false) {
                    //add location
                    $sth_add_loc = $this->db->prepare("Insert into scheme_location values ('" . $scheme_id . "','" . $locations[$l] . "')");
                    $sth_add_loc->execute();
                }
            }
        } else {
            $sth_dlt_all_loc = $this->db->prepare("Delete from scheme_location where scheme_id='" . $scheme_id . "'");
            $sth_dlt_all_loc->execute();
        }
    }

    public function updateAvailability($scheme_id, $i) {

        $availability = $this->getSchemeAvaliabilityDetails($scheme_id);

        if ($availability != NULL) {
            foreach ($availability as $key => $value) {
                $found = false;
                for ($k = 0; $k < 7; $k++) {
                    if (isset($_POST['day' . $i . $k])) {
                        $day = $_POST['day' . $i . $k];
                        $start_time = $_POST['start_day' . $i . $k];
                        $end_time = $_POST['end_day' . $i . $k];

                        if ($value['day'] == $day) {
                            $sth_availability = $this->db->prepare("Update availability set start_time = '" . $start_time . "',end_time='" . $end_time . "' where scheme_id='" . $scheme_id . "' and day='" . $day . "'");
                            $sth_availability->execute();
                            $found = true;
                            break;
                        }
                    }
                }
                if ($found == false) {
                    $sth_availability = $this->db->prepare("delete from availability where scheme_id='" . $scheme_id . "' and day='" . $value['day'] . "'");
                    $sth_availability->execute();
                }
            }
        }

        for ($k = 0; $k < 7; $k++) {
            if (isset($_POST['day' . $i . $k])) {
                $present = false;
                $day = $_POST['day' . $i . $k];
                $start_time = $_POST['start_day' . $i . $k];
                $end_time = $_POST['end_day' . $i . $k];

                if ($availability != NULL) {
                    foreach ($availability as $key => $value) {
                        if ($value['day'] == $day) {
                            $present = true;
                            break;
                        }
                    }
                }
                if ($present != true) {
                    $sth_availability = $this->db->prepare("Insert into availability values ('" . $scheme_id . "','" . $day . "','" . $start_time . "','" . $end_time . "')");
                    $sth_availability->execute();
                }
            }
        }
    }
    
    //profile edit
    
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