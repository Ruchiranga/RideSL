$(document).ready(function() {

    $("#flip").bind('mouseenter', function() {
        $("#flip").css('textDecoration', 'underline');
    });

    $("#flip").bind('mouseleave', function() {
        $("#flip").css('textDecoration', 'none');
    });

    $("#flip").click(function() {
        $("#sliding_panel").slideToggle("slow");
    });

    $("#comments").bind('mouseenter', function() {
        $("#comments").css('textDecoration', 'underline');
    });

    $("#comments").bind('mouseleave', function() {
        $("#comments").css('textDecoration', 'none');
    });

    $("#comments").click(function() {
        $("#sliding_comment_panel").slideToggle("slow");
    });

//    var pencil1_count = 0;

    $('#pencil1').click(function() {
//        pencil1_count++;
//
//        if (pencil1_count % 2 == 0) {
//            var name = $('#name_text').val();
//            $('#name_text').replaceWith(function() {
//                return '<text id="edit_name">' + name + '</text>';
//            });
//        } else {
        var name = $('#edit_name').text();
        $('#edit_name').replaceWith(function() {

            var string = "<form name = 'edit_name' method = post action = 'http://localhost/Ridesl/driverHome/editName' >";
            string += '<input type="text" name="full_name" value="' + name + '" />';
            string += "</form>";
            return string;
        });
//        }

    });




//    var pencil3_count = 0;

    $('#pencil3').click(function() {
//        pencil3_count++;
//
//        if (pencil3_count % 2 == 0) {
//            var email = $('#email_text').val();
//            $('#email_text').replaceWith(function() {
//                return '<text id="edit_email">' + email + '</text>';
//            });
//        } else {
        var email = $('#edit_email').text();
        $('#edit_email').replaceWith(function() {
            var string = "<form name = 'edit_email' method = post action = 'http://localhost/Ridesl/driverHome/editEmail' >";
            string += '<input type="text" name="email" value="' + email + '" />';
            string += "</form>";
            return string;
        });
//        }

    });

    var add_phone_no_count = 0;

    $('#add_phone').click(function() {
        if (add_phone_no_count === 0) {
            var profileDiv = $("#phone_numbers");
            var string = "<form name = 'add_phone_no' method = post action = 'http://localhost/Ridesl/driverHome/addPhoneNo' >";
            string += '<input type="text" name="phone_no" id="add_new_phone_text" placeholder="Add new phone no.""/> ';
//            string += '<font id = "cancel"> Cancel</font>';
            string += '<img id = "cancel" src="http://localhost/Ridesl/public/images/pencil.png" alt="" style="height: 13px; width: 13px" onclick="http://localhost/Ridesl/public/js/driverhome.js/cancelEvent(this)"/>';
            string += "</form>";
            profileDiv.append(string);
            add_phone_no_count++;
        }
    });

    function changeText(id) {

        $('#add_new_phone_text').replaceWith(function() {
            return '';
        });
        $('#cancel').replaceWith(function() {
            return '';
        });

        add_phone_no_count = 0;
    }

});

//////////////////////////////////////////////////////////////////////////////////////////////////////////

function DropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('ul.dropdown > li');
    this.val = '';
    this.index = -1;
    this.initEvents();
}
DropDown.prototype = {
    initEvents: function() {
        var obj = this;

        obj.dd.on('click', function(event) {
            $(this).toggleClass('active');
            return false;
        });

//        obj.opts.on('click', function() {
//            var opt = $(this);
//            obj.val = opt.text();
//            obj.index = opt.index();
//            obj.placeholder.text(obj.val);
//        });
    },
    getValue: function() {
        return this.val;
    },
    getIndex: function() {
        return this.index;
    }
}

$(function() {

    var dd = new DropDown($('#dd'));
    $(document).click(function() {
        // all dropdowns
        $('.wrapper-dropdown-3').removeClass('active');
    });

});





