<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class vehicleRegister_Model extends Model {
    
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
    
    public function getAllModels($manufacturer) {
        if ($manufacturer != NULL) {
            $sth = $this->db->prepare("Select distinct model from brand_model where manufacturer='" . $manufacturer . "'");
            $sth->execute();
            $count = $sth->rowCount();
            if ($count > 0) {
                $data = $sth->fetchAll(); //json format return
                echo json_encode($data);
            } else {
                return NULL;
            }
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
    
    public function updatePhoneNo($owner_id, $old_phone_no, $new_phone_no) {
        $sth = $this->db->prepare("update telephone_number set telephone_number = '" . $new_phone_no . "' where telephone_number = '" . $old_phone_no . "' and owner_id='" . $owner_id . "'");
        $sth->execute();
        if ($sth->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function dltPhoneNo($owner_id, $phone_no) {
        $sth = $this->db->prepare("delete from telephone_number where telephone_number = '" . $phone_no . "' and owner_id='" . $owner_id . "'");
        $sth->execute();
        if ($sth->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

}
