<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Child</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script>    
        $(document).ready(function(){
        $("#deleteChild_Button").click(function(){
            $("#editChild").fadeOut("fast");
            $("#deleteChoice").fadeIn(3000);
            });
        });

        $(document).ready(function(){
        $("#no_Button").click(function(){
            $("#deleteChoice").hide();
            $("#editChild").show("slow");
            });
        });
    </script>
    <style>
    .buttonize {
    text-decoration: none;
    border: 1px solid #ccc;
    background-color: #efefef;
    padding: 10px 15px;
    -moz-border-radius: 11px;
    -webkit-border-radius: 11px;
    border-radius: 11px;
    text-shadow: 0 1px 0 #FFFFFF;
    }

    .divider{
    width:15px;
    height:auto;
    display:inline-block;
    }
    </style>
</head>
<body>
    <?php
        session_start();
        require_once("Database_Connection.php");
        require("sidebar.php");

        $childId = $_GET['id'];
        $sql="SELECT * FROM child WHERE id='$childId'";
        $result = mysqli_query($conn,$sql);
        
        if($row = mysqli_fetch_array($result)){
            echo '<form id="editChild" name="editChild" method="post" action="" enctype="multipart/form-data">';
            echo "<img width = '20%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'><br>";
            echo 'Name: <input type="text" id="name" name="name" value='.$row["name"].'><br>';
            echo 'Hobbies: <input type="text" id="hobbies" name="hobbies" value='.$row["hobbies"].'><br>';
            echo 'Medical Problem: <input type="text" id="medicalProblems" name="medicalProblems" value='.$row["medicalProblems"].'><br>';
            echo 'Disabilty: <input type="text" id="disability" name="disability" value='.$row["disability"].'><br><br>';
            echo '<input type="submit" id="submit" value="Edit" name="Edit"/>';
            echo "<div class='divider'></div>";
            echo"<button id='deleteChild_Button' name='deleteChild_Button' type='button'>Delete Child</button>";
            echo '</form><br>'; 

            echo '<form id="deleteChoice" method="post" action="" style="display:none;">';
            echo "Are you sure you want to delete ?<br>";
            echo"<input id='yes_Button' name='yes' type='submit' value='Yes'>";
            echo "<div class='divider'></div>";
            echo"<input id='no_Button' name='no_Button' type='button' value='No'>";
            echo "</form>";
        }            
        else{
            echo"An error occured";
        }        

        if(isset($_POST["Edit"])){
            $name=$_POST["name"];
            $hobbies=$_POST["hobbies"];
            $medicalProblems=$_POST["medicalProblems"];
            $disability=$_POST["disability"];
            
            // $previous = "javascript:history.go(-1)";

            if(mysqli_query($conn, "UPDATE child SET name='$name', hobbies='$hobbies', medicalProblems='$medicalProblems', disability='$disability' WHERE id='$childId'")){
                echo"Edit Done<br><br><br>";
                echo'<a href="displayChilds.php" class="buttonize">Get Back</a>';
            }
            else{
                echo"Error occured<br><br>";
            }
        }

        if(isset($_POST["yes"])){
            if(mysqli_query($conn, "DELETE FROM child WHERE id='$childId'")){
                echo"Delete Done<br><br><br>";
                echo'<a href="displayChilds.php" class="buttonize">Get Back</a>';
            }
            else{
                echo"Error occured";
            }
        }
    ?>
</body>
</html>
