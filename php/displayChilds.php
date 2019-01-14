<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Display Childs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

        <!--bootstrtap links -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



        <script src="main.js"></script>
        <script type="text/javascript">
        function redirect()
        {
            window.location = "addChild.php";
        }
        function redirect2() 
        {
            window.location = "editChild.php";
        }
        </script>
    </head>

    <body>
        <?php
            session_start();
            require("Database_Connection.php");
            require("sidebar.php");
            
            $sql="SELECT * FROM child";
            if($_SESSION["toChildId"]!=0)
            {
                $sql=$sql." WHERE  child.id='".$_SESSION['toChildId']."'";
            }
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){

                //if the user is a Parent he'll see only his children
                if($_SESSION["typeId"] == 2){
                    $result1 = mysqli_query($conn, "SELECT * FROM child WHERE userId='".$_SESSION["userId"]."'");

                    if(mysqli_num_rows($result1) == 0){
                        echo"You didn't add your childs data yet<br>";
                        echo"<a href='addChild.php'>add your child now ?</a><br>";
                    }

                    if(mysqli_num_rows($result1) == 1){
                        if($row = mysqli_fetch_array($result1)){ 
                            echo "<br>";
                            echo "<img width = '10%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'><br>";
                            echo "Name: ";
                            echo $row["name"];
                            echo "<br>";
                            echo "Gender: ";
                            echo $row["gender"];
                            echo "<br>";
                            echo "Date Of Birth: ";
                            echo $row["dateOfBirth"];
                            echo "<br>";
                            echo "Hobbies: ";
                            echo $row["hobbies"];
                            echo "<br>";
                            echo "Medical Problems: ";
                            echo $row["medicalProblems"];
                            echo "<br>";
                            echo "Disability: ";
                            echo $row["disability"];
                            echo "<br>";
                            print '<a href="editChild.php?id='.$row['id'].'" >Edit</a>';
                            echo "<br>";
                        }              
                    }

                    else if(mysqli_num_rows($result1) > 1){
                        while($row = mysqli_fetch_array($result1)){
                            echo "<br>";
                            echo "<img width = '10%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'><br>";
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
                            print '<a href="editChild.php?id='.$row['id'].'">Edit</a>';
                            echo "<br>";
                        }
                        echo"<br><br>";
                    }
                    echo"<button id='addChild_Button' name='addChild_Button' type='button' onclick='redirect();'>Add Another Child</button>";   
                    echo"<button id='editChild_Button' name='editChild_Button' type='button' onclick='redirect2();'>Edit a Child</button>";                                     
                }
                else{
                    echo"<form method='post' action=''>";
                    if($_SESSION["typeId"] == 1){
                        echo"<button id='Add_Child' name='Add_Child' type='button' onclick='redirect();'>Add Another Child</button>";   
                        // echo "<input type='submit' id='Add_Child' name='Add_Child' value='Add Child' onclick='redirect()'>";
                        echo "<input type='submit' id='Delete_Child' name='Delete_Child' value='Delete Child'>";  
                        echo"<br>";  
                        echo"<br>";
                    }
                    echo"<table border='1' class='Table_Of_Childs table-hover'>
                        <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Scheduele Name</th>
                        <th>Hobbies</th>
                        <th>Medical Problems</th>
                        <th>Disability</th>
                        <th>Parent Name</th>
                        </tr>";

                    //if the user is a Manager he'll see all the children in the nursery
                    if($_SESSION["typeId"] == 1){
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='checkbox[]' id='checkbox[]' value=".$row['id']."></td>";
                            echo "<td>" .$row['id']. "</td>";
                            echo "<td>" .$row['name']. "</td>";
                            echo "<td><img width = '10%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'></td>";
                            echo "<td>" .$row['gender']. "</td>";
                            echo "<td>".$row['dateOfBirth']."</td>";
                            echo "<td>" .$row['scheduleTypeId']. "</td>";
                            echo "<td>".$row['hobbies']."</td>";
                            echo "<td>" .$row['medicalProblems']. "</td>";
                            echo "<td>".$row['disability']."</td>";
                            echo "<td>".$row['userId']."</td>";
                           
                            //to comment on one child

                            $_SESSION["toChildId"] =$row['id'];
                            
                            //ends (to comment on one child)
                            print '<td><center><a href="editChild.php?id='.$row['id'].'">Edit</a></center></td>';
                            echo "</tr>";
                        }
                    }

                    //if the user is a Teacher he'll/she'll see all the children in his/her nursery
                    else if($_SESSION["typeId"] == 3){

                        if($_SESSION["departmentId"] == 8){

                            $sqlTeacherChildren = mysqli_query($conn, "SELECT c.*,scT.scheduleName,u.firstName,u.lastName FROM employee e join user u on e.userId=u.id 
                                                join subject s ON s.teacherId = u.id 
                                                AND s.teacherId='".$_SESSION["userId"]."'
                                                join schedules sc on sc.subjectId=s.id
                                                join scheduletypes scT on sc.scheduleTypeId=scT.id
                                                join child c on scT.id=c.scheduleTypeId"); 
                            while($row = mysqli_fetch_array($sqlTeacherChildren)){
                                echo "<tr>";
                                echo "<td><input type='checkbox' name='checkbox[]' id='checkbox[]' value=".$row['id']."></td>";
                                echo "<td>" .$row['id']. "</td>";
                                echo "<td>" .$row['name']. "</td>";
                                echo "<td><img width = '10%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'></td>";
                                echo "<td>" .$row['gender']. "</td>";
                                echo "<td>".$row['dateOfBirth']."</td>";
                                echo "<td>" .$row['scheduleTypeId']. "</td>";
                                echo "<td>".$row['hobbies']."</td>";
                                echo "<td>" .$row['medicalProblems']. "</td>";
                                echo "<td>".$row['disability']."</td>";
                                echo "<td>".$row['userId']."</td>";
                                echo "</tr>";
                            }
                        }
                        else if($_SESSION["departmentId"] == 5 && $_SESSION["departmentId"] == 2){
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td><input type='checkbox' name='checkbox[]' id='checkbox[]' value=".$row['id']."></td>";
                                echo "<td>" .$row['id']. "</td>";
                                echo "<td>" .$row['name']. "</td>";
                                echo "<td><img width = '10%' src = 'data: image/".$row["photoExtension"]."; base64, ".base64_encode($row["photo"])."'></td>";
                                echo "<td>" .$row['gender']. "</td>";
                                echo "<td>".$row['dateOfBirth']."</td>";
                                echo "<td>" .$row['scheduleTypeId']. "</td>";
                                echo "<td>".$row['hobbies']."</td>";
                                echo "<td>" .$row['medicalProblems']. "</td>";
                                echo "<td>".$row['disability']."</td>";
                                echo "<td>".$row['userId']."</td>";
                                echo "</tr>";
                            }
                        }
                    }
                    echo "</table>";
                    echo "</form>";
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
            if($_SESSION["typeId"] == 1 || $_SESSION["typeId"] == 3){
                include 'Comments.php';
            }

            //mysqli_close($conn);    
        ?>

        <?php
            if(isset($_POST['Delete_Child'])){

                if (isset($_POST['checkbox'])){

                    $count = 0;
                    $DecID = $_POST['checkbox'];
                    foreach ($DecID as $keys => $value){
                        $DecSql = "DELETE FROM child WHERE id = $value";
                        
                        if(mysqli_query($conn,$DecSql)){
                            $count++;
                        }
                        else{
                            echo"Error with ID: '".$value."'<br>";
                        }
                    }
                }
                else{
                    echo"Please select achild to delete";
                }

                if($count == count($DecID)){
                    echo "Child Deleted Successfully</br>";
                    echo "<a href='displayChilds.php'> Refresh </a>";
                }
                else{
                    echo"Error occured";
                }
            }            
        ?>
    </body>
    <style>
        body
        {
            background-color:teal; 
        }
        
        .Table_Of_Childs
        {
            background-color:linen;
            border:5px solid black;
            top:20px;
            left:20px;
            width:static;
            height:static;
            table-layout:auto;
            text-align:center;
            font-size:15px;
            display: inline-block;
        } 
        #addChild_Button , #editChild_Button
        {
            background-color: bisque;
            color: black;
            font-size: 12px;
            font-weight: bold;
            padding: 15px 20px;
            border-radius: 50px ;
            border:none;
            margin-bottom:10px; 
            margin-top:50px;
            margin-left:50px;
            cursor: pointer;
            width: 20;
        }
        #addChild_Button:hover ,  #editChild_Button:hover /*when standing on the buttons*/
        {
            background-color:linen;
            opacity: 2.5;
        } 
        .View_Childs
        {
            background-color:red;
        }
        
    </style>
</html>
