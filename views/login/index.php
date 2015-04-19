<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/textboxstyle.css">
        <!--        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/headerstyle.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/schemestyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/hyperlinkstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/labelstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/paragraphstyle.css">
        <link rel="stylesheet" type="password/css" href="<?php echo URL; ?>views\login\css\default.css">

        <!--    <div class="menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Register vehicle</a></li>
                    <li><a href="#">Log in</a></li>
                </ul>
                <br style="clear:left"/>
            </div>-->


    </head>
    <body>
        <div style=" height: 40px; width: 1230px; padding-top:5px;padding-bottom: 35px; margin-left: auto;margin-right: auto;text-align: center;"> 
                
                <img src="<?php echo URL; ?>public/images/logo1.png" alt=""/>
        </div>
        <form action="login/run" method="post">
            <div style=" height: 350px; width: 450px; padding-top:10px;padding-bottom:0px;  text-align: center;background-color: #EFF5FB;margin-left: auto;
    margin-right: auto;"> 
            

                <p>User Name</p><input type="text" name="username" id="name" tabindex="1" placeholder="Enter user name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>

                <br>
                <p>Password</p><input type="password" name="password" id="name" tabindex="1" placeholder="Enter password" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
                <p><a href="#">Forgot your password?</a></p>
                <p><input type="submit" value="Sign in" class="belize-hole-flat-button" style="width: 200px"></p>
                <br>
                <INPUT TYPE=CHECKBOX NAME="staySignedin">Stay signed in<P>
            </div>
</form> 
            <div style="height: 40px; width: 1230px; padding-top:0px;padding-bottom:0px; text-align: center;margin-left: auto;margin-right: auto;">
             
                <p><input type="submit" onclick="location.href = '<?php echo URL; ?>driverSignup'"value="Create Driver Account" class="belize-hole-flat-button" style="width: 300px ; text-align:center;">
                    <input type="submit" onclick="location.href = '<?php echo URL; ?>passengerSignup'" value="Create Passenger Account" class="belize-hole-flat-button" style="width: 300px  ; text-align:center;"></p>


            </div>
        


    </body>
</html>
