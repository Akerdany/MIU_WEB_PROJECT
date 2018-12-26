<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../css/test.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script>

        $(document).ready(function(){
            $("#parent").click(function(){
                $("#choice").hide();
                $("#parentForm").fadeIn(1000);
            });
        });

        $(document).ready(function(){
            $("#employee").click(function(){
                $("#choice").hide();
                $("#employeeForm").fadeIn(1000);
            });
        });

        $(document).ready(function(){
            $("#backP").click(function(){
                $("#parentForm").fadeOut("fast");
                $("#choice").fadeIn(3000);
            });
        });

        $(document).ready(function(){
            $("#backE").click(function(){
                $("#employeeForm").fadeOut("fast");
                $("#choice").fadeIn(3000);
            });
        });

        function checkAvailability(){
            jQuery.ajax(
                {
                    url: "check_availability.php",
                    data: 'email='+$("#email").val(),
                    type: "POST",

                    success:function(data){
                        $("#msg").html(data);
                    },
                    error:function(){
                        $("#msg").html("error");
                    }
                });
        }

        function getResult()
        {
            jQuery.ajax(
                {
                    url: "backend-search.php",
                    data: 'term='+$("#term").val(),
                    type: "POST",
                    success:function(data2){
                        $("#result").html(data2);
                    }
                });
        }

    </script>

    <meta charset="utf-8">
        <title></title>

        <style>
            *{margin: 0px; padding:0px;  }
            #main{ width:300px; margin: 24px auto;}
            fieldset {
                display: block;
                margin-left: 2px;
                margin-right: 2px;
                padding-top: 0.35em;
                padding-bottom: 0.625em;
                padding-left: 0.75em;
                padding-right: 0.75em;
                border: 2px groove (internal value);
            }

            .email-ok{color:#2FC332;}
            .email-taken{color:#D60202;}
        </style>

    </head>

    <body>
        <?php
            require_once("Database_Connection.php");

            if (isset($_POST['registerParent']) || isset($_POST['registerEmployee'])){

                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $familyName = $_POST["familyName"];
                $gender = $_POST["gender"];
                $nationality = $_POST["nationality"];
                $dateOfBirth = $_POST["dateOfBirth"];
                $phoneNumber = $_POST["phoneNumber"];
                $homeNumber = $_POST["homeNumber"];
                $ssn = $_POST["ssn"];

                $region = $_POST["region"];
                $streetName = $_POST["streetName"];
                $buildingNumber = $_POST["buildingNumber"];
                $flatNumber = $_POST["flatNumber"];
                $apartmentNumber = $_POST["apartmentNumber"];
                $postalCode = $_POST["postalCode"];

                $workNumber = $_POST["workNumber"];

                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirmPassword = $_POST["confirmPassword"];

                if($firstName!="" && $lastName!="" && $familyName!="" && $gender!="" && $nationality!="" && $dateOfBirth!="" && $phoneNumber!="" &&
                $homeNumber!="" && $ssn != "" && $region!="" && $streetName!="" && $buildingNumber!="" && $flatNumber!="" && $apartmentNumber!="" && $postalCode!="" &&
                $workNumber!="" && $email!="" && $password!="" && $confirmPassword!=""){

                    if($password == $confirmPassword){

                        if(isset($_POST['registerParent'])){
                            $sql1 = "INSERT INTO `user` (`id`, `email`,`password`,`firstName` ,`lastName`,`familyName` , `gender` , `nationality` ,`dateOfBirth` ,`workNumber` ,`phoneNumber`,`homeTelephoneNumber`,`ssn` ,`typeId`)
                            VALUES (NULL,'".$email."','".$password."','".$firstName."','".$lastName."','".$familyName."','".$gender."','".$nationality."','".$dateOfBirth."','".$workNumber."','".$phoneNumber."','".$homeNumber."','".$ssn."','2')";
                        }
                        else if(isset($_POST['registerEmployee'])){
                            $sql1 = "INSERT INTO `user` (`id`, `email`,`password`,`firstName` ,`lastName`,`familyName` , `gender` , `nationality` ,`dateOfBirth` ,`workNumber` ,`phoneNumber`,`homeTelephoneNumber`,`ssn` ,`typeId`)
                            VALUES (NULL,'".$email."','".$password."','".$firstName."','".$lastName."','".$familyName."','".$gender."','".$nationality."','".$dateOfBirth."','".$workNumber."','".$phoneNumber."','".$homeNumber."','".$ssn."','1')";
                        }

                        if (mysqli_query($conn,$sql1)) {

                            $sqluserID = mysqli_query($conn,"SELECT id FROM user WHERE email='".$email."'");

                            if($row2 = mysqli_fetch_array($sqluserID)){

                                $userID = $row2["id"];

                                $sqlAdress = "INSERT INTO `address` (`id`, `Region`, `streetName`, `buildingNumber`, `floorNumber`, `appartment`, `postalCode`, `userId`) VALUES (NULL, '".$region."', '".$streetName."', '".$buildingNumber."', '".$flatNumber."', '".$apartmentNumber."', '".$postalCode."', '".$userID."')";

                                if(mysqli_query($conn,$sqlAdress)){

                                    if(isset($_POST['registerParent'])){

                                        $workPosition = $_POST["workPosition"];
                                        $workPlace = $_POST["workPlace"];
                                    
                                        if($workPosition!="" && $workPlace!=""){
                                            
                                            $sqlParent = "INSERT INTO `parent` (`id`, `userId`, `workPosition`, `workPlace`) VALUES (NULL, '".$userID."', '".$workPosition."', '".$workPlace."')";

                                            if(mysqli_query($conn,$sqlParent)){
        
                                                header("location:logIn.php");
                                            }
                                            else{
                                                echo $sqlParent;
                                                echo"<br>";
                            
                                                //Underconstructing the error table for IT department
                                                printf("Errormessage: %s\n", mysqli_error($conn));

                                            }
                                        }
                                        else{                                   
                                            echo"Parent table might have a problem";
                                        }
                                    }

                                    else if(isset($_POST['registerEmployee'])){

                                        $university = $_POST["university"];
                                        $universityDegree = $_POST["universityDegree"];
                                        $graduationYear = $_POST["graduationYear"];
                                        $department = $_POST["department"];
                                        // $cv = $_POST["cv"];
                                        $skills = $_POST["skills"];
                                        $bankAccount = $_POST["bankAccount"];
                                        // $medicalTest = $_POST["medicalTest"];
                                        
                                        $target_dir = "../upload";
                                        $target_file = $target_dir . basename($_FILES["cv"]["name"]);
                                        $uploadOk = 1;
                                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                        // Check if image file is a actual image or fake image
                                        if(isset($_POST["submit"])) {
                                            $check = getimagesize($_FILES["cv"]["tmp_name"]);
                                            if($check !== false) {
                                                echo "File is an image - " . $check["mime"] . ".";
                                                $uploadOk = 1;
                                            } else {
                                                echo "File is not an image.";
                                                $uploadOk = 0;
                                            }
                                        }
                                        if($university!="" && $universityDegree!="" && $graduationYear!="" && $department!="" && $skills!="" && $bankAccount!=""){
                                            
                                            $sqlEmployee = "INSERT INTO `employee` (`id`, `userId`, `university`, `universityDegree`, `yearOfGraduation`, `department`, `skills`, `bankAccount`) 
                                            VALUES (NULL, '".$userID."', '".$university."', '".$universityDegree."', '".$graduationYear."', '".$department."', '".$skills."', '".$bankAccount."')";

                                            if(mysqli_query($conn,$sqlEmployee)){
        
                                                header("location:logIn.php");
                                            }
                                            else{
                                                echo $sqlEmployee;
                                                echo"<br>";
                            
                                                //Underconstructing the error table for IT department
                                                printf("Errormessage: %s\n", mysqli_error($conn));
                                            }
                                        }
                                        else{                                   
                                            echo"Employee table might have a problem";
                                        }
                                    }
                    
                                }
                            }
                            else{
                                echo"Error in user id";
                            }
                        }
                        else {
                            echo $sql1;
                            echo"<br>";
                            
                            //Underconstructing the error table for IT department
                            printf("Errormessage: %s\n", mysqli_error($conn));
                        }
                    }
                    else{
                        echo"Please confirm your password";
                    }
                }                                  
            else {
                echo "Please fill all the boxes";
                echo "whyyy";
            }
        }

        mysqli_close($conn);
        ?>

    <div id="choice" class="choice">

        <h1>Are you a:<h1>
            <button name="parent" id="parent">Parent</button>

        <h2>Or a:<h2>
            <button name="employee" id="employee">Employee</button>

    </div>

    <div id="parentForm" style="display:none;">

        <button name="backP" id="backP">Get Back</button><br>

        <form  method="post">
            <fieldset>

                <legend> Personal Information: </legend>

                <input type="text" name="firstName" placeholder="First name"/><br>

                <input type="text" name="lastName" placeholder="Last name"/><br>

                <input type="text" name="familyName" placeholder="Family Name"/><br>

                <input type="radio" name="gender" value="Male"/>  Male <br>
                <input type="radio" name="gender" value="Female"/>  Female <br>

                <input type="text" name="nationality" placeholder="Nationality"/><br>

                <input type="date" name="dateOfBirth" placeholder="Date of Birth"/><br>

                <input type="number" name="phoneNumber" placeholder="Phone Number"/><br>

                <input type="number" name="homeNumber" placeholder="Home Number"/><br>

                <input type="number" name="ssn" placeholder="SSN"/><br>

            </fieldset>

            <fieldset>

                <legend>Address Information: </legend>

                <input type="text" name="region" placeholder="Region"/><br>

                <input type="text" name="streetName" placeholder="Street Name"/><br>

                <input type="number" name="buildingNumber" placeholder="Building Number"/><br>

                <input type="number" name="flatNumber" placeholder="Flat Number"/><br>

                <input type="number" name="apartmentNumber" placeholder="Apartment Number"/><br>

                <input type="number" name="postalCode" placeholder="Postal Code"/><br>

            </fieldset>

            <fieldset>

                <legend>Work Information: </legend>

                <input type="text" name="workPosition" placeholder="Work Position"/><br>

                <input type="text" name="workPlace" placeholder="Work Residence"/><br>

                <input type="number" name="workNumber" placeholder="Work Number"/><br>

            </fieldset>

            <fieldset>

                <legend>Account Information: </legend>

                <input type="text" name="email" id="email" placeholder="Email" onBlur="checkAvailability()"/><br>
                <div id="msg"></div>

                <input type="password" name="password" placeholder="Password"/><br>

                <input type="password" name="confirmPassword" placeholder="Confirm Password"/><br>

            </fieldset>

            <br>
            <input type="submit" name="registerParent" value="register"/><br>

        </form>

    </div>

    <div id="employeeForm" style="display:none;" enctype="multipart/form-data">

        <button name="backE" id="backE">Get Back</button>

        <form  method="post">

            <fieldset>

                <legend> Personal Information: </legend>

                <input type="text" name="firstName" placeholder="First name"/><br>

                <input type="text" name="lastName" placeholder="Last name"/><br>

                <input type="text" name="familyName" placeholder="Family Name"/><br>

                <input type="radio" name="gender" value="Male"/>  Male <br>
                <input type="radio" name="gender" value="Female"/>  Female <br>

                <input type="text" name="nationality" placeholder="Nationality"/><br>

                <input type="date" name="dateOfBirth" placeholder="Date of Birth"/><br>

                <input type="number" name="phoneNumber" placeholder="Phone Number"/><br>

                <input type="number" name="homeNumber" placeholder="Home Number"/><br>

                <input type="number" name="workNumber" placeholder="Work Number"/><br>

                <input type="number" name="ssn" placeholder="SSN"/><br>

            </fieldset>

            <fieldset>

                <legend>Address Information: </legend>

                <input type="text" name="region" placeholder="Region"/><br>

                <input type="text" name="streetName" placeholder="Street Name"/><br>

                <input type="number" name="buildingNumber" placeholder="Building Number"/><br>

                <input type="number" name="flatNumber" placeholder="Flat Number"/><br>

                <input type="number" name="apartmentNumber" placeholder="Apartment Number"/><br>

                <input type="number" name="postalCode" placeholder="Postal Code"/><br>

            </fieldset>

            <fieldset>

                <legend>Applicant Information: </legend>

                <input type="text" name="university" placeholder="University"/><br>

                <input type="text" name="universityDegree" placeholder="University Degree"/><br>

                <input type="number" name="graduationYear" placeholder="Graduation Year"/><br>

                <select name="department">
                    <option value="">Select your department</option>
                    <option value="Teaching">Teaching</option>
                    <option value="PR">PR</option>
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Medical">Medical</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Security">Security</option>
                    <option value="Transportation">Transportion</option>
                </select> <br>

                C.V:
                <input type="file" name="cv"/><br>

                <textarea rows="4" cols="50" name="skills">Skills</textarea><br>

                <input type="number" name="bankAccount" placeholder="Bank Account"/><br>

                Medical Test:
                <input type="file" name="medicalTest"/><br>

            </fieldset>

            <fieldset>

                <legend>Account Information: </legend>

                <input type="text" name="email" placeholder="Email"/><br>
                <div id="msg"></div>

                <input type="password" name="password" placeholder="Password"/><br>

                <input type="password" name="confirmPassword" placeholder="Confirm Password"/><br>

            </fieldset>

            <br>
            <input type="submit" name="registerEmployee" value="register"/><br>

        </form>

    </div>

  </body>
</html>
