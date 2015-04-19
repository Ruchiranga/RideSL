
<!DOCTYPE html>
<html>
    <head>
        <title>Admins</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/textboxstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/schemestyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/hyperlinkstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/labelstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/paragraphstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/aboutUs.css">


        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/helpsuport.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/app.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/admin.css">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Open+Sans' rel='stylesheet' type='text/css'>

        <!--side bar-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,600" rel="stylesheet" type="text/css">
        <link href="<?php echo URL; ?>public/css/faqabt/font-awesome.min.css" rel="stylesheet">

        <!--Faq acordian-->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo URL; ?>public/css/faqabt/normalize.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo URL; ?>public/css/faqabt/responsive-accordion.css" rel="stylesheet" type="text/css" media="all" />
        <!--<link href="Styles/style.min.css" rel="stylesheet" type="text/css" media="all" />-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">



    </head>
    <body>



        <div id="doc" class="yui-t1">

            <div id="bd">
                <div id="yui-main">
                    <div class="yui-b" style="margin-left: 25%; ">
                        <div class="content" id="rightContent" style="">
                            <form id ="searchForm" id="texttests" method="post" action="<?php echo URL; ?>admin/vehicleList"  >
                                <h1 style="margin-top: 0px;">Enter vehicle Info. here</h1>




                                <div>
                                    <label style="width:150px;">Tel. No </label>
                                    <input id ="tel" calss="tableInput" value="" size="10" maxlength="10" type="text" name ="telephoneNo" >
                                </div> <label></label><br>
                                <div>
                                    <label>Vehicle Reg.No</label>
                                    <input id ="regNo" calss="tableInput" style="width:180px;" value="" size="10" maxlength="10" type="text" name ="regNo"><br>
                                </div>


                                <br>






                                <input type="submit"  id ="go" name="Go"></input>
                            </form>
                            <?php
                            if (isset($this->vehicleBasicInfo)&& count($this->vehicleBasicInfo)>0) {
                                $count = 0;
                                ?>
                                <div class="container" style="width: 100%; padding-top: 40px;">
                                    <ul class="responsive-accordion responsive-accordion-default bm-larger">
                                        <?php
                                        foreach ($this->vehicleBasicInfo as $key => $value) {
                                            $vehicleNo = $value['vehicle_reg_no'];
                                            ?>
                                            <li> 
                                                <div class="responsive-accordion-head"><span style="font-weight: bold;"><?php echo $value['vehicle_reg_no']; ?></span><?php echo '   ' . $value['manufacturer'] . ' ' . $value['model']; ?><i class="fa fa-pencil"></i><i class="fa fa-pencil"></i></div>
                                                <div class="responsive-accordion-panel">



                                                    <label class="info"><span style="font-weight: 600;">Owner name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo ':' . $value['ownerName']; ?></label>  <br>             
                                                    <label class="info"><span style="font-weight: 600;">Registered date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>   <?php echo ':' . $value['date_of_registration']; ?></label>  <br>           
                                                    <label class="info"><span style="font-weight: 600;">Vehicle type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>   <?php echo ':' . $value['vehicle_Type']; ?></label>  <br>           
                                                    <label class="info"><span style="font-weight: 600;"><?php echo $this->isPremium[$count]; ?></span>   </label><br>

                                                    <label class="info"><span style="font-weight: 600;">Status </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo ':' . $this->isSuspended[$count]; ?></label>  <br>           
                                                    <label class="info"><span style="font-weight: 600;">Scheme type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:   
                                                        <?php
                                                        foreach ($this->categoryList[$count] as $key => $value) {
                                                            echo $value['category'] . '/';
                                                        }
                                                        echo chr(8) . chr(8) . '';
                                                        ?>

                                                    </label>  <br>           
                                                    <label class="info"><span style="font-weight: 600;">Covering areas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:    <?php
                                                        foreach ($this->locationList[$count] as $key => $value) {
                                                            echo $value['location'] . '/';
                                                        }
                                                        echo chr(8) . '';
                                                        ?></label>  <br>      

                                                    <label class="info"></label><br>           
                                                    <div id="premium_form"></div>
                                                    <?php
                                                    if ($this->isPremium[$count] != "Premium vehicle") {



                                                        echo '<a href="' . URL . 'premium/addPremium/' . $vehicleNo . '">Add to premium </a>';
                                                    } else {

                                                        echo '<a href="' . URL . 'premium/editPremium/' . $vehicleNo . '"> Edit premium </a>';
                                                    }
                                                    ?>

                                                    &nbsp;&nbsp;&nbsp;&nbsp;


                                                    <?php if ($this->isSuspended[$count] == "Suspended") { //$reg_no=$value['vehicle_reg_no']; ?>


                                                        <?php echo '<a href="' . URL . 'admin/activateVehicle/' . $vehicleNo . '">  Activate</a>'; ?>
                                                    <?php } else { ?>


                                                        <?php echo '<a href="' . URL . 'admin/suspendVehicle/' . $vehicleNo . '">  Suspend</a>'; ?>

                                                    <?php } ?>

                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <?php echo '<a href="' . URL . 'admin/deleteVehicle/' . $vehicleNo . '">  Delete</a>'; ?>


                                                </div>

                                            </li>
                                            <?php
                                            $count++;
                                        }
                                        ?>

                                    </ul>

                                </div>
                            <?php }
                            if(isset($this->vehicleBasicInfo ) &&(count($this->vehicleBasicInfo)==0) ){?>
                                 <div class="container" style="width: 100%; padding-top: 40px; padding-left: 200px;"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO VEHICLES<i class="fa fa-exclamation-triangle"></i></h1></div>
                                
                                
                            <?php      
                            }
                            
                            ?>

                        </div>
                    </div>
                </div>

                <div class="yui-b" style="width: 25%;">
                    <div id="secondary">
                        <div id="contentLeft" style="min-height: 690px; width: 100%; position: absolute; background-color: white; border-right: 1px solid black;">

                            <ul id="leftNavigation">

                                <li id="whatIsRidesl" >
                                    <a href="<?php echo URL; ?>search" ><i class="fa fa-search" ></i> Search Vehicle</a>

                                </li>
                                <li id="FAQ" >
                                    <a href="<?php echo URL; ?>admin" ><i class="fa fa-info-circle"></i> Vehicle Info.</a>

                                </li>
                                <li id="ContactUs" >
                                    <a href="<?php echo URL; ?>recentlyAdded"><i class="fa fa-plus-circle"></i> Recently Added vehicles</a>

                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.min.js"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/admin.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.ssd-vertical-navigation.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/app.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/helpsupport.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/smoothscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/backbone.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/responsive-accordion.min.js" type="text/javascript"></script>
        <!-- <script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
        <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
        <script>

            $("#searchForm").submit(function(e) {
                var telephoneNo = $('#tel').val();
                var registerNo = $('#regNo').val();

                if ($('#tel').val() == '' && $('#regNo').val() == '') {
                    alert('You cannot leave input fields empty!');
                    e.preventDefault(e);


                }
                else if (isNaN($('#tel').val()) || ($('#tel').val()).length != 10 || (($('#regNo').val().length < 6 || $('#regNo').val().length > 8) && $('#regNo').val() != '')) {

                    alert('Invalid inputs!');
                    e.preventDefault(e);
                    $('#searchForm')[0].reset();
                }


            });



        </script>

    </body>


</html>
