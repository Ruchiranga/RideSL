<?php

class Login_Model extends Model {
    
    private $location;
    
    function __construct() {
        parent::__construct();
    }

    public function run() {
        $this->location = $_POST['location'];
        $sth = $this->db->prepare('Select privilege from account where username = :username and password =Password( :password )');

        $sth->execute(array(
            ':username' => $this->username,
            ':password' => $this->password
        ));


        $count = $sth->rowCount();
        if ($count > 0) {

            $data = $sth->fetch();
            $this->privilege = $data['privilege'];
            
            $this->initSession();
            
            
            if ($_SESSION['privilege'] == 'd') {
                header('location: ../driverHome');
            } else if ($_SESSION['privilege'] == 'p') {
                header('location: ../index');
            } else if ($_SESSION['privilege'] == 'a') {
                header('location: ../admin');
            } else {
                header('location: ../error');
            }
            
        } else {
            header('location: ../login');
        }
    }

//    public function runUser($table) {
//        $sth = $this->db->prepare("Select * from " . $table . " natural join account where username = '" . $this->username."'");
//        $sth->execute();
//        $count = $sth->rowCount();
//        echo $count;
//        if ($count > 0) {
//            $this->initSession();
//            header('location: ../driverHome');
//        }
//    }

    public function initSession() {
        Session::init();
        Session::set('privilege', $this->privilege);
        Session::set('loggedIn', true);
    }

}
