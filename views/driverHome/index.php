
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/textboxstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/schemestyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/buttonstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/hyperlinkstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/paragraphstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/dualpanestyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/ratingstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/tooltipstyle.css">

        <!--<script src=".URL;?>public/js/driverhome.js"></script>-->


</head>
<body>

    <div id='frame'>
        <div id='body'>
            <div id='panel'>
                <font style="color: #2980b9; font-size: 18px; font-weight: bold">Personal Profile</font>
                <br><br><font style="color: #2980b9; font-weight: bold">Name &nbsp;</font><img src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px"/>
                <br><font id="edit_name">Kasun Samarasena</font>
                <br><br><font style="color: #2980b9; font-weight: bold">Telphone &nbsp;</font><img src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px"/>
                <br>+94 77 234 4564
                <br>+94 77 222 4334
                <br>+94 78 264 5224
                <br><br><font style="color: #2980b9; font-weight: bold">Email &nbsp;</font><img src="<?php echo URL; ?>public/images/pencil.png" alt="" style="height: 13px; width: 13px"/>
                <br>kasun12@gmail.com
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

            <div>
                <font style="color: #2980b9; font-size: 18px; font-weight: bold">Registered Vehicles</font><hr>
            </div>

            <div id='content' style="padding: 20px">

                <div style="margin-left: 6px; margin-right: 6px; ">
                    <font style="color: #2980b9; font-weight: bold; font-size: 17px">Chevrolet</font><font style="color: #2980b9; font-weight: bold; font-size: 17px"> Cruz<br></font>
                </div>


                <div style="margin-left: 6px; float: left; width: 186px; height: 190px; ">
                    <img src="<?php echo URL; ?>public/images/cruz.jpg" alt="" style="height: 170px; width: 170px; margin-top: 10px"/>

                </div>

                <div style="margin-right: 6px; float: right; width: 840px; height: 190px">
                    <font style="color: #2980b9; margin-top: 10px">Registration No: </font>GA-2345<br>
                    <font style="color: #2980b9; ">Vehicle type: </font>Car<br>
                    <font style="color: #2980b9; ">Capacity: </font>4<br><br>
                    <font style="color: #2980b9; ">Registered Schemes:<br><br></font>
                    City Taxi<br>
                    Tours
                </div>

                <div style="margin-left: 6px; margin-right: 6px; float: bottom">
                    <font style="color: #2980b9; ">View Comments</font>
                    <hr>
                </div>



            </div>

        </div><!-- End #body -->
    </div><!-- End #frame -->



</body>
</html>

