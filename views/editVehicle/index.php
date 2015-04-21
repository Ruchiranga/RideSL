<!-- css -->

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/body.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/aboutUs.css">
<link href="<?php echo URL; ?>public/css/faqabt/app.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>views/driverHome/css/default.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>views/editVehicle/css/default.css">

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

<!-- Java Script-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo URL; ?>views/editVehicle/js/default.js"></script>

<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.ssd-vertical-navigation.min.js"></script>
<!--<script type="text/javascript" src="public/js/faqabt/app.js"></script>-->
<script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/helpsupport.js"></script>
<script src="<?php echo URL; ?>public/js/faqabt/smoothscroll.min.js" type="text/javascript"></script>
<!--<script src="public/js/faqabt/backbone.js" type="text/javascript"></script>-->
<script src="<?php echo URL; ?>public/js/faqabt/responsive-accordion.min.js" type="text/javascript"></script>

<!-- tag-it -->
<link href="<?php echo URL; ?>views/editVehicle/css/jquery.tagit.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>views/editVehicle/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- locations -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<!-- The real deal -->
<script src="<?php echo URL; ?>views/editVehicle/js/tag-it.js" type="text/javascript" charset="utf-8"></script>

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
            <form id="editVehicle" action="<?php echo URL; ?>editVehicle/updateVehicle" method="post" onsubmit="return check()">
            <div id = "vehiclePane" class="box">

                <div style = 'width: 96%; padding: 2px; padding-bottom: 0px; padding-top: 20px; padding-left: 20px'>
                    <font style="color: #2980b9; font-size: 18px; font-weight: bold; float: left">Edit Vehicle Details</font>
                    
                    <br><br>
                    <hr style="">
                </div>


                <?php
                if ($this->vehicleDetails != NULL) {
                    foreach ($this->vehicleDetails as $key => $value) {

                        $content = '';
                        $content .= '<div id="content" style="width: 96%; padding: 20px;">';

                        $content .= '<div>';
                        
                        $content .= '<a href="'.URL.'driverHome"><input type="button" id="back_btn" value="Back" class="button" style="float: right; width: 80px"></a>
                        

                    </div>';

                        $content .= '<div style="float: left; width: 190px; padding-top: 36px">
                    <img src="' . URL . "public/images/" . $_SESSION['owner_id'] . "/" . $value['image'] . '" alt="" style="height: 220px; width: 220px; margin-top: 10px"/><br>
                        <font>Rating</font><br>
                        
                        <span class="star-rating">';
                        for($m = 1; $m <=5; $m++){
                            
                            if($m == $value['rating']){
                                $content .= '<input checked type="radio" name="rating'.$m.'" disabled><i></i>';
                            }else{
                                $content .='<input type="radio" name="rating'.$m.'" disabled><i></i>';
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
                        <td><input required type="text" name = "new_vehicle_reg_no" value="' . $this->vehicle_reg_no . '" onkeypress="limitText(this,10)"></td>
                        
                        </tr>
                        <tr>
                        <td><font style="color: #2980b9; ">Vehicle type </font></td>
                        <td>
                        <font>
                        <select name = "vehicle_type" style="width: 100px">';

                        if ($this->vehicleTypesList != NULL) {
                            foreach ($this->vehicleTypesList as $key => $valueType) {
                                if ($value['vehicle_type'] == $valueType['vehicle_type']) {
                                    $content .= '<option value="' . $valueType['vehicle_type'] . '" selected>' . $valueType['vehicle_type'] . '</option>';
                                } else {
                                    $content .= '<option value="' . $valueType['vehicle_type'] . '">' . $valueType['vehicle_type'] . '</option>';
                                }
                            }
                        }

                        $content .= '</select></font> 
                        </td>
                        </tr>
                        
                        <tr>
                        <td><font style="color: #2980b9; ">Manufacturer </font></td>
                        <td>
                        <font>
                        
                        <select id="manufacturer_combo" name="manufacturer" style="width: 100px">';

                        if ($this->manufacturerList != NULL) {
                            foreach ($this->manufacturerList as $key => $valueManufacturer) {
                                if ($value['manufacturer'] == $valueManufacturer['manufacturer']) {
                                    $content .= '<option value="' . $valueManufacturer['manufacturer'] . '" selected>' . $valueManufacturer['manufacturer'] . '</option>';
                                } else {
                                    $content .= '<option value="' . $valueManufacturer['manufacturer'] . '">' . $valueManufacturer['manufacturer'] . '</option>';
                                }
                            }
                        }

                        $content .= '</select></font> 
                        </td>
                        </tr>
                        
                        
                        <tr>
                        <td><font style="color: #2980b9; ">Model </font></td>
                        <td>
                        <font>
                        <select name = "model" id = "model_combo" style="width: 100px">';

                        if ($this->modelList != NULL) {
                            foreach ($this->modelList as $key => $valueModel) {
                                if ($value['model'] == $valueModel['model']) {
                                    $content .= '<option value="' . $valueModel['model'] . '" selected>' . $valueModel['model'] . '</option>';
                                } else {
                                    $content .= '<option value="' . $valueModel['model'] . '">' . $valueModel['model'] . '</option>';
                                }
                            }
                        }

                        $content .= '</select></font> 
                        </td>
                        </tr>

                        <tr>
                        <td><font style="color: #2980b9; ">Capacity</font></td>
                        <td><input type="text" name = "capacity" value="' . $value['capacity'] . '" onkeypress="return isNumber(event)" onkeyup="limitText(this,11)"></td>
                        </tr>
                        
                        </table>  
                        
                        
                        
                        <br><font style="color: #2980b9; ">Vehicle Description</font><br><br>
                        <font><textarea rows="5" cols="80" name="vehicle_description">' . $value['vehicle_description'] . '</textarea></font>
                        </tr>
                        
                            <div class="container" style="width: 70%; ">
                            <font style="color: #2980b9; font-size: 18px; font-weight: bold; line-height: 50px">Registered Schemes</font>
                                <ul class="responsive-accordion responsive-accordion-default bm-larger">';


                        if ($this->vehicleSchemesList != NULL) {

                            $index = 0;

                            foreach ($this->vehicleSchemesList[$this->vehicle_reg_no] as $key => $valueScheme) {

                                $content .= '<li><br>
                                    

                        <div style = "width: 695px"><font class="scheme"><input id = "scheme_pane' . $index . '" type="checkbox" name="scheme'.$index.'" value="'.$valueScheme['category'].'" checked=true>&nbsp;&nbsp;' . $valueScheme['category'] . '</input></font></div><br>
                        
                        <div id = "below_scheme_pane' . $index . '" style = "display:block; width: 695px; padding: 20px; border-style: solid; border-width: 1px; border-color: #DDDDDD;">
                        <div id = "scheme">
                        

                        <table width="90%">';

                                if ($valueScheme['category'] != 'Cargo Scheme' && $valueScheme['category'] != 'Construction Scheme') {
                                    if ($valueScheme['ac_price'] !== NULL) {
                                        $content .= '<tr>
                        <td width="20%"><font style = "color: #2980b9; "><input id="ac'.$index.'"  type="checkbox" name="ac_checkbox'.$index.'" value="ac_price" checked=true> Price with AC</input></font></td>
                        <td width="20%"><font>Rs. </font><input onkeypress="return isFloat(this,event)" required id = "price_ac'.$index.'" name="ac_text'.$index.'" type="text" value="' . $valueScheme['ac_price'] . '" style="width: 100px"></td>
                        <td width="20%">
                        
                        <font>
                        <select id="ac'.$index.'_combo" name="per_combo_ac'.$index.'" style="width: 100px">
                        <option id = "ac_'.$valueScheme['pricing_category'].$index.'" selected>'.$valueScheme['pricing_category'].'</option>';
                        
                        if('Per km' !== $valueScheme['pricing_category']){
                            $content .= '<option id="ac_km'.$index.'">Per km</option>';
                        }
                        if('Per hour' !== $valueScheme['pricing_category']){
                            $content .= '<option id="ac_hour'.$index.'">Per hour</option>';
                        }
                        if('Per day' !== $valueScheme['pricing_category']){
                            $content .= '<option id="ac_day'.$index.'">Per day</option>';
                        } 
                            
                        $content .= '</font></td></tr>';
                        
                                    } else {
                                        $content .= '<tr>
                        <td width="20%"><font style = "color: #2980b9; "><input id="ac'.$index.'" type="checkbox" name="ac_checkbox'.$index.'" value="ac_price"> Price with AC</input></font></td>
                        <td width="20%"><font>Rs. </font><input onkeypress="return isFloat(this,event)" required id = "price_ac'.$index.'" name="ac_text'.$index.'" disabled="true" type="text" style="width: 100px"></td>
                        <td width="20%">
                        <font>
                        <select id="ac'.$index.'_combo" name="per_combo_ac'.$index.'" disabled=true style="width: 100px">';
                            $content .= '<option id="ac_km'.$index.'">Per km</option>';
                            $content .= '<option id="ac_hour'.$index.'">Per hour</option>';
                            $content .= '<option id="ac_day'.$index.'">Per day</option>';
                            $content .= '</font></td></tr>';
                        
                            
                                    }

                                    if ($valueScheme['non_ac_price'] !== NULL) {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "non_ac'.$index.'" type="checkbox" name="non_ac_checkbox'.$index.'" value="non_ac_price" checked=true> Price without AC</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_non_ac'.$index.'" type="text" name="non_ac_text'.$index.'" value="' . $valueScheme['non_ac_price'] . '" style="width: 100px"></td>
                        <td>
                        <font>
                        <select id="non_ac'.$index.'_combo" name="per_combo_non_ac'.$index.'" style="width: 100px">
                        <option id = "non_ac_'.$valueScheme['pricing_category'].$index.'" selected>'.$valueScheme['pricing_category'].'</option>';
                        
                        if('Per km' !== $valueScheme['pricing_category']){
                            $content .= '<option id="non_ac_km'.$index.'">Per km</option>';
                        }
                        if('Per hour' !== $valueScheme['pricing_category']){
                            $content .= '<option id="non_ac_hour'.$index.'">Per hour</option>';
                        }
                        if('Per day' !== $valueScheme['pricing_category']){
                            $content .= '<option id="non_ac_day'.$index.'">Per day</option>';
                        } 
                            
                        $content .= '</font></td></tr>';
                                    } else {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "non_ac'.$index.'" type="checkbox" name="non_ac_checkbox'.$index.'" value="ac_price"> Price without AC</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_non_ac'.$index.'" name="non_ac_text'.$index.'" disabled="true" type="text" style="width: 100px"></td>
                        <td>
                        <font>
                        <select id="non_ac'.$index.'_combo" name="per_combo_non_ac'.$index.'" disabled=true style="width: 100px">';
                            $content .= '<option id="non_ac_km'.$index.'">Per km</option>';
                            $content .= '<option id="non_ac_hour'.$index.'">Per hour</option>';
                            $content .= '<option id="non_ac_day'.$index.'">Per day</option>';
                            $content .= '</font></td></tr>';
                                    }
                                    
                                    if ($valueScheme['category'] == 'Airport Drop Pickup Scheme' || $valueScheme['category'] == 'Station Drop Pickup Scheme') {
                                    if ($valueScheme['luggage_charge'] !== NULL) {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "luggage'.$index.'" type="checkbox" checked=true name="luggage_checkbox'.$index.'" value="luggage_charge"> Luggage Charges</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_luggage'.$index.'" name="luggage_text'.$index.'" type="text" style="width: 100px" value="'.$valueScheme['luggage_charge'].'"></td>
                        </tr>';
                                    }else{
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "luggage'.$index.'" type="checkbox" name="luggage_checkbox'.$index.'" value="luggage_charge"> Luggage Charges</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_luggage'.$index.'" name="luggage_text'.$index.'" disabled="true" type="text" style="width: 100px"></td>
                        </tr>';
                                    }if ($valueScheme['waiting_charge'] !== NULL) {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "waiting'.$index.'" type="checkbox" checked=true name="waiting_checkbox'.$index.'" value="waiting"> Waiting Charges</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_waiting'.$index.'" name="waiting_text'.$index.'" type="text" style="width: 100px" value="'.$valueScheme['waiting_charge'].'"></td>
                        </tr>';
                                    }else{
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "waiting'.$index.'" type="checkbox" name="waiting_checkbox'.$index.'" value="waiting"> Waiting Charges</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_waiting'.$index.'" name="waiting_text'.$index.'" disabled="true" type="text" style="width: 100px"></td>
                        </tr>';
                                    }
                                    
                                }
                                    
                                    
                                } else {
                                    if ($valueScheme['non_ac_price'] !== NULL) {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "normal'.$index.'" type="checkbox" name="non_ac_checkbox'.$index.'" value="price" checked=true> Price</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_normal'.$index.'" name="non_ac_text'.$index.'" type="text" value="' . $valueScheme['non_ac_price'] . '" style="width: 100px"></td>
                        <td>
                        <font>
                        <select id="per_normal'.$index.'" name="per_combo_non_ac'.$index.'" style="width: 100px">
                        <option id = "'.$valueScheme['pricing_category'].'" selected>'.$valueScheme['pricing_category'].'</option>';
                        
                        if('Per km' !== $valueScheme['pricing_category']){
                            $content .= '<option id="normal_km'.$index.'">Per km</option>';
                        }
                        if('Per hour' !== $valueScheme['pricing_category']){
                            $content .= '<option id="normal_hour'.$index.'">Per hour</option>';
                        }
                        if('Per day' !== $valueScheme['pricing_category']){
                            $content .= '<option id="normal_day'.$index.'">Per day</option>';
                        } 
                            
                        $content .= '</font></td></tr>';
                                    } else {
                                        $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "normal'.$index.'" type="checkbox" name="non_ac_checkbox'.$index.'" value="ac_price"> Price</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_normal'.$index.'" name="non_ac_text'.$index.'" disabled="true" type="text" style="width: 100px"></td>
                        <td>
                        <font>
                        <select id="per_normal'.$index.'_combo" name="per_combo_non_ac'.$index.'" disabled=true style="width: 100px">';
                            $content .= '<option id="normal_km'.$index.'">Per km</option>';
                            $content .= '<option id="normal_hour'.$index.'">Per hour</option>';
                            $content .= '<option id="normal_day'.$index.'">Per day</option>';
                            $content .= '</font></td></tr>';
                                    }
                                }
                                
                                

                                $content .= '</table>

                        <br><font style = "color: #2980b9; ">Description</font><br><br>
                        
                        <font><textarea rows="6" cols="60" name="scheme_description'.$index.'">' . $valueScheme['descrption'] . '</textarea></font><br><br>
                        
                        <div id = "locations" style="font-weight: normal; font-size: 14px">
                        <font style = "color: #2980b9; ">Locations Covered</font><br><br>';

                                $locations = '';
                                if ($this->schemeLocationList[$valueScheme['scheme_id']] !== NULL) {
                                    $content .= '<tr>';

                                    $j = 0;

                                    foreach ($this->schemeLocationList[$valueScheme['scheme_id']] as $key => $valueLocation) {
                                        if ($j == 0) {
                                            $locations .= $valueLocation['location'];
                                        } else {
                                            $locations .= ', ' . $valueLocation['location'];
                                        }
                                        $j++;
                                    }
                                }

                                $content .= '<form>
                        
                        </p>
                        
                        <ul id="singleFieldTags' . $index . '"></ul>
                            <div id=loc_validate'.$index.' style="font-size: 14px; color:red; font-weight:bold"></div>
                        </form>
                        <br>
                        </div>';

                                

                                $content .= '<div id = "avaliability">
                        <font style = "color: #2980b9; ">Availiability</font><br><br>
                        <input type="hidden" required name="mytags'.$index.'" id="mySingleField' . $index . '" value="' . $locations . '" >
                        <font><table style="width:64%">';

                                $days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');

                                for ($j = 0; $j <= 6; $j++) {
                                    $content .= '<tr>';

                                    $done = false;
                                    
                                    if ($this->schemeAvailabilityList[$valueScheme['scheme_id']] != NULL) {

                                        foreach ($this->schemeAvailabilityList[$valueScheme['scheme_id']] as $key => $valueAvailability) {
                                            if($days[$j] == $valueAvailability['day']){
                                                $content .= '<tr>';

                                                $content .= '<td width="12%"><input checked = true type="checkbox" name="day' . $index . $j . '" id="day' . $index . $j . '" value="'.$days[$j].'"> ' . $days[$j] . '</td>';
                                                $content .= '<td width="12%">From</td>';
                                                $content .= '<td  width="14%"><input type="time" name="start_day' . $index . $j . '" id="start_day' . $index . $j . '" value="' . $valueAvailability['start_time'] . '"></td>';
                                                $content .= '<td width="12%">To</td>';
                                                $content .= '<td  width="14%"><input type="time" name="end_day' . $index . $j . '" id="end_day' . $index . $j . '" value="' . $valueAvailability['end_time'] . '"></td>';
                                                $content .= '</tr>';
                                                $done = true;
                                                break;
                                            }
                                        }
                                    }

                                    if (!$done) {
                                        $content .= '<td width="12%"><input type="checkbox" name="day' . $index . $j . '" id="day' . $index . $j . '" value="'.$days[$j].'"> ' . $days[$j] . '</td>';
                                        $content .= '<td width="12%">From</td>';
                                        $content .= '<td  width="14%"> <input type="time" name="start_day' . $index . $j . '" id="start_day' . $index . $j . '" disabled="true"> </td>';
                                        $content .= '<td width="12%">To</td>';
                                        $content .= '<td  width="14%"> <input type="time" name="end_day' . $index . $j . '" id="end_day' . $index . $j . '" disabled="true"> </td>';
                                        $content .= '</tr>';
                                    }
                                }

                                $content .= '</table><div id=ava_validate'.$index.' style="font-size: 14px; color:red; font-weight:bold"></div></font>

                                
                        </div>
                        

                        </div>
                        </li>';
                                $index++;
                            }
                        }


                        if ($this->nonAllocatedSchemesList != NULL) {

                            foreach ($this->nonAllocatedSchemesList as $key => $valueScheme) {

                                $content .= '<li><br>
                        <div style = "width: 695px"><font class="scheme"><input id = "scheme_pane' . $index . '" type="checkbox" name="scheme'.$index.'" value="'.$valueScheme['category'].'" onclick="togglePane(' . $index . ')">&nbsp;&nbsp;' . $valueScheme['category'] . '</input></font></div><br>
                        
                        <div id = "below_scheme_pane' . $index . '" style = "display: none; width: 695px; padding: 20px; border-style: solid; border-width: 1px; border-color: #DDDDDD;">
                        <div id = "scheme">
                        

                        <table width="90%">';

                                if ($valueScheme['category'] != 'Cargo Scheme' && $valueScheme['category'] != 'Construction Scheme') {
                                    $content .= '<tr>
                        <td width="20%"><font style = "color: #2980b9; "><input id = "ac'.$index.'" type="checkbox" name="ac_checkbox'.$index.'" value="ac_price"> Price with AC</input></font></td>
                        <td width="20%"><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_ac'.$index.'" name = "ac_text'.$index.'" disabled="true" type="text" style="width: 100px"></td>
                        <td width="20%"><font>Per 
                        
                        <select id = "ac'.$index.'_combo" disabled="true" name="per_combo_ac' . $index . '" id="pricewithac' . $index . '" style="width: 100px">
                        <option>Per km</option>
                        <option>Per hour</option> 
                        <option>Per day</option> 
                        </select>

                        </font>
                        </tr>';

                                    $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "non_ac'.$index.'" type="checkbox" name="non_ac_checkbox'.$index.'" value="ac_price"> Price without AC</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_non_ac'.$index.'" name = "non_ac_text'.$index.'" disabled="true" type="text" style="width: 100px"></td>
                        <td><font>Per 
                        
                        <select id = "non_ac'.$index.'_combo" disabled="true" name="per_combo_non_ac' . $index . '" id="pricewithoutac' . $index . '" style="width: 100px">
                        <option>Per km</option>
                        <option>Per hour</option> 
                        <option>Per day</option> 
                        </select>
                        
                        </font>
                        </td>
                        </tr>';
                                } else {
                                    $content .= '<tr>
                        <td width="20%"><font style = "color: #2980b9; "><input id = "normal'.$index.'" type="checkbox" name="non_ac_checkbox'.$index.'" value="price"> Price</input></font></td>
                        <td width="20%"><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_normal'.$index.'" name = "non_ac_text'.$index.'" disabled="true" type="text" style="width: 100px"></td>
                        <td width="20%"><font>Per 
                        
                        <select id = "per_normal'.$index.'" disabled="true" name="per_combo_non_ac' . $index . '" style="width: 100px">
                        <option>Per km</option>
                        <option>Per hour</option> 
                        <option>Per day</option> 
                        </select>

                        </font>
                        </tr>';
                                }
                                if ($valueScheme['category'] == 'Airport Drop Pickup Scheme' || $valueScheme['category'] == 'Station Drop Pickup Scheme') {
                                    $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "luggage'.$index.'" type="checkbox" name="luggage_checkbox'.$index.'" value="luggage_charge"> Luggage Charges</input></font></td>
                        <td><font>Rs. </font><input required onkeypress="return isFloat(this,event)" id = "price_luggage'.$index.'" name="luggage_text'.$index.'" disabled="true" type="text" style="width: 100px"></td>
                        </tr>';

                                    $content .= '<tr>
                        <td><font style = "color: #2980b9; "><input id = "waiting'.$index.'" type="checkbox" name="waiting_checkbox'.$index.'" value="waiting"> Waiting Charges</input></font></td>
                        <td><font>Rs. </font><input required  id = "price_waiting'.$index.'" name = "waiting_text'.$index.'" disabled="true" type="text" style="width: 100px" onkeypress="return isFloat(this,event)"></td>
                        </tr>';
                                }

                                $content .= '</table>

                        <br><font style = "color: #2980b9; ">Description</font><br><br>
                        <font><textarea rows="6" cols="60" name="scheme_description'.$index.'"></textarea></font><br><br>
                        
                        <div id = "locations" style="font-weight: normal; font-size: 14px">
                        <font style = "color: #2980b9; ">Locations Covered</font><br><br>';

                                $locations = '';

                                $content .= '<form>
                        
                        
                        <ul id="singleFieldTags' . $index . '" name="tags_list'.$index.'"></ul>
                        <div id=loc_validate'.$index.' style="font-size: 14px; color:red; font-weight:bold"></div>
                        </form>
                        <br>
                        </div>';


                                $content .= '<div id = "avaliability">
                        <font style = "color: #2980b9; ">Availiability</font><br><br>
                        <input type="hidden" required name="mytags'.$index.'" id="mySingleField' . $index . '" value="' . $locations . '" >
                        <font><table style="width:64%">';

                                $days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');

                                for ($j = 0; $j <= 6; $j++) {
                                    $content .= '<tr>';

                                    $content .= '<td width="12%"><input type="checkbox" name="day' . $index . $j . '"  id="day' . $index . $j . '" value="'.$days[$j].'"> ' . $days[$j] . '</td>';
                                    $content .= '<td width="12%">From</td>';
                                    $content .= '<td  width="14%"> <input type="time" name="start_day' . $index . $j . '" id="start_day' . $index . $j . '" disabled="true"> </td>';
                                    $content .= '<td width="12%">To</td>';
                                    $content .= '<td  width="14%"> <input type="time" name="end_day' . $index . $j . '" id="end_day' . $index . $j . '" disabled="true"> </td>';

                                    $content .= '</tr>';
                                }

                                $content .= '</table><div id=ava_validate'.$index.' style="font-size: 14px; color:red; font-weight:bold"></div></font>
                        </div>
                        

                        </div>
                        </li>
                        ';
                                $index++;
                            }
                        }

                        $content .= '<li><input onclick="return confirm(\'Are you sure you want to update the above details about vehicle ' . $this->vehicle_reg_no . '?\');" type="submit" value="Submit All Changes" class="button">&nbsp;&nbsp;<a href="'.URL.'driverHome"><input type="button" id="cancel_btn" value="Cancel" class="button"></a></li></ul>
                        
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
            </form>

        </div><!-- End #body -->
    </div><!-- End #frame -->
</body>


</html>

