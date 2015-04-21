<!-- css -->
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/body.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/aboutUs.css">
<link href="<?php echo URL; ?>public/css/faqabt/app.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>views/driverHome/css/default.css">
<!--scheme list acordian-->
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo URL; ?>public/css/faqabt/responsive-accordion.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/commentpopupstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/commenticonstyle.css">

<!-- Javascript -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo URL; ?>views/driverHome/js/default.js"></script>

<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.ssd-vertical-navigation.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/helpsupport.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="<?php echo URL; ?>public/js/faqabt/smoothscroll.min.js" type="text/javascript"></script>

<script src="<?php echo URL; ?>public/js/faqabt/responsive-accordion.min.js" type="text/javascript"></script>

</head>
<body>
    <div id='frame'>
        <div id='body'>
            <div id='panel' align='left'>
                <font style="color: #2980b9; font-size: 18px; font-weight: bold">Personal Profile</font>

                <br><br><font style="color: #2980b9; font-weight: bold">Name &nbsp;</font><img id = "pencil1" src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px; cursor:pointer"/>
                <br><div id="edit_name"><font id="edit_first_name"><?php echo $this->owner['first_name'] . '</font> <font id="edit_last_name">' . $this->owner['last_name']; ?></font></div>
                <br><br><font style="color: #2980b9; font-weight: bold">Telphone &nbsp;</font><br><br>

                <div id='phone_numbers'>
                    <font>
                    <?php
                    $i = 0;
                    if ($this->phoneNoList != NULL) {

                        $no = 0;
                        foreach ($this->phoneNoList as $key => $value) {
                            echo '<input type="hidden" id="dltNo' . $no . '" value="'.$value['telephone_number'].'">';
                            echo '<div id="text_phone' . $no . '">';
                            
                            echo '<font id="text_phoneNo' . $no . '">' . $value['telephone_number'] . '<font>';

                            echo ' <img onclick="changePhone(' . $no . ')" id = "phone' . $no . '" src="' . URL . 'public/images/pencil.png" alt="" style="height: 13px; width: 13px; cursor:pointer"/><font> </font>';
                            echo '<a href="' . URL . 'driverHome/dltPhoneNo/' . $value['telephone_number'] . '"><img onclick="return confirm(\'Are you sure you want to delete phone no ' . $value['telephone_number'] . '?\');" id = "dlt_phone' . $no . '" src="' . URL . 'public/images/dlt.png" alt="" style="height: 13px; width: 13px; cursor:pointer"/></a>';
                            echo '</div>';
                            $no++;
                            $i++;
                        }
                    }
                    ?>
                    </font>
                </div>
                <img id = "add_phone" src="<?php echo URL; ?>public/images/add.png" alt="" style="height: 20px; width: 20px; cursor:pointer"/>
                <br><br><font style="color: #2980b9; font-weight: bold">Email &nbsp;</font><img id = "pencil3" src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px; cursor:pointer"/>
                <br><font id="edit_email"><?php echo $this->owner['email']; ?></font>
            </div>
            <div id = "vehiclePane" class="box">
                <div style = 'width: 96%; padding: 2px; padding-bottom: 0px; padding-top: 20px; padding-left: 20px'>
                    <input type="submit" value="Add new vehicle" class="button" style="float: left">
                    <br><br><br>
                    <?php
                    if ($this->vehicleList != NULL) {
                        $title = '';
                        $title .= '<font style="color: #2980b9; font-size: 18px; font-weight: bold; float: left">Registered Vehicles</font>                   
                    <br><br>
                    <hr style="">';
                        echo $title;
                    }
                    ?>

                </div>
                <?php
                if ($this->vehicleList != NULL) {
                    foreach ($this->vehicleList as $key => $value) {
                        $veh_index = 0;
                        $content = '';
                        $content .= '<div id="content" style="width: 96%; padding: 20px;">';

                        $content .= '<div style="">
                    <font style="color: #2980b9; font-weight: bold; font-size: 17px">' . $value['manufacturer'] . '</font><font style="color: #2980b9; font-weight: bold; font-size: 17px"> ' . $value['model'] . '</font>
                    
                    <form action="' . URL . 'driverHome/suspendVehicle/' . $value['vehicle_reg_no'] . '" type="post" onclick="return confirm(\'Are you sure you want to suspend vehicle ' . $value['vehicle_reg_no'] . '?\');">
                    <input type="submit" value="Suspend" class="button" id= "suspend' . $veh_index . '" style="float: right">
                    </form>
                    &nbsp;&nbsp;<a href="driverHome/editVehicle/' . $value['vehicle_reg_no'] . '"><input type="submit" value="Edit" class="button" id= "edit" style="float: right"></a>
                    </div>';
                        $content .= '<div style="float: left; width: 190px; ">
                    <img src="' . URL . "public/images/" . $_SESSION['owner_id'] . "/" . $value['image'] . '" alt="" style="height: 220px; width: 220px; margin-top: 10px"/><br>
                        <font>Rating</font><br>
                        <span class="star-rating">';
                        for ($m = 1; $m <= 5; $m++) {


                            if ($m == $value['rating']) {
                                $content .= '<input checked type="radio" name="rating' . $m . '" disabled><i></i>';
                            } else {
                                $content .='<input type="radio" name="rating' . $m . '" disabled><i></i>';
                            }
                        }
                        $content .='</span>
                        <br>
                        

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
                        <div style="width:600px;"><font>' . $value['vehicle_description'] . '</font></div>
                        </tr>
                            <div class="container" style="width: 70%; ">
                            <font style="color: #2980b9; font-size: 18px; font-weight: bold; line-height: 50px">Registered Schemes</font>
                                <ul class="responsive-accordion responsive-accordion-default bm-larger">';
                        if ($this->vehicleSchemesList != NULL) {
                            foreach ($this->vehicleSchemesList[$value['vehicle_reg_no']] as $key => $valueScheme) {
                                $index = 0;
                                $content .= '<li>
                        <div class = "responsive-accordion-head" style = "width: 695px">' . $valueScheme['category'] . '<i class = "fa fa-chevron-down responsive-accordion-plus fa-fw"></i><i class = "fa fa-chevron-up responsive-accordion-minus fa-fw"></i></div>
                        <div class = "responsive-accordion-panel" style = "width: 695px">
                        <div id = "scheme">
                        <form action="' . URL . 'driverHome/deleteScheme/' . $valueScheme['scheme_id'] . '" type="post" onclick="return confirm(\'Are you sure you want to delete ' . $valueScheme['category'] . '?\');">
                        <input type="submit" value="Delete" class="button" id= "delete' . $veh_index . $index . '" style="float: right">
                        </form>
                        <table width="80%">';
                                if ($valueScheme['ac_price'] !== NULL) {
                                    $content .= '<tr>
                        <td width="20%"><font style = "color: #2980b9; ">AC Price</font></td>
                        <td width="20%"><font>Rs. ' . $valueScheme['ac_price'] . '</font></td>
                        <td width="20%"><font>' . $valueScheme['pricing_category'] . '</font></td>
                        </tr>';
                                }
                                if ($valueScheme['non_ac_price'] !== NULL) {
                                    $content .= '<tr>
                        <td><font style = "color: #2980b9; ">Non-AC Price</font></td>
                        <td><font>Rs. ' . $valueScheme['non_ac_price'] . '</font></td>
                        <td><font>' . $valueScheme['pricing_category'] . '</font></td>
                        </tr>';
                                }
                                if ($valueScheme['category'] == 'Airport Drop Pickup Scheme' || $valueScheme['category'] == 'Station Drop Pickup Scheme') {
                                    if ($valueScheme['luggage_charge'] !== NULL) {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; ">Luggage Charge</font></td>
                        <td><font>Rs. ' . $valueScheme['luggage_charge'] . '</font></td>
                        </tr>';
                                    }
                                    if ($valueScheme['waiting_charge'] !== NULL) {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; ">Waiting Charge</font></td>
                        <td><font>Rs. ' . $valueScheme['waiting_charge'] . '</font></td>
                        </tr>';
                                    }
                                }
                                $content .= '</table>
                        <br><font style = "color: #2980b9; ">Description</font><br><br>
                        <font>' . $valueScheme['descrption'] . '</font><br><br>
                        <div id = "locations">
                        <font style = "color: #2980b9; ">Locations Covered</font><br><br>
                        <font><table style="width: 50%">';
                                if ($this->schemeLocationList[$valueScheme['scheme_id']] !== NULL) {
                                    $content .= '<tr>';
                                    $j = 0;
                                    foreach ($this->schemeLocationList[$valueScheme['scheme_id']] as $key => $valueAvailability) {
                                        $content .= '<td>' . $valueAvailability['location'] . '</td>';
                                        if ($j > 4) {
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
                                $days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
                                for ($j = 0; $j <= 6; $j++) {
                                    $content .= '<tr>';
                                    $done = false;
                                    if ($this->schemeAvailabilityList[$valueScheme['scheme_id']] != NULL) {
                                        foreach ($this->schemeAvailabilityList[$valueScheme['scheme_id']] as $key => $valueAvailability) {
                                            if ($days[$j] == $valueAvailability['day']) {
                                                $content .= '<tr>';

                                                $content .= '<td width="12%">' . $days[$j] . '</td>';
                                                $content .= '<td width="12%">From</td>';
                                                $content .= '<td  width="14%">' . $valueAvailability['start_time'] . '</td>';
                                                $content .= '<td width="12%">To</td>';
                                                $content .= '<td  width="14%">' . $valueAvailability['end_time'] . '</td>';
                                                $content .= '</tr>';
                                                $done = true;
                                                break;
                                            }
                                        }
                                    }
                                }
                                $content .= '</table></font>
                        </div>
                        </div>
                        </li>';
                                $index++;
                            }
                        }
                        $content .= '</ul>
                        </div>
                        </div>
                        </div>
                        </div>
                        ';
                        $content .= '</div>';
                        echo $content;
                        $veh_index++;
                    }
                }
                ?>
                <div style = 'width: 96%; padding: 2px; padding-bottom: 0px; padding-top: 0px; padding-left: 20px'>
                    <?php
                    if ($this->suspendedVehicleList != NULL) {
                        $title = '';
                        $title .= '<font style="color: #2980b9; font-size: 18px; font-weight: bold; float: left">Suspended Vehicles</font>                   
                    <br><br>
                    <hr style="">';
                        echo $title;
                    }
                    ?>
                </div>
                <?php
                if ($this->suspendedVehicleList != NULL) {
                    foreach ($this->suspendedVehicleList as $key => $value) {
                        $veh_index = 0;
                        $content = '';
                        $content .= '<div id="content" style="width: 96%; padding: 20px;">';
                        $content .= '<div style="">
                    <font style="color: #2980b9; font-weight: bold; font-size: 17px">' . $value['manufacturer'] . '</font><font style="color: #2980b9; font-weight: bold; font-size: 17px"> ' . $value['model'] . '</font>
                    <form action="' . URL . 'driverHome/makeActiveVehicle/' . $value['vehicle_reg_no'] . '" type="post" onclick="return confirm(\'Are you sure you want to make vehicle ' . $value['vehicle_reg_no'] . ' active again?\');">
                    <input type="submit" value="Make Active" class="button" id= "active' . $veh_index . '" style="float: right">
                    </form>
                    &nbsp;&nbsp;<a href="driverHome/editVehicle/' . $value['vehicle_reg_no'] . '"><input type="submit" value="Edit" class="button" id= "edit" style="float: right"></a>
                    </div>';
                        $content .= '<div style="float: left; width: 190px; ">
                    <img src="' . URL . "public/images/" . $_SESSION['owner_id'] . "/" . $value['image'] . '" alt="" style="height: 220px; width: 220px; margin-top: 10px"/><br>
                        <font>Rating</font><br>
                        <span class="star-rating">';
                        for ($m = 1; $m <= 5; $m++) {
                            if ($m == $value['rating']) {
                                $content .= '<input checked type="radio" name="rating' . $m . '" disabled><i></i>';
                            } else {
                                $content .='<input type="radio" name="rating' . $m . '" disabled><i></i>';
                            }
                        }
                        $content .='</span>
                        <br>
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
                        <div style="width:600px;"><font>' . $value['vehicle_description'] . '</font></div>
                        </tr>
                            <div class="container" style="width: 70%; ">
                            <font style="color: #2980b9; font-size: 18px; font-weight: bold; line-height: 50px">Registered Schemes</font>
                                <ul class="responsive-accordion responsive-accordion-default bm-larger">';
                        if ($this->suspendedVehicleSchemesList != NULL) {
                            foreach ($this->suspendedVehicleSchemesList[$value['vehicle_reg_no']] as $key => $valueScheme) {
                                $index = 0;
                                $content .= '<li>
                        <div class = "responsive-accordion-head" style = "width: 695px">' . $valueScheme['category'] . '<i class = "fa fa-chevron-down responsive-accordion-plus fa-fw"></i><i class = "fa fa-chevron-up responsive-accordion-minus fa-fw"></i></div>
                        <div class = "responsive-accordion-panel" style = "width: 695px">
                        <div id = "scheme">
                        <form action="' . URL . 'driverHome/deleteScheme/' . $valueScheme['scheme_id'] . '" type="post" onclick="return confirm(\'Are you sure you want to delete ' . $valueScheme['category'] . '?\');">
                        <input type="submit" value="Delete" class="button" id= "delete' . $veh_index . $index . '" style="float: right">
                        </form>
                        <table width="80%">';
                                if ($valueScheme['ac_price'] !== NULL) {
                                    $content .= '<tr>
                        <td width="20%"><font style = "color: #2980b9; ">AC Price</font></td>
                        <td width="20%"><font>Rs. ' . $valueScheme['ac_price'] . '</font></td>
                        <td width="20%"><font>' . $valueScheme['pricing_category'] . '</font></td>
                        </tr>';
                                }
                                if ($valueScheme['non_ac_price'] !== NULL) {
                                    $content .= '<tr>
                        <td><font style = "color: #2980b9; ">Non-AC Price</font></td>
                        <td><font>Rs. ' . $valueScheme['non_ac_price'] . '</font></td>
                        <td><font>' . $valueScheme['pricing_category'] . '</font></td>
                        </tr>';
                                }
                                if ($valueScheme['category'] == 'Airport Drop Pickup Scheme' || $valueScheme['category'] == 'Station Drop Pickup Scheme') {
                                    if ($valueScheme['luggage_charge'] !== NULL) {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; ">Luggage Charge</font></td>
                        <td><font>Rs. ' . $valueScheme['luggage_charge'] . '</font></td>
                        </tr>';
                                    }
                                    if ($valueScheme['waiting_charge'] !== NULL) {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; ">Waiting Charge</font></td>
                        <td><font>Rs. ' . $valueScheme['waiting_charge'] . '</font></td>
                        </tr>';
                                    }
                                }
                                $content .= '</table>
                        <br><font style = "color: #2980b9; ">Description</font><br><br>
                        <font>' . $valueScheme['descrption'] . '</font><br><br>
                        <div id = "locations">
                        <font style = "color: #2980b9; ">Locations Covered</font><br><br>
                        <font><table style="width: 50%">';
                                if ($this->suspendedSchemeLocationList[$valueScheme['scheme_id']] !== NULL) {
                                    $content .= '<tr>';
                                    $j = 0;
                                    foreach ($this->suspendedSchemeLocationList[$valueScheme['scheme_id']] as $key => $valueAvailability) {
                                        $content .= '<td>' . $valueAvailability['location'] . '</td>';
                                        if ($j > 4) {

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
                                $days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
                                for ($j = 0; $j <= 6; $j++) {
                                    $content .= '<tr>';
                                    $done = false;
                                    if ($this->suspendedSchemeAvailabilityList[$valueScheme['scheme_id']] != NULL) {
                                        foreach ($this->suspendedSchemeAvailabilityList[$valueScheme['scheme_id']] as $key => $valueAvailability) {
                                            if ($days[$j] == $valueAvailability['day']) {
                                                $content .= '<tr>';
                                                $content .= '<td width="12%">' . $days[$j] . '</td>';
                                                $content .= '<td width="12%">From</td>';
                                                $content .= '<td  width="14%">' . $valueAvailability['start_time'] . '</td>';
                                                $content .= '<td width="12%">To</td>';
                                                $content .= '<td  width="14%">' . $valueAvailability['end_time'] . '</td>';
                                                $content .= '</tr>';
                                                $done = true;
                                                break;
                                            }
                                        }
                                    }
                                }
                                $content .= '</table></font>
                        </div>
                        </div>
                        </li>';
                                $index++;
                            }
                        }
                        $content .= '</ul>

                        </div>
                        </div>
                        </div>
                        </div>
                        ';

                        $content .= '</div>';
                        echo $content;
                        $veh_index++;
                    }
                }
                ?>

            </div>
        </div><!-- End #body -->
    </div><!-- End #frame -->
</body>
</html>
