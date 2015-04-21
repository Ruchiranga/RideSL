<?php
   mysql_connect('localhost', 'root', '');
    mysql_select_db('ridesl'); 
    $result = mysql_query("SELECT * FROM 'ridesl' WHERE 'parent' = " . mysql_real_escape_string($_GET["parent"]));
    while(($data = mysql_fetch_array($result)) !== false)
        echo '<option value="', $data['id'],'">', $data['name'],'</option>'
?>