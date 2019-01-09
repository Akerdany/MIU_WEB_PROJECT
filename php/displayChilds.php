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

            $sql="SELECT * FROM child";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){

                //if the user is a Parent he'll see only his children
                if($_SESSION["typeId"] == '2'){
                    $result1 = mysqli_query($conn, "SELECT * FROM child WHERE userId='".$_SESSION["userId"]."'");
                    
                    if(mysqli_num_rows($result1) == 1){
                        if($row = mysqli_fetch_array($result1)){
                            // $photo = $row['photo'];
                            // $photo = stripslashes($photo);
                            // $photo = base64_decode($photo);
                            // $photo = stripslashes($photo);

                            // header("content-type: $row['content_type']");
                            // echo $photo;
                            echo '<form method="post" action="" enctype="multipart/form-data">';
                            echo "  <img width = '20%' src = 'data: image/*; base64, ".base64_encode($row["photo"])."'><br>";
                            echo '  <input type="text" id="name" value='.$row["name"].'>';
                            echo '  <input type="submit" id="submit" value="Submit"/>';
                            echo '</form>';                         
                        }              
                    }
                    else if(mysqli_num_rows($result1) > 1){

                    }
                    
                }
                else{
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
                    else if($_SESSION["departmentId"] == '8' && $_SESSION["typeId"] == '3'){
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
