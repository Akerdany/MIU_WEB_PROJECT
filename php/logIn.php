<!DOCTYPE html>
<html lang="en">

<?php 
    echo '<link media="screen" rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />';

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
                $_SESSION["userId"] = $row["id"];
                $_SESSION["username"] = $row["email"];
                $_SESSION["password"] = $row["password"];
                $_SESSION["firstName"] = $row["firstName"];
                $_SESSION["lastName"] = $row["lastName"];
                $_SESSION["familyName"] = $row["familyName"];
                $_SESSION["gender"] = $row["gender"];
                $_SESSION["nationality"] = $row["nationality"];
                $_SESSION["dateOfBirth"] = $row["dateOfBirth"];
                $_SESSION["workNumber"] = $row["workNumber"];
                $_SESSION["phoneNumber"] = $row["phoneNumber"];
                $_SESSION["homeNumber"] = $row["homeTelephoneNumber"];
                $_SESSION["ssn"] = $row["ssn"];
                $_SESSION["statusId"] = $row["statusId"];
                $_SESSION["typeId"] = $row["typeId"];

                //Getthing the type of user: Manager .. Employee .. Parent
                $temp = mysqli_query($conn, "SELECT * FROM type WHERE id='".$row["typeId"]."'");

                //getting status of user even accepted .. pending .. rejected 
                $temp2 = mysqli_query($conn, "SELECT * FROM type WHERE id='".$row["statusId"]."'");

                /*User $temp and $temp2 to get the name of the user type and status name in case instead of using
                statusId and typeId in the session.*/
                if($r = mysqli_fetch_array($temp) && $r2 = mysqli_fetch_array($temp2)){

                    $_SESSION["type_User"] = $r["typeName"];
                    $_SESSION["statusName"] = $r2["typeName"];

                    //If the user is an employee or a manager:
                    if($_SESSION["typeId"] == '1' || $_SESSION["typeId"] == '3'){

                        $temp3 = mysqli_query($conn, "SELECT * FROM employee WHERE userId='".$row["id"]."'");
                        
                        if($tempR = mysqli_fetch_array($temp3)){
                            $_SESSION["workingHours"] = $tempR["workingHours"];
                            $_SESSION["workingDays"] = $tempR["workingDays"];
                            $_SESSION["departmentId"] = $tempR["department"];
                            $_SESSION["salary"] = $tempR["salary"];
                            $_SESSION["incomeMethod"] = $tempR["incomeMethod"];
                            $_SESSION["universityDegree"] = $tempR["universityDegree"];
                            $_SESSION["positionId"] = $tempR["position"];
                            $_SESSION["experience"] = $tempR["experience"];
                            $_SESSION["bankAccount"] = $tempR["bankAccount"];
                            $_SESSION["categoryId"] = $tempR["category"];
                            $_SESSION["yearOfGraduation"] = $tempR["yearOfGraduation"];
                            $_SESSION["university"] = $tempR["university"];
                            $_SESSION["skills"] = $tempR["skills"];
                            $_SESSION["medicalInsuranceId"] = $tempR["medicalInsuranceId"];
                            
                            // $_SESSION["medicalTest"] = $tempR["medicalTest"];
                            // $_SESSION["cv"] = $tempR["cv"];
                        }
                        else{
                            //Underconstructing the error table for IT department
                            printf("Errormessage: %s\n", mysqli_error($conn));
                            session_destroy();
                        }
                    }
                    //If the user is a parent:
                    else if($_SESSION["typeId"] == '2'){

                        $temp4 = mysqli_query($conn, "SELECT * FROM parent WHERE userId='".$row["id"]."'");
                        if($tempR = mysqli_fetch_array($temp4)){
                            $_SESSION["workPosition"] = $tempR["workPosition"];
                            $_SESSION["workPlace"] = $tempR["workPlace"];
                        }
                        else{ 
                            //Underconstructing the error table for IT department
                            printf("Errormessage: %s\n", mysqli_error($conn));
                            session_destroy();
                        }
                    }
                    
                    //If the account is active:
                    if($_SESSION["statusId"] == '2'){
                        header("Location: index.php");
                    }
                    //If the account is pending:
                    else if($_SESSION["statusId"] == '1'){
                        echo"Sorry, you're account isn't active yet";
                    }   
                    //If the account has been deleted:
                    else if($_SESSION["statusId"] == '3'){
                        echo"Sorry, you're account has been deleted";
                    }
                    else{
                        //Underconstructing the error table for IT department
                        printf("Errormessage: %s\n", mysqli_error($conn));
                        session_destroy();
                    }
                }      
                else{
                    echo $temp;
                    echo"<br>";
                    echo $temp2;
                    echo"<br>";
                            
                    //Underconstructing the error table for IT department
                    printf("Errormessage: %s\n", mysqli_error($conn));
                }  
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("you have entered the username or password wrong or you need to register")';
                echo '</script>';         
            }
        }
    }
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LogIn Page</title>
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
                Don't have an account yet ? <a href='registration.php'>Register</a>
            </form>
        </div>  

    <style>
      
        body
        {
            font-family: Verdana, sans-serif;
            background-image: URL("../pictures/Background.jpg"); 
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