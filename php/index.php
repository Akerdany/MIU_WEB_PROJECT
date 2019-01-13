<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
    </head>

    <body>
        <?php
            session_start();
            require("sidebar.php");
        ?>
        
        <div id="welcome" class='welcome'>

            <?php
                echo session_status();
                require_once("Database_Connection.php");

                if($_SESSION['gender'] == "Male"){
                    echo"<h1>Welcome  Mr. ".$_SESSION["firstName"]." ".$_SESSION["familyName"]."</h1><br>
                    ";
                }
                else{
                    echo"<h1>Welcome  Mrs. ".$_SESSION["firstName"]." ".$_SESSION["familyName"]."</h1><br>";
                }

                echo"<h2>Account Information: <h2> <br>"; 

                
                echo"Email: ".$_SESSION["username"]."<br> <br>";
                echo"Password: ".$_SESSION["password"]."<br> <br>";
                echo"Gender: ".$_SESSION["gender"]."<br> <br>";
                echo"Nationality: ".$_SESSION["nationality"]."<br> <br>";
                echo"Date of Birth: ".$_SESSION["dateOfBirth"]."<br> <br>";
                echo"Work Number: ".$_SESSION["workNumber"]."<br> <br>";
                echo"Phone Number: ".$_SESSION["phoneNumber"]."<br> <br>";
                echo"Home Number: ".$_SESSION["homeNumber"]."<br> <br>";
                echo"SSN: ".$_SESSION["ssn"]."<br>";
            ?>
        </div>
    </body>

    <style>
            body {
                font-family: "Lato", sans-serif;
                Background-color: linen;
                background-image: url("../pictures/Office.jpg");
                background-repeat: no-repeat;
                background-size:100%;
                position:relative;

            }
            .welcome 
            { 
                float:right;
                position:relative; 
                margin-right:470px;
                padding:10px;
                border-radius: 5px;
                border-left: 6px solid navy;
                border-right: 6px solid navy;
                background-color:#fad78b;
                color:black;
            }
        </style>

        
</html>
