<?php

define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','ridesl');
define('DB_USER','root');
define('DB_PASS','');

$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);

if(!$link){
    die('Could not connect: ' . mysql_error());    
}

$db_selected = mysql_select_db(DB_NAME, $link);

if(!$db_selected){
    die('Can\'t use ' . DB_NAME . ': ' .mysql_error());    
}

echo 'Connected succesfully  NANDS';

