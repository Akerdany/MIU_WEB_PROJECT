

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

        $sql="SELECT * FROM child WHERE parentSsn='".$_SESSION["ssn"]."'";
        $result = mysqli_query($conn, $sql);

        if($row = mysqli_fetch_array($result)){
            $idChild = $row["id"];
            $hobbies = $row["hobbies"];
            $medic = $row["medicalProblems"];
            $disability = $row["disability"];
            $Pssn = $row["parentSsn"];
        }
        else{
            header("Location: addChild.php");
        }
    ?>

    <form name="dataChild" action="" method="post">
    <input type="text" name="childHobbies" value=<?php echo $hobbies;?>><br>
    <input type="text" name="medicalProblems" value=<?php echo $medic;?>><br>
    <input type="text" name="disability" value=<?php echo $disability;?>><br>
</body>
</html>
<?php
mysqli_close($conn);

 ?>
