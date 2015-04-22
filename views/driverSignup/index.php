<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/textboxstyle.css">        
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/schemestyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/hyperlinkstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/labelstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/paragraphstyle.css">
        <link rel="stylesheet" type="password/css" href="<?php echo URL; ?>views\login\css\default.css">

        
        <script>
        function limitText(limitField, limitNum) {
            if (limitField.value.length > limitNum) {
                limitField.value = limitField.value.substring(0, limitNum);
            }
        }


        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        
        function checkEmail() {

            var email = document.getElementById('email');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


            if (!filter.test(email.value)) {
                document.getElementById('email_validate').innerHTML = "Please provide a valid email address.";
                email.focus;
                return false;
            }
            else {
                return true;
            }
        }
        
        function checkName() {

            var first_name = document.getElementById('first_name');
            var last_name = document.getElementById('last_name');
            
            var filter = /^[a-zA-Z]+$/;


            if (!filter.test(first_name.value) || !filter.test(last_name.value)) {
                document.getElementById('name_validate').innerHTML = "Name should contain only letters.";
                first_name.focus;
                return false;
            }
            else {
                return true;
            }
        }
    </script> 
</head>
<body>

    
    
    <div style=" height: 50px; width: 1230px; padding-top:0px; padding-bottom:30px; text-align: center;margin-left: auto;
    margin-right: auto;"> 
       
        <h><font style="color: #2980b9; font-weight: bold; font-size: 35px;">SIGN UP TO BECOME A DRIVER</font> </h>
        <p>EARN MONEY WITH RideSL, There's never been a better time to drive with RideSL. Signing up is easy, and you'll be earning money in no time.</p>
        
    </div>
    
    <form onsubmit="return (checkEmail() && checkName())" action="driverSignup/run" method="post" >
     <div style=" height: 550px; width: 740px; padding: 40px; text-align: center;background-color: #EFF5FB;margin-left: auto;
    margin-right: auto;">
         
       <p>Name</p>
        <p><input required type="text" name="first_name" id="first_name" tabindex="1" placeholder="First Name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        <input required type="text" name="last_name" id="last_name" tabindex="1" placeholder="Last Name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/></p>
        <div id="name_validate" style="font-size: 16px; color:red; font-weight:bold"></div>
        <p>Phone Number</p><input required type="text" name="telephone_number" id="name" tabindex="1" placeholder="XXXXXXXXXX" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;" onkeypress="return isNumber(event)" onkeyup="limitText(this,10)"/>
        <p>Email</p><input required type="text" name="email" id="email" tabindex="1" placeholder="name@example.com" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"  />
        <div id="email_validate" style="font-size: 16px; color:red; font-weight:bold"></div>
        <p>User Name</p><input required type="text" name="username" id="name" tabindex="1" placeholder="Enter user name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        <p>Password</p><input required type="password" name="password" id="name" tabindex="1" placeholder="At least 5 characters" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        
        
        <p><input type="submit" value="Create Account" class="belize-hole-flat-button" style="width: 300px"></p>
       
    </div>
    </form>
   
</body>
 <script>
        document.getElementById('first_name').focus();
 </script>
    
</html>
