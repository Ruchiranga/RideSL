<?php

class forgetPassword_model extends Model {
    
    private $email;
    private $username;
    
   public function run() {
        $this->email = $_POST['email'];
        $sth = $this->db->prepare('Select username from customer where email_address=:email');
        $sth->execute(array(':email' => $this->email ));
        $count = $sth->rowCount();
        if ($count > 0) {

            $data = $sth->fetch();
            $this->username = $data['username'];
            $this->initSession();
            mail($this->email, 'Reset your password', 'Dear'.$this->username.'\n You can reset your RideSL password by following this link.\n Thanks you\r\n\r\nRegards,\r\nRideSL Team\r\n', 'From: zetacseuom@gmail.com');
            $msg = "The email has been sent successfully to ".$this->email."";
            echo "<script type='text/javascript'>alert('$msg');window.location = \"../login\";</script>";
            
                      
        } else {
            $sth = $this->db->prepare('Select username from owner where email=:email');
            $sth->execute(array(':email' => $this->email ));
            $count2 = $sth->rowCount();
            if ($count2 > 0) {
            $data = $sth->fetch();
            $this->username = $data['username'];
            $this->initSession();
            mail($this->email, 'Reset your password', 'Dear'.$this->username.'\n You can reset your RideSL password by following this link.\n Thanks you\r\n\r\nRegards,\r\nRideSL Team\r\n', 'From: zetacseuom@gmail.com');
            $msg = "The email has been sent successfully to ".$this->email."";
            echo "<script type='text/javascript'>alert('$msg');window.location = \"../login\";</script>";
            }
            else{
               //$this->initSession();
               $msg = "A user with the email address ".$this->email." does not exist"; 
               echo "<script type='text/javascript'>alert('$msg');window.location = \"../forgetPassword\";</script>";
            }
        }
        
       
    } 
    
       
    public function initSession() {
        Session::init();
        Session::set('email', $this->email);
        Session::set('username', $this->username);
        
    }

}
