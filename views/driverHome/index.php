
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/schemestyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/buttonstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/hyperlinkstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/paragraphstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/ratingstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/tooltipstyle.css">

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>views/driverHome/css/default.css">

        <!--<script src=".URL;?>public/js/driverhome.js"></script>-->

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/helpsuport.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/helpsuport.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/app.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/paragraphstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/aboutUs.css">
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

<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.ssd-vertical-navigation.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/app.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/helpsupport.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="<?php echo URL; ?>public/js/faqabt/smoothscroll.min.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>public/js/faqabt/backbone.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>public/js/faqabt/responsive-accordion.min.js" type="text/javascript"></script>


<script type="text/javascript">
    var URL = <?php echo URL; ?>;
</script>


</head>
<body>

    <div id='frame'>
        <div id='body'>
            <div id='panel' align='left'>
                <font style="color: #2980b9; font-size: 18px; font-weight: bold">Personal Profile</font>
                <br><br><font style="color: #2980b9; font-weight: bold">Name &nbsp;</font><img id = "pencil1" src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px"/>
                <br><font id="edit_name"><?php echo $this->owner['first_name'] . ' ' . $this->owner['last_name']; ?></font>
                <br><br><font style="color: #2980b9; font-weight: bold">Telphone &nbsp;</font><img src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px"/>
                <div id='phone_numbers'>
                    <font>
                    <?php
                    $i = 0;
                    if ($this->phoneNoList != NULL) {


                        foreach ($this->phoneNoList as $key => $value) {
                            if ($i != 0) {
                                echo '<br>' . $value['telephone_number'];
                            } else {
                                echo $value['telephone_number'];
                            }
                            $i++;
                        }
                    }
                    ?>
                    </font>
                </div>

                <img id = "add_phone" src="<?php echo URL; ?>public/images/add.png" alt="" style="height: 20px; width: 20px"/>

                <br><br><font style="color: #2980b9; font-weight: bold">Email &nbsp;</font><img id = "pencil3" src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px"/>
                <br><font id="edit_email"><?php echo $this->owner['email']; ?></font>
                <br><br><font style="color: #2980b9; font-weight: bold">Rating</font><br>
                <div class="starRating">
                    <div>
                        <div>
                            <div>
                                <div>
                                    <input id="rating1" type="radio" name="rating" value="1">
                                    <label for="rating1"><span>1</span></label>
                                </div>
                                <input id="rating2" type="radio" name="rating" value="2">
                                <label for="rating2"><span>2</span></label>
                            </div>
                            <input id="rating3" type="radio" name="rating" value="3">
                            <label for="rating3"><span>3</span></label>
                        </div>
                        <input id="rating4" type="radio" name="rating" value="4">
                        <label for="rating4"><span>4</span></label>
                    </div>
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5"><span>5</span></label>
                </div>
            </div>


            <div id = "vehiclePane" class="box">

                <div style = 'width: 96%; padding: 2px; padding-bottom: 0px; padding-top: 20px; padding-left: 20px'>
                    <input type="submit" value="Add new vehicle" class="button" style="float: left">
                    <br><br><br>
                    <font style="color: #2980b9; font-size: 18px; font-weight: bold; float: left">Registered Vehicles</font>
                    <br><br>
                    <hr style="">
                </div>


                <?php
                if ($this->vehicleList != NULL) {
                    foreach ($this->vehicleList as $key => $value) {
                        
                        $content = '';
                        $content .= '<div id="content" style="width: 96%; padding: 20px;">';

                        $content .= '<div style="">
                    <font style="color: #2980b9; font-weight: bold; font-size: 17px">' . $value['manufacturer'] . '</font><font style="color: #2980b9; font-weight: bold; font-size: 17px"> ' . $value['model'] . '</font>
                    <input type="submit" value="Suspend" class="button" id= "suspend" style="float: right">
                    </div>';

                        $content .= '<div style="float: left; width: 190px; ">
                    <img src="' . URL . "public/images/" . $_SESSION['owner_id'] . "/" . $value['image'] . '" alt="" style="height: 220px; width: 220px; margin-top: 10px"/><br><br>
                        <font>Comments</font>
                    </div>';

                        $content .= '<div id="yui-main">                
                        <div class="yui-b" style="margin-left: 25%;">
                        
                        <div class="content" id="rightContent" style="padding-top: 0px;">
                        <table style="width: 100%">
                        <tr>
                        <td width="22%"><font style="color: #2980b9;">Registration No </font></td>
                        <td><font>' . $value['vehicle_reg_no'] . '</font></td>
                        
                        </tr>
                        <tr>
                        <td><font style="color: #2980b9; ">Vehicle type </font></td>
                        <td><font>' . $value['vehicle_type'] . '</font></td>
                        </tr>
                        <tr>
                        <td><font style="color: #2980b9; ">Capacity</font></td>
                        <td><font>' . $value['capacity'] . '</font></td>
                        </tr>
                        
                        </table>  
                        
                        
                        
                        <br><font style="color: #2980b9; ">Vehicle Description</font><br><br>
                        <font>' . $value['vehicle_description'] . '</font>
                        </tr>
                        
                            <div class="container" style="width: 70%; ">
                            <font style="color: #2980b9; font-size: 18px; font-weight: bold; line-height: 50px">Registered Schemes</font>
                                <ul class="responsive-accordion responsive-accordion-default bm-larger">';


                        if ($this->vehicleSchemesList != NULL) {

                            foreach ($this->vehicleSchemesList[$value['vehicle_reg_no']] as $key => $valueScheme) {

                                $content .= '<li>
                        <div class = "responsive-accordion-head" style = "width: 695px">' . $valueScheme['category'] . '<i class = "fa fa-chevron-down responsive-accordion-plus fa-fw"></i><i class = "fa fa-chevron-up responsive-accordion-minus fa-fw"></i></div>
                        <div class = "responsive-accordion-panel" style = "width: 695px">

                        <div id = "scheme">
                        
                        <input type="submit" value="Disable" class="button" id= "disable" style="float: right">
                        &nbsp;&nbsp;<input type="submit" value="Edit" class="button" id= "edit" style="float: right">

                        <table width="60%">
                        <tr>
                        <td width="20%"><font style = "color: #2980b9; ">AC Price</font></td>
                        <td width="20%"><font>Rs. ' . $valueScheme['ac_price'] . '</font></td>
                        <td width="20%"><font>' . $valueScheme['pricing_category'] . '</font></td>
                        </tr>

                        <tr>
                        <td><font style = "color: #2980b9; ">Non-AC Price</font></td>
                        <td><font>Rs. ' . $valueScheme['non_ac_price'] . '</font></td>
                        <td><font>' . $valueScheme['pricing_category'] . '</font></td>
                        </tr>
                        </table>

                        <br><font style = "color: #2980b9; ">Description</font><br><br>
                        <font>' . $valueScheme['descrption'] . '</font><br><br>
                        
                        <div id = "locations">
                        <font style = "color: #2980b9; ">Locations Covered</font><br><br>
                        <font><table style="width: 50%">';

                                if ($this->schemeLocationList != NULL) {
                                    $content .= '<tr>';
                                    
                                    $j = 0;
                                    
                                    foreach ($this->schemeLocationList[$valueScheme['scheme_id']] as $key => $valueAvailability) {
                                        $content .= '<td>' . $valueAvailability['location'] . '</td>';
                                        if($j > 4){
                                            $content .= '</tr><tr>';
                                        }
                                        $j++;
                                    }
                                    
                                    $content .= '</tr>';
                                }

                                $content .= '</table></font><br>
                        </div>


                        <div id = "avaliability">
                        <font style = "color: #2980b9; ">Availiability</font><br><br>
                        <font><table style="width:64%">';

                                if ($this->schemeAvailabilityList != NULL) {

                                    foreach ($this->schemeAvailabilityList[$valueScheme['scheme_id']] as $key => $valueAvailability) {

                                        $content .= '<tr>';

                                        $content .= '<td width="12%">' . $valueAvailability['day'] . '</td>';
                                        $content .= '<td width="12%">From</td>';
                                        $content .= '<td  width="14%">' . $valueAvailability['start_time'] . '</td>';
                                        $content .= '<td width="12%">To</td>';
                                        $content .= '<td  width="14%">' . $valueAvailability['end_time'] . '</td>';

                                        $content .= '</tr>';
                                    }
                                }

                                $content .= '</table></font>
                        </div>
                        

                        </div>
                        </li>';
                            }
                        }




                        $content .= '</ul>


                        </div>
                        </div>
                        </div>
                        </div>
                        ';

                        $content .= '<hr></div>';

                        echo $content;
                    }
                }
                ?>



            </div>

        </div><!-- End #body -->
    </div><!-- End #frame -->



</body>
</html>

