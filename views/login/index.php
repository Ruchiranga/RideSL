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
        
        
    </head>
    <body>
        <div style=" width: 1230px; padding-top:5px;padding-bottom: 10px; margin-left: auto;margin-right: auto;text-align: center;"> 
                
                <img src="<?php echo URL; ?>public/images/logo1.png" alt=""/>
        </div>
        <form  action="login/run" method="post">
            <div style=" height: 330px; width: 450px; padding-top:10px;padding-bottom:0px;  text-align: center;background-color: #EFF5FB;margin-left: auto;
    margin-right: auto;"> 
            

                <p>User Name</p><input required type="text" name="username" id="username" tabindex="1" placeholder="Enter user name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>

                <br>
                <p>Password</p><input required type="password" name="password" id="password" tabindex="1" placeholder="Enter password" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
<!--                <br>
                <label >The user name or password that you entered is incorrect</label>
                <br>-->
                <div id="password_error_message" style="font-size: 16px; color:red; font-weight:bold"></div>
                <p><a href="<?php echo URL; ?>forgetPassword">Forgot your password?</a></p>
                <p><input type="submit" value="Sign in" class="belize-hole-flat-button" style="width: 200px"></p>
              
                
            </div>
</form> 
            <div style="height: 40px; width: 1230px; padding-top:0px;padding-bottom:0px; text-align: center;margin-left: auto;margin-right: auto;">
             
                <p><input type="submit" onclick="location.href = '<?php echo URL; ?>driverSignup'"value="Create Driver Account" class="belize-hole-flat-button" style="width: 300px ; text-align:center;">
                    <input type="submit" onclick="location.href = '<?php echo URL; ?>passengerSignup'" value="Create Passenger Account" class="belize-hole-flat-button" style="width: 300px  ; text-align:center;"></p>


            </div>
        


    </body>
    <script>
        document.getElementById('username').focus();
    </script>
    
</html>
