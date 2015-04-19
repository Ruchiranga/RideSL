<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('ridesl');
echo 'Connected succesfully  NANDS <br>';


//$regNo = $_POST['regNoin'];
//$type = $_POST['type'];
//$manufacturer = $_POST['manufacturer'];
//$model = $_POST['model'];
//$capacity = $_POST['capacity'];
//$describeVehicle = $_POST['describeVehicle'];
//$isActive = 1;
//$ownerid = 234;
//
//$sql = "INSERT INTO vehicle VALUES ('$regNo','$type','$manufacturer','$model','$capacity','$describeVehicle','$isActive','$ownerid')";

if(isset($_POST['WithAcCt'])) {
    
    echo 'agdajsgdjag';
    $ac_availability = 1;
    $price = $_POST['pricewithacInCt'];
    $pricing_category = $_POST['pricewithacOptCt'];
    $description = NULL;
    $category = 'taxi';

    $sql = "INSERT INTO scheme ('ac_availability','price','pricing_category','category') VALUES ('$ac_availability','$price','$pricing_category','$category')";
//    INSERT INTO scheme ('ac_availability','price','pricing_category','category') VALUES  ('1','5076','km','taxi')
    if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    }
}



//if (!mysql_query($sql)) {
//    die('Error: ' . mysql_error());
//}

