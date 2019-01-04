<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../css/Registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
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
        <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">

        <title> Registration Page </title>
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

                    $date = date('Y-m-d H:i:s');

                    if($password == $confirmPassword){

                        if(isset($_POST['registerParent'])){
                            $sql1 = "INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `familyName`, `gender`, `nationality`, `dateOfBirth`, `workNumber`, `phoneNumber`, `homeTelephoneNumber`, `dateJoined`, `statusId`, `ssn`, `typeId`)
                            VALUES (NULL,'".$email."','".$password."','".$firstName."','".$lastName."','".$familyName."','".$gender."','".$nationality."','".$dateOfBirth."','".$workNumber."','".$phoneNumber."','".$homeNumber."','".$date."','1','".$ssn."','2')";
                        }
                        else if(isset($_POST['registerEmployee'])){
                            $sql1 = "INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `familyName`, `gender`, `nationality`, `dateOfBirth`, `workNumber`, `phoneNumber`, `homeTelephoneNumber`, `dateJoined`, `statusId`, `ssn`, `typeId`)
                            VALUES (NULL,'".$email."','".$password."','".$firstName."','".$lastName."','".$familyName."','".$gender."','".$nationality."','".$dateOfBirth."','".$workNumber."','".$phoneNumber."','".$homeNumber."','".$date."','1','".$ssn."','1')";
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
                                        $skills = $_POST["skills"];
                                        $bankAccount = $_POST["bankAccount"];

                                        $cv = addslashes($_FILES['cv']['tmp_name']);
                                        //$cvName = addslashes($_FILES['cv']['name']);
                                        $cv = file_get_contents($cv);
                                        $cv = base64_encode($cv);

                                        $medicalTest = addslashes($_FILES['medicalTest']['tmp_name']);
                                        //$medicalTestName = addslashes($_FILES['medicalTest']['name']);
                                        $medicalTest = file_get_contents($medicalTest);
                                        $medicalTest = base64_encode($medicalTest);   

                                        if($university!="" && $universityDegree!="" && $graduationYear!="" && $department!="" && $skills!="" && $bankAccount!="" && $cv!="" && $medicalTest!=""){
                                            
                                            $sqlEmployee = "INSERT INTO `employee` (`id`, `userId`, `university`, `universityDegree`, `yearOfGraduation`, `departmentId`, `skills`, `bankAccount`, `medicalTest`, `cv`) 
                                            VALUES (NULL, '".$userID."', '".$university."', '".$universityDegree."', '".$graduationYear."', '".$department."', '".$skills."', '".$bankAccount."', '".$medicalTest."', '".$cv."')";

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
        <form  method="post">
            <button name="backP" id="backP">Get Back</button><br> 

                <h1>New Parent Registration </h1>

            <ul id="ProgressBar">
                <li> Personal Information </li>
                <li> Address Information </li>
                <li> Work Information </li>
                <li> Account Information </li>
            </ul>
                <fieldset>
                    <h2 class="Form_Title">  Personal Information </h2>
                    <h3 class="Form_Subtitle">Step 1 </h3>
                    <input type="text" name="firstName" placeholder="First name">

                    <input type="text" name="lastName" placeholder="Last name">

                    <input type="text" name="familyName" placeholder="Family Name">
                    
                    <input id="Gender_Radio_Button" type="radio" name="gender" value="Male"> <label> Male </label>

                    <input id="Gender_Radio_Button" type="radio" name="gender" value="Female"><label> Female </label>

                    <input type="text" name="nationality" placeholder="Nationality">

                    <input type="date" name="dateOfBirth" placeholder="Date of Birth">

                    <input type="number" name="phoneNumber" placeholder="Phone Number">

                    <input type="number" name="homeNumber" placeholder="Home Number">

                    <input type="number" name="ssn" placeholder="SSN">

                    <input type="button" name="Next" class="Next" value="Next">

                </fieldset>

                <fieldset>
            
                    <h2 class="Form_Title">  Address Information </h2>
                    <h3 class="Form_Subtitle"> Step 2 </h3>
                    <input type="text" name="region" placeholder="Region">

                    <input type="text" name="streetName" placeholder="Street Name">

                    <input type="number" name="buildingNumber" placeholder="Building Number">

                    <input type="number" name="flatNumber" placeholder="Flat Number">

                    <input type="number" name="apartmentNumber" placeholder="Apartment Number">

                    <input type="number" name="postalCode" placeholder="Postal Code">

                    <input type="button" name="Previous" class="Previous" value="Previous" >

                    <input type="button" name="Next" class="Next" value="Next" >


                </fieldset>

                <fieldset>
                    <h2 class="Form_Title">  Work Information </h2>
                    <h3 class="Form_Subtitle"> Step 3 </h3>
                    <input type="text" name="workPosition" placeholder="Work Position">

                    <input type="text" name="workPlace" placeholder="Work Residence">

                    <input type="number" name="workNumber" placeholder="Work Number">

                    <input type="button" name="Previous" class="Previous" value="Previous" >

                    <input type="button" name="Next" class="Next" value="Next" >

                </fieldset>

                <fieldset>
                    <h2 class="Form_Title">  Account Information </h2>
                    <h3 class="Form_Subtitle">Final Step </h3>

                    <input type="text" name="email" id="email" placeholder="Email" onBlur="checkAvailability()"><br>
                    <div id="msg"></div>

                    <input type="password" name="password" placeholder="Password">

                    <input type="password" name="confirmPassword" placeholder="Confirm Password">

                    <input type="button" name="Previous" class="Previous" value="Previous">

                    <input type="submit" name="registerParent" value="register">

                </fieldset>

        </form>

    </div>

    <div id="employeeForm" style="display:none;">

        <button name="backE" id="backE">Get Back</button>

        <h1> New Employee Registration </h1>

        <ul id="ProgressBar">
            <li> Personal Information </li>
            <li> Address Information </li>
            <li> Work Information </li>
            <li> Account Information </li>
        </ul>

        <form  method="post"  enctype="multipart/form-data">

            <fieldset>

                <h2 class="Form_Title">  Personal Information </h2>
                <h3 class="Form_Subtitle"> Step 1 </h3>

                <input type="text" name="firstName" placeholder="First Name">

                <input type="text" name="lastName" placeholder="Last Name">

                <input type="text" name="familyName" placeholder="Family Name">

                <input type="radio" name="gender" value="Male"/>  Male 
                <input type="radio" name="gender" value="Female"/>  Female 

                <input type="text" name="nationality" placeholder="Nationality">

                <input type="date" name="dateOfBirth" placeholder="Date of Birth">

                <input type="number" name="phoneNumber" placeholder="Phone Number">

                <input type="number" name="homeNumber" placeholder="Home Number">

                <input type="number" name="workNumber" placeholder="Work Number">

                <input type="number" name="ssn" placeholder="SSN">

                <input type="button" name="NextEmployee" class="NextEmployee" value="Next">

            </fieldset>

            <fieldset>

                <h2 class="Form_Title">  Address Information </h2>
                <h3 class="Form_Subtitle"> Step 2 </h3>

                <input type="text" name="region" placeholder="Region">

                <input type="text" name="streetName" placeholder="Street Name">

                <input type="number" name="buildingNumber" placeholder="Building Number">

                <input type="number" name="flatNumber" placeholder="Flat Number">

                <input type="number" name="apartmentNumber" placeholder="Apartment Number">

                <input type="number" name="postalCode" placeholder="Postal Code">

                <input type="button" name="PreviousEmployee" class="PreviousEmployee" value="Previous" >

                <input type="button" name="NextEmployee" class="NextEmployee" value="Next" >

            </fieldset>

            <fieldset>

                <h2 class="Form_Title"> Applicant Information </h2>
                <h3 class="Form_Subtitle"> Step 3 </h3>

                <input type="text" name="university" placeholder="University">

                <input type="text" name="universityDegree" placeholder="University Degree">

                <input type="number" name="graduationYear" placeholder="Graduation Year">

                <select id="Dropdown" name="department">
                    <option value="">Select your department</option>
                    <option value="1">Accounting</option>
                    <option value="2">HR</option>
                    <option value="3">IT</option>
                    <option value="4">Marketing</option>
                    <option value="5">Medical</option>
                    <option value="6">PR</option>
                    <option value="7">Security</option>
                    <option value="8">Teaching</option>
                    <option value="9">Transportation</option>
                </select>

                C.V:
                <input id="C.V" type="file" name="cv">

                <textarea rows="4" cols="50" name="skills">Skills</textarea>

                <input type="number" name="bankAccount" placeholder="Bank Account">

                Medical Test:
                <input id="MedicalTest" type="file" name="medicalTest">
                
                <input type="button" name="PreviousEmployee" class="PreviousEmployee" value="Previous" >

                <input type="button" name="NextEmployee" class="NextEmployee" value="Next" >

            </fieldset>

            <fieldset>

                <h2 class="Form_Title">  Account Information </h2>
                <h3 class="Form_Subtitle">Final Step </h3>

                <input type="text" name="email" id="email" placeholder="Email" onBlur="checkAvailability()"><br>
                <div id="msg"></div>

                <input type="password" name="password" placeholder="Password">

                <input type="password" name="confirmPassword" placeholder="Confirm Password"><br>

                <input type="button" name="Previous" class="Previous" value="Previous">

                <input type="submit" name="registerEmployee" value="register">

            </fieldset>

        </form>

    </div>

  </body>

  <script>

        var current_fs, next_fs, previous_fs; //to detect which step is next and which is pervious and which is in now 
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".Next").click(function()
            {
            if(animating) return false;
            animating = true;
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            $("#ProgressBar li").eq($("fieldset").index(next_fs)).addClass("active");//bt5aly elorder bta3 progress bar INC
            
            next_fs.show(); //show the next fieldset
            current_fs.hide();//hide the previous fieldset
            
            current_fs.animate({opacity: 0}, 
            {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50)+"%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'transform': 'scale('+scale+')'});
                    next_fs.css({'left': left, 'opacity': opacity});
                }, 
                duration: 1000, 
                complete: function(){
                    current_fs.hide();
                    animating = false;
                },
            });
        });

        $(".Previous").click(function(){
            if(animating) return false;
            animating = true;
            
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            $("#ProgressBar li").eq($("fieldset").index(current_fs)).removeClass("active");//Dec of order in progressbar 
            previous_fs.show(); //Show Previous fieldset
            //current_fs.hide();//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1-now) * 50)+"%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'left': left});
                    previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
                }, 
                duration: 1000, 
                complete: function(){
                    current_fs.hide();
                    previous_fs.show();
                    animating = false;
                }, 
            });
        });


        var current_fs_employee, next_fs_employee, previous_fs_employee; //to detect which step is next and which is pervious and which is in now 
        var left_Employee, opacity_Employee, scale_Employee; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".NextEmployee").click(function()
            {
            if(animating) return false;
            animating = true;
            current_fs_employee = $(this).parent();
            next_fs_employee = $(this).parent().next();

            $("#ProgressBar li").eq($("fieldset").index(next_fs_employee)).addClass("active");//bt5aly elorder bta3 progress bar INC
            
            next_fs_employee.show(); //show the next fieldset
            current_fs_employee.hide();//hide the previous fieldset
            
            current_fs_employee.animate({opacity: 0}, 
            {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50)+"%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs_employee.css({'transform': 'scale('+scale+')'});
                    next_fs_employee.css({'left': left, 'opacity': opacity});
                }, 
                duration: 1000, 
                complete: function(){
                    current_fs_employee.hide();
                    animating = false;
                },
            });
        });

        $(".PreviousEmployee").click(function(){
            if(animating) return false;
            animating = true;
            
            current_fs_employee = $(this).parent();
            previous_fs_employee = $(this).parent().prev();

            $("#ProgressBar li").eq($("fieldset").index(current_fs_employee)).removeClass("active");//Dec of order in progressbar 
            previous_fs_employee.show(); //Show Previous fieldset
            //current_fs.hide();//hide the current fieldset with style
            current_fs_employee.animate({opacity: 0}, {
                step: function(now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1-now) * 50)+"%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs_employee.css({'left': left});
                    previous_fs_employee.css({'transform': 'scale('+scale+')', 'opacity': opacity});
                }, 
                duration: 1000, 
                complete: function(){
                    current_fs_employee.hide();
                    previous_fs_employee.show();
                    animating = false;
                }, 
            });
        });

        $(".registerParent").click(function(){
            return false;
        })
    </script>
</html>
