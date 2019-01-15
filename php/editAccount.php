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

            header("location:../html/Welcome_Page.php");
        }
        else if(isset($_POST['deleteAccount'])){
            header("Location: deleteAccount.php");
        }
        
        else if(isset($_POST['newPass'])){
            
            $oldPass = $_POST['oldPassword'];
            $newPassword = $_POST['newPassword'];
            $confirmNewPassword = $_POST['confirmNewPassword'];

            if($oldPass == $_SESSION['password']){
                if($newPassword == $confirmNewPassword){
                    $query = "UPDATE user SET password='$newPassword' WHERE id='$id'";
                    
                    if(mysqli_query($conn, $query)){
                        $_SESSION['password']=$newPassword;
                        header("Location: ../html/Welcome_Page.php");
                    }
                    else{
                        echo"Error occured";
                    }
                }
                else{
                    echo"Error occured";
                }
            }
            else{
                echo"Error occured";
            }

        }
        
        mysqli_close($conn);
    ?>

    <div id="passwordForm" style="display:none;">
        <form name="passwordEdit" action="" method="post">
            <fieldset>
            <b> Old Password: </b>
            <input type="password" name="oldPassword" placeholder="Old Password"><br>

            <b> New Password: </b>
            <input type="password" name="newPassword" placeholder="New Password"><br>
            
            <b> Confirm New Password: </b>
            <input type="password" name="confirmNewPassword" placeholder="Confirm New Password"><br>

            <input id="Change_Password_Button" type="submit" name="newPass" value="Change Password">
    
        </form>
        <button id='getBack' name='getBack' type='button'>Get Back</button><br>
        </fieldset>
    </div>

    <div id="Form">
        <form id="Edit_Account_Form" name="editForm" action="" method="post">
        <fieldset>
            <h1 id="Form_Title"> Edit Account Information </h1>
            <b> First Name: </b>
            <input type="text" name="firstName" value="<?php echo $_SESSION["firstName"];?>" placeholder="First Name.."><br>

            <b> Last Name: </b>
            <input type="text" name="lastName" value="<?php echo $_SESSION["lastName"];?>" placeholder="Last Name.."><br>

            <b> Family Name: </b>
            <input type="text" name="lastName" value="<?php echo $_SESSION["familyName"];?>" placeholder="Family Name.."><br>
            
            <b> Nationality: </b>
            <input type="text" name="lastName" value="<?php echo $_SESSION["nationality"];?>" placeholder="Nationality"><br>

            <b> Home Number: </b>
            <input type="number" name="lastName" value="<?php echo $_SESSION["homeNumber"];?>" placeholder="Home Number"><br>
            
            <b> Work Number: </b>
            <input type="number" name="lastName" value="<?php echo $_SESSION["workNumber"];?>" placeholder="Work Number"><br>
            
            <b> Phone Number: </b>
            <input type="number" name="lastName" value="<?php echo $_SESSION["phoneNumber"];?>" placeholder="Phone Number"><br>

            <b> Email: </b>
            <input type="text" name="lastName" value="<?php echo $_SESSION["username"];?>" placeholder="Email"><br>

            <button id='editPassword' name='editPassword' type='button'>Edit your Password</button>
            <input type="submit" name="submit" value="Save">
            <input type="submit" name="deleteAccount" value="Delete your Account">
        </form>
    </div>
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
#Edit_Account_Form input, #editPassword   /*inside text fields colors*/
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
    background-color: bisque;
    color: black;
    font-size: 12px;
    font-weight: bold;
    padding: 15px 20px;
    border-radius: 50px ;
    border:none; 
    margin-bottom:10px; 
    margin-top:20px;
    margin-left:50px;
    cursor: pointer;
    width: 200px;
}
#Change_Password_Button , #getBack
{
    background-color: bisque;
    color: black;
    font-size: 12px;
    font-weight: bold;
    padding: 15px 20px;
    border-radius: 50px ;
    border:none; 
    margin-bottom:10px; 
    margin-top:20px;
    margin-left:0px;
    cursor: pointer;
    width: 200px;  
}
#Submit_Button:hover , #Change_Password_Button:hover , #getBack:hover  /*when standing on the buttons*/
{
background-color:linen;
opacity: 2.5;
} 

#passwordForm /*whole parent form */
{
	width: 500px;
	margin: 50px auto;
	text-align: center;
	position: relative;
}
#passwordForm fieldset /*each form of registration */
{
	background: bisque;
    border: 0 none;
	border-radius: 15px;
	padding: 20px 30px;
	box-sizing: border-box;
	width: 80%;
	
	/*stacking fieldsets above each other*/
	position: absolute;
} 
/*inputs*/
#passwordForm input, #passwordForm textarea
{
	padding: 15px;
	border: 1px solid #ccc;/*color of border inside teh text field*/
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
/*buttons*/
#passwordForm .action-button
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
</style>
</html>
