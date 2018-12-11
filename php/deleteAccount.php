<!DOCTYPE <!DOCTYPE html>
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

        if(isset($_POST['submit'])){
            if($_POST['password']==$_POST['confirmPassword']){
                
                if($_SESSION['password']==$_POST['password']){
                    $sql="DELETE FROM user WHERE id = '".$_SESSION['id']."'";
                    mysqli_query($conn,$sql);
                    echo"Account deleted";
                    
                    if(mysqli_close($conn)){
                        session_destroy();
                        header("location:../html/NurseryWebsite.html");
                    }
                    else{
                        echo "ERROR: Could not able to execute $sql. ". mysqli_error($conn);
                    }
                } 
                else{
                    echo"Sorry, you have entered the password wrong<br>";             
                }
            }
            else{
                echo"You must enter the confirmation code right<br>";
            }
        }   
    ?>
    <br>
    <form name="deleteForm" action="" method="post">
        Enter your password:<br>
        <input type="password" name="password" required><br>

        Confirm your password:<br>
        <input type="password" name="confirmPassword" required><br><br>

        <input type="submit" name="submit">
    </form>
</body>
</html>

