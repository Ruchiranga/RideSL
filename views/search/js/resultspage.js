jQuery(document).ready(function($) {


    $('#cruz').addimagezoom({// single image zoom
        zoomrange: [3, 10],
        magnifiersize: [400, 400],
        magnifierpos: 'right',
        cursorshade: true,
        largeimage:'http://localhost/RideSL/public/images/cruz.jpg', 
        disablewheel: true//<-- No comma after last option!
    });

    $('#prius').addimagezoom({// single image zoom
        zoomrange: [3, 10],
        magnifiersize: [400, 400],
        magnifierpos: 'right',
        cursorshade: true,
        disablewheel: true,
        largeimage: 'http://localhost/RideSL/public/images/prius_large.jpg' //<-- No comma after last option!
    });



});
$(document).ready(function() {

    $("#check1").click(function() {
        $("#subfill1").slideToggle("slow");
    });
    $("#check2").click(function() {
        $("#subfill2").slideToggle("slow");
    });
    $("#check3").click(function() {
        $("#subfill3").slideToggle("slow");
    });
});

