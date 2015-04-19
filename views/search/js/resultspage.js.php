<?php

echo "jQuery(document).ready(function($) {";

$i = 1;
if (isset($this->resultList)) {
    foreach ($this->resultList as $key => $value) {
        echo "$('#" . $i . "').addimagezoom({// single image zoom
        zoomrange: [3, 10],
        magnifiersize: [400, 400],
        magnifierpos: 'right',
        cursorshade: true,
        largeimage:'http://localhost/RideSL/public/images/cruz.jpg', 
        disablewheel: true//<-- No comma after last option!
    });\n";
    }
}

echo "});\n";

echo '$(document).ready(function() {

    $("#check1").click(function() {
        $("#subfill1").slideToggle("slow");
    });
    $("#check2").click(function() {
        $("#subfill2").slideToggle("slow");
    });
    $("#check3").click(function() {
        $("#subfill3").slideToggle("slow");
    });
});';

