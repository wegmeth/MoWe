$(function() {
    var link;

    $('.button-collapse').sideNav({
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        }
    );

    $(document).on('submit', 'form', function(event) {

        var formData =  $( event.target ).serializeArray();
        var objArr ={};

        for( var i = 0; i < formData.length; ++i ) {
            var element = formData[i];
            var name = element.name;
            var value = element.value;

            if( name ) {
                objArr[ name ] = value;
            }
        }

        var hash = $( event.target ).attr("action");

        var hashString = hash.split("#")[1];
        var ns = hashString.split("/")[0];
        var action= hashString.split("/")[1];

        dataJson = {
            'namespace':ns,
            'action':action,
            'ajax':true,
            'data':objArr};

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

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Heute',
            format: 'dd.mm.yyyy',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });

        $('#add_member').on("click",function(event){
            var val = $('#inp_add_member').val();


            var hashString = link.attr('href').split("#")[1];
            var arr =  hashString.split("/");
            var tripId= arr[2];
            
            var data = {id:tripId, ajax:"1",namespace:"ajax",action:"requestMember", email:val};
            $.ajax({
                type: "POST",
                url: "index.php",
                data: data,
                success: showResult,
            });
            
        });
    }
    
    function  showResult(data) {
        var d = JSON.parse(data);

        if(d.error == ""){
            $('#trip_members').append(d.html);
        }else {
            alert(d.error);
        }
    }

    $(document).on('click', '.link', function(event) {

        link = $( event.target );

        var hashString = link.attr('href').split("#")[1];
        var arr =  hashString.split("/");

        var ns = arr[0];
        var action= arr[1];

        if(arr.length > 2){
            var id = arr[2];
            data = {namespace:ns,action:action,id:id, ajax:true};
        }else{
            data = {namespace:ns,action:action, ajax:true};
        }

        $.ajax({
            type: "POST",
            url: "index.php",
            data: data,
            success: loadContent,
        });
    });
});