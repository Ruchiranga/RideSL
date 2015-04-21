<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class driverRegister_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getNewModels($manufacturer) {
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
