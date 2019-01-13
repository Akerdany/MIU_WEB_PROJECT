<?php
    session_start();
    require_once("Database_Connection.php");
    require("sidebar.php");

    $sql = "select * from user";
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result) > 0){
        echo"<table border='1' class='Table_Of_Users'>
            <tr>
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
            </tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
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
            echo "</tr>";
        }
            echo "</table>";
    }
    include 'Comments.php';
    mysqli_close($conn);    
?>

<style>
        body
        {
            background-color:teal;
        }
        
        .Table_Of_Users
        {
            background-color:linen;
            border:5px;
            top:20px;
            left:20px;
            width:1520px;
            height:300px;
            text-align:center;
            font-size:15px;
        } 
</style>