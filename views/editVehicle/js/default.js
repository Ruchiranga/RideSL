var firstName = '';
var lastName = '';
var email = '';
var add_phone_no_count = 0;
var arr = [];



$(function() {
    var sampleTags = ['Anuradhapura', 'Pollonnaruwa', 'Galle', 'Matara', 'Hambantota'];

    //-------------------------------
    // Minimal
    //-------------------------------
    $('#myTags').tagit();

    //-------------------------------
    // Single field
    //-------------------------------
    var i = 0;
    for (i = 0; i <= 6; i++) {
        $('#singleFieldTags' + i).tagit({
            availableTags: sampleTags,
            // This will make Tag-it submit a single form value, as a comma-delimited field.
            singleField: true,
            singleFieldNode: $('#mySingleField' + i)
        });
    }


    // singleFieldTags2 is an INPUT element, rather than a UL as in the other 
    // examples, so it automatically defaults to singleField.
    $('#singleFieldTags2').tagit({
        availableTags: sampleTags
    });

    //-------------------------------
    // Preloading data in markup
    //-------------------------------
    $('#myULTags').tagit({
        availableTags: sampleTags, // this param is of course optional. it's for autocomplete.
        // configure the name of the input field (will be submitted with form), default: item[tags]
        itemName: 'item',
        fieldName: 'tags'
    });

    //-------------------------------
    // Tag events
    //-------------------------------
    var eventTags = $('#eventTags');

    var addEvent = function(text) {
        $('#events_container').append(text + '<br>');
    };

    eventTags.tagit({
        availableTags: sampleTags,
        beforeTagAdded: function(evt, ui) {
            if (!ui.duringInitialization) {
                addEvent('beforeTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
            }
        },
        afterTagAdded: function(evt, ui) {
            if (!ui.duringInitialization) {
                addEvent('afterTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
            }
        },
        beforeTagRemoved: function(evt, ui) {
            addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
        },
        afterTagRemoved: function(evt, ui) {
            addEvent('afterTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
        },
        onTagClicked: function(evt, ui) {
            addEvent('onTagClicked: ' + eventTags.tagit('tagLabel', ui.tag));
        },
        onTagExists: function(evt, ui) {
            addEvent('onTagExists: ' + eventTags.tagit('tagLabel', ui.existingTag));
        }
    });

    //-------------------------------
    // Read-only
    //-------------------------------
    $('#readOnlyTags').tagit({
        readOnly: true
    });

    //-------------------------------
    // Tag-it methods
    //-------------------------------
    $('#methodTags').tagit({
        availableTags: sampleTags
    });

    //-------------------------------
    // Allow spaces without quotes.
    //-------------------------------
    $('#allowSpacesTags').tagit({
        availableTags: sampleTags,
        allowSpaces: true
    });

    //-------------------------------
    // Remove confirmation
    //-------------------------------
    $('#removeConfirmationTags').tagit({
        availableTags: sampleTags,
        removeConfirmation: true
    });

    //-------------------------------
    // Enable Disable
    //-------------------------------

    var k = 0;
    for (k = 0; k <= 6; k++) {

        $("#ac" + k + "_combo").change(function() {
            var options = document.getElementById("non_" + this.id).options;
            for (var i = 0, n = options.length; i < n; i++) {
                if (options[i].value == this.value) {
                    document.getElementById("non_" + this.id).selectedIndex = i;
                    break;
                }
            }
        });

        $("#non_ac" + k + "_combo").change(function() {
            var str = this.id;
            var com_id = str.substring(4);
            var options = document.getElementById(com_id).options;
            for (var i = 0, n = options.length; i < n; i++) {
                if (options[i].value == this.value) {
                    document.getElementById(com_id).selectedIndex = i;
                    break;
                }
            }
        });


        $("#scheme_pane" + k).change(function() {
            if (this.checked) {
                document.getElementById('below_' + this.id).style.display = 'block';

            } else {
                document.getElementById('below_' + this.id).style.display = 'none';

            }
        });

        $("#ac" + k).change(function() {
            if (this.checked) {
                document.getElementById('price_' + this.id).disabled = false;
                document.getElementById(this.id + '_combo').disabled = false;

            } else {
                document.getElementById('price_' + this.id).disabled = true;
                document.getElementById(this.id + '_combo').disabled = true;

            }
        });

        $("#non_ac" + k).change(function() {
            if (this.checked) {
                document.getElementById('price_' + this.id).disabled = false;
                document.getElementById(this.id + '_combo').disabled = false;

            } else {
                document.getElementById('price_' + this.id).disabled = true;
                document.getElementById(this.id + '_combo').disabled = true;

            }
        });

        $("#normal" + k).change(function() {
            if (this.checked) {
                document.getElementById('price_' + this.id).disabled = false;
                document.getElementById('per_' + this.id).disabled = false;

            } else {
                document.getElementById('price_' + this.id).disabled = true;
                document.getElementById('per_' + this.id).disabled = true;

            }
        });

        $("#luggage" + k).change(function() {
            if (this.checked) {
                document.getElementById('price_' + this.id).disabled = false;
                document.getElementById('per_' + this.id).disabled = false;

            } else {
                document.getElementById('price_' + this.id).disabled = true;
                document.getElementById('per_' + this.id).disabled = true;

            }
        });

        $("#waiting" + k).change(function() {
            if (this.checked) {
                document.getElementById('price_' + this.id).disabled = false;
                document.getElementById('per_' + this.id).disabled = false;

            } else {
                document.getElementById('price_' + this.id).disabled = true;
                document.getElementById('per_' + this.id).disabled = true;

            }
        });

        var m = 0;
        for (m = 0; m <= 6; m++) {

            $("#day" + k + m).change(function() {
                if (this.checked) {
                    document.getElementById('start_' + this.id).disabled = false;
                    document.getElementById('end_' + this.id).disabled = false;

                } else {
                    document.getElementById('start_' + this.id).disabled = true;
                    document.getElementById('end_' + this.id).disabled = true;

                }
            });

        }
    }

    //-------------------------------
    // Manufacturer combobox change
    //-------------------------------

    $("#manufacturer_combo").change(function() {

        var xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {

                var model_list = xmlhttp.responseText;
                var jsonobj = eval("(" + model_list + ")");


                var x = document.getElementById("model_combo");
                x.innerHTML = "";

                for (var i = 0; i < jsonobj.length; i++) {
                    var option = document.createElement("option");

                    option.text = jsonobj[i]['model'];
                    try
                    {
                        x.add(option, x.options[null]);
                    }
                    catch (e)
                    {
                        x.add(option, null);
                    }
                }
            }
        }
        xmlhttp.open("GET", "editVehicle/changeManufacturer/" + this.value, true);
        xmlhttp.send();
    });

    //edit profile

    $('#pencil1').click(function() {
        firstName = $('#edit_first_name').text();
        lastName = $('#edit_last_name').text();

        $('#edit_name').replaceWith(function() {

            var string = "<form onsubmit='return checkName()' id='edit_name_form' name = 'edit_name' method = post action = 'http://localhost/Ridesl/editVehicle/editName' >";
            string += '<div style="font-size: 12px; font-weight:bold">First Name</div>';
            string += '<input required id="first_name_text" type="text" name="first_name" value="' + firstName + '" />';
            string += '<div id="first_name_validate" style="font-size: 12px; color:red; font-weight:bold"></div>';
            string += '<div style="font-size: 12px; font-weight:bold">Last Name</div>';
            string += '<input required id="last_name_text" type="text" name="last_name" value="' + lastName + '" />';
            string += '<div id="last_name_validate" style="font-size: 12px; color:red; font-weight:bold"></div>';
            string += '<button  style="height:23px; width:40px">done</button> <a><input onclick="fullNameCancel()" type="button" id="cancel_btn" value="cancel" style="height:23px; width:45px"></a>';

            string += "</form>";
            return string;
        });
    });

    $('#pencil3').click(function() {
        email = $('#edit_email').text();
        $('#edit_email').replaceWith(function() {
            var string = '<form onsubmit="return checkEmail()" id="edit_email_form" name = "edit_email" method = post action = "http://localhost/Ridesl/editVehicle/editEmail" >';
            string += '<input required type="text" id="email_text" name="email" value="' + email + '" />';
            string += '<div id="email_validate" style="font-size: 12px; color:red; font-weight:bold"></div>';
            string += '<div style="font-size: 13px;"><button id="done_email"  style="height:23px; width:40px">done</button> <input onclick="emailCancel()" type="button" id="cancel_btn" value="cancel"  style="height:23px; width:45px"></a></div>';
            string += "</form>";
            return string;
        });
    });

    $('#add_phone').click(function() {
        if (add_phone_no_count === 0) {
            var profileDiv = $("#phone_numbers");
            var string = '<form  onsubmit="return checkPhoneNo()" id="edit_phone_no_form" name = "add_phone_no" method = post action = "http://localhost/Ridesl/editVehicle/addPhoneNo" >';
            string += '<input required type="text" name="phone_no" id="add_new_phone_text" onkeypress="return isNumber(event)" onkeyup="limitText(this,10)" placeholder="Add new phone no.""/> ';
            string += '<div id="phone_validate" style="font-size: 12px; color:red; font-weight:bold"></div>';
            string += '<button  style="height:23px; width:40px">done</button> <input onclick="phoneNoCancel()" type="button" id="cancel_btn" value="cancel"  style="height:23px; width:45px"></a>';

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
    var phone_no = $('#text_phoneNo' + $id).text().trim();
    arr.push(phone_no);
    var $index = arr.length - 1;
    $('#text_phone' + $id).replaceWith(function() {
        var data = $id + ' ' + phone_no;
        var string = '<form  onsubmit="return checkUpdatePhoneNo(' + $id + ')" id="edit_phone_no_form' + $id + '" name = "add_phone_no" method = post action = "http://localhost/Ridesl/editVehicle/updatePhoneNo/' + data + '" >';
        string += '<input required type="text" value="' + phone_no + '" name="phone_no' + $id + '" id="update_new_phone_text' + $id + '" onkeypress="return isNumber(event)" onkeyup="limitText(this,10)"/> ';
        string += '<div id="phone_validate' + $id + '" style="font-size: 12px; color:red; font-weight:bold"></div>';
        string += '<div style="font-size: 13px;"><button  style="height:23px; width:40px">done</button> <input onclick="updatePhoneNoCancel(' + $id + ',' + $index + ')" type="button" id="cancel_btn" value="cancel"  style="height:23px; width:45px"></a></div>';
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
    var dltNo = document.getElementById('dltNo' + $id).value;
    $('#edit_phone_no_form' + $id).replaceWith(function() {
        var string = '<div id="text_phone' + $id + '">';
        string += '<font id="text_phoneNo' + $id + '">' + arr[$index] + '<font><font> </font>';
        string += '<img onclick="changePhone(' + $id + ')" id = "phone' + $id + '" src="http://localhost/Ridesl/public/images/pencil.png" alt="" style="height: 13px; width: 13px; cursor:pointer"/><font> </font>';
        string += '<a href="http://localhost/Ridesl/driverHome/dltPhoneNo/' + dltNo + '"><img onclick="return confirm(\'Are you sure you want to delete phone no ' + dltNo + '?\');" id = "dlt_phone' + $id + '" src="http://localhost/Ridesl/public/images/dlt.png" alt="" style="height: 13px; width: 13px; cursor:pointer"/></a>';
        string += '</div>';
        return string;
    });
}

//-------------------------------
// validation
//-------------------------------

function check() {
    var wrong = false;
    for (var i = 0; i < 7; i++) {
        document.getElementById('loc_validate' + i).innerHTML = "";
        document.getElementById('ava_validate' + i).innerHTML = "";

        var ck = document.getElementById('scheme_pane' + i).checked;
        if (ck == true) {
            //locations
            var locs = document.getElementById('mySingleField' + i).value;
            if (locs == '') {
                wrong = true;
                document.getElementById('loc_validate' + i).innerHTML = "You should add locations.";
            }
            //availability
            var ava_set = false;
            for (var j = 0; j < 7; j++) {
                var days = document.getElementById('day' + i + j).checked;
                if (days == true) {
                    ava_set = true;
                    break;
                }
            }
            if (!ava_set) {
                wrong = true;
                document.getElementById('ava_validate' + i).innerHTML = "You should set availability.";
            }
        }
    }
    if (!wrong) {
        return true;
    } else {
        return false;
    }
}

function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}

function isFloat(sender, evt) {
    var txt = sender.value;
    var dotcontainer = txt.split('.');
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (!(dotcontainer.length == 1 && charCode == 46) && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
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
    var phoneno = document.getElementById('update_new_phone_text' + $id);

    var phoneno_text = document.getElementById('update_new_phone_text' + $id).value;
    if (phoneno_text.charAt(0) !== '0') {
        document.getElementById('phone_validate' + $id).innerHTML = "Phone number should start with 0.";
        phoneno.focus;
        return false;
    } else if (phoneno_text.length !== 10) {
        document.getElementById('phone_validate' + $id).innerHTML = "Phone number should contain 10 digits.";
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


