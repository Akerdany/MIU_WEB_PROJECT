<?php

    session_start();
    require_once("Database_Connection.php");
    $email='';
    if(!empty($_POST["email"])){
        $query = "SELECT * FROM user WHERE email='".$_POST["email"]."'";
        $email=$_POST["email"];
        $_SESSION['TheEmail'] = $email;
        $result = mysqli_query($conn, $query);
        $user_count = mysqli_num_rows($result);


        if($user_count <= 0){
            echo"<div class='email-taken'>no resutlt... </div>";
        }
        else{
            
            echo '<div class="email-ok"><button type="button"  name="messageTo" id="messagingTo"  onclick="messaging()">message</button></div>';
        }

    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>


  <script type="text/javascript">
      $(document).ready(function(){
          $("#messagingTo").click(function(){

              $.ajax({
                  type: 'POST',
                  url: 'getId.php',
                  success: function(data) {

                      $("#msg").html(data);

                  }
              });
     });
  });
  </script></html>
