<?php


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
        
        //check whether the email address already exists
        $sth2 = $this->db->prepare('Select * from customer where email_address = :email_address');
        $sth2->execute(array(':email_address' => $this->email_address));
        $count2 = $sth2->rowCount();
        
        if ($count > 0 || $count2 >0) {
            $message = "The user name / email already exists, please enter a new unique user name or email address";       
            echo "<script type='text/javascript'>alert('$message');window.location = \"../passengerSignup\";</script>";
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