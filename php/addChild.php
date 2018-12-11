<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Child</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        session_start();
        require_once("Database_Connection.php");

        if(isset($_POST['submit'])){
            $sql = "INSERT INTO `child` (`id`,`name`, `hobbies`,`medicalProblems`,`disability`,`parentId`)
                    VALUES (NULL,'".$_POST['name']."','".$_POST['hobbies']."','".$_POST['medicalProblem']."','".$_POST['disabilty']."','".$_SESSION["id"]."')";

            if (mysqli_query($conn,$sql)) {
                header("location:child.php");
            }
            else {
                echo $sql;
            }
        }
    ?>

    <form name="childForm" action="" method="post">
      <input type="text" name="name" placeholder="Child Name"/><br>

    <input type="text" name="hobbies" placeholder="Hobbies"/><br>
    <input type="text" name="medicalProblem" placeholder="Medical Problems"/><br>
    <input type="text" name="disabilty" placeholder="Disabilty"/><br>

    <input type="submit" name="submit"/>
</body>
</html>
