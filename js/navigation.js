$(function() {

    $(document).on('submit', 'form', function(event) {

        var formData =  $( event.target ).serializeArray();
        var hash = $( event.target ).attr("action");

        var hashString = hash.split("#")[1];
        var ns = hashString.split("/")[0];
        var action= hashString.split("/")[1];

        data = {namespace:ns,action:action, ajax:true, data:formData};

        $.ajax({
            type: "POST",
            url: "index.php",
            data: data,
            success: loadContent,
        });

        event.preventDefault();
    });
    function loadContent(data) {
        $('main').html(data);
    }

    $(".link").on("click",function(){

        var hashString = $(this).attr('href').split("#")[1];
        var ns = hashString.split("/")[0];
        var action= hashString.split("/")[1];

        data = {namespace:ns,action:action, ajax:true};

        $.ajax({
            type: "POST",
            url: "index.php",
            data: data,
            success: loadContent,
        });
    });
});