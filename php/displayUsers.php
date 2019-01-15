<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Display Users</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <!--bootstrtap links -->
   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#search").click(function(){
                    $("#forma").fadeOut("fast");
                    $("#buttondivision").fadeIn(3000);
                    $("#searchForm").fadeIn(3000);
                });
            });

            $(document).ready(function(){
                $("#getBack").click(function(){
                    $("#searchForm").hide();
                    $("#buttondivision").hide();
                    $("#forma").show("slow");
                });
            });

            function search(){
                jQuery.ajax({
                    url: "display.php",
                    data: 'search='+$("#Search_Textfield").val(),
                    type: "POST",
                    success: function(data){
                        $("#result").html(data);
                    }
                });
            } 
        </script>
        
    </head>

    <body>
        <?php 
            session_start();
            require("sidebar.php");
        ?>
        <div id="body" name="body"><br>
            <div id="searchForm" style="display:none;">
                <form name="sForm" action="" id="sForm" method="post">
                    <input id="Search_Textfield" type="text" name="searchBar" onkeyup="search()">
                </form> 

                <div id="result">
                </div>    
            </div>   

            <div id="buttondivision" style="display:none;">
                <button id="getBack" name="getBack">Get Back</button>
            </div>   

            <!-- <button id="forward" name="forward" onclick="window.location.href='display.php'">Search</button> -->
        <div id="forma" name="forma">    
            <button id="search" name="search">Start Search</button>

            <?php
                require("Database_Connection.php");

                $sql = "select * from user";
                $result = mysqli_query($conn,$sql);

                if(mysqli_num_rows($result) > 0){
                    echo"<form id='form' name='form' method='post' action=''>";
                    // echo "<input type='submit' id='Show_Account' name='Show_Account' value='Show Account'>";
                    echo "<input type='submit' id='Activate_Account' name='Activate_Account' value='Activate Account'>";
                    echo "<input type='submit' id='Decline_Account' name='Decline_Account' value='Decline Account'>";
                    echo"<table id='table' border='1' class='Table_Of_Users table-hover'>
                        <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Family Name</th>
                        <th>Gender</th>
                        <th>Nationality</th>
                        <th>Date of Birth</th>
                        <th>Work Number</th>
                        <th>Phone Number</th>
                        <th>Home Number</th>
                        <th>Date & Time Joined</th>
                        <th>Account Status</th>
                        <th>SSN</th>
                        <th>Type of User</th>
                        <th>CV</th>
                        <th>Medical Test</th>
                        </tr>";

                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='checkbox[]' id='checkbox[]' value=".$row['id']."></td>";
                        echo "<td>" .$row['id']. "</td>";
                        echo "<td>" .$row['email']. "</td>";
                        echo "<td>" .$row['firstName']. "</td>";
                        echo "<td>".$row['lastName']."</td>";
                        echo "<td>" .$row['familyName']. "</td>";
                        echo "<td>" .$row['gender']. "</td>";
                        echo "<td>".$row['nationality']."</td>";
                        echo "<td>" .$row['dateOfBirth']. "</td>";
                        echo "<td>".$row['workNumber']."</td>";
                        echo "<td>" .$row['phoneNumber']. "</td>";
                        echo "<td>" .$row['homeTelephoneNumber']. "</td>";
                        echo "<td>".$row['dateJoined']."</td>";
                        $status = mysqli_query($conn,"SELECT * FROM status WHERE id='".$row["statusId"]."'");
                        if($r = mysqli_fetch_array($status)){
                            echo "<td>" .$r['statusName']. "</td>";
                        }
                        echo "<td>".$row['ssn']."</td>";
                        $type = mysqli_query($conn,"SELECT * FROM type WHERE id='".$row["typeId"]."'");
                        if($r1 = mysqli_fetch_array($type)){
                            echo "<td>" .$r1['typeName']. "</td>";
                        }
                        if($row['typeId']==3){
                            $down = mysqli_query($conn,"SELECT * FROM employee WHERE userId='".$row["id"]."'");
                            if($r1 = mysqli_fetch_array($down)){
                                if($r1['cvId']==1){
                                    echo"<td>None</td>";
                                }
                                else{
                                    print '<td><center><a href="download.php?id='.$r1['cvId'].'" >Download</a></center></td>';
                                }

                                if($r1['medicalTestId']==1){
                                    echo"<td>None</td>";
                                }
                                else{
                                    print '<td><center><a href="download.php?id='.$r1['medicalTestId'].'" >Download</a></center></td>';    
                                }

                            }
                            else{
                                echo"<td>Error</td>";
                                echo"<td>Error</td>";    
                            }
                        }
                        else{
                            echo"<td> </td>";
                            echo"<td> </td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</form>";
                }
                if(isset($_POST['Activate_Account'])){

	                if (isset($_POST['checkbox'])){

                        $count = 0;
                        $ActID = $_POST['checkbox'];
		                foreach ($ActID as $keys => $value){
                              
                            $ActSql = "UPDATE user SET statusId='2' WHERE id = $value";
                            
                            if(mysqli_query($conn,$ActSql)){
                                $count++;                            
                            }
                            else{
                                echo"Error with ID: '".$value."'";
                            }
                        }
                    }
                    else{
                        echo"Please select an account to activate";
                    }

                    if($count == count($ActID)){
                        echo "Account Activated Successfully</br>";
                        echo "<a href='displayUsers.php'> Refresh </a>";
                    }
                }
                else if(isset($_POST['Decline_Account'])){

	                if (isset($_POST['checkbox'])){

                        $count = 0;
		                $DecID = $_POST['checkbox'];
		                foreach ($DecID as $keys => $value){
                            $DecSql = "UPDATE user SET statusId='3' WHERE id = $value";
                            
                            if(mysqli_query($conn,$DecSql)){
                                $count++;
                            }
                            else{
                                echo"Error with ID: '".$value."'";
                            }
                        }
                    }
                    else{
                        echo"Please select an account to activate";
                    }

                    if($count == count($DecID)){
                        echo "Account Declined Successfully</br>";
                        echo "<a href='displayUsers.php'> Refresh </a>";
                    }
                }

                include 'Comments.php';
                // mysqli_close($conn);    
            ?>
            </div>
        </div>
    </body>

</html>
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
        #Activate_Account , #Decline_Account, #search, #getBack
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
        #Activate_Account:hover ,  #Decline_Account:hover, #search:hover, #getBack:hover /*when standing on the buttons*/
        {
            background-color:linen;
            opacity: 2.5;
        } 
        #search, #Search_Button {
        text-decoration: none;
        border: 1px solid #ccc;
        background-color: #efefef;
        padding: 10px 15px;
        -moz-border-radius: 11px;
        -webkit-border-radius: 11px;
        border-radius: 11px;
        text-shadow: 0 1px 0 #FFFFFF;
        }

</style>
