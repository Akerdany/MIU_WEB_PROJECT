<!DOCTYPE html>
<html lang="en">

<?php 
   echo '<link href="C:\wamp64\www\MIU_Web_Project\css\Login_Page.css" media="screen" rel="stylesheet" type="text/css" />';	
   echo '<link media="screen" rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />';
?>

  <?php 
  session_start();
    require_once("Database_Connection.php");

    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $error = "Username or Password is invalid";
            echo'Error';
        }
        else{
            $sql="SELECT * FROM user WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'";
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
                $_SESSION["ssn"]=$row["ssn"];
                $_SESSION["type_User"]=$row["type"];

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
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    
    <body>

        <div class="Login_Field">
            <form id="Form_Buttons" action="" method="post">

            <div class="input-container">
                    <i class="fa fa-envelope  icon"></i> <!--username icon class-->
                    <input class="input-field" type="text" placeholder="Email" name="email" required>
            </div>
            <div class="input-container">
                    <i class="fa fa-key icon"></i><!--passwrod icon class-->
                    <input class="input-field" type="password" placeholder="Password" name="password" required>
            </div>
                <input type="submit" class="Submit_Button" name="submit">
            </form>
        </div>  
       <style>

           
body
{
    font-family: Verdana, sans-serif;
    background-image: URL("Background.jpg" ); 
    background-size: cover ;/* Set The image in Full size*/
    
}
.Login_Field
{
    /*background-image: linear-gradient( snow,aqua ,skyblue , pink ,hotpink , coral , teal ,green, yellow, orange,violet,pink);*/
 
    background-color:transparent; 
    width: 500px;
    border-radius: 20px;
    margin: center;    
    height: 180px;  
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 15px;
    top: 300px;
}
#Form_Buttons
{
    background-color:Transparent;   
}
* {box-sizing: border-box;}

.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}

.icon {
    padding: 10px;
    background: teal;
    color: white;
    min-width: 50px;
    text-align: center;
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.Submit_Button {
    background-color: teal;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.Submit_Button:hover {
    opacity: 1;
}
</style>


</html>