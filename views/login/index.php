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

        <form action="login/run" method="post">
            <div style=" height: 350px; width: 1230px; padding: 40px; text-align: center"> 
                <!--        <br><br><font style="color: #2980b9; font-weight: bold; font-size: 20px;">Enter pick up location</font><br>-->
                <img src="<?php echo URL; ?>public/images/logo1.png" alt=""/>

                <br><br>

                <p>User Name</p><input type="text" name="username" id="name" tabindex="1" placeholder="Enter user name" style="width: 350px; height: 40px;font-family: serif; font-size: 18px; text-align:center;"/>

                <br><br>
                <p>Password</p><input type="text" name="password" id="name" tabindex="1" placeholder="Enter password" style="width: 350px; height: 40px;font-family: serif; font-size: 18px; text-align:center;"/>
                <p><a href="#">Forgot your password?</a></p>
                <p><input type="submit" value="Sign in" class="belize-hole-flat-button" style="width: 200px"></p>
                <br>
                <INPUT TYPE=CHECKBOX NAME="staySignedin">Stay signed in<P>
            </div>

            <div style="height: 50px; width: 1230px; padding: 40px; text-align: center">
                <!--        <a href="#" style=" margin-top: 10px">FAQ</a><a href="#" > About us </a>-->

                <br><br>
                <p><input type="submit" onclick="location.href = '<?php echo URL; ?>driverSignup'"value="Create Driver Account" class="belize-hole-flat-button" style="width: 300px ; text-align:center;">
                    <input type="submit" onclick="location.href = '<?php echo URL; ?>passengerSignup'" value="Create Passenger Account" class="belize-hole-flat-button" style="width: 300px  ; text-align:center;"></p>


            </div>
        </form> 


    </body>
</html>
