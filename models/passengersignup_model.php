<?php

require_once("./models/PHPMailer.php");

class PassengerSignup_Model extends Model {
    
    private $firstname;
    private $lastname;
    private $email_address;
    private $username;
    private $password;
   
    
    function __construct() {
        parent::__construct();
    }

    public function run() {
        $this->firstname = $_POST['firstname'];
        $this->lastname = $_POST['lastname'];
        $this->email_address = $_POST['email_address'];
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        
        //check whether the username already exists
        $sth = $this->db->prepare('Select * from account where username = :username');
        $sth->execute(array(':username' => $this->username));
        $count = $sth->rowCount();
        if ($count > 0) {
            echo 'The user name already exists, please enter a new unique user name';
        }
        else{
            $sth = $this->db->prepare('insert into account(username,password,privilege) values(:username,Password(:password),\'p\')');
            $sth->execute([':username' => $this->username,
                ':password' => $this->password
                ]);
            
            $sth = $this->db->prepare('insert into customer(firstname,lastname,email_address,date_of_registratio,username) values(:firstname,:lastname,:email_address,CURDATE(),:username)');
            
            $sth->execute(array(
                ':firstname' => $this->firstname,
                ':lastname' => $this->lastname,
                ':email_address' => $this->email_address,
                ':username' => $this->username
            ));
            mail($this->email_address, 'Your registration with RideSL', 'You have successfully registered with RideSL.\n Thanks you\r\n\r\nRegards,\r\nRideSL Team\r\n', 'From: zetacseuom@gmail.com');
            header('location: ../login');
            
        }        
    }
    
}