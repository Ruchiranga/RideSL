<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('ridesl');
echo 'Connected succesfully  NANDS <br>';


$regNo = $_POST['regNoin'];
$type = $_POST['type'];
$manufacturer = $_POST['manufacturer'];
$model = $_POST['model'];
$capacity = $_POST['capacity'];
$describeVehicle = $_POST['describeVehicle'];
$isActive = 1;
$ownerid = 1;


$sql = "INSERT INTO vehicle(vehicle_reg_no,vehicle_type,manufacturer,model,capacity,vehicle_description, isActive,owner_id,image) VALUES ('$regNo','$type','$manufacturer','$model','$capacity','$describeVehicle','$isActive','$ownerid','jhdjh.jpg')";
if (!mysql_query($sql)) {
    die('Error: ' . mysql_error());
}


//-------------------------------------------------City Taxi-----------------------------------------------------------

if (isset($_POST['cityTaxi'])) {

    $description = $_POST['describeVehicleCt'];
    $category = 'City Taxi Scheme';
    $regNo = $_POST['regNoin'];
    $nonac_price = NULL;
    $ac_price = NULL;

    if (isset($_POST['WithAcCt'])) {

        $pricing_category = $_POST['pricewithacOptCt'];
        $ac_price = $_POST['pricewithacInCt'];
    }
    if (isset($_POST['WithoutAcCt'])) {

        $pricing_category = $_POST['pricewithoutacOptCt'];
        $nonac_price = $_POST['pricewithoutacInCt'];
    }

    $sql = "INSERT INTO scheme(pricing_category,descrption, category, vehicle_reg_no, ac_price, non_ac_price) VALUES ('$pricing_category','$description','$category','$regNo','$ac_price','$nonac_price')";

    if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    }

    //to get the scheme_id
    $sql = mysql_fetch_assoc(mysql_query("SELECT scheme_id FROM scheme WHERE pricing_category = '$pricing_category' AND descrption = '$description' AND category = '$category' AND vehicle_reg_no = '$regNo' AND ac_price = '$ac_price' AND non_ac_price = '$nonac_price'"));
    $scheme_id = $sql["scheme_id"];
    

    if (isset($_POST['mondayInCt'])) {

        $from = $_POST['start_time_mondayCt'];
        $to = $_POST['end_time_mondayCt'];
        $day = 'mon';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['tuesdayInCt'])) {

        $from = $_POST['start_time_tuesdayCt'];
        $to = $_POST['end_time_tuesdayCt'];
        $day = 'tue';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['wednesdayInCt'])) {

        $from = $_POST['start_time_wednesdayCt'];
        $to = $_POST['end_time_wednesdayCt'];
        $day = 'wed';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['thursdayInCt'])) {

        $from = $_POST['start_time_thursdayCt'];
        $to = $_POST['end_time_thursdayCt'];
        $day = 'thu';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['fridayInCt'])) {

        $from = $_POST['start_time_fridayCt'];
        $to = $_POST['end_time_fridayCt'];
        $day = 'fri';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['saturdayInCt'])) {

        $from = $_POST['start_time_saturdayCt'];
        $to = $_POST['end_time_saturdayCt'];
        $day = 'sat';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['sundayInCt'])) {

        $from = $_POST['start_time_sundayCt'];
        $to = $_POST['end_time_sundayCt'];
        $day = 'sun';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }
}

//-------------------------------------------------Tour Service-----------------------------------------------------------

if (isset($_POST['tour'])) {
    $description = $_POST['describeVehicleT'];
    $category = 'Tour Scheme';
    $regNo = $_POST['regNoin'];
    $nonac_price = NULL;
    $ac_price = NULL;

    if (isset($_POST['WithAcT'])) {

        $pricing_category = $_POST['pricewithacOptT'];
        $ac_price = $_POST['pricewithacInT'];
    }
    if (isset($_POST['WithoutAcT'])) {

        $pricing_category = $_POST['pricewithoutacOptT'];
        $nonac_price = $_POST['pricewithoutacInT'];
    }

    $sql = "INSERT INTO scheme(pricing_category,descrption, category, vehicle_reg_no, ac_price, non_ac_price) VALUES ('$pricing_category','$description','$category','$regNo','$ac_price','$nonac_price')";
    if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    }
    
    //to get the scheme_id
    $sql = mysql_fetch_assoc(mysql_query("SELECT scheme_id FROM scheme WHERE pricing_category = '$pricing_category' AND descrption = '$description' AND category = '$category' AND vehicle_reg_no = '$regNo' AND ac_price = '$ac_price' AND non_ac_price = '$nonac_price'"));
    $scheme_id = $sql["scheme_id"];
    

    if (isset($_POST['mondayInT'])) {

        $from = $_POST['start_time_mondayT'];
        $to = $_POST['end_time_mondayT'];
        $day = 'mon';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['tuesdayInT'])) {

        $from = $_POST['start_time_tuesdayT'];
        $to = $_POST['end_time_tuesdayT'];
        $day = 'tue';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['wednesdayInT'])) {

        $from = $_POST['start_time_wednesdayT'];
        $to = $_POST['end_time_wednesdayT'];
        $day = 'wed';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['thursdayInT'])) {

        $from = $_POST['start_time_thursdayT'];
        $to = $_POST['end_time_thursdayT'];
        $day = 'thu';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['fridayInT'])) {

        $from = $_POST['start_time_fridayT'];
        $to = $_POST['end_time_fridayT'];
        $day = 'fri';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['saturdayInT'])) {

        $from = $_POST['start_time_saturdayT'];
        $to = $_POST['end_time_saturdayT'];
        $day = 'sat';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['sundayInT'])) {

        $from = $_POST['start_time_sundayT'];
        $to = $_POST['end_time_sundayT'];
        $day = 'sun';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }
}

//-------------------------------------------------Air Port Drop/Pick up-----------------------------------------------------------

if (isset($_POST['airPort'])) {
    $description = $_POST['describeVehicleAp'];
    $category = 'Airport Drop Pickup Scheme';
    $regNo = $_POST['regNoin'];
    $nonac_price = NULL;
    $ac_price = NULL;

    if (isset($_POST['WithAcAp'])) {
        $pricing_category = $_POST['pricewithacOptAp'];
        $ac_price = $_POST['pricewithacInAp'];
    }
    if (isset($_POST['WithoutAcAp'])) {

        $pricing_category = $_POST['pricewithoutacOptAp'];
        $nonac_price = $_POST['pricewithoutacInAp'];
    }

    $sql = "INSERT INTO scheme(pricing_category,descrption, category, vehicle_reg_no, ac_price, non_ac_price) VALUES ('$pricing_category','$description','$category','$regNo','$ac_price','$nonac_price')";
    if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    }
    
    //to get the scheme_id
    $sql = mysql_fetch_assoc(mysql_query("SELECT scheme_id FROM scheme WHERE pricing_category = '$pricing_category' AND descrption = '$description' AND category = '$category' AND vehicle_reg_no = '$regNo' AND ac_price = '$ac_price' AND non_ac_price = '$nonac_price'"));
    $scheme_id = $sql["scheme_id"];
   
    
    //Luggage charges and waiting charges if any
    if (isset($_POST['luggageInAp']) || isset($_POST['waitingInAp'])) {

        $luggage_price = NULL;
        $waiting_price = NULL;

        if (isset($_POST['luggageInAp'])) {

            $pricing_category = $_POST['luggageChargeOptAp'];
            $luggage_price = $_POST['luggageChargeAp'];
        }

        if (isset($_POST['waitingInAp'])) {

            $pricing_category = $_POST['waitingChargeOptAp'];
            $waiting_price = $_POST['waitingAp'];
        }

        $sql = "INSERT INTO air_port_drop_pickup_scheme(scheme_id, luggage_charge, waiting_charge) VALUES ('$scheme_id','$luggage_price','$waiting_price')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['mondayInAp'])) {

        $from = $_POST['start_time_mondayAp'];
        $to = $_POST['end_time_mondayAp'];
        $day = 'mon';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['tuesdayInAp'])) {

        $from = $_POST['start_time_tuesdayAp'];
        $to = $_POST['end_time_tuesdayAp'];
        $day = 'tue';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['wednesdayInAp'])) {

        $from = $_POST['start_time_wednesdayAp'];
        $to = $_POST['end_time_wednesdayAp'];
        $day = 'wed';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['thursdayInAp'])) {

        $from = $_POST['start_time_thursdayAp'];
        $to = $_POST['end_time_thursdayAp'];
        $day = 'thu';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['fridayInAp'])) {

        $from = $_POST['start_time_fridayAp'];
        $to = $_POST['end_time_fridayAp'];
        $day = 'fri';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['saturdayInAp'])) {

        $from = $_POST['start_time_saturdayAp'];
        $to = $_POST['end_time_saturdayAp'];
        $day = 'sat';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['sundayInAp'])) {

        $from = $_POST['start_time_sundayAp'];
        $to = $_POST['end_time_sundayAp'];
        $day = 'sun';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";

        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }
}

//-------------------------------------------------Station-----------------------------------------------------------

if (isset($_POST['station'])) {
    $description = $_POST['describeVehicleSt'];
    $category = 'Station Drop Pickup Scheme';
    $regNo = $_POST['regNoin'];
    $nonac_price = NULL;
    $ac_price = NULL;

    if (isset($_POST['WithAcSt'])) {

        $pricing_category = $_POST['pricewithacOptSt'];
        $ac_price = $_POST['pricewithacInSt'];
    }
    if (isset($_POST['WithoutAcSt'])) {

        $pricing_category = $_POST['pricewithoutacOptSt'];
        $nonac_price = $_POST['pricewithoutacInSt'];
    }

    $sql = "INSERT INTO scheme(pricing_category,descrption, category, vehicle_reg_no, ac_price, non_ac_price) VALUES ('$pricing_category','$description','$category','$regNo','$ac_price','$nonac_price')";
    if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    }
    
    //to get the scheme_id
    $sql = mysql_fetch_assoc(mysql_query("SELECT scheme_id FROM scheme WHERE pricing_category = '$pricing_category' AND descrption = '$description' AND category = '$category' AND vehicle_reg_no = '$regNo' AND ac_price = '$ac_price' AND non_ac_price = '$nonac_price'"));
    $scheme_id = $sql["scheme_id"];
    

    //Luggage charges and waiting charges if any
    if (isset($_POST['luggageInSt']) || isset($_POST['waitingInSt'])) {

        $luggage_price = NULL;
        $waiting_price = NULL;

        if (isset($_POST['luggageInSt'])) {

            $pricing_category = $_POST['luggageChargeOptSt'];
            $luggage_price = $_POST['luggageChargeSt'];
        }

        if (isset($_POST['waitingInSt'])) {

            $pricing_category = $_POST['waitingChargeOptSt'];
            $waiting_price = $_POST['waitingSt'];
        }

        $sql = "INSERT INTO station_drop_pickup_scheme(scheme_id, luggage_charge, waiting_charge) VALUES ('$scheme_id','$luggage_price','$waiting_price')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }


    if (isset($_POST['mondayInSt'])) {

        $from = $_POST['start_time_mondaySt'];
        $to = $_POST['end_time_mondaySt'];
        $day = 'mon';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['tuesdayInSt'])) {

        $from = $_POST['start_time_tuesdaySt'];
        $to = $_POST['end_time_tuesdaySt'];
        $day = 'tue';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['wednesdayInSt'])) {

        $from = $_POST['start_time_wednesdaySt'];
        $to = $_POST['end_time_wednesdaySt'];
        $day = 'wed';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['thursdayInSt'])) {

        $from = $_POST['start_time_thursdaySt'];
        $to = $_POST['end_time_thursdaySt'];
        $day = 'thu';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['fridayInSt'])) {

        $from = $_POST['start_time_fridaySt'];
        $to = $_POST['end_time_fridaySt'];
        $day = 'fri';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['saturdayInSt'])) {

        $from = $_POST['start_time_saturdaySt'];
        $to = $_POST['end_time_saturdaySt'];
        $day = 'sat';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['sundayInSt'])) {

        $from = $_POST['start_time_sundaySt'];
        $to = $_POST['end_time_sundaySt'];
        $day = 'sun';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }
}

//---------------------------------Ceremonial Hires-----------------------------------------------------

if (isset($_POST['ceremony'])) {
    $description = $_POST['describeVehicleC'];
    $category = 'Ceremonial Scheme';
    $regNo = $_POST['regNoin'];
    $nonac_price = NULL;
    $ac_price = NULL;

    if (isset($_POST['WithAcC'])) {

        $pricing_category = $_POST['pricewithacOptC'];
        $ac_price = $_POST['pricewithacInC'];
    }
    if (isset($_POST['WithoutAcC'])) {

        $pricing_category = $_POST['pricewithoutacOptC'];
        $nonac_price = $_POST['pricewithoutacInC'];
    }

    $sql = "INSERT INTO scheme(pricing_category,descrption, category, vehicle_reg_no, ac_price, non_ac_price) VALUES ('$pricing_category','$description','$category','$regNo','$ac_price','$nonac_price')";
    if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    }
    
    //to get the scheme_id
    $sql = mysql_fetch_assoc(mysql_query("SELECT scheme_id FROM scheme WHERE pricing_category = '$pricing_category' AND descrption = '$description' AND category = '$category' AND vehicle_reg_no = '$regNo' AND ac_price = '$ac_price' AND non_ac_price = '$nonac_price'"));
    $scheme_id = $sql["scheme_id"];
    

    if (isset($_POST['mondayInC'])) {

        $from = $_POST['start_time_mondayC'];
        $to = $_POST['end_time_mondayC'];
        $day = 'mon';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['tuesdayInC'])) {

        $from = $_POST['start_time_tuesdayC'];
        $to = $_POST['end_time_tuesdayC'];
        $day = 'tue';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['wednesdayInC'])) {

        $from = $_POST['start_time_wednesdayC'];
        $to = $_POST['end_time_wednesdayC'];
        $day = 'wed';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['thursdayInC'])) {

        $from = $_POST['start_time_thursdayC'];
        $to = $_POST['end_time_thursdayC'];
        $day = 'thu';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['fridayInC'])) {

        $from = $_POST['start_time_fridayC'];
        $to = $_POST['end_time_fridayC'];
        $day = 'fri';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['saturdayInC'])) {

        $from = $_POST['start_time_saturdayC'];
        $to = $_POST['end_time_saturdayC'];
        $day = 'sat';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }

    if (isset($_POST['sundayInC'])) {

        $from = $_POST['start_time_sundayC'];
        $to = $_POST['end_time_sundayC'];
        $day = 'sun';

        $sql = "INSERT INTO availability(scheme_id, day, start_time, end_time) VALUES ('$scheme_id','$day','$from','$to')";
        if (!mysql_query($sql)) {
            die('Error: ' . mysql_error());
        }
    }
}

//-------------------------------Constructions------------------------------------------------

if (isset($_POST['construction'])) {
    $description = $_POST['describeVehicleCn'];
    $category = 'Construction Scheme';
    $regNo = $_POST['regNoin'];
    $nonac_price = NULL;
    $ac_price = NULL;

    if (isset($_POST['priceInCn'])) {

        $pricing_category = $_POST['pricOptCn'];
        $nonac_price = $_POST['priceCn'];
    }
   
    $sql = "INSERT INTO scheme(pricing_category,descrption, category, vehicle_reg_no, ac_price, non_ac_price) VALUES ('$pricing_category','$description','$category','$regNo','$ac_price','$nonac_price')";
    if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    }
}

//-------------------------------Cargo------------------------------------------------

if (isset($_POST['cargo'])) {
    $description = $_POST['describeVehicleCg'];
    $category = 'Cargo Scheme';
    $regNo = $_POST['regNoin'];
    $nonac_price = NULL;
    $ac_price = NULL;

    if (isset($_POST['priceInCg'])) {

        $pricing_category = $_POST['pricOptCg'];
        $nonac_price = $_POST['priceCg'];
    }
   
    $sql = "INSERT INTO scheme(pricing_category,descrption, category, vehicle_reg_no, ac_price, non_ac_price) VALUES ('$pricing_category','$description','$category','$regNo','$ac_price','$nonac_price')";
    if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    }
}
