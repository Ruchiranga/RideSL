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
            $this->SendUserConfirmationEmail();
            header('location: ../login');
            
        }
        
    }
    
    public function SendUserConfirmationEmail()
{
    $mailer = new PHPMailer();
     
    $mailer->CharSet = 'utf-8';
     
    $mailer->AddAddress($this->email_address,$this->firstname);
     
    $mailer->Subject = "Your registration with RideSL";
 
    $mailer->From = "upekka.12@cse.mrt.ac.lk";        
     
    //$confirmcode = urlencode($this->MakeConfirmationMd5($formvars['firstname']));
     
    //$confirm_url = $this->GetAbsoluteURLFolder().'/confirmreg.php?code='.$confirmcode;
     
    $mailer->Body ="Hello ".$this->firstname."\r\n\r\n".
    "You have successfully registered with RideSL.\n Thanks you\r\n".
    //"Please click the link below to confirm your registration.\r\n".
    //"$confirm_url\r\n".
    "\r\n".
    "Regards,\r\n".
    "RideSL Team\r\n";
 
    if(!$mailer->Send())
    {
        //$this->HandleError("Failed sending registration confirmation email.");
        echo "Failed to send the confirmation email";
        return false;
    }
    return true;
}

}


