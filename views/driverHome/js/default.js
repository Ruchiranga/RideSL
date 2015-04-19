var firstName = '';
var lastName = '';
var email = '';
var add_phone_no_count = 0;
var arr = [];

$(document).ready(function() {

    //edit profile

    $('#pencil1').click(function() {
        firstName = $('#edit_first_name').text();
        lastName = $('#edit_last_name').text();

        $('#edit_name').replaceWith(function() {

            var string = "<form onsubmit='return checkName()' id='edit_name_form' name = 'edit_name' method = post action = 'http://localhost/Ridesl/driverHome/editName' >";
            string += '<div style="font-size: 12px; font-weight:bold">First Name</div>';
            string += '<input required id="first_name_text" type="text" name="first_name" value="' + firstName + '" />';
            string += '<div id="first_name_validate" style="font-size: 12px; color:red; font-weight:bold"></div>';
            string += '<div style="font-size: 12px; font-weight:bold">Last Name</div>';
            string += '<input required id="last_name_text" type="text" name="last_name" value="' + lastName + '" />';
            string += '<div id="last_name_validate" style="font-size: 12px; color:red; font-weight:bold"></div>';
            string += '<button>done</button> <a><input onclick="fullNameCancel()" type="button" id="cancel_btn" value="cancel"></a>';

            string += "</form>";
            return string;
        });
    });

    $('#pencil3').click(function() {
        email = $('#edit_email').text();
        $('#edit_email').replaceWith(function() {
            var string = '<form onsubmit="return checkEmail()" id="edit_email_form" name = "edit_email" method = post action = "http://localhost/Ridesl/driverHome/editEmail" >';
            string += '<input required type="text" id="email_text" name="email" value="' + email + '" />';
            string += '<div id="email_validate" style="font-size: 12px; color:red; font-weight:bold"></div>';
            string += '<div style="font-size: 13px;"><button id="done_email">done</button> <input onclick="emailCancel()" type="button" id="cancel_btn" value="cancel"></a></div>';
            string += "</form>";
            return string;
        });
    });

    $('#add_phone').click(function() {
        if (add_phone_no_count === 0) {
            var profileDiv = $("#phone_numbers");
            var string = '<form  onsubmit="return checkPhoneNo()" id="edit_phone_no_form" name = "add_phone_no" method = post action = "http://localhost/Ridesl/driverHome/addPhoneNo" >';
            string += '<input required type="text" name="phone_no" id="add_new_phone_text" onkeypress="return isNumber(event)" onkeyup="limitText(this,10)" placeholder="Add new phone no.""/> ';
            string += '<div id="phone_validate" style="font-size: 12px; color:red; font-weight:bold"></div>';
            string += '<button>done</button> <input onclick="phoneNoCancel()" type="button" id="cancel_btn" value="cancel" ></a>';

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

function changePhone($id) {
    var phone_no = $('#text_phoneNo'+$id).text().trim();
    arr.push(phone_no);
    var $index = arr.length - 1;
    $('#text_phone'+$id).replaceWith(function() {
        var data = $id+' '+phone_no;
        var string = '<form  onsubmit="return checkUpdatePhoneNo('+$id+')" id="edit_phone_no_form'+$id+'" name = "add_phone_no" method = post action = "http://localhost/Ridesl/driverHome/updatePhoneNo/'+data+'" >';
        string += '<input required type="text" value="'+phone_no+'" name="phone_no'+$id+'" id="update_new_phone_text'+$id+'" onkeypress="return isNumber(event)" onkeyup="limitText(this,10)"/> ';
        string += '<div id="phone_validate'+$id+'" style="font-size: 12px; color:red; font-weight:bold"></div>';
        string += '<div style="font-size: 13px;"><button>done</button> <input onclick="updatePhoneNoCancel('+$id+','+$index+')" type="button" id="cancel_btn" value="cancel" ></a></div>';
        string += "</form>";
        return string;
    });
}

//cancelation

function fullNameCancel() {
    $('#edit_name_form').replaceWith(function() {
        return "<div id='edit_name'><font id='edit_first_name'>" + firstName + "</font> <font id='edit_last_name'>" + lastName + "</font></div>";
    });
}

function emailCancel() {
    $('#edit_email_form').replaceWith(function() {
        return '<text id="edit_email">' + email + '</text>';
    });
}

function phoneNoCancel() {
    $('#edit_phone_no_form').replaceWith(function() {
        add_phone_no_count--;
        return '';
    });
}

function updatePhoneNoCancel($id, $index) {
    var dltNo = document.getElementById('dltNo'+$id).value;
    $('#edit_phone_no_form'+$id).replaceWith(function() {
        var string = '<div id="text_phone'+$id+'">';
        string += '<font id="text_phoneNo'+$id+'">' +arr[$index]+'<font><font> </font>';
        string += '<img onclick="changePhone('+$id+')" id = "phone'+$id+'" src="http://localhost/Ridesl/public/images/pencil.png" alt="" style="height: 13px; width: 13px; cursor:pointer"/><font> </font>';
        string += '<a href="http://localhost/Ridesl/driverHome/dltPhoneNo/'+dltNo+'"><img onclick="return confirm(\'Are you sure you want to delete phone no '+dltNo+'?\');" id = "dlt_phone'+$id+'" src="http://localhost/Ridesl/public/images/dlt.png" alt="" style="height: 13px; width: 13px; cursor:pointer"/></a>';
        string += '</div>';
        return string;
    });
}

//validation

function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function checkUpdatePhoneNo($id) {
    var phoneno = document.getElementById('update_new_phone_text'+$id);
    
    var phoneno_text = document.getElementById('update_new_phone_text'+$id).value;
    if (phoneno_text.charAt(0) !== '0') {
        document.getElementById('phone_validate'+$id).innerHTML = "Phone number should start with 0.";
        phoneno.focus;
        return false;
    } else if (phoneno_text.length !== 10) {
        document.getElementById('phone_validate'+$id).innerHTML = "Phone number should contain 10 digits.";
        phoneno.focus;
        return false;
    }
    else
    {
        return true;
    }
}

function checkName() {
    var firstNameText = document.getElementById('first_name_text');
    var lastNameText = document.getElementById('last_name_text');
    var firstName = document.getElementById('first_name_text').value;
    var lastName = document.getElementById('last_name_text').value;
    var name = /^[A-Za-z\s]+$/;

    if (!name.test(firstName) && !name.test(lastName))
    {
        document.getElementById('first_name_validate').innerHTML = "First Name should contain only A-Z & a-z characters.";
        document.getElementById('last_name_validate').innerHTML = "Last Name should contain only A-Z & a-z characters.";
        firstNameText.focus();
        return false;
    } else if (!name.test(firstName)) {
        document.getElementById('first_name_validate').innerHTML = "First Name should contain only A-Z & a-z characters.";
        firstNameText.focus();
        return false;
    } else if (!name.test(lastName)) {
        document.getElementById('last_name_validate').innerHTML = "Last Name should contain only A-Z & a-z characters.";
        lastNameText.focus()
        return false;
    } else {
        return true;
    }
}

function checkEmail() {

    var email = document.getElementById('email_text');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
        document.getElementById('email_validate').innerHTML = "Please provide a valid email address.";
        email.focus;
        return false;
    }
    else {
        return true;
    }
}

function checkPhoneNo() {
    var phoneno = document.getElementById('add_new_phone_text');
    var phoneno_text = document.getElementById('add_new_phone_text').value;
    if (phoneno_text.charAt(0) !== '0') {
        document.getElementById('phone_validate').innerHTML = "Phone number should start with 0.";
        phoneno.focus;
        return false;
    } else if (phoneno_text.length !== 10) {
        document.getElementById('phone_validate').innerHTML = "Phone number should contain 10 digits.";
        phoneno.focus;
        return false;
    }
    else
    {
        return true;
    }
}

//Sliding pane

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
        $('.wrapper-dropdown-3').removeClass('active');
    });

});




