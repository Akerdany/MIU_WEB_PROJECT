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

    <form name="editForm" action="" method="post">

       <b> First Name: </b>
        <input type="text" name="firstName" value="<?php echo $_SESSION["firstName"];?>" placeholder="First Name.."><br>

       <b> Last Name:</b>
        <input type="text" name="lastName" value="<?php echo $_SESSION["lastName"];?>" placeholder="Last Name.."><br>

        <b>Password:</b>
        <input type="text" name="password" value="<?php echo $_SESSION["password"];?>" placeholder="Password"><br>

        <input type="submit" name="submit">
        <input type="submit" name="deleteAccount" value="Delete your Account">
    </form>

</body>

</html>
