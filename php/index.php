<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
    </head>

    <body>

        <div id="welcome" class='welcome'>

            <?php
                session_start();
                //echo $_SESSION['type_User'];

                if($_SESSION['typeId']=="1"){

                    if($_SESSION['gender']=="Male"){
                        echo"<h1>Welcome  Mr. ".$_SESSION["firstName"]." ".$_SESSION["familyName"]."</h1><br>
                        ";
                    }
                    else{
                        echo"<h1>Welcome  Mrs. ".$_SESSION["firstName"]." ".$_SESSION["familyName"]."</h1><br>";
                    }
                }
                else if($_SESSION['typeId']=="2"){

                    if($_SESSION['gender']=="Male"){
                        echo"<h1>Welcome  Mr. ".$_SESSION["firstName"]." ".$_SESSION["familyName"]."</h1><br>";
                    }
                    else{
                        echo"<h1>Welcome  Mrs. ".$_SESSION["firstName"]." ".$_SESSION["familyName"]."</h1><br>";
                    }
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

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <?php
            if($_SESSION['typeId']=="1"){
                    echo"<a href='displayChilds.php'>Display Childs Data</a><br>";
                    echo"<a href='displayUsers.php'>Display Users Accounts</a><br>";
                }
                else if($_SESSION['typeId']=="2"){
                    echo"<a href='displayChilds.php'>Your Child Page</a><br>";
                }
            ?>
            <a href='editAccount.php'>Edit Your Account</a><br>
            <a href='messages.php'>Messages</a><br>
            <a href='logOut.php'>Sign Out</a><br>
            <!--<a href="DisplayingMessageToManager.php">Messages</a>-->
        </div>

        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

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

            .sidenav
             {
                height: 100%;
                width: 300px;
                position: fixed;
                z-index: 1;
                top: 0px;
                left: 0px;
                background-color: #111;/*deh loun elside bar lm ayfta7 */
                overflow-x: hidden;
                transition: 0.5s;
                padding-top:0px;
                color:white;
            }

            .sidenav a {
                padding: 20px /*spaces been elklaam gwa side bar*/
                 0px
                 8px 
                20px;
                text-decoration: none;
                font-size: 25px;
                color: #818181; /* dah lun font*/
                display: block;
                transition: 0.3s;
            }

            .sidenav a:hover {
                color: white;
            }

            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            }
        </style>

        
</html>
