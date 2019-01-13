<?php
            require_once("Database_Connection.php");
            $result1 = mysqli_query($conn, "SELECT * FROM child WHERE userId='27'");

        if(isset($_POST['submit'])){
            $photo = addslashes($_FILES['photo']['tmp_name']);
            $photo = file_get_contents($photo);
            $photo = base64_encode($photo);
            $extensionFile = pathinfo($_FILES["photo"]["name"])['extension'];
            $fileSize = $_FILES["photo"]["size"]; 
            $fileName = $_FILES["photo"]["name"];
            echo $fileName;

            $sql = "INSERT INTO `uploads` (`Id`, `Name`, `Type`, `Size`, `Extension`, `Data`, `userId`)
            VALUES (NULL, '".$fileName."','".$extensionFile."','".$fileSize."','','".$photo."','27')";

            // if($row = mysqli_fetch_array($result1)){

            // // $photo = addslashes($_FILES['photo']['tmp_name']);
            // // $path_info = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
            // $ext = pathinfo($_FILES["photo"]["name"])['extension']; 
            // echo $ext; // "bill"
        
            // echo '<form method="post" action="" enctype="multipart/form-data">';
            // echo "  <img width = '20%' src = 'data: image/".$ext."; base64, ".base64_encode($row["photo"])."'><br>";
            // echo '  <input type="text" id="name" value='.$row["name"].'>';
            // echo '  <input type="submit" id="submit" value="Submit"/>';
            // echo '</form>';  
            if (mysqli_query($conn,$sql)) {

            session_start();
            echo"<a href='download.php'>Download File</a>";
            session_destroy();
            }
            }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Nursery </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<form name="childForm" action="" method="post" enctype="multipart/form-data">
        
        <input type="text" name="name" placeholder="Child Name">
        Photo:
        <input type="file" name="photo" required>
        <input type="submit" name="submit"  value="Add Child" id="Submit_Button" > 

    </form>

</body>
</html>