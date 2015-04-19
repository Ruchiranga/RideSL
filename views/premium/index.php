
<!DOCTYPE html>
<html>
    <head>
        <title>Admins</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/textboxstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/schemestyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/buttonstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/hyperlinkstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/labelstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/paragraphstyle.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/aboutUs.css">


        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/helpsuport.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/app.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/faqabt/admin.css">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Open+Sans' rel='stylesheet' type='text/css'>

        <!--side bar-->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,600" rel="stylesheet" type="text/css">
        <link href="<?php echo URL; ?>public/css/faqabt/font-awesome.min.css" rel="stylesheet">

        <!--Faq acordian-->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo URL; ?>public/css/faqabt/normalize.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo URL; ?>public/css/faqabt/responsive-accordion.css" rel="stylesheet" type="text/css" media="all" />
        <!--<link href="Styles/style.min.css" rel="stylesheet" type="text/css" media="all" />-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">



    </head>
    <body>



        <div id="doc" class="yui-t1">

            <div id="bd">
                <div id="yui-main">
                    <div class="yui-b" style="margin-left: 25%; ">
                        <div class="content" id="rightContent" style="">
                            <div class="container" style="width: 100%; padding-top: 10px;">

                                <?php foreach ($this->basicInfo as $key => $value) {
                                    ?>
                                    <ul class="responsive-accordion responsive-accordion-default bm-larger">
                                        <li><?php {
                                                $vehicleNo = $value['vehicle_reg_no'];
                                                ?>
                                                <div class="responsive-accordion-head" id="vehicleInfo"><span style="font-weight: bold;"><?php echo $value['vehicle_reg_no']; ?></span><?php echo '   ' . $value['manufacturer'] . ' ' . $value['model']; ?><i class="fa fa-pencil"></i><i class="fa fa-pencil"></i></div>
                                                <div class="responsive-accordion-panel">

                                                    <label class="info"><span style="font-weight: 600;">Owner name : </span><?php echo $value['ownerName']; ?></label><br>
                                                    <label class="info"><span style="font-weight: 600;">Registered date: </span><?php echo $value['date_of_registration']; ?></label><br>
                                                    <label class="info"><span style="font-weight: 600;">Tephone: </span>
                                                        <?php
                                                        foreach ($this->telephoneNo as $key => $value) {
                                                            echo $value['telephone_number'] . ' / ';
                                                        }
                                                        ?>


                                                    </label><br>

                                                    <label class="info"></label><br>
                                                    <hr> <label class="info"></label><br>
                                                    <?php
                                                    if (isset($this->basicPaymentInfo)) {
                                                        foreach ($this->basicPaymentInfo as $key => $value) {
                                                            ?>
                                                            <label class="info"><span style="font-weight: 600;">Amount: </span> <?php echo $value['amount']; ?></label><br>
                                                            <label class="info"><span style="font-weight: 600;">Commencing Date: </span><?php echo $value['commencing_date']; ?></label><br>
                                                            <label class="info"><span style="font-weight: 600;">Period: </span> <?php
                                                                //echo $value['period']; 
                                                                if ($value['period'] >= 12)
                                                                    echo (string) ((int) $value['period'] / 12) . "  year(s)";
                                                                else
                                                                    echo (string) $value['period'] . "  month(s)";
                                                                ?></label><br>
                                                            <label class="info"></label><br>
                                                        <?php } ?><?php
                                                    } else {
                                                        ?><label class="info"><span style="font-weight: 600;">Not a premium Vehicle</span></label><br> <label class="info"></label><br><?php
                                                    }
                                                    ?>
                                                    <?php if (isset($this->basicPaymentInfo)) { ?>
                                                        <form id="premium_form1"  action="<?php echo URL; ?>premium/saveChanges/<?php echo $vehicleNo; ?>" method="post">
                                                            <hr>
                                                            <label class="info" ></label><br>
                                                            Amount(Rs.):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" id="amount1" name="amount" style="padding-left: 40px;padding-right: 40px; width:90px;">
                                                            <br> 
                                                            Commencing date:
                                                            <input type="text" name="commencingDate" id="datepicker1" style="padding-left: 40px;padding-right: 50px;width:80px;">
                                                            <br>
                                                            Duration:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <select id="period1" class="dropdownList" style="" name="period">
                                                                <option value="1">1 months</option>
                                                                <option value="6">6 months</option>
                                                                <option value="12">1 year</option>
                                                                <option value="24">2 years</option>
                                                            </select>
                                                            <br>
                                                            <label class="info"></label><br>
                                                            <input calss="button" id="premium" name="premium" type="submit" value="Save changes" style="width:200px;"></button>

                                                        </form>
                                                    <?php } else { ?>
                                                        <form id="premium_form2"  action="<?php echo URL; ?>premium/addToPremium/<?php echo $vehicleNo; ?>" method="post">
                                                            <hr>
                                                            <label class="info" ></label><br>
                                                            Amount(Rs.):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" name="amount" id="amount" style="padding-left: 40px;padding-right: 40px; width:90px;" >
                                                            <br> 
                                                            Commencing date:
                                                            <input type="text" name="commencingDate" id="datepicker" style="padding-left: 40px;padding-right: 50px;width:80px;">
                                                            <br>
                                                            Duration:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <select class="dropdownList" style=""  id="period" name="period">
                                                                <option value="1">1 months</option>
                                                                <option value="6">6 months</option>
                                                                <option value="12">1 year</option>
                                                                <option value="24">2 years</option>
                                                            </select>
                                                            <br>
                                                            <label class="info"></label><br>
                                                            <input calss="button" id="premium" name="premium" type="submit" value="Add to premium" style="width:200px;"></button>

                                                        </form>
                                                    <?php } ?>


                                                </div>
                                            <?php } ?>
                                        </li>

                                    </ul>
                                <?php } ?>

                            </div>










                        </div>
                    </div>
                </div>

                <div class="yui-b" style="width: 25%;">
                    <div id="secondary">
                        <div id="contentLeft" style="min-height: 690px; width: 100%; position: absolute; background-color: white; border-right: 1px solid black;">

                            <ul id="leftNavigation">

                                <li id="whatIsRidesl" >
                                    <a href="<?php echo URL; ?>search" ><i class="fa fa-search" ></i> Search Vehicle</a>

                                </li>
                                <li id="FAQ" >
                                    <a href="<?php echo URL; ?>admin" ><i class="fa fa-info-circle"></i> Vehicle Info.</a>

                                </li>
                                <li id="ContactUs" >
                                    <a href="<?php echo URL; ?>recentlyAdded"><i class="fa fa-plus-circle"></i> Recently Added vehicles</a>

                                </li>


                            </ul>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.min.js"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/admin.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/jquery.ssd-vertical-navigation.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/app.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/faqabt/helpsupport.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/smoothscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/backbone.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>public/js/faqabt/premium.js" type="text/javascript"></script>
       <!-- <script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
        <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true
                });

            });

            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });

            $("#premium_form1").submit(function(e) {
                var telephoneNo = $('#tel').val();
                var registerNo = $('#regNo').val();
                //amount ,datepicker

                if ($('#amount1').val() == '' || $('#datepicker1').val() == '' || $('#period1').val() == '') {
                    alert('You cannot leave input fields empty!');
                    e.preventDefault(e);


                }
                else if (isNaN($('#amount1').val()) || isNaN($('#period1').val())) {

                    alert('Invalid inputs!');
                    e.preventDefault(e);
                    $('#searchForm')[0].reset();
                }
                else {
                  alert('Update Succesful!');
                     
                }

            });


            //new add to premium
            $("#premium_form2").submit(function(e) {


                if ($('#amount').val() == '' || $('#datepicker').val() == '' || $('#period').val() == '') {
                    alert('You cannot leave input fields empty!');
                    e.preventDefault(e);


                }
                else if (isNaN($('#amount').val()) || isNaN($('#period').val())) {
                    alert('Invalid inputs!');
                    e.preventDefault(e);
                    $('#searchForm')[0].reset();
                }
                else {
                alert('Successfully Added to Premium List!');
                  

                }


            });



        </script>

    </body>


</html>
