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

        <!--        <div style=" width: 310px; height: 40px; text-align: left; float: left;">
                    <img src="<?php echo URL; ?>public/images/registerDr/logo1.png" alt="" style="text-align: left; height: 40px">            
                </div>
            
                <div style=" height: 40px; text-align: right; float: right;">
                    <a href="#" style=" margin-top: 30px; line-height: 40px;">FAQ</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" >About us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" >Sign out</a>&nbsp;&nbsp;
                </div>
        -->
    <div style=" width: 1310px; height: 1x; text-align: right; float: right; line-height: 30px; float: left">   
        You are logged in as <text>Driver&nbsp;</text>
        <!--<a href="#">| Sign out |</a>-->
    </div>

    <!--create connection-->
    <?php
    mysql_connect('localhost', 'root', '');
    mysql_select_db('ridesl');
    echo 'Connected succesfully  NANDS <br>';
    ?>
</head

<body id = "main_body">
    <img src = "<?php echo URL; ?>public/images/registerDr/top.png" alt = "" style = " width: 660px;"/>
    <div id = "form_container" style = " border-left: 1px solid #CCCCCC;  border-right: 1px solid #CCCCCC;  border-top: 1px solid #CCCCCC;  border-bottom: 1px solid #CCCCCC;">
        <h1><a> Add New Vehicle </a></h1>

        <form id = "driverRegister" class = "appnitro" method = "POST" action = "views/driverRegister/dbDriverRegister.php">
            <div class = "form_description">
                <h2><a><center> Add New Vehicle </center></a></h2>
            </div>

            <div align = "center">
                <ul>
                    <!--Registration number-->
                    <li id = "regNo"><label class = "description" for = "element_15">Reg.No </label>
                        <div><input id = "regNoin" name = "regNoin" class = "element text medium" type = "text" maxlength = "255" value = "" /></div>
                    </li>

                    <!--Type of vehicle-->
                    <li id = "type" ><label class = "description" for = "element_17">Type </label>
                        <div>
                            <?php
                            $sql = "SELECT vehicle_type FROM vehicle_type";
                            $result = mysql_query($sql);

                            echo "<select class = 'element select medium' id = 'vehtype' name = 'type'>";
                            while ($row = mysql_fetch_array($result)) {
                                echo "<option value='" . $row['vehicle_type'] . "'>" . $row['vehicle_type'] . "</option>";
                            }
                            echo '</select>';
                            ?>                          
                        </div>	
                    </li>

                    <!--Manufacturer-->
                    <li id="manufacturer"><label class="description" for="element_18">Manufacturer</label>
                        <div>
                            <?php
                            $sql = "SELECT manufacturer FROM brand_model";
                            $result = mysql_query($sql);

                            echo "<select class = 'element select medium' id = 'manufacturer' name = 'manufacturer'>";
                            while ($row = mysql_fetch_array($result)) {
                                echo "<option value='" . $row['manufacturer'] . "'>" . $row['manufacturer'] . "</option>";
                            }
                            echo '</select>';
                            ?>      
                        </div>
                    </li>

                    <!--Model-->
                    <li id="model"><label class="description" for="element_19">Model</label>
                        <div id="modelPane">
                            <?php
                            $sql = "SELECT model FROM brand_model";
                            $result = mysql_query($sql);

                            echo "<select class = 'element select medium' id = 'model' name = 'model';>";
                            while ($row = mysql_fetch_array($result)) {
                                echo "<option value='" . $row['model'] . "'>" . $row['model'] . "</option>";
                            }
                            echo '</select>';
                            ?>      
                        </div>
                    </li>

                    <!--Capacity-->
                    <li id="capacity"><label class="description" for="element_1">Capacity</label>
                        <div><input id="capacityin" name="capacity" class="element text medium" type="text" maxlength="255" value=""/>
                        </div>
                    </li>

                    <!--Vehicle Description-->
                    <li id="describeVehicle"><label class="description" for="element_1">Description of the Vehicle</label>
                        <textarea name="describeVehicle" style ="width : 175px" rows="5"></textarea>                        
                    </li>                

                    <!--Image-->
                    <li id="image"><label class="description" for="element_16">Upload images </label>
                        <div><input id="imagein" name="element_16" class="element file" type="file" /></div>
                    </li>
            </div>

            <!--------------------------------Pricing scheme and availability-------------------------------------->
            <li class="section_break">                        
                <h3>
                    <b><center>Pricing Scheme and Availability</center></b>
                </h3>
                <p><center>Please specify your pricing schemes for each selected category</center></p>
            </li>    

            <!------------------------------------City Taxi------------------------------------------------->
            <li>
                <span>
                    <input id="cityTaxi" type="checkbox"  onclick="showHide()"/> 
                    <b>City Taxi Service</b>
                </span>
            </li>

            <!--******************Pricing scheme***********************-->
            <div id="pricingSchemeTaxi" style="display: none; background-color: beige; padding: 10px; border: 1px dashed #999;">
                <h3><b>Pricing Scheme</b></h3>
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
                        <option>km</option>
                        <option>hour</option> 
                        <option>day</option> 
                    </select>
                </span>	
                <br><br>
                <!--Without AC-->
                <span> 
                    <input id="withoutAcCt" name="withoutAcCt" type="checkbox" onclick="showWithoutAcCt()"/>
                    Price without AC
                </span>
                <br>
                Rs:
                <span>
                    <input id="pricewithoutacInCt" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option2" id ="pricewithoutacOptCt" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Luggage Charges-->
                <span> 
                    <input id="luggageInCt" name="element_26_1" type="checkbox" onclick="showLuggageCt()"/>
                    Luggage Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="luggageChargeCt" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option3" id ="luggageChargeOptCt" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Waiting charges-->
                <span> 
                    <input id="waitingCt" name="element_26_1" type="checkbox" onclick="showWaitingCt()" />
                    Waiting Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="waitingInCt" type="text" disabled=true ></input>
                </span>
                per   	
                <span>
                    <select name="option4" id ="waitingChargeOptCt" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>		
                <br><br>

                <!-- *****************Availability *****************-->
                <li class="section_break">
                    <h3>
                        <b>Availability</b>
                    </h3>
                </li>

                <ul>
                    <!--Monday-->
                    <li id="monday">
                        <span style="width: 500px">
                            <span>                                 
                                <input id="mondayInCt" name="element_26_1" type="checkbox" onclick="showMondayCt()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_mondayCt" disabled=true/> To <input type="time" name="end_time" id ="end_time_mondayCt" disabled=true/>
                            </span>  
                        </span>
                    </li>

                    <!--Tuesday-->
                    <li id="tuesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="tuesdayInCt" name="element_26_1" type="checkbox" onclick="showTuesdayCt()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_tuesdayCt" disabled=true> To <input type="time" name="end_time" id ="end_time_tuesdayCt" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Wednesday-->
                    <li id="wednesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="wednesdayInCt" name="element_26_1" type="checkbox" onclick="showWednesdayCt()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_wednesdayCt" disabled=true> To <input type="time" name="end_time" id ="end_time_wednesdayCt" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Thursday-->
                    <li id="thursday">
                        <span style="width: 500px">
                            <span> 
                                <input id="thursdayInCt" name="element_26_1" type="checkbox" onclick="showThursdayCt()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_thursdayCt" disabled=true> To <input type="time" name="end_time" id ="end_time_thursdayCt" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Friday-->
                    <li id="friday">
                        <span style="width: 500px">
                            <span> 
                                <input id="fridayInCt" name="element_26_1" type="checkbox" onclick="showFridayCt()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_fridayCt" disabled=true> To <input type="time" name="end_time" id ="end_time_fridayCt" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Saturday-->
                    <li id="saturday">
                        <span style="width: 500px">
                            <span> 
                                <input id="saturdayInCt" name="element_26_1" type="checkbox" onclick="showSaturdayCt()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_saturdayCt" disabled=true> To <input type="time" name="end_time" id ="end_time_saturdayCt" disabled=true>
                            </span>  
                        </span>                    
                    </li>

                    <!--Sunday-->
                    <li id="sunday">
                        <span style="width: 500px">
                            <span> 
                                <input id="sundayInCt" name="element_26_1" type="checkbox" onclick="showSundayCt()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_sundayCt" disabled=true> To <input type="time" name="end_time" id ="end_time_sundayCt" disabled=true>
                            </span>  
                        </span>               
                    </li>
                </ul>

            </div> 

            <!------------------------------------Tour service------------------------------------------------->
            <li>
                <span>
                    <input id="tour" name="element_20_1" type="checkbox"  onclick="showHideTour()"/> 
                    <b>Tour Service</b>
                </span>
            </li>

            <!--******************Pricing scheme***********************-->
            <div id="pricingSchemeTour" style="display: none; background-color: beige; padding: 10px; border: 1px dashed #999;">
                <h3><b>Pricing Scheme</b></h3>
                <!--With AC-->
                <span>
                    <input id="WithAcT" name="element_26_1"  type="checkbox" onclick="showWithAcT()"/>
                    Price with AC
                </span>
                <br>
                Rs:
                <span>
                    <input id="pricewithacInT" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option1" id ="pricewithacOptT" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	
                <br><br>
                <!--Without AC-->
                <span> 
                    <input id="withoutAcT" name="element_26_1" type="checkbox" onclick="showWithoutAcT()"/>
                    Price without AC
                </span>
                <br>
                Rs:
                <span>
                    <input id="pricewithoutacInT" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option2" id ="pricewithoutacOptT" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Luggage Charges-->
                <span> 
                    <input id="luggageInT" name="element_26_1" type="checkbox" onclick="showLuggageT()"/>
                    Luggage Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="luggageChargeT" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option3" id ="luggageChargeOptT" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Waiting charges-->
                <span> 
                    <input id="waitingT" name="element_26_1" type="checkbox" onclick="showWaitingT()" />
                    Waiting Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="waitingInT" type="text" disabled=true ></input>
                </span>
                per   	
                <span>
                    <select name="option4" id ="waitingChargeOptT" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>		
                <br><br>

                <!-- *****************Availability *****************-->
                <li class="section_break">
                    <h3>
                        <b>Availability</b>
                    </h3>
                </li>

                <ul>
                    <!--Monday-->
                    <li id="monday">
                        <span style="width: 500px">
                            <span>                                 
                                <input id="mondayInT" name="element_26_1" type="checkbox" onclick="showMondayT()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_mondayT" disabled=true/> To <input type="time" name="end_time" id ="end_time_mondayT" disabled=true/>
                            </span>  
                        </span>
                    </li>

                    <!--Tuesday-->
                    <li id="tuesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="tuesdayInT" name="element_26_1" type="checkbox" onclick="showTuesdayT()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_tuesdayT" disabled=true> To <input type="time" name="end_time" id ="end_time_tuesdayT" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Wednesday-->
                    <li id="wednesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="wednesdayInT" name="element_26_1" type="checkbox" onclick="showWednesdayT()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_wednesdayT" disabled=true> To <input type="time" name="end_time" id ="end_time_wednesdayT" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Thursday-->
                    <li id="thursday">
                        <span style="width: 500px">
                            <span> 
                                <input id="thursdayInT" name="element_26_1" type="checkbox" onclick="showThursdayT()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_thursdayT" disabled=true> To <input type="time" name="end_time" id ="end_time_thursdayT" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Friday-->
                    <li id="friday">
                        <span style="width: 500px">
                            <span> 
                                <input id="fridayInT" name="element_26_1" type="checkbox" onclick="showFridayT()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_fridayT" disabled=true> To <input type="time" name="end_time" id ="end_time_fridayT" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Saturday-->
                    <li id="saturday">
                        <span style="width: 500px">
                            <span> 
                                <input id="saturdayInT" name="element_26_1" type="checkbox" onclick="showSaturdayT()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_saturdayT" disabled=true> To <input type="time" name="end_time" id ="end_time_saturdayT" disabled=true>
                            </span>  
                        </span>                    
                    </li>

                    <!--Sunday-->
                    <li id="sunday">
                        <span style="width: 500px">
                            <span> 
                                <input id="sundayInT" name="element_26_1" type="checkbox" onclick="showSundayT()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_sundayT" disabled=true> To <input type="time" name="end_time" id ="end_time_sundayT" disabled=true>
                            </span>  
                        </span>               
                    </li>
                </ul>


            </div> 

            <!------------------------------------Air Port Drop/Pickup------------------------------------------------->
            <li>
                <span>
                    <input id="airPort" name="element_20_1" type="checkbox"  onclick="showHideAirPort()"/> 
                    <b>Air Port Drop/Pickup</b>
                </span>
            </li>

            <!--******************Pricing scheme***********************-->
            <div id="pricingSchemeAirPort" style="display: none; background-color: beige; padding: 10px; border: 1px dashed #999;">
                <h3><b>Pricing Scheme</b></h3>
                <!--With AC-->
                <span>
                    <input id="WithAcAp" name="element_26_1"  type="checkbox" onclick="showWithAcAp()"/>
                    Price with AC
                </span>
                <br>
                Rs:
                <span>
                    <input id="pricewithacInAp" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option1" id ="pricewithacOptAp" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	
                <br><br>
                <!--Without AC-->
                <span> 
                    <input id="withoutAcAp" name="element_26_1" type="checkbox" onclick="showWithoutAcAp()"/>
                    Price without AC
                </span>
                <br>
                Rs:
                <span>
                    <input id="pricewithoutacInAp" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option2" id ="pricewithoutacOptAp" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Luggage Charges-->
                <span> 
                    <input id="luggageInAp" name="element_26_1" type="checkbox" onclick="showLuggageAp()"/>
                    Luggage Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="luggageChargeAp" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option3" id ="luggageChargeOptAp" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Waiting charges-->
                <span> 
                    <input id="waitingAp" name="element_26_1" type="checkbox" onclick="showWaitingAp()" />
                    Waiting Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="waitingInAp" type="text" disabled=true ></input>
                </span>
                per   	
                <span>
                    <select name="option4" id ="waitingChargeOptAp" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>		
                <br><br>

                <!-- *****************Availability *****************-->
                <li class="section_break">
                    <h3>
                        <b>Availability</b>
                    </h3>
                </li>

                <ul>
                    <!--Monday-->
                    <li id="monday">
                        <span style="width: 500px">
                            <span>                                 
                                <input id="mondayInAp" name="element_26_1" type="checkbox" onclick="showMondayAp()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_mondayAp" disabled=true/> To <input type="time" name="end_time" id ="end_time_mondayAp" disabled=true/>
                            </span>  
                        </span>
                    </li>

                    <!--Tuesday-->
                    <li id="tuesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="tuesdayInAp" name="element_26_1" type="checkbox" onclick="showTuesdayAp()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_tuesdayAp" disabled=true> To <input type="time" name="end_time" id ="end_time_tuesdayAp" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Wednesday-->
                    <li id="wednesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="wednesdayInAp" name="element_26_1" type="checkbox" onclick="showWednesdayAp()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_wednesdayAp" disabled=true> To <input type="time" name="end_time" id ="end_time_wednesdayAp" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Thursday-->
                    <li id="thursday">
                        <span style="width: 500px">
                            <span> 
                                <input id="thursdayInAp" name="element_26_1" type="checkbox" onclick="showThursdayAp()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_thursdayAp" disabled=true> To <input type="time" name="end_time" id ="end_time_thursdayAp" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Friday-->
                    <li id="friday">
                        <span style="width: 500px">
                            <span> 
                                <input id="fridayInAp" name="element_26_1" type="checkbox" onclick="showFridayAp()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_fridayAp" disabled=true> To <input type="time" name="end_time" id ="end_time_fridayAp" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Saturday-->
                    <li id="saturday">
                        <span style="width: 500px">
                            <span> 
                                <input id="saturdayInAp" name="element_26_1" type="checkbox" onclick="showSaturdayAp()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_saturdayAp" disabled=true> To <input type="time" name="end_time" id ="end_time_saturdayAp" disabled=true>
                            </span>  
                        </span>                    
                    </li>

                    <!--Sunday-->
                    <li id="sunday">
                        <span style="width: 500px">
                            <span> 
                                <input id="sundayInAp" name="element_26_1" type="checkbox" onclick="showSundayAp()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_sundayAp" disabled=true> To <input type="time" name="end_time" id ="end_time_sundayAp" disabled=true>
                            </span>  
                        </span>               
                    </li>
                </ul>
            </div> 

            <!------------------------------------Station Drop/Pickup------------------------------------------------->
            <li>
                <span>
                    <input id="station" name="element_20_1" type="checkbox"  onclick="showHideStation()"/> 
                    <b>Station Drop/Pickup</b>
                </span>
            </li>

            <!--******************Pricing scheme***********************-->
            <div id="pricingSchemeStation" style="display: none; background-color: beige; padding: 10px; border: 1px dashed #999;">
                <h3><b>Pricing Scheme</b></h3>
                <!--With AC-->
                <span>
                    <input id="WithAcSt" name="element_26_1"  type="checkbox" onclick="showWithAcSt()"/>
                    Price with AC
                </span>
                <br>
                Rs:
                <span>
                    <input id="pricewithacInSt" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option1" id ="pricewithacOptSt" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	
                <br><br>
                <!--Without AC-->
                <span> 
                    <input id="withoutAcSt" name="element_26_1" type="checkbox" onclick="showWithoutAcSt()"/>
                    Price without AC
                </span>
                <br>
                Rs:
                <span>
                    <input id="pricewithoutacInSt" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option2" id ="pricewithoutacOptSt" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Luggage Charges-->
                <span> 
                    <input id="luggageInSt" name="element_26_1" type="checkbox" onclick="showLuggageSt()"/>
                    Luggage Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="luggageChargeSt" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option3" id ="luggageChargeOptSt" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Waiting charges-->
                <span> 
                    <input id="waitingSt" name="element_26_1" type="checkbox" onclick="showWaitingSt()" />
                    Waiting Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="waitingInSt" type="text" disabled=true ></input>
                </span>
                per   	
                <span>
                    <select name="option4" id ="waitingChargeOptSt" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>		
                <br><br>

                <!-- *****************Availability *****************-->
                <li class="section_break">
                    <h3>
                        <b>Availability</b>
                    </h3>
                </li>

                <ul>
                    <!--Monday-->
                    <li id="monday">
                        <span style="width: 500px">
                            <span>                                 
                                <input id="mondayInSt" name="element_26_1" type="checkbox" onclick="showMondaySt()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_mondaySt" disabled=true/> To <input type="time" name="end_time" id ="end_time_mondaySt" disabled=true/>
                            </span>  
                        </span>
                    </li>

                    <!--Tuesday-->
                    <li id="tuesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="tuesdayInSt" name="element_26_1" type="checkbox" onclick="showTuesdaySt()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_tuesdaySt" disabled=true> To <input type="time" name="end_time" id ="end_time_tuesdaySt" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Wednesday-->
                    <li id="wednesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="wednesdayInSt" name="element_26_1" type="checkbox" onclick="showWednesdaySt()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_wednesdaySt" disabled=true> To <input type="time" name="end_time" id ="end_time_wednesdaySt" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Thursday-->
                    <li id="thursday">
                        <span style="width: 500px">
                            <span> 
                                <input id="thursdayInSt" name="element_26_1" type="checkbox" onclick="showThursdaySt()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_thursdaySt" disabled=true> To <input type="time" name="end_time" id ="end_time_thursdaySt" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Friday-->
                    <li id="friday">
                        <span style="width: 500px">
                            <span> 
                                <input id="fridayInSt" name="element_26_1" type="checkbox" onclick="showFridaySt()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_fridaySt" disabled=true> To <input type="time" name="end_time" id ="end_time_fridaySt" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Saturday-->
                    <li id="saturday">
                        <span style="width: 500px">
                            <span> 
                                <input id="saturdayInSt" name="element_26_1" type="checkbox" onclick="showSaturdaySt()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_saturdaySt" disabled=true> To <input type="time" name="end_time" id ="end_time_saturdaySt" disabled=true>
                            </span>  
                        </span>                    
                    </li>

                    <!--Sunday-->
                    <li id="sunday">
                        <span style="width: 500px">
                            <span> 
                                <input id="sundayInSt" name="element_26_1" type="checkbox" onclick="showSundaySt()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_sundaySt" disabled=true> To <input type="time" name="end_time" id ="end_time_sundaySt" disabled=true>
                            </span>  
                        </span>               
                    </li>
                </ul>

            </div> 

            <!------------------------------------Ceremonial Hires------------------------------------------------->
            <li>
                <span>
                    <input id="ceremony" name="element_20_1" type="checkbox"  onclick="showHideCeremony()"/> 
                    <b>Ceremonial Hires</b>
                </span>
            </li>


            <!--******************Pricing scheme***********************-->
            <div id="pricingSchemeCeremony" style="display: none; background-color: beige; padding: 10px; border: 1px dashed #999;">
                <h3><b>Pricing Scheme</b></h3>
                <!--With AC-->
                <span>
                    <input id="WithAcC" name="element_26_1"  type="checkbox" onclick="showWithAcC()"/>
                    Price with AC
                </span>
                <br>
                Rs:
                <span>
                    <input id="pricewithacInC" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option1" id ="pricewithacOptC" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	
                <br><br>
                <!--Without AC-->
                <span> 
                    <input id="withoutAcC" name="element_26_1" type="checkbox" onclick="showWithoutAcC()"/>
                    Price without AC
                </span>
                <br>
                Rs:
                <span>
                    <input id="pricewithoutacInC" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option2" id ="pricewithoutacOptC" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Luggage Charges-->
                <span> 
                    <input id="luggageInC" name="element_26_1" type="checkbox" onclick="showLuggageC()"/>
                    Luggage Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="luggageChargeC" type="text" disabled=true></input>
                </span>
                per   	
                <span>
                    <select name="option3" id ="luggageChargeOptC" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>	  
                <br><br>
                <!--Waiting charges-->
                <span> 
                    <input id="waitingC" name="element_26_1" type="checkbox" onclick="showWaitingC()" />
                    Waiting Charges 
                </span>
                <br>
                Rs:
                <span>
                    <input id="waitingInC" type="text" disabled=true ></input>
                </span>
                per   	
                <span>
                    <select name="option4" id ="waitingChargeOptC" disabled=true>
                        <option value=".03">3/12 Pitch</option>
                        <option value=".05">4/12 Pitch</option>                
                    </select>
                </span>		
                <br><br>

                <!-- *****************Availability *****************-->
                <li class="section_break">
                    <h3>
                        <b>Availability</b>
                    </h3>
                </li>

                <ul>
                    <!--Monday-->
                    <li id="monday">
                        <span style="width: 500px">
                            <span>                                 
                                <input id="mondayInC" name="element_26_1" type="checkbox" onclick="showMondayC()" />Monday&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_mondayC" disabled=true/> To <input type="time" name="end_time" id ="end_time_mondayC" disabled=true/>
                            </span>  
                        </span>
                    </li>

                    <!--Tuesday-->
                    <li id="tuesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="tuesdayInC" name="element_26_1" type="checkbox" onclick="showTuesdayC()">Tuesday&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_tuesdayC" disabled=true> To <input type="time" name="end_time" id ="end_time_tuesdayC" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Wednesday-->
                    <li id="wednesday">
                        <span style="width: 500px">
                            <span> 
                                <input id="wednesdayInC" name="element_26_1" type="checkbox" onclick="showWednesdayC()">Wednesday&ensp;&ensp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_wednesdayC" disabled=true> To <input type="time" name="end_time" id ="end_time_wednesdayC" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Thursday-->
                    <li id="thursday">
                        <span style="width: 500px">
                            <span> 
                                <input id="thursdayInC" name="element_26_1" type="checkbox" onclick="showThursdayC()">Thursday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_thursdayC" disabled=true> To <input type="time" name="end_time" id ="end_time_thursdayC" disabled=true>
                            </span>  
                        </span>                
                    </li>

                    <!--Friday-->
                    <li id="friday">
                        <span style="width: 500px">
                            <span> 
                                <input id="fridayInC" name="element_26_1" type="checkbox" onclick="showFridayC()">Friday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_fridayC" disabled=true> To <input type="time" name="end_time" id ="end_time_fridayC" disabled=true>
                            </span>  
                        </span>                   
                    </li>

                    <!--Saturday-->
                    <li id="saturday">
                        <span style="width: 500px">
                            <span> 
                                <input id="saturdayInC" name="element_26_1" type="checkbox" onclick="showSaturdayC()">Saturday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_saturdayC" disabled=true> To <input type="time" name="end_time" id ="end_time_saturdayC" disabled=true>
                            </span>  
                        </span>                    
                    </li>

                    <!--Sunday-->
                    <li id="sunday">
                        <span style="width: 500px">
                            <span> 
                                <input id="sundayInC" name="element_26_1" type="checkbox" onclick="showSundayC()">Sunday&ensp;&ensp;&nbsp;&nbsp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <span>
                                From 
                                <input type="time" name="start_time" id ="start_time_sundayC" disabled=true> To <input type="time" name="end_time" id ="end_time_sundayC" disabled=true>
                            </span>  
                        </span>               
                    </li>
                </ul>

            </div> 
            <br>
            <!--Submit Button-->
            <center><input type="submit" value="Register vehicle" class="belize-hole-flat-button" /></center>

        </form>

        <!--Footer-->
        <div id="footer">            
        </div>

    </div>
    <img src="<?php echo URL; ?>public/images/registerDr/bottom.png" alt="" style=" width: 660px;"/>

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
        if (document.getElementById('withoutAcCt').checked)
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
        if (document.getElementById('withoutAcT').checked)
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
        if (document.getElementById('withoutAcAp').checked)
        {
            document.getElementById("pricewithoutacInAp").disabled = false;
            document.getElementById("pricewithoutacOptAp").disabled = false;
        } else {
            document.getElementById("pricewithoutacInAp").disabled = true;
            document.getElementById("pricewithoutacOptAp").disabled = true;
        }
    }

    function showWaitingAp() {
        if (document.getElementById('waitingAp').checked)
        {
            document.getElementById("waitingInAp").disabled = false;
            document.getElementById("waitingChargeOptAp").disabled = false;
        } else {
            document.getElementById("waitingInAp").disabled = true;
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
        if (document.getElementById('withoutAcSt').checked)
        {
            document.getElementById("pricewithoutacInSt").disabled = false;
            document.getElementById("pricewithoutacOptSt").disabled = false;
        } else {
            document.getElementById("pricewithoutacInSt").disabled = true;
            document.getElementById("pricewithoutacOptSt").disabled = true;
        }
    }

    function showWaitingSt() {
        if (document.getElementById('waitingSt').checked)
        {
            document.getElementById("waitingInSt").disabled = false;
            document.getElementById("waitingChargeOptSt").disabled = false;
        } else {
            document.getElementById("waitingInSt").disabled = true;
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
        if (document.getElementById('withoutAcC').checked)
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

    

</script>



