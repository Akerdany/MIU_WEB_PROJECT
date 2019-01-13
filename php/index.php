<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: "Lato", sans-serif;
            }

            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .sidenav a:hover {
                color: #f1f1f1;
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
    </head>

    <body>

        <div id="welcome" class='welcome'>

            <?php
                session_start();
                //echo $_SESSION['type_User'];
				//the accounting button  section#1
				require_once("Database_Connection.php");
				
	$sqlShowButtonAccounting="select *  from
    employee e 
   JOIN user u ON u.id=e.userId
   AND e.departmentId  IN (1,10)
	
   AND e.userId='".$_SESSION['userId']."'";
    $resultShowButtonAccounting = mysqli_query($conn,$sqlShowButtonAccounting);
	
				//section#1 accounting end//////////////////////////////////////////
			
				//the marketing button  section#1/////////////////////////////////////
				require_once("Database_Connection.php");
					$sqlShowButtonMarketing="select *  from
    employee e 
   JOIN user u ON u.id=e.userId
   AND e.departmentId  IN (4,10)
	
   AND e.userId='".$_SESSION['userId']."'";
    $resultShowButtonMarketing = mysqli_query($conn,$sqlShowButtonMarketing);
				//section#1 marketing end //////////////////////////////////////
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

                echo"<h2>Account Information: <h2><br>";
                echo"Email: ".$_SESSION["username"]."<br>";
                echo"Password: ".$_SESSION["password"]."<br>";
                echo"Gender: ".$_SESSION["gender"]."<br>";
                echo"Nationality: ".$_SESSION["nationality"]."<br>";
                echo"Date of Birth: ".$_SESSION["dateOfBirth"]."<br>";
                echo"Work Number: ".$_SESSION["workNumber"]."<br>";
                echo"Phone Number: ".$_SESSION["phoneNumber"]."<br>";
                echo"Home Number: ".$_SESSION["homeNumber"]."<br>";
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
			<a href='medicalInsurance.php'>Medical Insurance</a><br>
			<?php 
			//section #2 accounting
			 if(mysqli_num_rows($resultShowButtonAccounting) > 0)
	{
		echo "<a href='accounting.php'>Accounting</a><br>"	;
	}
	//ends section#2 accounting
			?>
			<?php 
			//section #2 Marketing
			 if(mysqli_num_rows($resultShowButtonMarketing) > 0)
			{	
				
				echo "<a href='marketing.php'>Advertisments</a><br>";
			}
			//ends section#2 Marketing
			?>
			
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
</html>
