<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/hyperlinkstyle.css">        
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/combostyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/font/font-awesome.css">


<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->

        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js){
                echo '<script type = "text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>

        <?php Session::init(); ?>

    <div style=" height: 80px; text-align: right;">
        <div style=" width: 310px; height: 40px; text-align: left; float: left;">
            <img src="<?php echo URL; ?>public/images/logo1.png" alt="" style="text-align: left; height: 40px"/>
        </div>
        <div style=" height: 40px; text-align: right; float: right;">
            <a href="<?php echo URL; ?>index" style=" margin-top: 30px; line-height: 40px;">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            
            <?php if (Session::get('loggedIn') == true): ?>
            
                <?php if (Session::get('privilege') == 'd'): ?>
                    <a href="<?php echo URL; ?>driverHome">Dashboard</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                <?php endif; ?>
                    
            <?php endif; ?>
                    
            <a href="<?php echo URL; ?>faq" style=" margin-top: 30px; line-height: 40px;">FAQ</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo URL; ?>aboutUs" >About us</a>&nbsp;&nbsp;|&nbsp;&nbsp;


            <?php if (Session::get('loggedIn') == true): ?>
            
                <?php if (Session::get('privilege') == 'd'): ?>
                    <a href="<?php echo URL; ?>driverHome/logout" >Sign out</a>
                    
                <?php elseif (Session::get('privilege') == 'p'): ?>
                    <a href="<?php echo URL; ?>index/logout" >Sign out</a>
                    
                <?php elseif (Session::get('privilege') == 'a'): ?>
                    <a href="<?php echo URL; ?>admin/logout" >Sign out</a>
                    
                <?php endif; ?>
                
            <?php else: ?>
                <a href="<?php echo URL; ?>login">Sign in</a>
            <?php endif; ?>
            &nbsp;&nbsp;

<!--            <div id="dd" class="wrapper-dropdown-3" tabindex="1" style="height: 30px; float:right; line-height: 38px;">
                <span>|&nbsp;&nbsp;Account Settings&nbsp;&nbsp;|</span>
                <div class="dropdown" >
                    <text><a href="#">&nbsp;&nbsp;Change Password&nbsp</a></text>
                    <text><a href="#">&nbsp;&nbsp;Disable&nbsp</a></text>
                </div>
            </div>-->

        </div>
        
        
<!--        <div style=" width: 1310px; height: 30px; text-align: right; float: right; line-height: 30px; float: left">   
            You are logged in as <text>Driver&nbsp;</text>
        </div>-->

    </div>
