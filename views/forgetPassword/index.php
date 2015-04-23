<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/textboxstyle.css">
        <!--        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/headerstyle.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/schemestyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/hyperlinkstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/paragraphstyle.css">
        <link rel="stylesheet" type="password/css" href="<?php echo URL; ?>views\login\css\default.css">
        
        <script>
        function checkEmail() {

            var email = document.getElementById('email');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


            if (!filter.test(email.value)) {
                document.getElementById('error_message').innerHTML = "Please provide a valid email address.";
                email.focus;
                return false;
            }
            else {
                return true;
            }
        }
        </script>
    </head>
    <body>
        <div style=" height: 50px; width: 1230px; padding-top:10px; padding-bottom:30px; text-align: center;margin-left: auto;
    margin-right: auto;"> 
        
       
        <h><font style="color: #2980b9; font-weight: bold; font-size: 25px;">Find Your Account</font> </h>
        <p>To reset your password, enter the email address you used to register with RideSL.</p>
        
    </div>
        <form onsubmit="return (checkEmail())" action="forgetPassword/run" method="post">
            <div style=" height: 330px; width: 450px; padding-top:10px;padding-bottom:0px;  text-align: center;background-color: #EFF5FB;margin-left: auto;
    margin-right: auto;"> 
            

                <p>Email Address</p><input required type="text" name="email" id="email" tabindex="1" placeholder="Enter your email address" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
                <br>
                <div id="error_message" style="font-size: 16px; color:red; font-weight:bold"></div>
                <p><input type="submit" value="Submit" class="belize-hole-flat-button" style="width: 200px"></p>
                <br>
               
                
            </div>
</form> 
        
    </body>
    
    
</html>