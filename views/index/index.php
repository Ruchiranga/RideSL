

<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/textboxstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/schemestyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/labelstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/paragraphstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/ratingstyle.css">




<!--<script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>-->

</head>

<body>


    <div style=" height: 303px; width: 1230px; padding: 40px; text-align: center"> 

        <form action="#" method="post">
            <br>
            <img src="<?php echo URL;?>public/images/logo1.png" alt=""/>
            <br><br><input type="text" name="name" id="name" tabindex="1" placeholder="Enter pick up location" style="width: 350px; height: 40px;font-family: serif; font-size: 18px; text-align:center;"/>
            <p><input type="submit" value="Find me a ride" class="belize-hole-flat-button" style="width: 200px"></p>
        </form>

        <br>
    </div>

    <div class="content">
        <ul id="sdt_menu" class="sdt_menu">
            <li>
                <a href="#">
                    <img src="<?php echo URL;?>pubic/images/1.jpg" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link">City Taxi</span>
                        <span class="sdt_descr">Find a taxi</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo URL;?>pubic/images/2.jpg" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link" >Tours</span>
                        <span class="sdt_descr">Best choices</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo URL;?>pubic/images/3.jpg" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link">Ceremonial</span>
                        <span class="sdt_descr">Luxury vehicles</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo URL;?>pubic/images/4.jpg" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link">Air port</span>
                        <span class="sdt_descr">Best service</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo URL;?>pubic/images/5.jpg" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link">Station</span>
                        <span class="sdt_descr">Ideal travel</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo URL;?>pubic/images/6.jpg" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link">Cargo</span>
                        <span class="sdt_descr">Best rated</span>
                    </span>
                </a>

            </li>
            <li>
                <a href="#">
                    <img src="<?php echo URL;?>pubic/images/1.jpg" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link">Construction</span>
                        <span class="sdt_descr">Economical</span>
                    </span>
                </a>

            </li>
        </ul>
    </div>

    <!-- The JavaScript -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>public/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript">
        $(function() {
            /**
             * for each menu element, on mouseenter, 
             * we enlarge the image, and show both sdt_active span and 
             * sdt_wrap span. If the element has a sub menu (sdt_box),
             * then we slide it - if the element is the last one in the menu
             * we slide it to the left, otherwise to the right
             */
            $('#sdt_menu > li').bind('mouseenter', function() {
                var $elem = $(this);
                $elem.find('img')
                        .stop(true)
                        .animate({
                            'width': '187px',
                            'height': '187px',
                            'left': '0px'
                        }, 400, 'easeOutBack')
                        .andSelf()
                        .find('.sdt_wrap')
                        .stop(true)
                        .animate({'top': '108px'}, 500, 'easeOutBack')
                        .andSelf()
                        .find('.sdt_active')
                        .stop(true)
                        .animate({'height': '170px'}, 300, function() {
                            var $sub_menu = $elem.find('.sdt_box');
                            if ($sub_menu.length) {
                                var left = '170px';
                                if ($elem.parent().children().length == $elem.index() + 1)
                                    left = '-170px';
                                $sub_menu.show().animate({'left': left}, 200);
                            }
                        });
            }).bind('mouseleave', function() {
                var $elem = $(this);
                var $sub_menu = $elem.find('.sdt_box');
                if ($sub_menu.length)
                    $sub_menu.hide().css('left', '0px');

                $elem.find('.sdt_active')
                        .stop(true)
                        .animate({'height': '0px'}, 300)
                        .andSelf().find('img')
                        .stop(true)
                        .animate({
                            'width': '0px',
                            'height': '0px',
                            'left': '85px'}, 400)
                        .andSelf()
                        .find('.sdt_wrap')
                        .stop(true)
                        .animate({'top': '25px'}, 500);
            });
        });
    </script>

</body>
</html>
