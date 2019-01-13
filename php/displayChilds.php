<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Display Childs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
        <script type="text/javascript">
        function redirect() {
            window.location = "addChild.php";
        }
        function redirect2() {
            window.location = "editChild.php";
        }
        </script>
    </head>

    <body>
        <?php
            session_start();
            require_once("Database_Connection.php");
            require("sidebar.php");
        echo $_SESSION["typeId"];
            $sql="SELECT * FROM child";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){

                //if the user is a Parent he'll see only his children
                if($_SESSION["typeId"] == '2'){
                    $result1 = mysqli_query($conn, "SELECT * FROM child WHERE userId='".$_SESSION["userId"]."'");

                    if(mysqli_num_rows($result1) == 0){
                        echo"You didn't add your childs data yet<br>";
                        echo"<a href='addChild.php'>add your child now ?</a><br>";
                    }

                    if(mysqli_num_rows($result1) == 1){
                        if($row = mysqli_fetch_array($result1)){
                            echo "<br>";
                            echo "<img width = '20%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'><br>";
                            echo "Name: ";
                            echo $row["name"];
                            echo "<br>";
                            echo "Gender: ";
                            echo $row["gender"];
                            echo "<br>";
                            echo "Date Of Birth: ";
                            echo $row["dateOfBirth"];
                            echo "<br>";
                            echo "Gobbies: ";
                            echo $row["hobbies"];
                            echo "<br>";
                            echo "Medical Problems: ";
                            echo $row["medicalProblems"];
                            echo "<br>";
                            echo "Disability: ";
                            echo $row["disability"];
                            echo "<br>";
                        }              
                    }

                    else if(mysqli_num_rows($result1) > 1){
                        while($row = mysqli_fetch_array($result1)){
                            echo "<br>";
                            echo "<img width = '20%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'><br>";
                            echo "Name: ";
                            echo $row["name"];
                            echo "<br>";
                            echo "Gender: ";
                            echo $row["gender"];
                            echo "<br>";
                            echo "Date Of Birth: ";
                            echo $row["dateOfBirth"];
                            echo "<br>";
                            echo "Gobbies: ";
                            echo $row["hobbies"];
                            echo "<br>";
                            echo "Medical Problems: ";
                            echo $row["medicalProblems"];
                            echo "<br>";
                            echo "Disability: ";
                            echo $row["disability"];
                            echo "<br>";
                        }
                    }
                    echo"<button id='addChild_Button' name='addChild_Button' type='button' onclick='redirect();'>Add Another Child</button>";   
                    echo"<button id='editChild_Button' name='editChild_Button' type='button' onclick='redirect2();'>Edit a Child</button>";                                     
                }
                else{
                    echo"<table border='1'>
                        <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Photo</td>
                        <td>Gender</td>
                        <td>Date of Birth</td>
                        <td>Scheduele Name</td>
                        <td>Hobbies</td>
                        <td>Medical Problems</td>
                        <td>Disability</td>
                        <td>Parent Name</td>
                        </tr>";

                    //if the user is a Manager he'll see all the children in the nursery
                    if($_SESSION["typeId"] == '1'){
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" .$row['id']. "</td>";
                            echo "<td>" .$row['name']. "</td>";
                            echo "<td><img width = '20%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'></td>";
                            echo "<td>" .$row['gender']. "</td>";
                            echo "<td>".$row['dateOfBirth']."</td>";
                            echo "<td>" .$row['scheduleTypeId']. "</td>";
                            echo "<td>".$row['hobbies']."</td>";
                            echo "<td>" .$row['medicalProblems']. "</td>";
                            echo "<td>".$row['disability']."</td>";
                            echo "<td>".$row['userId']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }

                    //if the user is a Teacher he'll/she'll see all the children in his/her nursery
                    else if($_SESSION["departmentId"] == '8' && $_SESSION["typeId"] == '3'){
						$sqlTeacherChildren = mysqli_query($conn, "SELECT c.*,scT.scheduleName,u.firstName,u.lastName FROM employee e join user u on e.userId=u.id 
											   join subject s ON s.teacherId = u.id 
                                               AND s.teacherId='".$_SESSION["userId"]."'
											   join schedules sc on sc.subjectId=s.id
											   join scheduletypes scT on sc.scheduleTypeId=scT.id
											   join child c on scT.id=c.scheduleTypeId"); 
                        while($row = mysqli_fetch_array($sqlTeacherChildren)){
                            echo "<tr>";
                            echo "<td>" .$row['id']. "</td>";
                            echo "<td>" .$row['name']. "</td>";
                            echo "<td><img width = '20%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'></td>";
                            echo "<td>" .$row['gender']. "</td>";
                            echo "<td>".$row['dateOfBirth']."</td>";
                            echo "<td>" .$row['scheduleTypeId']. "</td>";
                            echo "<td>".$row['hobbies']."</td>";
                            echo "<td>" .$row['medicalProblems']. "</td>";
                            echo "<td>".$row['disability']."</td>";
                            echo "<td>".$row['userId']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }

                    //if the user is a Doctor he'll see all the children in the nursery
                    else if($_SESSION["departmentId"] == '5' && $_SESSION["typeId"] == '3'){
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" .$row['id']. "</td>";
                            echo "<td>" .$row['name']. "</td>";
                            echo "<td><img width = '20%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'></td>";
                            echo "<td>" .$row['gender']. "</td>";
                            echo "<td>".$row['dateOfBirth']."</td>";
                            echo "<td>" .$row['scheduleTypeId']. "</td>";
                            echo "<td>".$row['hobbies']."</td>";
                            echo "<td>" .$row['medicalProblems']. "</td>";
                            echo "<td>".$row['disability']."</td>";
                            echo "<td>".$row['userId']."</td>";
                            echo "</tr>";
                    }
                        echo "</table>";
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
            //mysqli_close($conn);    
        ?>
    </body>
</html>
