<?php
    session_start();
    require_once("Database_Connection.php");
    require("sidebar.php");

    $sql="SELECT * FROM child WHERE id='".$_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    
    if($row = mysqli_fetch_array($result)){
        echo '<form method="post" action="addChild.php" enctype="multipart/form-data">';
        echo "<img width = '20%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'><br>";
        echo '<input type="text" id="name" name="name" value='.$row["name"].'><br>';
        echo '<input type="text" id="gender" name="gender" value='.$row["gender"].'><br>';
        echo '<input type="date" id="dateOfBirth" name="dateOfBirth" value='.$row["dateOfBirth"].'><br>';
        echo '<input type="text" id="hobbies" name="habbies" value='.$row["hobbies"].'><br>';
        echo '<input type="text" id="medicalProblems" name="medicalProblems" value='.$row["medicalProblems"].'><br>';
        echo '<input type="text" id="disability" name="disability" value='.$row["disability"].'><br>';
        echo '<input type="submit" id="submit" value="Edit" name="Edit"/>';
        echo '<input type="submit" id="submit" value="Delete" name="Delete"/><br>';
        echo '</form><br>';     
    }            
    else{
        echo"An error occured";
    }        
?>