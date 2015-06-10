<?php

class resetPassword_model extends Model {
    
    private $email;
    private $newpassword;
    
   public function run() {
        $this->email = $_POST['email'];
        $this->newpassword = $_POST['newpassword'];
        $sth = $this->db->prepare('Select username from customer where email_address=:email');
        $sth->execute(array(':email' => $this->email ));
        $count = $sth->rowCount();
        if ($count > 0) {

            $data = $sth->fetch();
            $this->username = $data['username'];
            
                      
        } else {
            $sth = $this->db->prepare('Select username from owner where email=:email');
            $sth->execute(array(':email' => $this->email ));
            $count2 = $sth->rowCount();
            if ($count2 > 0) {
            $data = $sth->fetch();
            $this->username = $data['username'];
            }
            else{
               
               echo "<script type='text/javascript'>alert('error in resetting password');window.location = \"../resetPassword\";</script>";
            }
        }
        if($this->username!=null){
        $sth = $this->db->prepare('update account set password=Password(:newpassword) where username=:username');
        $sth->execute(array(':newpassword' => $this->newpassword,':username' => $this->username ));
        echo "<script type='text/javascript'>window.location = \"../login\";</script>";
        
        }
        
        
        else{
            echo "error in updating new password";
        }
        
       
    } 
    
       
    

}
