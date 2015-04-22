<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class vehicleRegister_Model extends Model {

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

}
