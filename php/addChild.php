<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Child</title>
    <link rel="stylesheet" href="../css/addChild.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
    <script src="main.js"></script>
</head>
<body>
    <?php
        session_start();
        require_once("Database_Connection.php");

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $hobbies = $_POST['hobbies'];
            $medical = $_POST['medicalProblem'];
            $disability = $_POST['disabilty'];
            $gender = $_POST['gender'];
            $dateOfBirth = $_POST['dateOfBirth'];

            $photo = addslashes($_FILES['photo']['tmp_name']);
            $photo = file_get_contents($photo);
            $photo = base64_encode($photo);

            $sql = "INSERT INTO `child` (`id`, `photo`, `name`, `hobbies`, `medicalProblems`, `disability`, `userId`, `gender`, `dateOfBirth`, `scheduleTypeId`)
                    VALUES (NULL, '".$photo."','".$name."','".$hobbies."','".$medical."','".$disability."','".$_SESSION["userId"]."','".$gender."','".$dateOfBirth."','5')";

            if (mysqli_query($conn,$sql)) {
                header("location:displayChilds.php");
            }
            else {
                echo $sql;
                echo"<br>";
                
                //Underconstructing the error table for IT department
                printf("Errormessage: %s\n", mysqli_error($conn));
            }
        }
        mysqli_close($conn);
    ?>

    <form name="childForm" action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Child Name"/><br>
        Photo:
        <input type="file" name="photo"/><br>
        <input type="radio" name="gender" value="Male"> Male <br>
        <input type="radio" name="gender" value="Female"> Female <br> 
        <input type="date" name="dateOfBirth"/><br>
        <input type="text" name="hobbies" placeholder="Hobbies"/><br>
        <input type="text" name="medicalProblem" placeholder="Medical Problems"/><br>
        <input type="text" name="disabilty" placeholder="Disabilty"/><br>

        <input type="submit" name="submit"/>
</body>
</html>

