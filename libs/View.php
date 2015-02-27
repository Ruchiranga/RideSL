<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author ruchiranga
 */
class View {

    public function __construct() {
        
    }

    public function render($name, $no_header = false) {
        if ($no_header === true) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/header.php';
            require 'views/' . $name . '.php';
        }
    }

}
