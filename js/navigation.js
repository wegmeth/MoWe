$(function () {
    var link;

    $('.button-collapse').sideNav({
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        }
    );

    $(document).on('submit', 'form', function (event) {

        var formData = $(event.target).serializeArray();
        var objArr = {};

        for (var i = 0; i < formData.length; ++i) {
            var element = formData[i];
            var name = element.name;
            var value = element.value;

            if (name) {
                objArr[name] = value;
            }
        }

        var hash = $(event.target).attr("action");

        var hashString = hash.split("#")[1];
        var ns = hashString.split("/")[0];
        var action = hashString.split("/")[1];

        dataJson = {
            'namespace': ns,
            'action': action,
            'ajax': true,
            'data': objArr
        };

        $.ajax({
            'type': "POST",
            'url': "index.php",
            'data': dataJson,
            'success': loadContent,
        });

        event.preventDefault();
    });

    function loadContent(data) {
        $('main').html(data);

        $('select').material_select();

        $('#postalcodeInput').on("blur",postalCodeLookup);


        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Heute',
            format: 'dd.mm.yyyy',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });

        $('#add_member').on("click", function (event) {
            var val = $('#inp_add_member').val();


            var hashString = link.attr('href').split("#")[1];
            var arr = hashString.split("/");
            var tripId = arr[2];

            var data = {id: tripId, ajax: "1", namespace: "ajax", action: "requestMember", email: val};
            $.ajax({
                type: "POST",
                url: "index.php",
                data: data,
                success: showResult,
            });

        });
    }

    function showResult(data) {
        var d = JSON.parse(data);

        if (d.error == "") {
            $('#trip_members').append(d.html);
        } else {
            alert(d.error);
        }
    }

    $(document).on('click', '.link', function (event) {

        link = $(event.target);

        var hashString = link.attr('href').split("#")[1];
        var arr = hashString.split("/");

        var ns = arr[0];
        var action = arr[1];

        if (arr.length > 2) {
            var id = arr[2];
            data = {namespace: ns, action: action, id: id, ajax: true};
        } else {
            data = {namespace: ns, action: action, ajax: true};
        }

        $.ajax({
            type: "POST",
            url: "index.php",
            data: data,
            success: loadContent,
        });
    });
});

var postalcodes;

function getLocation(jData) {

    if (jData == null) {
        return;
    }

    postalcodes = jData.postalcodes;

    if (postalcodes.length > 1) {
        document.getElementById('suggestBoxElement').style.visibility = 'visible';

        var suggestBoxHTML  = '';
        // iterate over places and build suggest box content
        for (i=0;i< jData.postalcodes.length;i++) {
            suggestBoxHTML += "<div class='suggestions' id=pcId" + i + " onmousedown='suggestBoxMouseDown(" + i +")' onmouseover='suggestBoxMouseOver(" +  i +")' onmouseout='suggestBoxMouseOut(" + i +")'> " + postalcodes[i].countryCode + ' ' + postalcodes[i].postalcode + ' &nbsp;&nbsp; ' + postalcodes[i].placeName  +'</div>' ;
        }
        // display suggest box
        document.getElementById('suggestBoxElement').innerHTML = suggestBoxHTML;
    } else {
        if (postalcodes.length == 1) {
            // exactly one place for postalcode
            // directly fill the form, no suggest box required
            var placeInput = document.getElementById("placeInput");
            placeInput.value = postalcodes[0].placeName;
        }
        closeSuggestBox();
    }
}


function closeSuggestBox() {
    document.getElementById('suggestBoxElement').innerHTML = '';
    document.getElementById('suggestBoxElement').style.visibility = 'hidden';
}


// remove highlight on mouse out event
function suggestBoxMouseOut(obj) {
    document.getElementById('pcId'+ obj).className = 'suggestions';
}

// the user has selected a place name from the suggest box
function suggestBoxMouseDown(obj) {
    closeSuggestBox();
    var placeInput = document.getElementById("placeInput");
    placeInput.value = postalcodes[obj].placeName;
}

// function to highlight places on mouse over event
function suggestBoxMouseOver(obj) {
    document.getElementById('pcId'+ obj).className = 'suggestionMouseOver';
}

function postalCodeLookup() {

    var country = $('#countrySelect').val();
    $('#suggestBoxElement').css("visibility","visible");
    $('#suggestBoxElement').html("<small><i>loading ...</i></small>");

    var postalcode = $('#postalcodeInput').val();

    request = 'http://api.geonames.org/postalCodeLookupJSON?postalcode=' + postalcode  + '&country=' + country  + '&username=wegmeth&callback=getLocation';

    // Create a new script object
    aObj = new JSONscriptRequest(request);
    aObj.buildScriptTag();
    aObj.addScriptTag();
}