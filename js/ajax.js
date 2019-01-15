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
      location.assign("../MIU_Web_Project/php/messages.php");

    },10000);
