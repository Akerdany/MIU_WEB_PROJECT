<?php
    session_start();
    require_once("Database_Connection.php");
    require("sidebar.php");

    $sql = "select * from user";
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result) > 0){
        echo"<table border='1'>
            <tr>
            <td>ID</td>
            <td>Email</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Family Name</td>
            <td>Gender</td>
            <td>Nationality</td>
            <td>Date of Birth</td>
            <td>Work Number</td>
            <td>Phone Number</td>
            <td>Home Number</td>
            <td>Date & Time Joined</td>
            <td>Account Status</td>
            <td>SSN</td>
            <td>Type of User</td>
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