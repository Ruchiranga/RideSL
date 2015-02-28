
<link rel="stylesheet" type="text/css" href="public/css/buttonstyle.css">
<link rel="stylesheet" type="text/css" href="public/css/hyperlinkstyle.css">
<link rel="stylesheet" type="text/css" href="public/css/labelstyle.css">
<link rel="stylesheet" type="text/css" href="public/css/paragraphstyle.css">
<link rel="stylesheet" type="text/css" href="public/css/dualpanestyle.css">
<link rel="stylesheet" type="text/css" href="public/css/tablestyle.css">
<link rel="stylesheet" type="text/css" href="public/css/resultstyle.css">
<link rel="stylesheet" type="text/css" href="public/css/combostyle.css">
<link rel="stylesheet" type="text/css" href="public/css/normalize.css">
<link rel="stylesheet" type="text/css" href="public/css/checkboxstyle.css">
<link rel="stylesheet" type="text/css" href="public/css/commentpopupstyle.css">
<link rel="stylesheet" type="text/css" href="public/css/commenticonstyle.css">
<link id="zoomcss" rel="stylesheet" href="public/css/multizoom.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <!--for the popup-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


<script>
    function hidetracker() {
        document.getElementsByClassName(".zoomtracker").style.display = 'none';
    }
</script>

</head>
<body>
    <div id='frame'>
        <div id='body'>

            <div id='panel'>
                <div id="filters" style="margin-top: 85px;height: 500px;">
                    <div><font  style="color: #2980b9; margin-top: 10px;"> <b> Filter Results</b></font></div>

                    <div style="margin-top: 20px"><font  style="color: #2980b9;;margin-left: 20px"> Manufacturer | Model</font></div>
                    <div class="checkbox" style="padding-left: 40px;padding-top: 20px">
                        <input id="check1" class="cbox" type="checkbox" name="check" value="check1">
                        <label for="check1">Toyota</label>
                        <div id="subfill1" style="display: none; padding-left: 30px">
                            <input id="check1-1" class="cboxsub" type="checkbox" name="check" value="check1-1">
                            <label for="check1-1">Prius</label>
                            <br>
                            <input id="check1-2" class="cboxsub" type="checkbox" name="check" value="check1-2">
                            <label for="check1-2">Corolla</label>
                            <br>
                            <input id="check1-3" class="cboxsub" type="checkbox" name="check" value="check1-3">
                            <label for="check1-3">Aqua</label>
                            <br>
                        </div>
                        <br>
                        <input id="check2" class="cbox" type="checkbox" name="check" value="check2">
                        <label for="check2">Micro</label>
                        <div id="subfill2" style="display: none; padding-left: 30px">
                            <input id="check2-1" class="cboxsub" type="checkbox" name="check" value="check1-1">
                            <label for="check2-1">Prius</label>
                            <br>
                            <input id="check2-2" class="cboxsub" type="checkbox" name="check" value="check1-2">
                            <label for="check2-2">Corolla</label>
                            <br>
                            <input id="check2-3" class="cboxsub" type="checkbox" name="check" value="check1-3">
                            <label for="check2-3">Aqua</label>
                            <br>
                        </div>
                        <br>
                        <input id="check3" class="cbox" type="checkbox" name="check" value="check3">
                        <label for="check3">Zuzuki</label>
                        <div id="subfill3" style="display: none; padding-left: 30px">
                            <input id="check3-1" class="cboxsub" type="checkbox" name="check" value="check1-1">
                            <label for="check3-1">Prius</label>
                            <br>
                            <input id="check3-2" class="cboxsub" type="checkbox" name="check" value="check1-2">
                            <label for="check3-2">Corolla</label>
                            <br>
                            <input id="check3-3" class="cboxsub" type="checkbox" name="check" value="check1-3">
                            <label for="check3-3">Aqua</label>
                            <br>
                        </div>
                        <br>
                    </div>
                    <div style="margin-top: 20px"><font  style="color: #2980b9;margin-left: 20px"> Availability</font></div>

                    <div>
                        <table  border = "0" style="margin-top: 18px">
                            <tr>
                                <td>
                                    <font  style="margin-left: 40px;font-weight: bold;font-size: 13px;color: #2980b9;font-family: sans-serif">From</font>
                                </td>
                                <td>
                                    <input type="text" name="from" class="fromtoBox" tabindex="1"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font  style="margin-left: 40px;font-weight: bold;font-size: 13px;color: #2980b9;font-family: sans-serif">To</font>
                                </td>
                                <td>
                                    <input type="text" name="to" class="fromtoBox" tabindex="1"/>
                                </td>
                            </tr>
                        </table>


                    </div>

                </div>
            </div>

            <div id='content'>
                <div id='search'>
                    <input type="text" name="search" id="searchBox" tabindex="1"/>
                    <select name="search" id="categoryCombo">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                    <input type="submit" value="Search" id="search-button">
                </div>
                <div id ='categories'>
                    <table id="category-table">
                        <tr>
                            <td>Car</td>
                            <td>Nano</td> 
                            <td>Trishaw</td>
                        </tr> 
                    </table>
                </div>
                <div class='results'>

                    <div id="sort-bar">
                        <p style="margin-left: 820px; display: inline-block">Sort : </p>
                        <select name="search" id="sort-combo">
                            <option value="Best Match">Best Match</option>
                            <option value="Rating">Rating: highest fisrt</option>
                            <option value="location">Location: closest first</option>
                        </select>
                    </div>


                    <div class="result">
                        <hr>
                        <div style="margin-left: 6px; margin-right: 6px; ">
                            <font style="color: #2980b9; font-weight: bold; font-size: 17px">Chevrolet</font><font style="color: #2980b9; font-weight: bold; font-size: 17px"> Cruz<br></font>
                        </div>
                        <table  style="width: 100%;" >
                            <tr>
                                <td style="width: 25%">
                                    <div width ="225px" style="margin-left: 6px; float: left; height: auto; ">
                                        <img id="cruz" border="0" src="public/images/cruz.jpg" style="width:225px; height:225px; margin-top: 10px">
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
                                                    <text>GA-2345</text>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <font style="color: #2980b9; ">Vehicle type: </font>
                                                </td>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <text>Car</text>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <font style="color: #2980b9; ">Capacity: </font>
                                                </td>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <text>4</text>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <font style="color: #2980b9; ">Description: </font>
                                                </td>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <text>The car has an awesome sound system with full AC. Has so much leg space for the passengers to make the journey a comfortable one.</text>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <font style="color: #2980b9; ">AC Available: </font>
                                                </td>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <text>Yes</text>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <font style="color: #2980b9; ">Price: </font>
                                                </td>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <text style="font-weight: bold ">Rs. 40.00 per km</text>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <font style="color: #2980b9; ">Notes: </font>
                                                </td>
                                                <td style="padding-bottom: 6px" valign="top">
                                                    <text>Safest mode of transport for the cheapest price.</text>
                                                </td>
                                            </tr>
                                        </table>


                                        <!--                                        <font id="schemes" style="color: #2980b9; ">Registered Schemes:<br></font>
                                                                                <text>City Taxi</text><br>
                                                                                <text>Tours</text>-->
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>

                                    <img href="#0" class="cd-popup-trigger" id="comment-icon" border="0" src="public/images/comment_icon.png" style="height: 20px;width: 24px; float: right; padding-left: 40px; padding-right: 40px; padding-top: 5px; ">

                                    <div class="cd-popup" role="alert">
                                        <div class="cd-popup-container">
                                            <div style="margin-left: 6px; margin-right: 6px; margin-top: 20px">
                                                <text id="comments-header"><font style="color: #2980b9; cursor: pointer;margin-left: auto;margin-right: auto; font-weight: bold;font-size: larger">Comments</font></text>
                                                <hr>
                                                <div id="comment_panel" style="margin-top: 20px">
                                                    <table border = "0">
                                                        <tr>
                                                            <td>
                                                                <div style="height: auto; padding-top: 10px;padding-bottom: 10px; margin-left: 30px">
                                                                    <font style="color: #2980b9;">MortalCombat_92</font><br>
                                                                    A high fi radio set up is availiable. The windows are shaded so you can ride without pain of sunlight. As the seating capacity is 4, you can go without any trouble.
                                                                    <br><font style="color: #2980b9; font-size: 12px">December 17, 2014</font>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div style="height: auto;padding-top: 10px; padding-bottom: 10px; margin-left: 30px">
                                                                    <div><font style="color: #2980b9; ">Kitana</font></div>
                                                                    A high fi radio set up is availiable. The windows are shaded so you can ride without pain of sunlight. As the seating capacity is 4, you can go without any trouble.
                                                                    <br><font style="color: #2980b9; font-size: 12px">December 17, 2014</font>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div style="height: auto;padding-top: 10px; padding-bottom: 10px; margin-left: 30px">
                                                                    <div><font style="color: #2980b9; ">Sheeva</font></div>
                                                                    A high fi radio set up is availiable. The windows are shaded so you can ride without pain of sunlight. As the seating capacity is 4, you can go without any trouble.
                                                                    <br><font style="color: #2980b9; font-size: 12px">December 17, 2014</font>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <hr>
                                            </div>
                                            <!--                                            <div>
                                                                                            <div id="non_ac_city_taxi">
                                                                                                <font style="color: #2980b9; ">Non AC</font><br>
                                                                                                <font style="color: #2980b9; ">Price: </font><text>Rs.</text><text>50</text><text> per </text><text> km </text><br>
                                                                                                <font style="color: #2980b9; ">Description: </font><div style="margin-left: 40px; margin-right: 20px; text-align: justify">A high fi radio set up is availiable. The windows are shaded so you can ride without pain of sunlight. As the seating capacity is 4, you can go without any trouble.</div><br>
                                                                                            </div>
                                                                                            <div id="non_ac_city_taxi">
                                                                                                <font style="color: #2980b9; ">AC</font><br>
                                                                                                <font style="color: #2980b9; ">Price: </font><text>Rs.</text><text>60</text><text> per </text><text> km </text><br>
                                                                                                <font style="color: #2980b9; ">Description: </font><div style="margin-left: 40px; margin-right: 20px; text-align: justify">A high fi radio set up is availiable. The windows are shaded so you can ride without pain of sunlight. As the seating capacity is 4, you can go without any trouble.A high fi radio set up is availiable. The windows are shaded so you can ride without pain of sunlight. As the seating capacity is 4, you can go without any trouble.A high fi radio set up is availiable. The windows are shaded so you can ride without pain of sunlight. As the seating capacity is 4, you can go without any trouble.A high fi radio set up is availiable. The windows are shaded so you can ride without pain of sunlight. As the seating capacity is 4, you can go without any trouble.</div><br>
                                                                                            </div>
                                                                                                                                            <div id="avaliability_city_taxi">
                                                                                                                                                <font style="color: #2980b9; ">Availiability</font><br><br>
                                                                                                                                                <font style="color: #2980b9; ">mon</font><text style="margin-left: 20px">From </text><text>05:00</text><text> To </text><text> 17:00 </text><br>
                                                                                                                                                <font style="color: #2980b9; ">tue</font><text style="margin-left: 29px">From </text><text>05:00</text><text> To </text><text> 17:00 </text><br>
                                                                                                                                                <font style="color: #2980b9; ">wed</font><text style="margin-left: 22px">From </text><text>05:00</text><text> To </text><text> 17:00 </text><br>
                                                                                                                                                <font style="color: #2980b9; ">thu</font><text style="margin-left: 28px">From </text><text>05:00</text><text> To </text><text> 17:00 </text><br>
                                                                                                                                                <font style="color: #2980b9; ">fri</font><text style="margin-left: 34px">From </text><text>05:00</text><text> To </text><text> 17:00 </text><br>
                                                                                                                                                <font style="color: #2980b9; ">sat</font><text style="margin-left: 31px">From </text><text>05:00</text><text> To </text><text> 17:00 </text><br>
                                                                                                                                                <font style="color: #2980b9; ">sun</font><text style="margin-left: 26px">From </text><text>05:00</text><text> To </text><text> 17:00 </text><br>
                                                                                                                                            </div>
                                                                                        </div>      -->

                                            <a href="#0" class="cd-popup-close img-replace">Close</a>
                                        </div> <!-- cd-popup-container -->
                                    </div> <!-- cd-popup -->
                                </td>
                            </tr>
                        </table>









                    </div>

                    <div class="result">
                        <hr>
                        <div style="margin-left: 6px; margin-right: 6px; ">
                            <font style="color: #2980b9; font-weight: bold; font-size: 17px">Toyota</font><font style="color: #2980b9; font-weight: bold; font-size: 17px"> Prius<br></font>
                        </div>

                        <table border = "0">
                            <tr>
                                <td>
                                    <div style="margin-left: 6px; float: left; width: 225px; height: auto; ">
                                        <img id="prius" border="0" src="public/images/prius.jpg" style="width:225px;height:225px; margin-top: 10px;">
                                    </div>
                                </td>
                                <td>
                                    <div style="float: left; padding-top: 10px">
                                        <font style="color: #2980b9; margin-top: 10px">Registration No: </font><text>GA-2345</text><br>
                                        <font style="color: #2980b9; ">Vehicle type: </font><text>Car</text><br>
                                        <font style="color: #2980b9; ">Capacity: </font><text>4</text><br><br>
                                        <font style="color: #2980b9; ">Registered Schemes:<br></font>
                                        <text>City Taxi</text><br>
                                        <text>Tours</text>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div id="padding" style="margin-top: 250px"><hr></div>






                </div>


            </div>

        </div><!-- End #body -->
    </div><!-- End #frame -->



</body>
</html>
