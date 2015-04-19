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
       
</head>
<body>

    
    
    <div style=" height: 50px; width: 1230px; padding-top:0px; padding-bottom:30px; text-align: center;margin-left: auto;
    margin-right: auto;"> 
       
        <h><font style="color: #2980b9; font-weight: bold; font-size: 35px;">SIGN UP TO BECOME A DRIVER</font> </h>
        <p>EARN MONEY WITH RideSL, There's never been a better time to drive with RideSL. Signing up is easy, and you'll be earning money in no time.</p>
        
    </div>
    
    <form action="driverSignup/run" method="post">
     <div style=" height: 520px; width: 740px; padding: 40px; text-align: center;background-color: #EFF5FB;margin-left: auto;
    margin-right: auto;">
         
       <p>Name</p>
        <p><input required type="text" name="first_name" id="name" tabindex="1" placeholder="First Name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        <input type="text" name="last_name" id="name" tabindex="1" placeholder="Last Name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/></p>
        
        <p>Phone Number</p><input required type="text" name="telephone_number" id="name" tabindex="1" placeholder="XXXXXXXXXX" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        <p>Email</p><input required type="text" name="email" id="name" tabindex="1" placeholder="name@example.com" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        
        <p>User Name</p><input required type="text" name="username" id="name" tabindex="1" placeholder="Enter user name" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        <p>Password</p><input required type="password" name="password" id="name" tabindex="1" placeholder="At least 5 characters" style="width: 350px; height: 30px;font-family: serif; font-size: 18px; text-align:center;"/>
        
        
        <p><input type="submit" value="Create Account" class="belize-hole-flat-button" style="width: 300px"></p>
       
    </div>
    </form>
    
    
    
    
</body>
</html>
