<!DOCTYPE html>
<html>
    <head>
        <title>Add New Vehicle</title>   

        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/vehreg.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/textboxstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/normaltextboxstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/schemestyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/hyperlinkstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/paragraphstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/dualpanestyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/ratingstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/tooltipstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/slidingpanelstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/combostyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/registerDr/font-awesome.css">

        <script type="text/javascript" src="<?php echo URL; ?>public/js/registerDr/view.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/registerDr/function.js"></script>


    <div style=" width: 1310px; height: 1x; text-align: right; float: right; line-height: 30px; float: left">   
        You are logged in as <text>Driver&nbsp;</text>
        <!--<a href="#">| Sign out |</a>-->
    </div>

    <!--create connection-->
    <?php
    mysql_connect('localhost', 'root', '');
    mysql_select_db('ridesl');
    ?>

    <script type="text/javascript">
        var URL = <?php echo URL; ?>;
    </script>
</head


<body style="width:100%;">

    <div id='panel1' style="float:left; width:14%;">

        <font style="color: #2980b9; font-size: 18px; font-weight: bold">Personal Profile</font>
        <br><br><font style="color: #2980b9; font-weight: bold">Name &nbsp;</font><img id = "pencil1" src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px"/>
<!--        <br><font id="edit_name"><?php echo $this->owner['first_name'] . ' ' . $this->owner['last_name']; ?></font>
        <br><br><font style="color: #2980b9; font-weight: bold">Telphone &nbsp;</font><img src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px"/>-->

    </div>

    <div id='panel2' style="float:right; width:85%; margin-left:10px;">
        <img src = "<?php echo URL; ?>public/images/registerDr/top.png" alt = "" style = " width: 660px;"/>
        <div id = "form_container" style = " border-left: 1px solid #CCCCCC;  border-right: 1px solid #CCCCCC;  border-top: 1px solid #CCCCCC;  border-bottom: 1px solid #CCCCCC;">
            <h1><a> Add New Vehicle </a></h1>

            <form id = "driverRegister" class = "appnitro" method = "POST" action = "views/driverRegister/dbDriverRegister.php"  onsubmit="return checkForm(this);">
                <div class = "form_description" style="color: #0b75b2; font-size: 30px; font-family: Times New Roman;">
                    <center> Add New Vehicle </center>
                </div>

                <div align="center">
                    <ul>
                        <li>
                            <div>
                                <label class = "description" style="color: #0b75b2; font-size: 14px;">Registration Number</label>
                                <input id="regNoin" name="regNoin" type="text" style="font-family: Times New Roman; font-size: 18px; width: 150px" onblur="validateNonEmptyRegNo(this, document.getElementById('regNo_help'))"/>
                                <span id="regNo_help" class="help" style="width:300px;  color:#0b75b2; font-style:italic;" align="right"></span>
                            </div>
                        </li>


                        <!--Type of vehicle-->
                        <li id = "type" ><label class = "description" style="color: #0b75b2; font-size: 14px;">Type </label>
                            <div>
                                <?php
                                $sql = "SELECT vehicle_type FROM vehicle_type";
                                $result = mysql_query($sql);

                                echo "<select id = 'vehtype' name = 'type' style='width: 150px; height: 28px; font-family: Times New Roman; font-size: 18px;'>";
                                while ($row = mysql_fetch_array($result)) {
                                    echo "<option style='font-family: Times New Roman; font-size: 18px;' value='" . $row['vehicle_type'] . "'>" . $row['vehicle_type'] . "</option>";
                                }
                                echo '</select>';
                                ?>                          
                            </div>	
                        </li>

                        <!--Manufacturer-->
                        <li id="manufacturer"><label class="description" style="color: #0b75b2; font-size: 14px;">Manufacturer</label>
                            <div>
                                <?php
                                $sql = "SELECT manufacturer FROM brand_model";
                                $result = mysql_query($sql);

                                echo "<select id = 'manufacturer' name = 'manufacturer' style='width: 150px; height: 28px; font-family: Times New Roman; font-size: 18px;'>";
                                while ($row = mysql_fetch_array($result)) {
                                    echo "<option style='font-family: Times New Roman; font-size: 18px;' value='" . $row['manufacturer'] . "'>" . $row['manufacturer'] . "</option>";
                                }
                                echo '</select>';
                                ?>      
                            </div>
                        </li>

                        <!--Model-->
                        <li id="model"><label class="description" style="color: #0b75b2; font-size: 14px;">Model</label>
                            <div id="modelPane">
                                <?php
                                $sql = "SELECT model FROM brand_model";
                                $result = mysql_query($sql);

                                echo "<select id = 'model' name = 'model' style='width: 150px; height: 28px; font-family: Times New Roman; font-size: 18px;'>";
                                while ($row = mysql_fetch_array($result)) {
                                    echo "<option style='font-family: Times New Roman; font-size: 18px;' value='" . $row['model'] . "'>" . $row['model'] . "</option>";
                                }
                                echo '</select>';
                                ?>      
                            </div>
                        </li>

                        <!--Capacity-->
                        <li>
                            <div>
                                <label class = "description" style="color: #0b75b2; font-size: 14px;">Capacity</label>
                                <input id="capacityin" name="capacity" type="text" style="font-family: Times New Roman; font-size: 18px; width: 150px" onblur="validateNonEmptyCapacity(this, document.getElementById('capacity_help'))"/>
                                <span id="capacity_help" class="help" style="width:300px;  color:#0b75b2; font-style:italic;" align="right"></span>
                            </div>
                        </li>

                        <!--Vehicle Description-->
                        <li>
                            <div>
                                <label class = "description" style="color: #0b75b2; font-size: 14px;">Description of the Vehicle</label>
                                <textarea id="describeVehicle" name="describeVehicle" class="description" style ="width : 300px; font-family: Times New Roman; font-size: 16px;" rows="5" onblur="validateNonEmptyVehDescription(this, document.getElementById('description_help'))"/></textarea> 
                                <span id="description_help" class="help" style="width:300px;  color:#0b75b2; font-style:italic;" align="right"></span>
                            </div>

                        </li>
                        <br>
                        
                        <!--Image-->
                        <a href="http://localhost/ridesl/views/driverRegister/image_cropper/upload_crop.php?number=" onclick="location.href=this.href+ document.getElementById('regNoin').value ;return false;" style="color: #0b75b2; font-size: 14px;"><b>Upload images</b></a>
                        <br> <br> <br> 
                        </li>
                        </div>

                        <!--------------------------------Pricing scheme and availability-------------------------------------->
                        <li class="section_break">                        
                            <h3 style="color: #0b75b2;">
                                <b><center>Pricing Scheme and Availability</center></b>
                            </h3>
                            <p style="color: #0b75b2;"><center>Please specify your pricing schemes for each selected category</center></p>
                        </li>    

                        <!------------------------------------City Taxi------------------------------------------------->
                        <li>
                            <span>
                                <input id="cityTaxi" name="cityTaxi" type="checkbox"  onclick="showHide()"/> 
                                <b style="color: #0b75b2; font-size: 14px;">City Taxi Service</b>
                            </span>
                        </li>

                        <!--******************Pricing scheme***********************-->
                        <div id="pricingSchemeTaxi" style="display: none; padding: 10px; border: 1px dashed #999;">
                            <h3 style="color: #0b75b2; font-size: 13px"><b>Pricing Scheme</b></h3>
                            <!--With AC-->
                            <span>
                                <input id="WithAcCt" name="WithAcCt"  type="checkbox" onclick="showWithAcCt()"/>
                                Price with AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithacInCt" name ="pricewithacInCt" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithacOptCt" id ="pricewithacOptCt" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option> 
                                </select>
                            </span>	
                            <br><br>
                            <!--Without AC-->
                            <span> 
                                <input id="WithoutAcCt" name="WithoutAcCt" type="checkbox" onclick="showWithoutAcCt()"/>
                                Price without AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithoutacInCt" name="pricewithoutacInCt" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithoutacOptCt" id ="pricewithoutacOptCt" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>                 
                                </select>
                            </span>	  
                            <br><br>



                            <!-- *****************Availability *****************-->
                            <li class="section_break">
                                <h3 style="color: #0b75b2; font-size: 13px">
                                    <b>Availability</b>
                                    <p align = "center" style = "font-size: 13px"> Enter duration in the format hh:mm:ss</p>
                                </h3>
                            </li>

                            <ul>
                                <!--Monday-->
                                <li id="monday">
                                    <span style="width: 500px">
                                        <span>                                 
                                            <input id="mondayInCt" name="mondayInCt" type="checkbox" onclick="showMondayCt()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 
                                            <!--12:45:56-->
                                            <input type="text" style="width: 100px" name="start_time_mondayCt" id ="start_time_mondayCt" disabled=true/> To <input type="text" style="width: 100px" id="end_time_mondayCt" name="end_time_mondayCt" id ="end_time_mondayCt" disabled=true/>
                                        </span>  
                                    </span>
                                </li>

                                <!--Tuesday-->
                                <li id="tuesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="tuesdayInCt" name="tuesdayInCt" type="checkbox" onclick="showTuesdayCt()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_tuesdayCt" id ="start_time_tuesdayCt" disabled=true> To <input type="text" style="width: 100px" name="end_time_tuesdayCt" id ="end_time_tuesdayCt" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Wednesday-->
                                <li id="wednesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="wednesdayInCt" name="wednesdayInCt" type="checkbox" onclick="showWednesdayCt()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_wednesdayCt" id ="start_time_wednesdayCt" disabled=true> To <input type="text" style="width: 100px" name="end_time_wednesdayCt" id ="end_time_wednesdayCt" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Thursday-->
                                <li id="thursday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="thursdayInCt" name="thursdayInCt" type="checkbox" onclick="showThursdayCt()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 

                                            <input type="text" style="width: 100px" name="start_time_thursdayCt" id ="start_time_thursdayCt" disabled=true> To <input type="text" style="width: 100px" name="end_time_thursdayCt" id ="end_time_thursdayCt" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Friday-->
                                <li id="friday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="fridayInCt" name="fridayInCt" type="checkbox" onclick="showFridayCt()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_fridayCt" id ="start_time_fridayCt" disabled=true> To <input type="text" style="width: 100px" name="end_time_fridayCt" id ="end_time_fridayCt" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Saturday-->
                                <li id="saturday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="saturdayInCt" name="saturdayInCt" type="checkbox" onclick="showSaturdayCt()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_saturdayCt" id ="start_time_saturdayCt" disabled=true> To <input type="text" style="width: 100px" name="end_time_saturdayCt" id ="end_time_saturdayCt" disabled=true>
                                        </span>  
                                    </span>                    
                                </li>

                                <!--Sunday-->
                                <li id="sunday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="sundayInCt" name="sundayInCt" type="checkbox" onclick="showSundayCt()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_sundayCt" id ="start_time_sundayCt" disabled=true> To <input type="text" style="width: 100px" name="end_time_sundayCt" id ="end_time_sundayCt" disabled=true>
                                        </span>  
                                    </span>               
                                </li>
                            </ul>

                            <!--Vehicle Description-->
                            <li id="describeVehicleCt"><label class="description" style="color: #0b75b2;">Any Description</label>
                                <textarea id="describeVehicleCt" name="describeVehicleCt" style ="width : 550px; font-family: Times New Roman; font-size: 16px;" rows="2"></textarea>                        
                            </li>     

                        </div> 

                        <!------------------------------------Tour service------------------------------------------------->
                        <li>
                            <span>
                                <input id="tour" name="tour" type="checkbox"  onclick="showHideTour()" style="color: #0b75b2;"/> 
                                <b style="color: #0b75b2; font-size: 14px;">Tour Service</b>
                            </span>
                        </li>

                        <!--******************Pricing scheme***********************-->
                        <div id="pricingSchemeTour" style="display: none; padding: 10px; border: 1px dashed #999;">
                            <h3 style="color: #0b75b2; font-size: 13px"><b>Pricing Scheme</b></h3>
                            <!--With AC-->
                            <span>
                                <input id="WithAcT" name="WithAcT"  type="checkbox" onclick="showWithAcT()"/>
                                Price with AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithacInT" name="pricewithacInT" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithacOptT" id ="pricewithacOptT" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>            
                                </select>
                            </span>	
                            <br><br>
                            <!--Without AC-->
                            <span> 
                                <input id="WithoutAcT" name="WithoutAcT" type="checkbox" onclick="showWithoutAcT()"/>
                                Price without AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithoutacInT" name="pricewithoutacInT" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithoutacOptT" id ="pricewithoutacOptT" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>              
                                </select>
                            </span>	  
                            <br><br>    

                            <!-- *****************Availability *****************-->
                            <li class="section_break">
                                <h3 style="color: #0b75b2; font-size: 13px;">
                                    <b>Availability</b>
                                    <p align = "center" style = "font-size: 13px"> Enter duration in the format hh:mm:ss</p>
                                </h3>
                            </li>

                            <ul>
                                <!--Monday-->
                                <li id="monday">
                                    <span style="width: 500px">
                                        <span>                                 
                                            <input id="mondayInT" name="mondayInT" type="checkbox" onclick="showMondayT()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_mondayT" id ="start_time_mondayT" disabled=true/> To <input type="text" style="width: 100px" name="end_time_mondayT" id ="end_time_mondayT" disabled=true/>
                                        </span>  
                                    </span>
                                </li>

                                <!--Tuesday-->
                                <li id="tuesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="tuesdayInT" name="tuesdayInT" type="checkbox" onclick="showTuesdayT()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_tuesdayT" id ="start_time_tuesdayT" disabled=true> To <input type="text" style="width: 100px" name="end_time_tuesdayT" id ="end_time_tuesdayT" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Wednesday-->
                                <li id="wednesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="wednesdayInT" name="wednesdayInT" type="checkbox" onclick="showWednesdayT()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_wednesdayT" id ="start_time_wednesdayT" disabled=true> To <input type="text" style="width: 100px" name="end_time_wednesdayT" id ="end_time_wednesdayT" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Thursday-->
                                <li id="thursday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="thursdayInT" name="thursdayInT" type="checkbox" onclick="showThursdayT()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_thursdayT" id ="start_time_thursdayT" disabled=true> To <input type="text" style="width: 100px" name="end_time_thursdayT" id ="end_time_thursdayT" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Friday-->
                                <li id="friday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="fridayInT" name="fridayInT" type="checkbox" onclick="showFridayT()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_fridayT" id ="start_time_fridayT" disabled=true> To <input type="text" style="width: 100px" name="end_time_fridayT" id ="end_time_fridayT" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Saturday-->
                                <li id="saturday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="saturdayInT" name="saturdayInT" type="checkbox" onclick="showSaturdayT()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_saturdayT" id ="start_time_saturdayT" disabled=true> To <input type="text" style="width: 100px" name="end_time_saturdayT" id ="end_time_saturdayT" disabled=true>
                                        </span>  
                                    </span>                    
                                </li>

                                <!--Sunday-->
                                <li id="sunday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="sundayInT" name="sundayInT" type="checkbox" onclick="showSundayT()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_sundayT" id ="start_time_sundayT" disabled=true> To <input type="text" style="width: 100px" name="end_time_sundayT" id ="end_time_sundayT" disabled=true>
                                        </span>  
                                    </span>               
                                </li>
                            </ul>

                            <!--Vehicle Description-->
                            <li id="describeVehicleT"><label class="description" style="color: #0b75b2;">Any Description</label>
                                <textarea id="describeVehicleT" name="describeVehicleT" style ="width : 550px; font-family: Times New Roman; font-size: 16px;" rows="2"></textarea>                        
                            </li>  


                        </div> 

                        <!------------------------------------Air Port Drop/Pickup------------------------------------------------->
                        <li>
                            <span>
                                <input id="airPort" name="airPort" type="checkbox"  onclick="showHideAirPort()" style="color: #0b75b2;"/> 
                                <b style="color: #0b75b2; font-size: 14px;">Air Port Drop/Pickup</b>
                            </span>
                        </li>

                        <!--******************Pricing scheme***********************-->
                        <div id="pricingSchemeAirPort" style="display: none; padding: 10px; border: 1px dashed #999;">
                            <h3 style="color: #0b75b2; font-size: 13px"><b>Pricing Scheme</b></h3>
                            <!--With AC-->
                            <span>
                                <input id="WithAcAp" name="WithAcAp"  type="checkbox" onclick="showWithAcAp()"/>
                                Price with AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithacInAp" name="pricewithacInAp" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithacOptAp" id ="pricewithacOptAp" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>                
                                </select>
                            </span>	
                            <br><br>
                            <!--Without AC-->
                            <span> 
                                <input id="WithoutAcAp" name="WithoutAcAp" type="checkbox" onclick="showWithoutAcAp()"/>
                                Price without AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithoutacInAp" name="pricewithoutacInAp" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithoutacOptAp" id ="pricewithoutacOptAp" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>             
                                </select>
                            </span>	  
                            <br><br>
                            <!--Luggage Charges-->
                            <span> 
                                <input id="luggageInAp" name="luggageInAp" type="checkbox" onclick="showLuggageAp()"/>
                                Luggage Charges 
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="luggageChargeAp" name="luggageChargeAp" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="luggageChargeOptAp" id ="luggageChargeOptAp" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>              
                                </select>
                            </span>	  
                            <br><br>
                            <!--Waiting charges-->
                            <span> 
                                <input id="waitingInAp" name="waitingInAp" type="checkbox" onclick="showWaitingAp()" />
                                Waiting Charges 
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="waitingAp" name="waitingAp" type="text" disabled=true ></input>
                            </span>
                            per   	
                            <span>
                                <select name="waitingChargeOptAp" id ="waitingChargeOptAp" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>               
                                </select>
                            </span>		
                            <br><br>

                            <!-- *****************Availability *****************-->
                            <li class="section_break">
                                <h3 style="color: #0b75b2; font-size: 13px;">
                                    <b>Availability</b>
                                    <p align = "center" style = "font-size: 13px"> Enter duration in the format hh:mm:ss</p>
                                </h3>
                            </li>

                            <ul>
                                <!--Monday-->
                                <li id="monday">
                                    <span style="width: 500px">
                                        <span>                                 
                                            <input id="mondayInAp" name="mondayInAp" type="checkbox" onclick="showMondayAp()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_mondayAp" id ="start_time_mondayAp" disabled=true/> To <input type="text" style="width: 100px" name="end_time_mondayAp" id ="end_time_mondayAp" disabled=true/>
                                        </span>  
                                    </span>
                                </li>

                                <!--Tuesday-->
                                <li id="tuesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="tuesdayInAp" name="tuesdayInAp" type="checkbox" onclick="showTuesdayAp()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_tuesdayAp" id ="start_time_tuesdayAp" disabled=true> To <input type="text" style="width: 100px" name="end_time_tuesdayAp" id ="end_time_tuesdayAp" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Wednesday-->
                                <li id="wednesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="wednesdayInAp" name="wednesdayInAp" type="checkbox" onclick="showWednesdayAp()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_wednesdayAp" id ="start_time_wednesdayAp" disabled=true> To <input type="text" style="width: 100px" name="end_time_wednesdayAp" id ="end_time_wednesdayAp" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Thursday-->
                                <li id="thursday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="thursdayInAp" name="thursdayInAp" type="checkbox" onclick="showThursdayAp()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_thursdayAp" id ="start_time_thursdayAp" disabled=true> To <input type="text" style="width: 100px" name="end_time_thursdayAp" id ="end_time_thursdayAp" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Friday-->
                                <li id="friday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="fridayInAp" name="fridayInAp" type="checkbox" onclick="showFridayAp()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_fridayAp" id ="start_time_fridayAp" disabled=true> To <input type="text" style="width: 100px" name="end_time_fridayAp" id ="end_time_fridayAp" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Saturday-->
                                <li id="saturday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="saturdayInAp" name="saturdayInAp" type="checkbox" onclick="showSaturdayAp()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_saturdayAp" id ="start_time_saturdayAp" disabled=true> To <input type="text" style="width: 100px" name="end_time_saturdayAp" id ="end_time_saturdayAp" disabled=true>
                                        </span>  
                                    </span>                    
                                </li>

                                <!--Sunday-->
                                <li id="sunday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="sundayInAp" name="sundayInAp" type="checkbox" onclick="showSundayAp()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_sundayAp" id ="start_time_sundayAp" disabled=true> To <input type="text" style="width: 100px" name="end_time_sundayAp" id ="end_time_sundayAp" disabled=true>
                                        </span>  
                                    </span>               
                                </li>
                            </ul>

                            <!--Vehicle Description-->
                            <li id="describeVehicleAp"><label class="description" style="color: #0b75b2;">Any Description</label>
                                <textarea id="describeVehicleAp" name="describeVehicleAp" style ="width : 550px; font-family: Times New Roman; font-size: 16px;" rows="2"></textarea>                        
                            </li>  

                        </div> 

                        <!------------------------------------Station Drop/Pickup------------------------------------------------->
                        <li>
                            <span>
                                <input id="station" name="station" type="checkbox"  onclick="showHideStation()" style="color: #0b75b2;"/> 
                                <b style="color: #0b75b2; font-size: 14px;">Station Drop/Pickup</b>
                            </span>
                        </li>

                        <!--******************Pricing scheme***********************-->
                        <div id="pricingSchemeStation" style="display: none;  padding: 10px; border: 1px dashed #999;">
                            <h3 style="color: #0b75b2; font-size: 13px"><b>Pricing Scheme</b></h3>
                            <!--With AC-->
                            <span>
                                <input id="WithAcSt" name="WithAcSt"  type="checkbox" onclick="showWithAcSt()"/>
                                Price with AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithacInSt" name="pricewithacInSt" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithacOptSt" id ="pricewithacOptSt" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>               
                                </select>
                            </span>	
                            <br><br>
                            <!--Without AC-->
                            <span> 
                                <input id="WithoutAcSt" name="WithoutAcSt" type="checkbox" onclick="showWithoutAcSt()"/>
                                Price without AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithoutacInSt" name="pricewithoutacInSt" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithoutacOptSt" id ="pricewithoutacOptSt" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>                
                                </select>
                            </span>	  
                            <br><br>
                            <!--Luggage Charges-->
                            <span> 
                                <input id="luggageInSt" name="luggageInSt" type="checkbox" onclick="showLuggageSt()"/>
                                Luggage Charges 
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="luggageChargeSt" name="luggageChargeSt" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="luggageChargeOptSt" id ="luggageChargeOptSt" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>           
                                </select>
                            </span>	  
                            <br><br>
                            <!--Waiting charges-->
                            <span> 
                                <input id="waitingInSt" name="waitingInSt" type="checkbox" onclick="showWaitingSt()" />
                                Waiting Charges 
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="waitingSt" name="waitingSt" type="text" disabled=true ></input>
                            </span>
                            per   	
                            <span>
                                <select name="waitingChargeOptSt" id ="waitingChargeOptSt" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>               
                                </select>
                            </span>		
                            <br><br>

                            <!-- *****************Availability *****************-->
                            <li class="section_break">
                                <h3 style="color: #0b75b2; font-size: 13px;">
                                    <b>Availability</b>
                                    <p align = "center" style = "font-size: 13px"> Enter duration in the format hh:mm:ss</p>
                                </h3>
                            </li>

                            <ul>
                                <!--Monday-->
                                <li id="monday">
                                    <span style="width: 500px">
                                        <span>                                 
                                            <input id="mondayInSt" name="mondayInSt" type="checkbox" onclick="showMondaySt()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_mondaySt" id ="start_time_mondaySt" disabled=true/> To <input type="text" style="width: 100px" name="end_time_mondaySt" id ="end_time_mondaySt" disabled=true/>
                                        </span>  
                                    </span>
                                </li>

                                <!--Tuesday-->
                                <li id="tuesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="tuesdayInSt" name="tuesdayInSt" type="checkbox" onclick="showTuesdaySt()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_tuesdaySt" id ="start_time_tuesdaySt" disabled=true> To <input type="text" style="width: 100px" name="end_time_tuesdaySt" id ="end_time_tuesdaySt" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Wednesday-->
                                <li id="wednesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="wednesdayInSt" name="wednesdayInSt" type="checkbox" onclick="showWednesdaySt()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_wednesdaySt" id ="start_time_wednesdaySt" disabled=true> To <input type="text" style="width: 100px" name="end_time_wednesdaySt" id ="end_time_wednesdaySt" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Thursday-->
                                <li id="thursday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="thursdayInSt" name="thursdayInSt" type="checkbox" onclick="showThursdaySt()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_thursdaySt" id ="start_time_thursdaySt" disabled=true> To <input type="text" style="width: 100px" name="end_time_thursdaySt" id ="end_time_thursdaySt" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Friday-->
                                <li id="friday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="fridayInSt" name="fridayInSt" type="checkbox" onclick="showFridaySt()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_fridaySt" id ="start_time_fridaySt" disabled=true> To <input type="text" style="width: 100px" name="end_time_fridaySt" id ="end_time_fridaySt" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Saturday-->
                                <li id="saturday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="saturdayInSt" name="saturdayInSt" type="checkbox" onclick="showSaturdaySt()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_saturdaySt" id ="start_time_saturdaySt" disabled=true> To <input type="text" style="width: 100px" name="end_time_saturdaySt" id ="end_time_saturdaySt" disabled=true>
                                        </span>  
                                    </span>                    
                                </li>

                                <!--Sunday-->
                                <li id="sunday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="sundayInSt" name="sundayInSt" type="checkbox" onclick="showSundaySt()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_sundaySt" id ="start_time_sundaySt" disabled=true> To <input type="text" style="width: 100px" name="end_time_sundaySt" id ="end_time_sundaySt" disabled=true>
                                        </span>  
                                    </span>               
                                </li>
                            </ul>

                            <!--Vehicle Description-->
                            <li id="describeVehicleSt"><label class="description" style="color: #0b75b2;">Any Description</label>
                                <textarea id="describeVehicleSt" name="describeVehicleSt" style ="width : 550px; font-family: Times New Roman; font-size: 16px;" rows="2"></textarea>                        
                            </li>  

                        </div> 

                        <!------------------------------------Ceremonial Hires------------------------------------------------->
                        <li>
                            <span>
                                <input id="ceremony" name="ceremony" type="checkbox"  onclick="showHideCeremony()" style="color: #0b75b2;"/> 
                                <b style="color: #0b75b2; font-size: 14px;">Ceremonial Hires</b>
                            </span>
                        </li>


                        <!--******************Pricing scheme***********************-->
                        <div id="pricingSchemeCeremony" style="display: none; padding: 10px; border: 1px dashed #999;">
                            <h3 style="color: #0b75b2; font-size: 13px;"><b>Pricing Scheme</b></h3>
                            <!--With AC-->
                            <span>
                                <input id="WithAcC" name="WithAcC"  type="checkbox" onclick="showWithAcC()"/>
                                Price with AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithacInC" name="pricewithacInC" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithacOptC" id ="pricewithacOptC" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>       
                                </select>
                            </span>	
                            <br><br>
                            <!--Without AC-->
                            <span> 
                                <input id="WithoutAcC" name="WithoutAcC" type="checkbox" onclick="showWithoutAcC()"/>
                                Price without AC
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="pricewithoutacInC" name="pricewithoutacInC" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricewithoutacOptC" id ="pricewithoutacOptC" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>            
                                </select>
                            </span>	  
                            <br><br>

                            <!-- *****************Availability *****************-->
                            <li class="section_break">
                                <h3 style="color: #0b75b2; font-size: 13px;">
                                    <b>Availability</b>
                                    <p align = "center" style = "font-size: 13px"> Enter duration in the format hh:mm:ss</p>
                                </h3>
                            </li>

                            <ul>
                                <!--Monday-->
                                <li id="monday">
                                    <span style="width: 500px">
                                        <span>                                 
                                            <input id="mondayInC" name="mondayInC" type="checkbox" onclick="showMondayC()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_mondayC" id ="start_time_mondayC" disabled=true/> To <input type="text" style="width: 100px" name="end_time_mondayC" id ="end_time_mondayC" disabled=true/>
                                        </span>  
                                    </span>
                                </li>

                                <!--Tuesday-->
                                <li id="tuesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="tuesdayInC" name="tuesdayInC" type="checkbox" onclick="showTuesdayC()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_tuesdayC" id ="start_time_tuesdayC" disabled=true> To <input type="text" style="width: 100px" name="end_time_tuesdayC" id ="end_time_tuesdayC" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Wednesday-->
                                <li id="wednesday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="wednesdayInC" name="wednesdayInC" type="checkbox" onclick="showWednesdayC()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_wednesdayC" id ="start_time_wednesdayC" disabled=true> To <input type="text" style="width: 100px" name="end_time_wednesdayC" id ="end_time_wednesdayC" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Thursday-->
                                <li id="thursday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="thursdayInC" name="thursdayInC" type="checkbox" onclick="showThursdayC()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_thursdayC" id ="start_time_thursdayC" disabled=true> To <input type="text" style="width: 100px" name="end_time_thursdayC" id ="end_time_thursdayC" disabled=true>
                                        </span>  
                                    </span>                
                                </li>

                                <!--Friday-->
                                <li id="friday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="fridayInC" name="fridayInC" type="checkbox" onclick="showFridayC()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_fridayC" id ="start_time_fridayC" disabled=true> To <input type="text" style="width: 100px" name="end_time_fridayC" id ="end_time_fridayC" disabled=true>
                                        </span>  
                                    </span>                   
                                </li>

                                <!--Saturday-->
                                <li id="saturday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="saturdayInC" name="saturdayInC" type="checkbox" onclick="showSaturdayC()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_saturdayC" id ="start_time_saturdayC" disabled=true> To <input type="text" style="width: 100px" name="end_time_saturdayC" id ="end_time_saturdayC" disabled=true>
                                        </span>  
                                    </span>                    
                                </li>

                                <!--Sunday-->
                                <li id="sunday">
                                    <span style="width: 500px">
                                        <span> 
                                            <input id="sundayInC" name="sundayInC" type="checkbox" onclick="showSundayC()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span>
                                            From 
                                            <input type="text" style="width: 100px" name="start_time_sundayC" id ="start_time_sundayC" disabled=true> To <input type="text" style="width: 100px" name="end_time_sundayC" id ="end_time_sundayC" disabled=true>
                                        </span>  
                                    </span>               
                                </li>
                            </ul>

                            <!--Vehicle Description-->
                            <li id="describeVehicleC"><label class="description" style="color: #0b75b2;">Any Description</label>
                                <textarea id="describeVehicleC" name="describeVehicleC" style ="width : 550px; font-family: Times New Roman; font-size: 16px;" rows="2"></textarea>                        
                            </li>  

                        </div> 

                        <!------------------------------------Construction------------------------------------------------->
                        <li>
                            <span>
                                <input id="construction" name="construction" type="checkbox"  onclick="showHideConstruction()" style="color: #0b75b2;"/> 
                                <b style="color: #0b75b2; font-size: 14px;">Constructions</b>
                            </span>
                        </li>

                        <!--******************Pricing scheme***********************-->
                        <div id="pricingSchemeConstructions" style="display: none;  padding: 10px; border: 1px dashed #999;">
                            <h3 style="color: #0b75b2; font-size: 13px"><b>Pricing Scheme</b></h3>

                            <span>
                                <input id="priceInCn" name="priceInCn"  type="checkbox" onclick="showPriceConstruction()"/>
                                Price
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="priceCn" name="priceCn" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricOptCn" id ="priceOptCn" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>               
                                </select>
                            </span>	
                            <br><br>


                            <!--Vehicle Description-->
                            <li id="describeVehicleCn"><label class="description" style="color: #0b75b2;">Any Description</label>
                                <textarea id="describeVehicleCn" name="describeVehicleCn" style ="width : 550px; font-family: Times New Roman; font-size: 16px;" rows="2"></textarea>                        
                            </li>  

                        </div> 

                        <!------------------------------------Cargo------------------------------------------------->
                        <li>
                            <span>
                                <input id="cargo" name="cargo" type="checkbox"  onclick="showHideCargo()" style="color: #0b75b2;"/> 
                                <b style="color: #0b75b2; font-size: 14px;">Cargo</b>
                            </span>
                        </li>

                        <!--******************Pricing scheme***********************-->
                        <div id="pricingSchemeCargo" style="display: none;  padding: 10px; border: 1px dashed #999;">
                            <h3 style="color: #0b75b2; font-size: 13px"><b>Pricing Scheme</b></h3>

                            <span>
                                <input id="priceInCg" name="priceInCg"  type="checkbox" onclick="showPriceCargo()"/>
                                Price
                            </span>
                            <br>
                            Rs:
                            <span>
                                <input id="priceCg" name="priceCg" type="text" disabled=true></input>
                            </span>
                            per   	
                            <span>
                                <select name="pricOptCg" id ="priceOptCg" disabled=true>
                                    <option>Per km</option>
                                    <option>Per hour</option> 
                                    <option>Per day</option>               
                                </select>
                            </span>	
                            <br><br>


                            <!--Vehicle Description-->
                            <li id="describeVehicleCg"><label class="description" style="color: #0b75b2;">Any Description</label>
                                <textarea id="describeVehicleCg" name="describeVehicleCg" style ="width : 550px; font-family: Times New Roman; font-size: 16px;" rows="2"></textarea>                        
                            </li>  

                        </div> 

                        <br>
                        <!--Submit Button-->
                        <center><input type="submit" value="Register vehicle" class="belize-hole-flat-button"/></center>

                        </form>

                        <!--Footer-->
                        <div id="footer">            
                        </div>

                </div>
                <img src="<?php echo URL; ?>public/images/registerDr/bottom.png" alt="" style=" width: 660px;"/>
        </div>
</body>
</html>

<script>
    function showHideTaxi()
    {
        if (document.getElementById('cityTaxi').checked)
        {
            document.getElementById('pricingSchemeTaxi').style.display = 'block';
        }
        else
        {
            document.getElementById('pricingSchemeTaxi').style.display = 'none';
        }
    }
    ;

    function showHideTour()
    {
        if (document.getElementById('tour').checked)
        {
            document.getElementById('pricingSchemeTour').style.display = 'block';
        }
        else
        {
            document.getElementById('pricingSchemeTour').style.display = 'none';
        }
    }
    ;

    function showHideAirPort()
    {
        if (document.getElementById('airPort').checked)
        {
            document.getElementById('pricingSchemeAirPort').style.display = 'block';
        }
        else
        {
            document.getElementById('pricingSchemeAirPort').style.display = 'none';
        }
    }
    ;

    function showHideStation()
    {
        if (document.getElementById('station').checked)
        {
            document.getElementById('pricingSchemeStation').style.display = 'block';
        }
        else
        {
            document.getElementById('pricingSchemeStation').style.display = 'none';
        }
    }
    ;

    function showHideCeremony()
    {
        if (document.getElementById('ceremony').checked)
        {
            document.getElementById('pricingSchemeCeremony').style.display = 'block';
        }
        else
        {
            document.getElementById('pricingSchemeCeremony').style.display = 'none';
        }
    }
    ;

    function showHideConstruction() {
        if (document.getElementById('construction').checked)
        {
            document.getElementById('pricingSchemeConstructions').style.display = 'block';
        }
        else
        {
            document.getElementById('pricingSchemeConstructions').style.display = 'none';
        }

    }

    function showHideCargo() {
        if (document.getElementById('cargo').checked)
        {
            document.getElementById('pricingSchemeCargo').style.display = 'block';
        }
        else
        {
            document.getElementById('pricingSchemeCargo').style.display = 'none';
        }

    }


    //-------------------------------------------------------------------------------------
    //
    //******************************************************************City Taxi*****************************************************
    //Pricing Schemes

    function showWithAcCt() {
        if (document.getElementById('WithAcCt').checked)
        {
            document.getElementById("pricewithacInCt").disabled = false;
            document.getElementById("pricewithacOptCt").disabled = false;
        } else {
            document.getElementById("pricewithacInCt").disabled = true;
            document.getElementById("pricewithacOptCt").disabled = true;
        }
    }


    function showLuggageCt() {
        if (document.getElementById('luggageInCt').checked)
        {
            document.getElementById("luggageChargeCt").disabled = false;
            document.getElementById("luggageChargeOptCt").disabled = false;
        } else {
            document.getElementById("luggageChargeCt").disabled = true;
            document.getElementById("luggageChargeOptCt").disabled = true;
        }
    }

    function showWithoutAcCt() {
        if (document.getElementById('WithoutAcCt').checked)
        {
            document.getElementById("pricewithoutacInCt").disabled = false;
            document.getElementById("pricewithoutacOptCt").disabled = false;
        } else {
            document.getElementById("pricewithoutacInCt").disabled = true;
            document.getElementById("pricewithoutacOptCt").disabled = true;
        }
    }

    function showWaitingCt() {
        if (document.getElementById('waitingCt').checked)
        {
            document.getElementById("waitingInCt").disabled = false;
            document.getElementById("waitingChargeOptCt").disabled = false;
        } else {
            document.getElementById("waitingInCt").disabled = true;
            document.getElementById("waitingChargeOptCt").disabled = true;
        }
    }

    //-------------------------------------------------------------------------------------
    //Availability
    function showMondayCt() {
        if (document.getElementById('mondayInCt').checked)
        {
            document.getElementById("start_time_mondayCt").disabled = false;
            document.getElementById("end_time_mondayCt").disabled = false;
        } else {
            document.getElementById("start_time_mondayCt").disabled = true;
            document.getElementById("end_time_mondayCt").disabled = true;
        }
    }


    function showTuesdayCt() {
        if (document.getElementById('tuesdayInCt').checked)
        {
            document.getElementById("start_time_tuesdayCt").disabled = false;
            document.getElementById("end_time_tuesdayCt").disabled = false;
        } else {
            document.getElementById("start_time_tuesdayCt").disabled = true;
            document.getElementById("end_time_tuesdayCt").disabled = true;
        }

    }

    function showWednesdayCt() {
        if (document.getElementById('wednesdayInCt').checked)
        {
            document.getElementById("start_time_wednesdayCt").disabled = false;
            document.getElementById("end_time_wednesdayCt").disabled = false;
        } else {
            document.getElementById("start_time_wednesdayCt").disabled = true;
            document.getElementById("end_time_wednesdayCt").disabled = true;
        }

    }

    function showThursdayCt() {
        if (document.getElementById('thursdayInCt').checked)
        {
            document.getElementById("start_time_thursdayCt").disabled = false;
            document.getElementById("end_time_thursdayCt").disabled = false;
        } else {
            document.getElementById("start_time_thursdayCt").disabled = true;
            document.getElementById("end_time_thursdayCt").disabled = true;
        }

    }

    function showFridayCt() {
        if (document.getElementById('fridayInCt').checked)
        {
            document.getElementById("start_time_fridayCt").disabled = false;
            document.getElementById("end_time_fridayCt").disabled = false;
        } else {
            document.getElementById("start_time_fridayCt").disabled = true;
            document.getElementById("end_time_fridayCt").disabled = true;
        }

    }

    function showSaturdayCt() {
        if (document.getElementById('saturdayInCt').checked)
        {
            document.getElementById("start_time_saturdayCt").disabled = false;
            document.getElementById("end_time_saturdayCt").disabled = false;
        } else {
            document.getElementById("start_time_saturdayCt").disabled = true;
            document.getElementById("end_time_saturdayCt").disabled = true;
        }

    }

    function showSundayCt() {
        if (document.getElementById('sundayInCt').checked)
        {
            document.getElementById("start_time_sundayCt").disabled = false;
            document.getElementById("end_time_sundayCt").disabled = false;
        } else {
            document.getElementById("start_time_sundayCt").disabled = true;
            document.getElementById("end_time_sundayCt").disabled = true;
        }

    }

//********************************************************************Tour Service****************************************************

    function showWithAcT() {
        if (document.getElementById('WithAcT').checked)
        {
            document.getElementById("pricewithacInT").disabled = false;
            document.getElementById("pricewithacOptT").disabled = false;
        } else {
            document.getElementById("pricewithacInT").disabled = true;
            document.getElementById("pricewithacOptT").disabled = true;
        }
    }


    function showLuggageT() {
        if (document.getElementById('luggageInT').checked)
        {
            document.getElementById("luggageChargeT").disabled = false;
            document.getElementById("luggageChargeOptT").disabled = false;
        } else {
            document.getElementById("luggageChargeT").disabled = true;
            document.getElementById("luggageChargeOptT").disabled = true;
        }
    }

    function showWithoutAcT() {
        if (document.getElementById('WithoutAcT').checked)
        {
            document.getElementById("pricewithoutacInT").disabled = false;
            document.getElementById("pricewithoutacOptT").disabled = false;
        } else {
            document.getElementById("pricewithoutacInT").disabled = true;
            document.getElementById("pricewithoutacOptT").disabled = true;
        }
    }

    function showWaitingT() {
        if (document.getElementById('waitingT').checked)
        {
            document.getElementById("waitingInT").disabled = false;
            document.getElementById("waitingChargeOptT").disabled = false;
        } else {
            document.getElementById("waitingInT").disabled = true;
            document.getElementById("waitingChargeOptT").disabled = true;
        }
    }

    //-------------------------------------------------------------------------------------
    //Availability
    function showMondayT() {
        if (document.getElementById('mondayInT').checked)
        {
            document.getElementById("start_time_mondayT").disabled = false;
            document.getElementById("end_time_mondayT").disabled = false;
        } else {
            document.getElementById("start_time_mondayT").disabled = true;
            document.getElementById("end_time_mondayT").disabled = true;
        }
    }


    function showTuesdayT() {
        if (document.getElementById('tuesdayInT').checked)
        {
            document.getElementById("start_time_tuesdayT").disabled = false;
            document.getElementById("end_time_tuesdayT").disabled = false;
        } else {
            document.getElementById("start_time_tuesdayT").disabled = true;
            document.getElementById("end_time_tuesdayT").disabled = true;
        }

    }

    function showWednesdayT() {
        if (document.getElementById('wednesdayInT').checked)
        {
            document.getElementById("start_time_wednesdayT").disabled = false;
            document.getElementById("end_time_wednesdayT").disabled = false;
        } else {
            document.getElementById("start_time_wednesdayT").disabled = true;
            document.getElementById("end_time_wednesdayT").disabled = true;
        }

    }

    function showThursdayT() {
        if (document.getElementById('thursdayInT').checked)
        {
            document.getElementById("start_time_thursdayT").disabled = false;
            document.getElementById("end_time_thursdayT").disabled = false;
        } else {
            document.getElementById("start_time_thursdayT").disabled = true;
            document.getElementById("end_time_thursdayT").disabled = true;
        }

    }

    function showFridayT() {
        if (document.getElementById('fridayInT').checked)
        {
            document.getElementById("start_time_fridayT").disabled = false;
            document.getElementById("end_time_fridayT").disabled = false;
        } else {
            document.getElementById("start_time_fridayT").disabled = true;
            document.getElementById("end_time_fridayT").disabled = true;
        }

    }

    function showSaturdayT() {
        if (document.getElementById('saturdayInT').checked)
        {
            document.getElementById("start_time_saturdayT").disabled = false;
            document.getElementById("end_time_saturdayT").disabled = false;
        } else {
            document.getElementById("start_time_saturdayT").disabled = true;
            document.getElementById("end_time_saturdayT").disabled = true;
        }

    }

    function showSundayT() {
        if (document.getElementById('sundayInT').checked)
        {
            document.getElementById("start_time_sundayT").disabled = false;
            document.getElementById("end_time_sundayT").disabled = false;
        } else {
            document.getElementById("start_time_sundayT").disabled = true;
            document.getElementById("end_time_sundayT").disabled = true;
        }

    }


//********************************************************************AirPort****************************************************

    function showWithAcAp() {
        if (document.getElementById('WithAcAp').checked)
        {
            document.getElementById("pricewithacInAp").disabled = false;
            document.getElementById("pricewithacOptAp").disabled = false;
        } else {
            document.getElementById("pricewithacInAp").disabled = true;
            document.getElementById("pricewithacOptAp").disabled = true;
        }
    }


    function showLuggageAp() {
        if (document.getElementById('luggageInAp').checked)
        {
            document.getElementById("luggageChargeAp").disabled = false;
            document.getElementById("luggageChargeOptAp").disabled = false;
        } else {
            document.getElementById("luggageChargeAp").disabled = true;
            document.getElementById("luggageChargeOptAp").disabled = true;
        }
    }

    function showWithoutAcAp() {
        if (document.getElementById('WithoutAcAp').checked)
        {
            document.getElementById("pricewithoutacInAp").disabled = false;
            document.getElementById("pricewithoutacOptAp").disabled = false;
        } else {
            document.getElementById("pricewithoutacInAp").disabled = true;
            document.getElementById("pricewithoutacOptAp").disabled = true;
        }
    }

    function showWaitingAp() {
        if (document.getElementById('waitingInAp').checked)
        {
            document.getElementById("waitingAp").disabled = false;
            document.getElementById("waitingChargeOptAp").disabled = false;
        } else {
            document.getElementById("waitingAp").disabled = true;
            document.getElementById("waitingChargeOptAp").disabled = true;
        }
    }

    //-------------------------------------------------------------------------------------
    //Availability
    function showMondayAp() {
        if (document.getElementById('mondayInAp').checked)
        {
            document.getElementById("start_time_mondayAp").disabled = false;
            document.getElementById("end_time_mondayAp").disabled = false;
        } else {
            document.getElementById("start_time_mondayAp").disabled = true;
            document.getElementById("end_time_mondayAp").disabled = true;
        }
    }


    function showTuesdayAp() {
        if (document.getElementById('tuesdayInAp').checked)
        {
            document.getElementById("start_time_tuesdayAp").disabled = false;
            document.getElementById("end_time_tuesdayAp").disabled = false;
        } else {
            document.getElementById("start_time_tuesdayAp").disabled = true;
            document.getElementById("end_time_tuesdayAp").disabled = true;
        }

    }

    function showWednesdayAp() {
        if (document.getElementById('wednesdayInAp').checked)
        {
            document.getElementById("start_time_wednesdayAp").disabled = false;
            document.getElementById("end_time_wednesdayAp").disabled = false;
        } else {
            document.getElementById("start_time_wednesdayAp").disabled = true;
            document.getElementById("end_time_wednesdayAp").disabled = true;
        }

    }

    function showThursdayAp() {
        if (document.getElementById('thursdayInAp').checked)
        {
            document.getElementById("start_time_thursdayAp").disabled = false;
            document.getElementById("end_time_thursdayAp").disabled = false;
        } else {
            document.getElementById("start_time_thursdayAp").disabled = true;
            document.getElementById("end_time_thursdayAp").disabled = true;
        }

    }

    function showFridayAp() {
        if (document.getElementById('fridayInAp').checked)
        {
            document.getElementById("start_time_fridayAp").disabled = false;
            document.getElementById("end_time_fridayAp").disabled = false;
        } else {
            document.getElementById("start_time_fridayAp").disabled = true;
            document.getElementById("end_time_fridayAp").disabled = true;
        }

    }

    function showSaturdayAp() {
        if (document.getElementById('saturdayInAp').checked)
        {
            document.getElementById("start_time_saturdayAp").disabled = false;
            document.getElementById("end_time_saturdayAp").disabled = false;
        } else {
            document.getElementById("start_time_saturdayAp").disabled = true;
            document.getElementById("end_time_saturdayAp").disabled = true;
        }

    }

    function showSundayAp() {
        if (document.getElementById('sundayInAp').checked)
        {
            document.getElementById("start_time_sundayAp").disabled = false;
            document.getElementById("end_time_sundayAp").disabled = false;
        } else {
            document.getElementById("start_time_sundayAp").disabled = true;
            document.getElementById("end_time_sundayAp").disabled = true;
        }

    }

//********************************************************************Station****************************************************



    function showWithAcSt() {
        if (document.getElementById('WithAcSt').checked)
        {
            document.getElementById("pricewithacInSt").disabled = false;
            document.getElementById("pricewithacOptSt").disabled = false;
        } else {
            document.getElementById("pricewithacInSt").disabled = true;
            document.getElementById("pricewithacOptSt").disabled = true;
        }
    }


    function showLuggageSt() {
        if (document.getElementById('luggageInSt').checked)
        {
            document.getElementById("luggageChargeSt").disabled = false;
            document.getElementById("luggageChargeOptSt").disabled = false;
        } else {
            document.getElementById("luggageChargeSt").disabled = true;
            document.getElementById("luggageChargeOptSt").disabled = true;
        }
    }

    function showWithoutAcSt() {
        if (document.getElementById('WithoutAcSt').checked)
        {
            document.getElementById("pricewithoutacInSt").disabled = false;
            document.getElementById("pricewithoutacOptSt").disabled = false;
        } else {
            document.getElementById("pricewithoutacInSt").disabled = true;
            document.getElementById("pricewithoutacOptSt").disabled = true;
        }
    }

    function showWaitingSt() {
        if (document.getElementById('waitingInSt').checked)
        {
            document.getElementById("waitingSt").disabled = false;
            document.getElementById("waitingChargeOptSt").disabled = false;
        } else {
            document.getElementById("waitingSt").disabled = true;
            document.getElementById("waitingChargeOptSt").disabled = true;
        }
    }

    //-------------------------------------------------------------------------------------
    //Availability
    function showMondaySt() {
        if (document.getElementById('mondayInSt').checked)
        {
            document.getElementById("start_time_mondaySt").disabled = false;
            document.getElementById("end_time_mondaySt").disabled = false;
        } else {
            document.getElementById("start_time_mondaySt").disabled = true;
            document.getElementById("end_time_mondaySt").disabled = true;
        }
    }


    function showTuesdaySt() {
        if (document.getElementById('tuesdayInSt').checked)
        {
            document.getElementById("start_time_tuesdaySt").disabled = false;
            document.getElementById("end_time_tuesdaySt").disabled = false;
        } else {
            document.getElementById("start_time_tuesdaySt").disabled = true;
            document.getElementById("end_time_tuesdaySt").disabled = true;
        }

    }

    function showWednesdaySt() {
        if (document.getElementById('wednesdayInSt').checked)
        {
            document.getElementById("start_time_wednesdaySt").disabled = false;
            document.getElementById("end_time_wednesdaySt").disabled = false;
        } else {
            document.getElementById("start_time_wednesdaySt").disabled = true;
            document.getElementById("end_time_wednesdaySt").disabled = true;
        }

    }

    function showThursdaySt() {
        if (document.getElementById('thursdayInSt').checked)
        {
            document.getElementById("start_time_thursdaySt").disabled = false;
            document.getElementById("end_time_thursdaySt").disabled = false;
        } else {
            document.getElementById("start_time_thursdaySt").disabled = true;
            document.getElementById("end_time_thursdaySt").disabled = true;
        }

    }

    function showFridaySt() {
        if (document.getElementById('fridayInSt').checked)
        {
            document.getElementById("start_time_fridaySt").disabled = false;
            document.getElementById("end_time_fridaySt").disabled = false;
        } else {
            document.getElementById("start_time_fridaySt").disabled = true;
            document.getElementById("end_time_fridaySt").disabled = true;
        }

    }

    function showSaturdaySt() {
        if (document.getElementById('saturdayInSt').checked)
        {
            document.getElementById("start_time_saturdaySt").disabled = false;
            document.getElementById("end_time_saturdaySt").disabled = false;
        } else {
            document.getElementById("start_time_saturdaySt").disabled = true;
            document.getElementById("end_time_saturdaySt").disabled = true;
        }

    }

    function showSundaySt() {
        if (document.getElementById('sundayInSt').checked)
        {
            document.getElementById("start_time_sundaySt").disabled = false;
            document.getElementById("end_time_sundaySt").disabled = false;
        } else {
            document.getElementById("start_time_sundaySt").disabled = true;
            document.getElementById("end_time_sundaySt").disabled = true;
        }

    }

//***********************************************************Ceremony****************************************

    function showWithAcC() {
        if (document.getElementById('WithAcC').checked)
        {
            document.getElementById("pricewithacInC").disabled = false;
            document.getElementById("pricewithacOptC").disabled = false;
        } else {
            document.getElementById("pricewithacInC").disabled = true;
            document.getElementById("pricewithacOptC").disabled = true;
        }
    }


    function showLuggageC() {
        if (document.getElementById('luggageInC').checked)
        {
            document.getElementById("luggageChargeC").disabled = false;
            document.getElementById("luggageChargeOptC").disabled = false;
        } else {
            document.getElementById("luggageChargeC").disabled = true;
            document.getElementById("luggageChargeOptC").disabled = true;
        }
    }

    function showWithoutAcC() {
        if (document.getElementById('WithoutAcC').checked)
        {
            document.getElementById("pricewithoutacInC").disabled = false;
            document.getElementById("pricewithoutacOptC").disabled = false;
        } else {
            document.getElementById("pricewithoutacInC").disabled = true;
            document.getElementById("pricewithoutacOptC").disabled = true;
        }
    }

    function showWaitingC() {
        if (document.getElementById('waitingC').checked)
        {
            document.getElementById("waitingInC").disabled = false;
            document.getElementById("waitingChargeOptC").disabled = false;
        } else {
            document.getElementById("waitingInC").disabled = true;
            document.getElementById("waitingChargeOptC").disabled = true;
        }
    }

    //-------------------------------------------------------------------------------------
    //Availability
    function showMondayC() {
        if (document.getElementById('mondayInC').checked)
        {
            document.getElementById("start_time_mondayC").disabled = false;
            document.getElementById("end_time_mondayC").disabled = false;
        } else {
            document.getElementById("start_time_mondayC").disabled = true;
            document.getElementById("end_time_mondayC").disabled = true;
        }
    }


    function showTuesdayC() {
        if (document.getElementById('tuesdayInC').checked)
        {
            document.getElementById("start_time_tuesdayC").disabled = false;
            document.getElementById("end_time_tuesdayC").disabled = false;
        } else {
            document.getElementById("start_time_tuesdayC").disabled = true;
            document.getElementById("end_time_tuesdayC").disabled = true;
        }

    }

    function showWednesdayC() {
        if (document.getElementById('wednesdayInC').checked)
        {
            document.getElementById("start_time_wednesdayC").disabled = false;
            document.getElementById("end_time_wednesdayC").disabled = false;
        } else {
            document.getElementById("start_time_wednesdayC").disabled = true;
            document.getElementById("end_time_wednesdayC").disabled = true;
        }

    }

    function showThursdayC() {
        if (document.getElementById('thursdayInC').checked)
        {
            document.getElementById("start_time_thursdayC").disabled = false;
            document.getElementById("end_time_thursdayC").disabled = false;
        } else {
            document.getElementById("start_time_thursdayC").disabled = true;
            document.getElementById("end_time_thursdayC").disabled = true;
        }

    }

    function showFridayC() {
        if (document.getElementById('fridayInC').checked)
        {
            document.getElementById("start_time_fridayC").disabled = false;
            document.getElementById("end_time_fridayC").disabled = false;
        } else {
            document.getElementById("start_time_fridayC").disabled = true;
            document.getElementById("end_time_fridayC").disabled = true;
        }

    }

    function showSaturdayC() {
        if (document.getElementById('saturdayInC').checked)
        {
            document.getElementById("start_time_saturdayC").disabled = false;
            document.getElementById("end_time_saturdayC").disabled = false;
        } else {
            document.getElementById("start_time_saturdayC").disabled = true;
            document.getElementById("end_time_saturdayC").disabled = true;
        }

    }

    function showSundayC() {
        if (document.getElementById('sundayInC').checked)
        {
            document.getElementById("start_time_sundayC").disabled = false;
            document.getElementById("end_time_sundayC").disabled = false;
        } else {
            document.getElementById("start_time_sundayC").disabled = true;
            document.getElementById("end_time_sundayC").disabled = true;
        }

    }

//----------------------------------------------------------Constructions----------------------------

    function showPriceConstruction() {
        if (document.getElementById('priceInCn').checked)
        {
            document.getElementById("priceCn").disabled = false;
            document.getElementById("priceOptCn").disabled = false;
        } else {
            document.getElementById("priceCn").disabled = true;
            document.getElementById("priceOptCn").disabled = true;
        }
    }

//----------------------------------------------------------Cargo----------------------------

    function showPriceCargo() {
        if (document.getElementById('priceInCg').checked)
        {
            document.getElementById("priceCg").disabled = false;
            document.getElementById("priceOptCg").disabled = false;
        } else {
            document.getElementById("priceCg").disabled = true;
            document.getElementById("priceOptCg").disabled = true;
        }
    }

//-----------------------------------------------------------validation checking--------------------------------------------

    function validateRegEx(regex, input, helpText, helpMessage)
    {
        if (!regex.test(input))
        {
            if (helpText != null)
                helpText.innerHTML = helpMessage;
            return false;
        }
        else
        {
            if (helpText != null)
                helpText.innerHTML = "";
            return true;

        }
    }

    function validateNonEmptyRegNo(inputField, helpText)
    {
        return validateRegEx(/.+/, inputField.value, helpText, "Please enter the registration number");
    }

    function validateNonEmptyCapacity(inputField, helpText)
    {
        return validateRegEx(/.+/, inputField.value, helpText, "Please enter a value");
    }

    function validateNonEmptyVehDescription(inputField, helpText)
    {
        return validateRegEx(/.+/, inputField.value, helpText, "Please enter a description of the vehicle");
    }


    function checkForm(form) {
        if (!validateNonEmptyRegNo(form["regNoin"], form["regNo_help"]) || !validateNonEmptyCapacity(form["capacityin"], form["capacity_help"]) || !validateNonEmptyVehDescription(form["describeVehicle"], form["description_help"])) {
            alert("I'm sorry , please fill all the required fields.");
            return false;
        }
        else {
            return true;
        }
    }

//    function checkForm(form){
//        if (!validateNonEmptyRegNo(form["regNoin"], form["regNo_help"]) || !validateNonEmptyCapacity(form["capacityin"], form["capacity_help"]) || !validateNonEmptyVehDescription(form["describeVehicle"], form["description_help"]));
//            return false;
//        }
//        else{
//            return true;
//        }          
//    }
//    


</script>




