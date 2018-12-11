<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        session_start();
        require_once("Database_Connection.php");

    //    if($_SESSION['type_User']=="Manager"){

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
              include 'Comments.php';
        //}


    ?>
</body>
</html>
<?php
mysqli_close($conn);

 ?>
