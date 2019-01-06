<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Display Childs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>

    <body>
        <?php
            session_start();
            require_once("Database_Connection.php");

            $sql="select * from child";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
                echo"<table border='1'>
                    <tr>
                    <td>ID</td>
                    <td>Hobbies</td>
                    <td>Medical Problems</td>
                    <td>Disability</td>
                    <td>ParentId</td>
                    </tr>";

                //if the user is a Manager he'll see all the children in the nursery
                if($_SESSION["typeId"] == '1'){
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" .$row['id']. "</td>";
                            echo "<td>" .$row['hobbies']. "</td>";
                            echo "<td>".$row['medicalProblems']."</td>";
                            echo "<td>" .$row['disability']. "</td>";
                            echo "<td>".$row['parentId']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }

                //if the user is a Teacher he'll/she'll see all the children in his/her nursery
                else if($_SESSION["departmentId"] == '8'){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            // if(){
                                echo "<tr>";
                                echo "<td>" .$row['id']. "</td>";
                                echo "<td>" .$row['hobbies']. "</td>";
                                echo "<td>".$row['medicalProblems']."</td>";
                                echo "<td>" .$row['disability']. "</td>";
                                echo "<td>".$row['parentId']."</td>";
                                echo "</tr>";
                            // }
                        }
                        echo "</table>";
                    }
                }
                //if the user is a Parent he'll see only his children
                else if($_SESSION["typeId"] == '2'){
                    if(mysqli_num_rows($result) == 1){
                        if($row = mysqli_fetch_array($result)){
                            // echo"<form name='dataChild' action='' enctype='multipart/form-data'>";
                            // echo"<input type="text" name="childHobbies" value="$hobbies"><br>";
                            // echo"<input type="text" name="medicalProblems" value="$medic"><br>";
                            // echo"<input type="text" name="disability" value="$disability"><br>";
                            // echo"<input type="file" name="photo" value="$photo"><br>";  
                        }              
                    }
                }
            }
            else if(mysqli_num_rows($result) == 0 && $_SESSION["typeId"] == '2'){
                echo"You didn't add your childs data yet<br>";
                echo"<a href='addChild.php'>add your child now ?</a><br>";
            }
            else if(mysqli_num_rows($result) == 0){
                echo"No childs are in the nursery yet";
            }
            else{
                echo $sql;
                echo"<br>";
                
                //Underconstructing the error table for IT department
                printf("Errormessage: %s\n", mysqli_error($conn));
            }

            include 'Comments.php';
            mysqli_close($conn);    
        ?>
    </body>
</html>
