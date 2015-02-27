jQuery(document).ready(function($) {

    $('#cruz').addimagezoom({// single image zoom
        zoomrange: [3, 10],
        magnifiersize: [400, 400],
        magnifierpos: 'right',
        cursorshade: true,
        largeimage: 'public/images/cruz large.jpg', //<-- No comma after last option!
        disablewheel: true
    });

    $('#prius').addimagezoom({// single image zoom
        zoomrange: [4, 4],
        magnifiersize: [400, 400],
        magnifierpos: 'right',
        cursorshade: true,
        largeimage: 'public/images/prius large.jpg' //<-- No comma after last option!
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

