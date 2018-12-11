<!DOCTYPE html>

<?php
    session_start();
    require_once("Database_Connection.php");

    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username or Password is invalid";
            echo $error;
        }
        else{
            $sql="SELECT * FROM user WHERE email='".$_POST['username']."' AND password='".$_POST['password']."'";
            $result = mysqli_query($conn, $sql);

            if($row = mysqli_fetch_array($result)){
                $_SESSION["id"]=$row["id"];
                $_SESSION["username"]=$row["email"];
                $_SESSION["password"]=$row["password"];
                $_SESSION["firstName"]=$row["firstName"];
                $_SESSION["lastName"]=$row["lastName"];
                $_SESSION["familyName"]=$row["familyName"];
                $_SESSION["gender"]=$row["gender"];
                $_SESSION["nationality"]=$row["nationality"];
                $_SESSION["dateOfBirth"]=$row["dateOfBirth"];
                $_SESSION["workNumber"]=$row["workNumber"];
                $_SESSION["phoneNumber"]=$row["phoneNumber"];
                $_SESSION["homeNumber"]=$row["homeTelephoneNumber"];
                $_SESSION["ssn"]=$row["ssn"];

                $result1=mysqli_query($conn,"SELECT * FROM type WHERE id='".$row["typeId"]."'");

                if($row2=mysqli_fetch_array($result1)){
                    $_SESSION["type_User"]=$row2["typeName"];
                }

                echo '<script language="javascript">';
                echo 'alert($result1)';
                echo '</script>';

                header("Location: index.php");
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("you have entered the username or password wrong")';
                echo '</script>';
            }
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <style>
    .body{
        position:fixed;
        top: 50%;
        left: 50%;
        width:30em;
        height:18em;
        margin-top: -9em; /*set to a negative number 1/2 of your height*/
        margin-left: -15em; /*set to a negative number 1/2 of your width*/
        border: 1px solid #ccc;
        background-color: #f3f3f3;
    }
    </style>

    <body>

        <div class="body">
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <input type="submit" name="submit">
            </form>
        </div>

    </body>
</html>
<?php
mysqli_close($conn);

 ?>
