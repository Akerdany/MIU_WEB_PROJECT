<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#editPassword").click(function(){
                $("#Form").hide();
                $("#passwordForm").fadeIn(1000);
            });
        });

        $(document).ready(function(){
            $("#getBack").click(function(){
                $("#passwordForm").hide();
                $("#Form").fadeIn(1000);
            });
        });

    </script>

</head>

<body>
    <?php
        session_start();
        require_once("Database_Connection.php");
        require("sidebar.php");

        if(isset($_POST['submit'])){
            $first = $_POST['firstName'];
            $last = $_POST['lastName'];
            $pass = $_POST['password'];
            $id = $_SESSION['id'];

            mysqli_query($conn, "UPDATE user SET firstName='$first', lastName='$last', password='$pass' WHERE id='$id'");

            header("Location: logIn.php");
        }
        else if(isset($_POST['deleteAccount'])){
            header("Location: deleteAccount.php");
        }
        mysqli_close($conn);
    ?>

    <div id="passwordForm" style="display:none;">
        <form name="passwordEdit" action="" method="post">
            <b> Old Password: </b>
            <input type="password" name="oldPassword" placeholder="Old Password"><br>

            <b> New Password: </b>
            <input type="password" name="newPassword" placeholder="New Password"><br>
            
            <b> Confirm New Password: </b>
            <input type="password" name="confirmNewPassword" placeholder="Confirm New Password"><br>

            <input type="submit" name="newPass">
        </form>
        <button id='getBack' name='getBack' type='button'>Get Back</button><br>
    </div>

    <div id="Form">
        <form name="editForm" action="" method="post">

            <b> First Name: </b>
            <input type="text" name="firstName" value="<?php echo $_SESSION["firstName"];?>" placeholder="First Name.."><br>

            <b> Last Name: </b>
            <input type="text" name="lastName" value="<?php echo $_SESSION["lastName"];?>" placeholder="Last Name.."><br>

            <b> Family Name: </b>
            <input type="text" name="lastName" value="<?php echo $_SESSION["familyName"];?>" placeholder="Family Name.."><br>
            
            <b> Nationality: </b>
            <input type="text" name="lastName" value="<?php echo $_SESSION["nationality"];?>" placeholder="Nationality"><br>

            <b> Date of Birth: </b>
            <input type="date" name="lastName" value="<?php echo $_SESSION["dateOfBirth"];?>"><br>

            <b> Work Number: </b>
            <input type="number" name="lastName" value="<?php echo $_SESSION["workNumber"];?>" placeholder="Work Number"><br>
            
            <b> Phone Number: </b>
            <input type="number" name="lastName" value="<?php echo $_SESSION["phoneNumber"];?>" placeholder="Phone Number"><br>

            <b> Home Number: </b>
            <input type="number" name="lastName" value="<?php echo $_SESSION["homeNumber"];?>" placeholder="Home Number"><br>

            <b> SSN: </b>
            <input type="number" name="lastName" value="<?php echo $_SESSION["ssn"];?>" placeholder="SSN"><br>

            <b> Email: </b>
            <input type="text" name="lastName" value="<?php echo $_SESSION["username"];?>" placeholder="Email"><br>

            <button id='editPassword' name='editPassword' type='button'>Edit your Password</button>
            <input type="submit" name="submit" value="Edit">
            <input type="submit" name="deleteAccount" value="Delete your Account">
        </form>
    </div>
</body>

</html>
