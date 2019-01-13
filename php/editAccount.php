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

    <form id="Edit_Account_Form" name="editForm" action="" method="post">
        <fieldset>
            <h1 id="Form_Title"> Edit Account Information </h1>
       <b> First Name: </b>
        <input type="text" name="firstName" value="<?php echo $_SESSION["firstName"];?>" placeholder="First Name.."><br>

       <b> Last Name:</b>
        <input type="text" name="lastName" value="<?php echo $_SESSION["lastName"];?>" placeholder="Last Name.."><br>

        <b>Password:</b>
        <input type="text" name="password" value="<?php echo $_SESSION["password"];?>" placeholder="Password"><br>

        <input type="submit" name="submit" value="Save" id="Submit_Button">
        <input type="submit" name="deleteAccount" value="Delete your Account" id="Submit_Button" >
    </form>
    </fieldset>
</body>
<style>
body
{
    background-color: teal;
}
  
#Form_Title
{
    color:black;
    text-align:center;
} 
#Edit_Account_Form fieldset 
{
    background: linen; 
    border: none;
	border-radius: 10px;
	padding: 20px 30px;/*centering of objects inside the fieldset*/
	box-sizing: border-box;
    width: 40%;
	position: static; 
}
#Edit_Account_Form input  /*inside text fields colors*/
{
    padding: 15px;
    top:100px;
	border: 1px solid #ccc;/*border of textfields*/
	border-radius: 10px;/*curves of edges */
	margin-bottom: 20px;/*space between textfields*/
	width: 100%;/*scale of objects inside the beige color*/
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
#Edit_Account_Form .action-button
{
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#Submit_Button
{
    background-color: linen;
    color: white;
    font-size: 50px;
    font-weight: bold;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
}
#Submit_Button:hover 
    {
        background-color:white;
        opacity: 2.5;
    }
    </style>

</html>
