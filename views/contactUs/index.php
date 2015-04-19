<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/textboxstyle.css">
        <!--        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/headerstyle.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/schemestyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/hyperlinkstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/labelstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/helpsuport.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/helpsuport.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/app.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/paragraphstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/aboutUs.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/contactForm.css">
        
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Open+Sans' rel='stylesheet' type='text/css'>

        <!--side bar-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,600" rel="stylesheet" type="text/css">
        <link href="<?php echo URL; ?>public/css/faqabt/font-awesome.min.css" rel="stylesheet">

        <link href="<?php echo URL; ?>public/css/faqabt/app.css" rel="stylesheet" type="text/css">
        <!--Faq acordian-->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo URL; ?>public/css/faqabt/normalize.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo URL; ?>public/css/faqabt/responsive-accordion.css" rel="stylesheet" type="text/css" media="all" />
        <!--<link href="<?php echo URL; ?>public/css/faqabt/style.min.css" rel="stylesheet" type="text/css" media="all" />-->


    </head>
    <body>



        <div id="doc" class="yui-t1">
            
            <div id="bd">
                <div id="yui-main">
                    <div class="yui-b" style="margin-left: 25%; ">
                        <div class="content" id="rightContent" style=""><h1 style="margin-top: 0px;">Contact Us</h1>
                           <br> <p  style="padding-left: 30px; padding-top: 0px;">If your question has not been answered in our FAQ please contact us.</p>
                            <div class="container" style="width: 70%; padding-left: 140px;padding-top: 20px">
                                 
<br>
                            <form class="form" id="form1" method="post" onsubmit="return validation()" name="contactForm" action="<?php echo URL; ?>contactUs/sendMail">

                                <p class="name">
                                     <label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Type your name here" />
                                   
                                </p>

                                <p class="email"><label for="email">Email</label>
                                    <input type="text" name="email" id="email" style="background-color: white; " placeholder="Type your email address here" />
                                    
                                </p>



                                <p class="text">
                                    <label for="email">Message</label>
                                    <textarea name="message" placeholder="Your message" id="message"></textarea>
                                </p>

                                <p class="submit" >
                                    <input type="submit" value="Send" style="padding-left: 0%;width:160px; color: white;" />
                                </p>
                            </form>

                                

                            </div>


                        </div>
                    </div>
                </div>
                <div class="yui-b" style="width: 25%;">
                    <div id="secondary">
                        <div id="contentLeft" style="min-height: 690px; width: 100%; position: absolute; background-color: white; border-right: 1px solid black;">

                            <ul id="leftNavigation">

                                <li id="whatIsRidesl" onclick="contentChangewhat(this)">
                                    <a href="#" ><i class="fa fa-coffee leftNavIcon" ></i> What is RideSL?</a>

                                </li>
                                <li id="FAQ" onclick="contentChangeFAQ(this)">
                                    <a href="<?php echo URL; ?>faq" id="faqContact"><i class="fa fa-question-circle leftNavIcon"></i> FAQ</a>

                                </li>
                                <li id="ContactUs" onclick="contentChangeContact(this)">
                                    <a href="<?php echo URL; ?>contactUs"><i class="fa fa-envelope-o leftNavIcon"></i> Contact Us</a>

                                </li>
                                <li id="Terms" onclick="contentChangeTerms(this)">
                                    <a href="#" id="termsContact"><i class="fa fa-bullseye leftNavIcon"></i> Terms & Conditions</a>

                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.ssd-vertical-navigation.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/app.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/helpsupport.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/smoothscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/backbone.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/responsive-accordion.min.js" type="text/javascript"></script>
<script>

            function validation(){

                var error="";
                if(document.contactForm.name.value=="" || document.contactForm.name.value==null){
                    error=error.concat("name");
                }
                if(document.contactForm.email.value==null||document.contactForm.email.value==""){
                    error=error.concat(" email");
                }
                if(document.contactForm.message.value==null || document.contactForm.message.value==""){
                    error=error.concat(" message");
                }
                if( error !=""){
                    error="Please fill fields ".concat(error);
                    alert(error);
                return false;
            }
            if(document.contactForm.email.value.indexOf("@")<1){

                error ="Enter a valid email";
                alert(error);
                return false;
            }

            return true;
            }
</script>
    </body>

</html>
