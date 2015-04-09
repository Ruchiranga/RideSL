
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

</style>


</head>
<body>
    <div id = 'frame'>
        <div id = 'body'>

            <div id = 'panel'>
                <div id = "filters" style = "margin-top: 85px;height: 500px;">
                    <div><font style = "color: #2980b9; margin-top: 10px;"> <b> Filter Results</b></font></div>
                    
                    <div style = "margin-top: 20px"><font style = "color: #2980b9;;margin-left: 20px"> Vehicle Type</font></div>


                    <div class = "checkbox" style = "padding-left: 40px;padding-top: 20px" data-bind="foreach: types ">
                        <input data-bind="attr :{id :'typecheck'+$index(), name:$data,value :'typecheck'+$index()}" class = "cboxtypes" type = "checkbox">
                        <label data-bind="attr :{for :'typecheck'+$index()} , text:$data"></label>
                        <br>
                    </div>
                    

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
                        <div class="result" data-bind="visible: $parent.isVisible(vehicle.vehicle_reg_no)">
                            <hr>
                            <div style="margin-left: 6px; margin-right: 6px; ">
                                <font style="color: #2980b9; font-weight: bold; font-size: 17px" data-bind="text: vehicle.manufacturer"></font>&nbsp;<font style="color: #2980b9; font-weight: bold; font-size: 17px" data-bind="text: vehicle.model"><br></font>
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

                    <br><br><br><br><br><br><br><br><br>

                    </body>
                    <script>
<?php
require 'views/search/js/multizoom.js';
?>

                        function resultModel(response) {
                            var self = this;
                            var fullurl = document.URL;

                            self.response = response;
                            ko.computed(function() {
                                for (i = 0; i < self.response.length; i++) {
                                    response[i]['visible'] = true;
                                }

                            });

                            self.vehicles = ko.observableArray(self.response);



                            self.url = fullurl.substring(0, fullurl.indexOf("RideSL") + "RideSL".length);

                            self.getPhoneCount = function(regno) {
                                for (i = 0; i < self.vehicles().length; i++) {
                                    if (self.vehicles()[i].vehicle_reg_no === regno) {
                                        return self.vehicles()[i].phone_numbers.length;
                                    }
                                }
                                return 0;
                            };

                            self.manufacturers = ko.computed(function() {
                                var manus = [];
                                for (i = 0; i < response.length; i++) {
                                    if (manus.indexOf(response[i]['manufacturer']) === -1) {
                                        manus[manus.length] = response[i]['manufacturer'];
                                    }
                                }

                                return manus;
                            });
                            
                            self.types = ko.computed(function() {
                                var types = [];
                                for (i = 0; i < response.length; i++) {
                                    if (types.indexOf(response[i]['vehicle_type']) === -1) {
                                        types[types.length] = response[i]['vehicle_type'];
                                    }
                                }

                                return types;
                            });

                            self.models = function(manufacturer) {
                                var models = [];
                                for (i = 0; i < response.length; i++) {
                                    if (response[i]['manufacturer'] === manufacturer) {
                                        models[models.length] = response[i]['model'];
                                    }
                                }
                                return models;
                            };

                            self.isVisible = function(vehicle_reg_no) {
                                for (i = 0; i < self.vehicles().length; i++) {
                                    if (self.vehicles()[i]['vehicle_reg_no'] === vehicle_reg_no) {
                                        return self.vehicles()[i]['visible'];
                                    }
                                }
                            };

                            var manuFilters = [];
                            var typeFilters = [];
                            var modelFilters = [];
                            
                            self.processFilters = function(){
                                
                                if (manuFilters.length === 0 && typeFilters.length === 0) {
                                    for (i = 0; i < self.vehicles().length; i++) {
                                        self.vehicles()[i]['visible'] = true;
                                    }
                                } else if(manuFilters.length === 0 && typeFilters.length > 0) {
                                    for (i = 0; i < self.vehicles().length; i++) {
                                        if (typeFilters.indexOf(self.vehicles()[i]['vehicle_type']) > -1 ) {
                                            self.vehicles()[i]['visible'] = true;
                                        } else {
                                            self.vehicles()[i]['visible'] = false;
                                        }
                                    }
                                }else if(manuFilters.length > 0 && modelFilters.length === 0 && typeFilters.length === 0 ) {
                                    for (i = 0; i < self.vehicles().length; i++) {
                                        if (manuFilters.indexOf(self.vehicles()[i]['manufacturer']) > -1 ) {
                                            self.vehicles()[i]['visible'] = true;
                                        } else {
                                            self.vehicles()[i]['visible'] = false;
                                        }
                                    }
                                }else if(manuFilters.length > 0 && modelFilters.length === 0 && typeFilters.length > 0 ) {
                                    for (i = 0; i < self.vehicles().length; i++) {
                                        if (manuFilters.indexOf(self.vehicles()[i]['manufacturer']) > -1 && typeFilters.indexOf(self.vehicles()[i]['vehicle_type']) > -1) {
                                            self.vehicles()[i]['visible'] = true;
                                        } else {
                                            self.vehicles()[i]['visible'] = false;
                                        }
                                    }
                                }else if(manuFilters.length > 0 && modelFilters.length > 0 && typeFilters.length === 0 ) {
                                    for (i = 0; i < self.vehicles().length; i++) {
                                        if (manuFilters.indexOf(self.vehicles()[i]['manufacturer']) > -1 && modelFilters.indexOf(self.vehicles()[i]['model']) > -1) {
                                            self.vehicles()[i]['visible'] = true;
                                        } else {
                                            self.vehicles()[i]['visible'] = false;
                                        }
                                    }
                                }else if(manuFilters.length > 0 && modelFilters.length > 0 && typeFilters.length > 0 ) {
                                    for (i = 0; i < self.vehicles().length; i++) {
                                        if (manuFilters.indexOf(self.vehicles()[i]['manufacturer']) > -1 && modelFilters.indexOf(self.vehicles()[i]['model']) > -1 && typeFilters.indexOf(self.vehicles()[i]['vehicle_type']) > -1) {
                                            self.vehicles()[i]['visible'] = true;
                                        } else {
                                            self.vehicles()[i]['visible'] = false;
                                        }
                                    }
                                }else{
                                    console.log('impossible!');
                                }
                                self.vehicles.valueHasMutated();
                            };
                            
                            self.filterByManufacturer = function(manufacturer, checked) {
                                if (checked) {
                                    manuFilters.push(manufacturer);
                                } else {
                                    var index = manuFilters.indexOf(manufacturer);
                                    if (index > -1) {
                                        manuFilters.splice(index, 1);
                                    }
                                }
                                self.processFilters();
                            };
                            
                            self.filterByType = function(type, checked) {
                                if (checked) {
                                    typeFilters.push(type);
                                } else {
                                    var index = typeFilters.indexOf(type);
                                    if (index > -1) {
                                        typeFilters.splice(index, 1);
                                    }
                                }
                                self.processFilters();
                            };
                            
                            self.filterByModel = function(model, checked) {
                                if (checked) {
                                    modelFilters.push(model);
                                } else {
                                    var index = modelFilters.indexOf(model);
                                    if (index > -1) {
                                        modelFilters.splice(index, 1);
                                    }
                                }
                                self.processFilters();
                            };

                        }

                        function hidetracker() {
                            document.getElementsByClassName('.zoomtracker').style.display = 'none';
                        }

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


                            $(document).on("click", ".cbox", function() {
                                var parentid = $(this).attr('id');
                                var num = parentid.replace(/^\D+/g, '');
                                var childid = "#subfill" + num;
                                $(childid).slideToggle(100, 'swing');
                                if ($(this).context.checked) {
                                    for (j = 0; j < $($(childid)[0]).context.children.length; j += 3) {
                                        $($($(childid)[0]).context.children[j]).trigger("click");
                                    }
                                }else{
                                    for (j = 0; j < $($(childid)[0]).context.children.length; j += 3) {
                                        if($($(childid)[0]).context.children[j].checked === true){
                                            $($($(childid)[0]).context.children[j]).trigger("click");
                                        }
                                    }
                                }
                                
                                $(childid + " input").css("display", "none");

                                var context = ko.contextFor(this);

                                context.$root.filterByManufacturer(context.$data, $(this).context.checked);

////                                console.log(context);
//                                
//                                console.log($($(childid)[0]).context.children[0].checked = false);
//                                console.log($($(childid)[0]).context.children);
////                                console.log($(this));


                            })
                            
                            $(document).on("click", ".cboxtypes", function() {
                                var context = ko.contextFor(this);

                                context.$root.filterByType(context.$data, $(this).context.checked);

                            })

                            $(document).on("click", ".cboxsub", function() {
                                var context = ko.contextFor(this);
                                context.$root.filterByModel(context.$data, $(this).context.checked);
                            })

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
