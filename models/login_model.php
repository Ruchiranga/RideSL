<?php

class Login_Model extends Model {
    
    private $username;
    private $password;
    private $privilege;
    private $message="";
    
    function __construct() {
        parent::__construct();
    }

    public function run() {
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $sth = $this->db->prepare('Select privilege from account where username = :username and password =Password( :password )');

        $sth->execute(array(
            ':username' => $this->username,
            ':password' => $this->password
        ));


        $count = $sth->rowCount();
        if ($count > 0) {

            $data = $sth->fetch();
            $this->privilege = $data['privilege'];
            $this->authusername = $this->username;
            
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
            $message = "The user name or password that you entered is incorrect.";
            //header('location: ../login');             
            echo "<script type='text/javascript'>alert('$message');window.location = \"../login\";</script>";
           //echo "<script type='text/javascript'>document.getElementById('alertbox\").innerHTML = \"Username and/or Password incorrect.\\nTry again.\";</script>"
       
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
        Session::set('username', $this->username);
        Session::set('privilege', $this->privilege);
        Session::set('loggedIn', true);
        Session::set('username', $this->authusername);
    }

}
