<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/hyperlinkstyle.css">        
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/combostyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/font/font-awesome.css">




        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js){
                echo '<script type = "text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>

        <?php Session::init(); ?>

    <div style=" height: 80px; text-align: right; margin-left: 28px; margin-right: 29px; margin-top: 10px;">
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

                <?php if (Session::get('privilege') == 'p'): ?>
                    <a href="<?php echo URL; ?>#">Comment</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                <?php endif; ?>

            <?php endif; ?>

            <a href="<?php echo URL; ?>faq" style=" margin-top: 30px; line-height: 40px;">FAQ</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo URL; ?>aboutUs" >About us</a>&nbsp;&nbsp;|&nbsp;&nbsp;


            <?php if (Session::get('loggedIn') == true): ?>
                <?php if (Session::get('privilege') == 'd'): ?>
                    <a href="<?php echo URL; ?>driverHome/logout" onclick="return confirm('Are you sure you want to log out?');">Sign out</a>
                <?php elseif (Session::get('privilege') == 'p'): ?>
                    <a href="<?php echo URL; ?>index/logout" onclick="return confirm('Are you sure you want to log out?');">Sign out</a>
                <?php elseif (Session::get('privilege') == 'a'): ?>
                    <a href="<?php echo URL; ?>admin/logout" onclick="return confirm('Are you sure you want to log out?');">Sign out</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo URL; ?>login">Sign in</a>
            <?php endif; ?>
            &nbsp;&nbsp;
        </div>
        <?php if (Session::get('loggedIn') == true): ?>
            <div style=" width: 1310px; height: 30px; text-align: right; float: right; line-height: 30px;">   
                You are logged in as <?php echo Session::get('username'); ?>&nbsp&nbsp;
            </div>
        <?php endif; ?>
    </div>
