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
            $check = 0;
            echo $_SESSION['userId'];
            if(isset($_POST['submit'])){

                if($_SESSION['password']==$_POST['password']){

                    if($_POST['password']==$_POST['confirmPassword']){

                        $sqlAdd="DELETE FROM address WHERE userId = '".$_SESSION['userId']."' ";
                        if(mysqli_query($conn,$sqlAdd)){

                            if($_SESSION['typeId']==2){

                                $sqlParent="DELETE FROM parent WHERE userId = '".$_SESSION['userId']."' ";
                                if(mysqli_query($conn,$sqlParent)){

                                    //Check if there a children for this account first:
                                    $child="SELECT * FROM child WHERE userId='".$_SESSION['userId']."'";
                                    if(mysqli_num_rows($child)>0){ 

                                        $sqlChild="DELETE FROM child WHERE userId = '".$_SESSION['userId']."' ";
                                        if(mysqli_query($conn,$sqlChild)){
                                            $check = 1;
                                        }
                                        else{
                                            echo "ERROR: Could not able to execute $sqlChild. ". mysqli_error($conn);
                                        }  
                                    }
                                    else if(mysqli_num_rows($child)==0){
                                        $check = 1;
                                    }          
                                }
                                else{
                                    echo "ERROR: Could not able to execute $sqlParent. ". mysqli_error($conn);
                                }            
                            }
                            else if($_SESSION['typeId']==3){

                                $sqlEmp="DELETE FROM employee WHERE userId = '".$_SESSION['userId']."' ";
                                if(mysqli_query($conn,$sqlEmp)){

                                    $sqlUploads="DELETE FROM uploads WHERE userId = '".$_SESSION['userId']."' ";
                                    if(mysqli_query($conn,$sqlUploads)){
                                        $check = 1;
                                    }
                                    else{
                                        echo "ERROR: Could not able to execute $sqlUploads. ". mysqli_error($conn);
                                    }            
                                }
                                else{
                                    echo "ERROR: Could not able to execute $sqlEmp. ". mysqli_error($conn);
                                }        
                            }
                        }
                        else{
                            echo "ERROR: Could not able to execute $sqlAdd. ". mysqli_error($conn);
                        }

                        
                        if($check==1){

                            $lastSql="DELETE FROM user WHERE id = '".$_SESSION['userId']."' ";
                            if(mysqli_query($conn,$sqlUploads)){
                                session_destroy();
                                header("location:../html/Welcome_Page.php");
                            }
                            else{
                                echo "ERROR: Could not able to execute $lastSql. ". mysqli_error($conn);
                            }
                        }
                    }
                    else{
                        echo"Sorry, you have entered the password wrong<br>";
                    }
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


