jQuery(document).ready(function($) {
    var elements = document.getElementsByClassName('zoomtracker');
    //open popup
    $('.cd-popup-trigger').on('click', function(event) {
        event.preventDefault();
        $('.cd-popup').addClass('is-visible');
        for (i = 0; i < elements.length; i++) {
            elements[i].style.visibility = 'hidden';
        }
    });

    //close popup
    $('.cd-popup').on('click', function(event) {
        if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
            event.preventDefault();
            $(this).removeClass('is-visible');
            for (i = 0; i < elements.length; i++) {
                elements[i].style.visibility = 'visible';
            }
        }
    });
    //close popup when clicking the esc keyboard button
    $(document).keyup(function(event) {
        if (event.which == '27') {
            $('.cd-popup').removeClass('is-visible');
            for (i = 0; i < elements.length; i++) {
                elements[i].style.visibility = 'visible';
            }
        }
    });
});