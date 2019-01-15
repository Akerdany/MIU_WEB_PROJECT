<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        require("Database_Connection.php");
        $query = "SELECT * FROM user WHERE email='".$_POST["search"]."'";
        $result = mysqli_query($conn, $query);
        $user_count = mysqli_num_rows($result);
        if($row = mysqli_fetch_array($result)){
            echo $query;
        }    
    ?>
</body>
</html>    
    
    <!-- <script>
            function search(){
                jQuery.ajax({
                    url: "displayUsers.php",
                    data: 'search='+$("#Search_Textfield").val(),
                    type: "POST",
                    success: function(data){
                        $("#result").html(data);
                    }
                });
            } 
        </script>

header("location:javascript://history.go(-1)"); 
require("Database_Connection.php");-->

<style>
        body
        {
            background-color:teal;
        }
        
        .Table_Of_Users
        {
            background-color:linen;
            border :5px solid black;
            top:20px;
            left:20px;
            width:1520px;
            height:static;
            text-align:center;
            font-size:15px;
            float:left;
        } 
        #Search_Textfield
        {
            margin-left:600;
            background: white;
            border:1px solid black;
            padding: 20px 30px;
            width: 200px;
            height:5px;
        }
        #Activate_Account , #Decline_Account
        {
            background-color: bisque;
            color: black;
            font-size: 12px;
            font-weight: bold;
            padding: 15px 20px;
            border-radius: 50px ;
            border:none;
            margin-bottom:10px; 
            margin-top:20px;
            margin-left:50px;
            cursor: pointer;
            width: 200px;
        }
        #Activate_Account:hover ,  #Decline_Account:hover /*when standing on the buttons*/
        {
            background-color:linen;
            opacity: 2.5;
        } 
</style>


