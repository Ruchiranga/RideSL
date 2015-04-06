
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/buttonstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/hyperlinkstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/labelstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/paragraphstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/dualpanestyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/tablestyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/resultstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/combostyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/checkboxstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/commentpopupstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/commenticonstyle.css">
<link id="zoomcss" rel="stylesheet" href="<?php echo URL; ?>public/css/multizoom.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>


<style>
    .cd-popup{
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(94, 110, 141, 0.9);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
        -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
        transition: opacity 0.3s 0s, visibility 0s 0.3s;
        baseline-shift: super;
    } 

    .cd-popup.is-visible {
        opacity: 1;
        visibility: visible;
        -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
        -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
        transition: opacity 0.3s 0s, visibility 0s 0s;

    }



    <?php
//    if (isset($this->resultList)) {
//        foreach ($this->resultList as $key => $value) {
//            echo '
//.cd-popup' . $value['vehicle_reg_no'] . ' {
//    position: fixed;
//    left: 0;
//    top: 0;
//    height: 100%;
//    width: 100%;
//    background-color: rgba(94, 110, 141, 0.9);
//    opacity: 0;
//    visibility: hidden;
//    -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
//    -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
//    transition: opacity 0.3s 0s, visibility 0s 0.3s;
//    baseline-shift: super;
//}                
//
//.cd-popup' . $value['vehicle_reg_no'] . '.is-visible {
//        opacity: 1;
//        visibility: visible;
//        -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
//        -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
//        transition: opacity 0.3s 0s, visibility 0s 0s;
//        
    //        }';
    //        }
    //    }
    ?>
</style>


</head>
<body>



    <div id = 'frame'>
        <div id = 'body'>

            <div id = 'panel'>
                <div id = "filters" style = "margin-top: 85px;height: 500px;">
                    <div><font style = "color: #2980b9; margin-top: 10px;"> <b> Filter Results</b></font></div>

                    <div style = "margin-top: 20px"><font style = "color: #2980b9;;margin-left: 20px"> Manufacturer | Model</font></div>


                    <div class = "checkbox" style = "padding-left: 40px;padding-top: 20px" data-bind="foreach: { data: manufacturers, as: 'manufacturer' } ">
                        <input data-bind="attr :{id :'check'+$index(), name:$data,value :'check'+$index()}" class = "cbox" type = "checkbox">
                        <label data-bind="attr :{for :'check'+$index()} , text:$data"></label>
                        <div data-bind="attr :{id :'subfill'+$index()}, foreach: { data: $parent.models($data), as: 'model' } " style = "display: none; padding-left: 30px">
                            <input data-bind="attr :{id :'checkmodel'+$data, value :'checkmodel'+$data} , text:$data" class = "cboxsub" type = "checkbox" name = "check">
                            <label data-bind="attr :{for :'checkmodel'+$data} , text:$data" ></label>
                            <br>
                        </div>
                        <br>
                    </div>
                    <div style = "margin-top: 20px"><font style = "color: #2980b9;margin-left: 20px"> Availability</font></div>

                    <div>
                        <table border = "0" style = "margin-top: 18px">
                            <tr>
                                <td>
                                    <font style = "margin-left: 40px;font-weight: bold;font-size: 13px;color: #2980b9;font-family: sans-serif">From</font>
                                </td>
                                <td>
                                    <input type = "text" name = "from" class = "fromtoBox" tabindex = "1"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style = "margin-left: 40px;font-weight: bold;font-size: 13px;color: #2980b9;font-family: sans-serif">To</font>
                                </td>
                                <td>
                                    <input type = "text" name = "to" class = "fromtoBox" tabindex = "1"/>
                                </td>
                            </tr>
                        </table>


                    </div>

                </div>
            </div>

            <div id = 'content'>
                <div id = 'search'>
                    <!--                    <form id="searchBar" action="search/xhrSearch" method="post">-->
                    <input type = "text" name = "search" id = "searchBox" tabindex = "1" value="<?php
                    if (isset($_POST['location'])) {
                        echo $_POST['location'];
                    } else {
                        echo '';
                    }
                    ?>"/>
                    <select name = "search" id = "categoryCombo">
                        <option value = "volvo">Volvo</option>
                        <option value = "saab">Saab</option>
                        <option value = "mercedes">Mercedes</option>
                        <option value = "audi">Audi</option>
                    </select>
                    <input type = "submit" value = "Search" id = "search-button">
                    <!--                    </form>-->
                </div>
                <div id = 'categories'>
                    <table id = "category-table">
                        <tr>
                            <td>Car</td>
                            <td>Nano</td>
                            <td>Trishaw</td>
                        </tr>
                    </table>
                </div>
                <div class = 'resultsPane'>

                    <div id = "sort-bar">
                        <p style = "margin-left: 820px; display: inline-block">Sort : </p>
                        <select name = "search" id = "sort-combo">
                            <option value = "Best Match">Best Match</option>
                            <option value = "Rating">Rating: highest fisrt</option>
                            <option value = "location">Location: closest first</option>
                        </select>
                    </div>
                    
                    <div id="results" data-bind="foreach: { data: vehicles , as: 'vehicle' }">
                        <div class="result">
                            <hr>
                            <div style="margin-left: 6px; margin-right: 6px; ">
                                <font style="color: #2980b9; font-weight: bold; font-size: 17px" data-bind="text: vehicle.manufacturer"></font><font style="color: #2980b9; font-weight: bold; font-size: 17px" data-bind="text: vehicle.model"><br></font>
                            </div>
                            <table  style="width: 100%;" >
                                <tr>
                                    <td style="width: 25%">
                                        <div width ="225px" style="margin-left: 6px; float: left; height: auto; ">
                                            <img class="vehicleimg" data-bind="attr: { id: $index, src :$parent.url+'/public/images/'+vehicle.owner_id+'/'+vehicle.image}" border="0" style="width:225px; height:225px; margin-top: 10px">
                                        </div>
                                    </td>
                                    <td style="vertical-align: top">
                                        <div style="float: left; padding-top: 10px">

                                            <table border="0">
                                                <col width="180">
                                                <col width="800">
                                                <tr>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <font style="color: #2980b9;">Registration No: </font>
                                                    </td>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <text data-bind="text: vehicle.vehicle_reg_no"></text>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <font style="color: #2980b9; ">Vehicle type: </font>
                                                    </td>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <text data-bind="text: vehicle.vehicle_type"></text>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <font style="color: #2980b9; ">Capacity: </font>
                                                    </td>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <text data-bind="text: vehicle.capacity"></text>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <font style="color: #2980b9; ">Description: </font>
                                                    </td>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <text data-bind="text: vehicle.vehicle_description"></text>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <font style="color: #2980b9; ">Price without AC: </font>
                                                    </td>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <text style="font-weight: bold " data-bind="text: 'Rs. '+vehicle.non_ac_price+' '+vehicle.pricing_category"></text>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <font style="color: #2980b9; ">Price with AC: </font>
                                                    </td>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <text style="font-weight: bold " data-bind="text: (vehicle.ac_price == 'Null' || vehicle.ac_price == '' || vehicle.ac_price == '0.0' ) ? 'Not available' : 'Rs. '+vehicle.ac_price+' '+vehicle.pricing_category"> </text>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <font style="color: #2980b9; ">Notes: </font>
                                                    </td>
                                                    <td style="padding-bottom: 6px" valign="top">
                                                        <text data-bind="text: vehicle.descrption"></text>
                                                    </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td style="padding-bottom: 6px" valign="top" data-bind="attr: { rowspan: $parent.getPhoneCount(vehicle.vehicle_reg_no)+1}">
                                                        <font style="color: #2980b9; ">Contact No: </font>
                                                    </td>
                                                    
                                                </tr>
                                                    <!-- ko foreach: vehicle.phone_numbers -->
                                                                <tr>
                                                                    <td style="padding-bottom: 6px" valign="top">
                                                                        <text style="font-weight: bold" data-bind="text: $data"></text>
                                                                    </td>
                                                                </tr>
                                                    <!-- /ko -->    
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <img href="#0" class="cd-popup-trigger" data-bind="attr: { id: 'comment-icon'+vehicle.vehicle_reg_no, src :$parent.url+'/public/images/comment_icon.png'}"  border="0" style="height: 20px;width: 24px; float: right; padding-left: 40px; padding-right: 40px; padding-top: 5px; ">

                                        <div class="cd-popup" data-bind="attr: { id: 'cd-popup'+vehicle.vehicle_reg_no}" role="alert">
                                            <div class="cd-popup-container">
                                                <div style="margin-left: 6px; margin-right: 6px; margin-top: 20px">
                                                    <text id="comments-header"><font style="color: #2980b9; cursor: pointer;margin-left: auto;margin-right: auto; font-weight: bold;font-size: larger">Comments</font></text>
                                                    <hr>
                                                    <div id="comment_panel" style="margin-top: 20px">
                                                        <table border = "0" style="margin: 0 auto;" data-bind="foreach: vehicle.comments">
                                                                <tr>
                                                                    <td>
                                                                        <div style="height: auto; padding-top: 10px;padding-bottom: 10px; margin-left: 30px">
                                                                            <font style="color: #2980b9;" data-bind="text: $data.username+' wrote :'"></font>
                                                                            <br>
                                                                            <span data-bind="text: $data.comment"></span>
                                                                            <br>
                                                                            <font style="color: #2980b9; font-size: 12px" data-bind="text: 'on '+ $data.comment_date"></font>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                        </table>
                                                    </div>
                                                    <hr>
                                                </div>


                                                <a href="#0" class="cd-popup-close img-replace">Close</a>
                                            </div> 
                                        </div> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    
                    <?php
//                    $count = 0;
//                    if (isset($this->resultList)) {
//                        foreach ($this->resultList as $key => $value) {
//                            $count += 1;
//                            echo
//                            '<div class="result">
//                        <hr>
//                        <div style="margin-left: 6px; margin-right: 6px; ">
//                            <font style="color: #2980b9; font-weight: bold; font-size: 17px">' . $value['manufacturer'] . '</font><font style="color: #2980b9; font-weight: bold; font-size: 17px"> ' . $value['model'] . '<br></font>
//                        </div>
//                        <table  style="width: 100%;" >
//                            <tr>
//                                <td style="width: 25%">
//                                    <div width ="225px" style="margin-left: 6px; float: left; height: auto; ">
//                                        <img class="vehicleimg" id="' . $count . '" border="0" src="' . URL . 'public/images/' . $value['owner_id'] . "/" . $value['image'] . '" style="width:225px; height:225px; margin-top: 10px">
//                                    </div>
//                                </td>
//                                <td style="vertical-align: top">
//                                    <div style="float: left; padding-top: 10px">
//
//                                        <table border="0">
//                                            <col width="180">
//                                            <col width="800">
//                                            <tr>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <font style="color: #2980b9;">Registration No: </font>
//                                                </td>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <text>' . $value['vehicle_reg_no'] . '</text>
//                                                </td>
//                                            </tr>
//
//                                            <tr>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <font style="color: #2980b9; ">Vehicle type: </font>
//                                                </td>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <text>' . $value['vehicle_type'] . '</text>
//                                                </td>
//                                            </tr>
//                                            <tr>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <font style="color: #2980b9; ">Capacity: </font>
//                                                </td>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <text>' . $value['capacity'] . '</text>
//                                                </td>
//                                            </tr>
//                                            <tr>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <font style="color: #2980b9; ">Description: </font>
//                                                </td>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <text>' . $value['vehicle_description'] . '</text>
//                                                </td>
//                                            </tr>
//                                            <tr>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <font style="color: #2980b9; ">Price without AC: </font>
//                                                </td>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <text style="font-weight: bold "> Rs. ' . $value['non_ac_price'] . ' ' . $value['pricing_category'] . '</text>
//                                                </td>
//                                            </tr>
//                                            <tr>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <font style="color: #2980b9; ">Price with AC: </font>
//                                                </td>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <text style="font-weight: bold "> Rs. ' . ($ac_price = ($value['ac_price'] == 'Null' || $value['ac_price'] == '' || $value['ac_price'] == '0.0') ? 'Not available' : $value['ac_price']) . ' ' . $value['pricing_category'] . '</text>
//                                                </td>
//                                            </tr>
//                                            <tr>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <font style="color: #2980b9; ">Notes: </font>
//                                                </td>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <text>' . $value['descrption'] . '</text>
//                                                </td>
//                                            </tr>';
//
//                            $numbers = array();
//                            foreach ($this->phoneNumbers as $index => $pair) {
//                                if ($pair['vehicle_reg_no'] == $value['vehicle_reg_no']) {
//                                    $numbers[] = $pair['telephone_number'];
//                                }
//                            }
//
//                            echo '<tr>
//                                                <td rowspan="' . count($numbers) . '" style="padding-bottom: 6px" valign="top">
//                                                    <font style="color: #2980b9; ">Contact No: </font>
//                                                </td>';
//                            foreach ($numbers as $index => $number) {
//
//                                if ($index == 0) {
//                                    echo '<td style="padding-bottom: 6px" valign="top">
//                                                    <text style="font-weight: bold">' . $number . '</text>
//                                                </td>
//                                            </tr>';
//                                } else {
//                                    echo '<tr>
//                                                <td style="padding-bottom: 6px" valign="top">
//                                                    <text style="font-weight: bold">' . $number . '</text>
//                                                </td>
//                                            </tr>';
//                                }
//                            }
//
//
//                            echo '</table>
//
//                                    </div>
//                                </td>
//                            </tr>
//                            <tr>
//                                <td></td>
//                                <td>
//
//                                    <img href="#0" class="cd-popup-trigger" name = "' . $value['vehicle_reg_no'] . '" id="comment-icon' . $value['vehicle_reg_no'] . '" border="0" src="' . URL . 'public/images/comment_icon.png" style="height: 20px;width: 24px; float: right; padding-left: 40px; padding-right: 40px; padding-top: 5px; ">
//
//                                    <div class="cd-popup" id="cd-popup' . $value['vehicle_reg_no'] . '" role="alert">
//                                        <div class="cd-popup-container">
//                                            <div style="margin-left: 6px; margin-right: 6px; margin-top: 20px">
//                                                <text id="comments-header"><font style="color: #2980b9; cursor: pointer;margin-left: auto;margin-right: auto; font-weight: bold;font-size: larger">Comments</font></text>
//                                                <hr>
//                                                <div id="comment_panel" style="margin-top: 20px">
//                                                    <table border = "0" style="margin: 0 auto;">';
//
//                            foreach ($this->comments as $index => $commentdata) {
//                                if ($commentdata['vehicle_reg_no'] == $value['vehicle_reg_no']) {
//                                    echo '
//                                                        <tr>
//                                                            <td>
//                                                                <div style="height: auto; padding-top: 10px;padding-bottom: 10px; margin-left: 30px">
//                                                                    <font style="color: #2980b9;">' . $commentdata['username'] . ' wrote :</font><br>' . $commentdata['comment'] . '
//                                                                    <br><font style="color: #2980b9; font-size: 12px">on ' . $commentdata['comment_date'] . '</font>
//                                                                </div>
//
//                                                            </td>
//                                                        </tr>';
//                                }
//                            }
//                            echo '
//                                                    </table>
//                                                </div>
//                                                <hr>
//                                            </div>
//                                            
//
//                                            <a href="#0" class="cd-popup-close img-replace">Close</a>
//                                        </div> <!-- cd-popup-container -->
//                                    </div> <!-- cd-popup -->
//                                </td>
//                            </tr>
//                        </table>
//                    </div>';
//                        }
//                    }
                    ?>
                    <br><br><br><br><br><br><br><br><br>

                    </body>
                    <script>
<?php
require 'views/search/js/multizoom.js';
?>

                        function resultModel(response) {
                            var self = this;
                            var fullurl = document.URL;
                            
                            self.vehicles = ko.observableArray(response);
//                            self.phonenos = ko.observableArray(response.phone_numbers);
//                            self.comments = ko.observableArray(response.comments);

                            self.url = fullurl.substring(0, fullurl.indexOf("RideSL")+"RideSL".length);
                            
                            self.getPhoneCount = function(regno){
                                for (i = 0; i < self.vehicles().length; i++) { 
                                    if(self.vehicles()[i].vehicle_reg_no === regno){
                                        return self.vehicles()[i].phone_numbers.length;
                                    }
                                }
                                return 0;
                            };
                            
                            self.manufacturers = ko.computed(function() {
                                var manus = [];
                                for (i = 0; i < response.length; i++) { 
                                    if(manus.indexOf(response[i]['manufacturer']) === -1){
                                        manus[manus.length] = response[i]['manufacturer'];
                                    }
                                }
                                
                                return manus;
                            });
                            
                            self.models = function(manufacturer) {
                                var models = [];
                                for (i = 0; i < response.length; i++) { 
                                    if(response[i]['manufacturer'] === manufacturer){
                                        models[models.length] = response[i]['model'];
                                    }
                                }
                                return models;
                            };
                            

                        }

                        function hidetracker() {
                            document.getElementsByClassName('.zoomtracker').style.display = 'none';
                        }

//                        $(".vehicleimg").each(function(){
//                                console.log($(this));
//                                        $(this).addimagezoom({
//                                            zoomrange: [3, 10],
//                                            magnifiersize: [400, 400],
//                                            magnifierpos: 'right',
//                                            cursorshade: true,
//                                            largeimage:'http://localhost/RideSL/public/images/cruz.jpg', 
//                                            disablewheel: true//<-- No comma after last option!
//                                        });
//                            });

                        jQuery(document).ready(function($) {
                            var results;
                            var xmlhttp;
                            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            }
                            else {// code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function() {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                                {
//                                    alert(1);
//                                    console.log(xmlhttp.responseText);
                                    results = jQuery.parseJSON(xmlhttp.responseText);
                                    console.log(results);
//                                    var phone_nos = [];
//                                    var phonenoResults = results.phone_numbers;
                                    ko.applyBindings(new resultModel(results));
                                }
                            }
                            xmlhttp.open("POST", "getResultList", true);
                            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                            xmlhttp.send("location=" + $('#searchBox').val() + "&scheme_category=city_taxi_scheme");


//                            $.get('getResultList', function(o) {
//                                console.log("in the moter fucking func");
//                                console.log(o);
//                            },'json');
//                            $('#search-button').click(function() {
//
//                            });

//                                console.log($(this));
//                                        $(".vehicleimg").addimagezoom({
//                                            zoomrange: [3, 10],
//                                            magnifiersize: [400, 400],
//                                            magnifierpos: 'right',
//                                            cursorshade: true,
//                                            largeimage:'http://localhost/RideSL/public/images/cruz.jpg', 
//                                            disablewheel: true//<-- No comma after last option!
//                                        });
//                            $.each($('.vehicleimg'), function() { 
//                                $(this).addimagezoom({
//                                            zoomrange: [3, 10],
//                                            magnifiersize: [400, 400],
//                                            magnifierpos: 'right',
//                                            cursorshade: true,
//                                            largeimage:'http://localhost/RideSL/public/images/cruz.jpg', 
//                                            disablewheel: true//<-- No comma after last option!
//                                        });
//                            });

//                            $(".vehicleimg").each(function(){
//                                console.log($(this));
//                                        $(this).addimagezoom({
//                                            zoomrange: [3, 10],
//                                            magnifiersize: [400, 400],
//                                            magnifierpos: 'right',
//                                            cursorshade: true,
//                                            largeimage:'http://localhost/RideSL/public/images/cruz.jpg', 
//                                            disablewheel: true//<-- No comma after last option!
//                                        });
//                            });

                            $(document).on("click", ".cbox", function() {

                                var parentid = $(this).attr('id');
                                var num = parentid.replace(/^\D+/g, '');
                                var childid = "#subfill" + num;
                                $(childid).slideToggle("slow");
                                $(childid + " input").css("display", "none");

                            })
//                            $(".cbox").each(function(index) {
//                                $(this).on("click", function() {
//                                    var parentid = $(this).attr('id');
//                                    console.log(parentid);
//                                    var num = parentid.replace(/^\D+/g, '');
//                                    var childid = "#subfill" + num;
//                                    console.log(childid);
//                                    $(childid).slideToggle("slow");
//                                    $(childid + " input").css("display", "none");
//                                });
//                            });

                            var elements = document.getElementsByClassName('zoomtracker');

                            $(document).on("click", ".cd-popup-trigger", function(o) {
//                                console.log(o.target.id.replace("comment-icon", ""));
                                var regno = o.target.id.replace("comment-icon", "");

                                event.preventDefault();
//                                console.log('#cd-popup' + regno);
                                $('#cd-popup' + regno).addClass('is-visible');
                                disable_scroll();
                                $('body').css('overflow', 'hidden');
                                for (i = 0; i < elements.length; i++) {
                                    elements[i].style.visibility = 'hidden';
                                }

                            })
//                            $(".cd-popup-trigger").each(function(index) {
//                                var regno = $(this).attr('name');
//                                $(this).on('click', function(event) {
//                                    event.preventDefault();
//                                    $('#cd-popup' + regno).addClass('is-visible');
//                                    disable_scroll();
//                                    $('body').css('overflow', 'hidden');
//                                    for (i = 0; i < elements.length; i++) {
//                                        elements[i].style.visibility = 'hidden';
//                                    }
//                                });
//                            });

                            $(document).on("click", ".cd-popup", function() {
                                if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
                                    event.preventDefault();
                                    $(this).removeClass('is-visible');
                                    enable_scroll();
                                    $('body').css('overflow', 'auto');
                                    for (i = 0; i < elements.length; i++) {
                                        elements[i].style.visibility = 'visible';
                                    }
                                }
                            })
//                            $(".cd-popup").each(function(index) {
//                                $(this).on('click', function(event) {
//                                    if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
//                                        event.preventDefault();
//                                        $(this).removeClass('is-visible');
//                                        enable_scroll();
//                                        $('body').css('overflow', 'auto');
//                                        for (i = 0; i < elements.length; i++) {
//                                            elements[i].style.visibility = 'visible';
//                                        }
//                                    }
//                                });
//                            });
                            $(document).keyup(function(event) {
                                if (event.which == '27') {
                                    $('.cd-popup').removeClass('is-visible');
                                    enable_scroll();
                                    $('body').css('overflow', 'auto');
                                    for (i = 0; i < elements.length; i++) {
                                        elements[i].style.visibility = 'visible';
                                    }
                                }
                            });




                        });

<?php
//
//echo "jQuery(document).ready(function($) {\n";
//
//$i = 1;
//if (isset($this->resultList)) {
//    foreach ($this->resultList as $key => $value) {
//        echo "$('#" . $i . "').addimagezoom({
//                                        zoomrange: [3, 10],
//                                        magnifiersize: [400, 400],
//                                        magnifierpos: 'right',
//                                        cursorshade: true,
//                                        largeimage:'http://localhost/RideSL/public/images/" . $value['owner_id'] . "/" . $value['image'] . "', 
//                                        disablewheel: true//<-- No comma after last option!
//                                    });\n";
//        $i++;
//    }
//}
//
////echo "});\n";
////
////echo '$(document).ready(function() {';
//foreach ($manufacturers as $key => $value) {
//    echo '
//                                    $("#check' . $key . '").click(function() {
//                                        $("#subfill' . $key . '").slideToggle("slow");
//                                        //window.location.replace("'.URL.'search/resultList?location='.$_GET['location'].'&scheme_category='.$_GET['scheme_category'].'&manufacturer="+'.'$("#check' . $key . '").attr("name"));    
//                                        
//                                    });';
//}
////echo '});';
//
////echo "jQuery(document).ready(function($) {";
//                echo "var elements = document.getElementsByClassName('zoomtracker');\n";
//
//
//if (isset($this->resultList)) {
//    foreach ($this->resultList as $key => $value) {
//        echo "
//                //open popup
//                $('#comment-icon" . $value['vehicle_reg_no'] . "').on('click', function(event) {
//                    event.preventDefault();
//                    $('.cd-popup" . $value['vehicle_reg_no'] . "').addClass('is-visible');
//                    disable_scroll();
//                    $('body').css('overflow', 'hidden');
//                    for (i = 0; i < elements.length; i++) {
//                        elements[i].style.visibility = 'hidden';
//                    }
//                });
//
//                //close popup
//                $('.cd-popup" . $value['vehicle_reg_no'] . "').on('click', function(event) {
//                    if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup" . $value['vehicle_reg_no'] . "')) {
//                        event.preventDefault();
//                        $(this).removeClass('is-visible');
//                        enable_scroll();
//                        $('body').css('overflow', 'auto');
//                        for (i = 0; i < elements.length; i++) {
//                            elements[i].style.visibility = 'visible';
//                        }
//                    }
//                });
//                //close popup when clicking the esc keyboard button
//                $(document).keyup(function(event) {
//                    if (event.which == '27') {
//                        $('.cd-popup" . $value['vehicle_reg_no'] . "').removeClass('is-visible');
//                        enable_scroll();
//                        $('body').css('overflow', 'auto');
//                        for (i = 0; i < elements.length; i++) {
//                            elements[i].style.visibility = 'visible';
//                        }
//                    }
//                });";
//    }
//    echo "});";
//}
?>
                        var keys = [37, 38, 39, 40];
                        function preventDefault(e) {
                            e = e || window.event;
                            if (e.preventDefault)
                                e.preventDefault();
                            e.returnValue = false;
                        }

                        function keydown(e) {
                            for (var i = keys.length; i--; ) {
                                if (e.keyCode === keys[i]) {
                                    preventDefault(e);
                                    return;
                                }
                            }
                        }

                        function wheel(e) {
                            preventDefault(e);
                        }
                        function disable_scroll() {
                            if (window.addEventListener) {
                                window.addEventListener('DOMMouseScroll', wheel, false);
                            }
                            window.onmousewheel = document.onmousewheel = wheel;
                            document.onkeydown = keydown;
                        }

                        function enable_scroll() {
                            if (window.removeEventListener) {
                                window.removeEventListener('DOMMouseScroll', wheel, false);
                            }
                            window.onmousewheel = document.onmousewheel = document.onkeydown = null;
                        }

                    </script>

                    </html>
