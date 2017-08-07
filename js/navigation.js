$(function() {

    function loadContent(data) {
        $('#content').html(data);
    }

    $("a").on("click",function(){

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