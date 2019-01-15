function checkFounded(){
        jQuery.ajax(
            {
                url: "check_Founded.php",
                data: 'email='+$("#email").val(),
                type: "POST",

                success:function(data){
                    $("#msg").html(data);
                },
                error:function(){
                    $("#msg").html("error");
                }
            });
    }
    setTimeout(function(){
      location.assign("http://127.0.0.1:8080/MIU_Web_Project/php/messages.php");

    },10000);
