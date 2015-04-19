<?php

class driverSignup_Model extends Model {
    
    private $first_name;
    private $last_name;
    private $email;
    private $username;
    private $password;
    private $telephone_number;
   
    
    function __construct() {
        parent::__construct();
    }

    public function run() {
        $this->first_name = $_POST['first_name'];
        $this->last_name = $_POST['last_name'];
        $this->email = $_POST['email'];
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $this->telephone_number = $_POST['telephone_number'];
        
        //check whether the username already exists
        $sth = $this->db->prepare('Select * from account where username = :username');
        $sth->execute(array(':username' => $this->username));
        $count = $sth->rowCount();
        if ($count > 0) {
            echo 'The user name already exists, please enter a new unique user name';
        }
        else{
            $sth = $this->db->prepare('insert into account(username,password,privilege) values(:username,Password(:password),\'d\')');
            $sth->execute([':username' => $this->username,
                ':password' => $this->password
                ]);
            
            $sth = $this->db->prepare('insert into owner(first_name,last_name,email,date_of_registration,username) values(:first_name,:last_name,:email,CURDATE(),:username)');
            
            $sth->execute(array(
                ':first_name' => $this->first_name,
                ':last_name' => $this->last_name,
                ':email' => $this->email,
                ':username' => $this->username
            ));
            
            //To insert the telephone number
            $sth = $this->db->prepare('Select owner_id from owner where username = :username');
            $sth->execute(array(':username' => $this->username)); 
            $data = $sth->fetch();
            $this->owner_id = $data['owner_id'];
            
            $sth = $this->db->prepare('insert into telephone_number(owner_id,telephone_number) values(:owner_id,:telephone_number)');
            $sth->execute([':owner_id' => $this->owner_id,':telephone_number' => $this->telephone_number]);

             header('location: ../login');
            }


        
    }

}
