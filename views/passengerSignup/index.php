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
        
        function checkEmail() {

            var email = document.getElementById('email_address');
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

            var first_name = document.getElementById('firstname');
            var last_name = document.getElementById('lastname');
            
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
        
       
        <h><font style="color: #2980b9; font-weight: bold; font-size: 35px;">SIGN UP TO RIDE</font> </h>
        <p>Welcome to RideSL, the easiest way to get around at the tap of a button. Create your account and get moving in minutes.</p>
        
    </div>
    <form onsubmit="return (checkEmail() && checkName())" action="passengerSignup/run" method="post">
     <div style=" height: 440px; width: 750px; padding-top:20px;padding-bottom: 40px; text-align: center;background-color: #EFF5FB;margin-left: auto;
    margin-right: auto;"> 
       
       <p>Name</p>
        <p><input required type="text" name="firstname" id="firstname" tabindex="1" placeholder="First Name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        <input required type="text" name="lastname" id="lastname" tabindex="1" placeholder="Last Name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/></p>
        <div id="name_validate" style="font-size: 16px; color:red; font-weight:bold"></div>
        <p>Email</p><input required type="text" name="email_address" id="email_address" tabindex="1" placeholder="name@example.com" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        <div id="email_validate" style="font-size: 16px; color:red; font-weight:bold"></div>
        <p>User Name</p><p><input required type="text" name="username" id="name" tabindex="1" placeholder="Enter user name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        
        <br><p>Password</p><input required type="password" name="password" id="name" tabindex="1" placeholder="At least 5 characters" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        <br>
        
        <p><input type="submit" value="Create Account" class="belize-hole-flat-button" style="width: 300px"></p>
        <br>
    </div>
    </form>
</body>

 <script>
        document.getElementById('firstname').focus();
 </script>
    
</html>
