$(function() {

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
    }

    $(document).on('click', '.link', function(event) {

        var link = $( event.target );

        var hashString = link.attr('href').split("#")[1];
        var ns = hashString.split("/")[0];
        var action= hashString.split("/")[1];
        var id = hashString.split("/")[2];

        data = {namespace:ns,action:action, ajax:true};

        $.ajax({
            type: "POST",
            url: "index.php",
            data: data,
            success: loadContent,
        });
    });
});