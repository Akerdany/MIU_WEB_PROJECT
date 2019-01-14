<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <link rel="stylesheet" href="../css/DeleteAccount.css">
        <script src="main.js"></script>
    </head>
    <body>
        <?php
            session_start();
            require_once("Database_Connection.php");

            if(isset($_POST['submit'])){
                if($_SESSION['password']==$_POST['password']   )
                {
                    if($_POST['password']==$_POST['confirmPassword'] )
                    {
                    $sql="DELETE user ";
                    if( $_SESSION["typeId"] == 2   )
                     {
                       $sql=$sql." ,address,parent,child FROM user INNER JOIN address INNER JOIN parent INNER JOIN child
                       ON user.id=address.userId AND address.userId=parent.userId AND parent.userId=child.userId WHERE user.email='".$_SESSION['email']."' AND user.password='".$_SESSION['password']."'";
                     }
                     else if( $_SESSION["typeId"] == 3 )
                     {
                        if( $_SESSION["departmentId"] == 8){
                       $sql=$sql." ,address,employee,uploads,subject FROM user INNER JOIN address INNER JOIN employee INNER JOIN subject  INNER JOIN uploads  
                       ON user.id=address.userId AND address.userId=employee.userId AND employee.userId=subject.userId AND subject.userId=uploads.userId WHERE user.email='".$_SESSION['email']."' AND user.password='".$_SESSION['password']."'";
                    }
                    else
                    {
                        $sql=$sql." ,address,employee,uploads FROM user INNER JOIN address INNER JOIN employee   INNER JOIN uploads  
                        ON user.id=address.userId AND address.userId=employee.userId AND employee.userId=uploads.userId WHERE user.email='".$_SESSION['email']."' AND user.password='".$_SESSION['password']."'";
                     
                    }
                     }
                    
                 
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
                else
                {
                    echo"They are not equal<br>";
                }
                }
                else{
                    echo"Sorry, you have entered the password wrong<br>";
                }
            }
            mysqli_close($conn);
        ?>
        <div id="DeleteAccountForm">

        <fieldset>
        <h2 class="Form_Title">Delete Account  Confirmation </h2>
        <form name="deleteForm" action="" method="post">
           <b> Enter your password:</b>
            <input type="password" name="password" required>

            <b>Confirm your password:</b>
            <input type="password" name="confirmPassword" required>

            <input type="submit" name="submit" value="Delete Account" id="Delete_Button">
        </form>
        </fieldset>
        </div>
    </body>

</html>


