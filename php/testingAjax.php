<!DOCTYPE html >
<html>
    <head>
        <title>...</title>
    </head>
    <style media="screen">
    .email-ok{color:#2FC332;}
    .email-taken{color:#D60202;}
    </style>
    <body>

        <input type="text" name="email" id="email" placeholder="Email" onBlur="checkFounded()"/><br>

        <div id="msg"></div><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
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



        </script>
    </body>
</html>
