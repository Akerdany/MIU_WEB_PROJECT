<?php
    require_once("Database_Connection.php");

    if(!empty($_POST["email"])){
        
        $query = "SELECT * FROM user WHERE email='".$_POST["email"]."'";
        $result = mysqli_query($conn, $query);
        $user_count = mysqli_num_rows($result);

        if($user_count > 0){
            echo"<div class='email-taken'> Email taken, try again...</div>";
        }
        else{
            echo"<div class='email-ok'>Email Available.</div>";
        }
    }
?>