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

    var pencil1_count = 0;

    $('#pencil1').click(function() {
        pencil1_count++;

        if (pencil1_count % 2 == 0) {
            var name = $('#name_text').val();
            $('#name_text').replaceWith(function() {
                return '<text id="edit_name">' + name + '</text>';
            });
        } else {
            var name = $('#edit_name').text();
            $('#edit_name').replaceWith(function() {
                return '<input type="text" id="name_text" value="' + name + '"/>';
            });
        }

    });



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



