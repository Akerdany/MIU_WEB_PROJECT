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
        //this functions checks the number of data enterdd into textfield 
        function updatelength(field, output)
        {
	    curr_length = document.getElementById(field).value.length;
	    field_mlen = document.getElementById(field).maxLength;
	    document.getElementById(output).innerHTML = curr_length+'/'+field_mlen;
	    return 1;
	}
        //this func is for email checking of smelling
        function check_v_mail(field) {

	    fld_value = document.getElementById(field).value;

	    is_m_valid = 0;

	    if (fld_value.indexOf('@') >= 1) {

	        m_valid_dom = fld_value.substr(fld_value.indexOf('@')+1);

	        if (m_valid_dom.indexOf('@') == -1) {

	            if (m_valid_dom.indexOf('.') >= 1) {

	                m_valid_dom_e = m_valid_dom.substr(m_valid_dom.indexOf('.')+1);

	                if (m_valid_dom_e.length >= 1) {

	                    is_m_valid = 1;

	                }

           }

	        }

	    }

	    if (is_m_valid) {

        update_css_class(field, 2);

	        m_valid_r = 1;

	    } else {

	        update_css_class(field, 1);

	        m_valid_r = 0;

	    }

	    return m_valid_r;

	}

    //this func for checking empty text fields
    function valid_length(field) {
    length_df = document.getElementById(field).value.length;

	    if (length_df >= 1 && length_df <= document.getElementById(field).maxLength) {

	        update_css_class(field, 2);

	        ret_len = 1;

	    } else {

	        update_css_class(field, 1);

	        ret_len = 0;

	    }

	    return ret_len;

	}
// this function is for coloring
    function update_css_class(field, class_index) {

	    if (class_index == 1) {
	        class_s = 'wrong';
 } else if (class_index == 2) {
        class_s = 'correct';
	    }
	    document.getElementById(field).className = class_s;
	    return 1;
	}

// this function is for checking errors and outputs it 
    function validate_all(output) {

	    t1 = valid_length('firstname');

	    t2 = valid_length('lastname');

	    t3 = compare_valid('password', 'c_password');
        t4 = check_v_mail('email');

	    t5 = check_v_pass('password', 'pass_result');
	    errorlist = '';

	    if (! t1) {

	        errorlist += 'first name is required';

	    }

	    if (! t2) {

	        errorlist += 'last name is required />';

	    }

	    if (! t3) {

	        errorlist += 'Passwords are not the same<br />';

	    }

	    if (! t4) {

	        errorlist += 'Mail is wrong<br />';
   }
    if (errorlist) {
        document.getElementById(output).innerHTML = errorlist;
        return false;
   }
    return true;
	}
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">

    <title> Nursery </title>
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
                            $typeId = 2; 
                        }
                        else if(isset($_POST['registerEmployee'])){
                            $typeId = 3;
                        }

                        $sql1 = "INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `familyName`, `gender`, `nationality`, `dateOfBirth`, `workNumber`, `phoneNumber`, `homeTelephoneNumber`, `dateJoined`, `statusId`, `ssn`, `typeId`)
                        VALUES (NULL,'".$email."','".$password."','".$firstName."','".$lastName."','".$familyName."','".$gender."','".$nationality."','".$dateOfBirth."','".$workNumber."','".$phoneNumber."','".$homeNumber."','".$date."','1','".$ssn."','".$typeId."')";

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
                                        $cv = file_get_contents($cv);
                                        $cv = base64_encode($cv);
                                        $extensionCV = pathinfo($_FILES["cv"]["name"])['extension'];
                                        $cvSize = $_FILES["cv"]["size"]; 
                                        $cvName = $_FILES["cv"]["name"];                            

                                        $medicalTest = addslashes($_FILES['medicalTest']['tmp_name']);
                                        $medicalTest = file_get_contents($medicalTest);
                                        $medicalTest = base64_encode($medicalTest);   
                                        $extensionMedic = pathinfo($_FILES["medicalTest"]["name"])['extension'];
                                        $medicSize = $_FILES["medicalTest"]["size"]; 
                                        $medicName = $_FILES["medicalTest"]["name"];                            

                                        if($cv != "" && $medicalTest != ""){

                                            $cvSQL = "INSERT INTO `uploads` (`id`, `name`, `size`, `type`, `extension`, `data`, `userId`) 
                                            VALUES (NULL, '".$cvName."', '".$cvSize."', '1', '".$extensionCV."', '".$cv."', '".$userID."')";

                                            $medicSQL = "INSERT INTO `uploads` (`id`, `name`, `size`, `type`, `extension`, `data`, `userId`) 
                                            VALUES (NULL, '".$medicName."', '".$medicSize."', '2', '".$extensionMedic."', '".$medicalTest."', '".$userID."')";

                                            if(mysqli_query($conn,$cvSQL) && mysqli_query($conn,$medicSQL)){

                                                $sqlcvID = mysqli_query($conn,"SELECT id FROM uploads WHERE userId='".$userID."' AND type='1'");
                                                $sqlmedicID = mysqli_query($conn,"SELECT id FROM uploads WHERE userId='".$userID."' AND type='2'");

                                                if($cvEmpID = mysqli_fetch_array($sqlcvID)){
                                                    $cvID = $cvEmpID["id"];

                                                    if($medicEmpID = mysqli_fetch_array($sqlmedicID)){
                                                        $medicID = $medicEmpID["id"];

                                                        if($university!="" && $universityDegree!="" && $graduationYear!="" && $department!="" && $skills!="" && $bankAccount!=""){
                                                            
                                                            $sqlEmployee = "INSERT INTO `employee` (`id`, `userId`, `university`, `universityDegree`, `yearOfGraduation`, `departmentId`, `skills`, `bankAccount`, `medicalTestId`, `cvId`, `medicalInsuranceId`, `positionId`, `categoryId`) 
                                                            VALUES (NULL, '".$userID."', '".$university."', '".$universityDegree."', '".$graduationYear."', '".$department."', '".$skills."', '".$bankAccount."', '".$medicID."', '".$cvID."', '1', '3', '3')";

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
                                                    else{
                                                        echo"Problem fetching the uploads table for id of medical test";

                                                    }
                                                }
                                                else{
                                                    echo"Problem fetching the uploads table for id of cv";
                                                }
                                            }
                                            else{
                                                echo"uploads table problem";
                                            }
                                        }
                                        else{
                                            echo"CV or Medical Test is empty";
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

        <?php 
        // set error reporting level
        if (version_compare(phpversion(), '5.3.0', '>=') == 1)
          error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        else
          error_reporting(E_ALL & ~E_NOTICE);
        //session_start();
        if (isset($_POST['submit'])) {
            $sFirstname = escape($_POST['firstname']);
            $sLastName = escape($_POST['lastname']);
            $sfamilyname = escape($_POST['familyname']);
            $sEmail = escape($_POST['email']);
            $iGender = (int)$_POST['gender'];
            $sErrors = '';
            if (strlen($sFirstname) >= 1 and strlen($sFirstname) <= 25) {
                if (strlen($sLastName) >= 1 and strlen($sLastName) <= 25) {
                    if (strlen($sEmail) >= 1 and strlen($sEmail) <= 55) {
                        if ($sPass == $sCPass) {
                            if (ereg('^[a-zA-Z0-9\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $sEmail)) {
                                if ($iGender == '1' xor $iGender == '0') {
                                    $sVcode = escape($_POST['vcode']);
                                    if (! isset($_SESSION['valdiation_code'])) {
                                        // Here you can send him some verification code (by email or any another ways)
                                        $sCode = uniqid(rand(), true);
                                        $_SESSION['valdiation_code'] = md5($sCode);
                                    } elseif (md5($sVcode) == $_SESSION['valdiation_code']) {
                                        // Here you can add him to database
                                        // mysql_query('INSERT INTO ....
                                        // display step 3 (final step)
                                        echo strtr(file_get_contents('templates/step3.html'), array());
                                        exit;
                                    } else {
                                        $sErrors = 'Verification code is wrong';
                                    }
                                } else {
                                    $sErrors = 'Gender is wrong';
                                }
                            } else {
                                $sErrors = 'Email is wrong';
                            }
                        } else {
                            $sErrors = 'Passwords are not the same';
                        }
                    } else {
                        $sErrors = 'Address email is too long';
                    }
                } else {
                    $sErrors = 'Password is too long';
                }
            } else {
                $sErrors = 'Login is too long';
            }
            // display step 2
            $aParams = array(
                '{errors}' => $sErrors,
                '{firstname}' => $sfirstname,
                '{gender}' => $iGender,
                '{email}' => $sEmail,
                '{vcode}' => $sCode
            );
           // echo strtr(file_get_contents('templates/step2.html'), $aParams);
            exit;
        }
        // unset validation code if exists
        unset($_SESSION['valdiation_code']);
        // draw registration page
       // echo strtr(file_get_contents('templates/main_page.html'), array());
        // extra useful function to make POST variables more safe
        function escape($s) {
            //return mysql_real_escape_string(strip_tags($s)); // uncomment in when you will use connection with database
            return strip_tags($s);
        }
         
        ?>

    <div id="choice" class="choice">

        <h1> <b>Are you a: </b><h1>
            <button name="parent" id="parent"> Parent </button>

        <h2><b>Or a:</b><h2>
            <button name="employee" id="employee">Employee</button>

    </div>

   

    <div id="parentForm" style="display:none;">
        
        
                <h1>New Parent Registration </h1>

            <ul id="ProgressBar">
                <li> Personal Information </li>
                <li> Address Information </li>
                <li> Work Information </li>
                <li> Account Information </li>
            </ul>
            <form id="Parent_Form" method="post" onsubmit="return validate_all('results');">
                <fieldset>
                    <h2 class="Form_Title">  Personal Information </h2>
                    <h3 class="Form_Subtitle">Step 1 </h3>
                    <input type="text" name="firstName" placeholder="First name" maxlength="25"  id="FirstName" onKeyUp="updatelength('FirstName', 'FirstName_length')"><br /><div id="FirstName_length"></div> 

                    <input type="text" name="lastName" placeholder="Last name" maxlength="25" id="LastName" onKeyUp="updatelength('LastName', 'LastName_length')"><br /><div id="LastName_length"></div> 

                    <input type="text" name="familyName" placeholder="Family Name" maxlength="25" id="Family_Name" onKeyUp="updatelength('Family_Name', 'Family_Name_length')"><br /><div id="Family_Name_length"></div> 
 
                    <input type="radio" name="gender" value="Male"> Male 

                    <input  type="radio" name="gender" value="Female"> Female 

                    <input type="text" name="nationality" placeholder="Nationality" maxlength="25" id="Nationality" onKeyUp="updatelength('Nationality', 'Nationality_length')"><br /><div id="Nationality_length"></div> 

                    <input type="date" name="dateOfBirth" placeholder="Date of Birth" > 

                    <input type="number" name="phoneNumber" placeholder="Phone Number" maxlength="25" id="phoneNumber" onKeyUp="updatelength('phoneNumber', 'phoneNumber_length')"><br /><div id="phoneNumber_length"></div> 

                    <input type="number" name="homeNumber" placeholder="Home Number" maxlength="25" id="homeNumber" onKeyUp="updatelength('homeNumber', 'homeNumber_length')"><br /><div id="homeNumber_length"></div> 

                    <input type="number" name="ssn" placeholder="SSN" maxlength="25" id="SSN" onKeyUp="updatelength('SSN', 'SSN_length')"><br /><div id="SSN_length"></div>
                    
                    <input type="button" name="backP" id="backP" value="Get Back">    

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

                    <input type="text" name="email"  attr.id="email" placeholder="Email" onBlur="checkAvailability()"><br>
                    <div id="msg"></div>

                    <input type="password" name="password" placeholder="Password">

                    <input type="password" name="confirmPassword" placeholder="Confirm Password">

                    <input type="button" name="Previous" class="Previous" value="Previous">

                    <input type="submit" name="registerParent" value="register">

                </fieldset>

        </form>

        <form action="../php/registration.php" method="post">
        <input type="hidden" name="firstName" value="{firstName}">
        <input type="hidden" name="lastname" value="{lastname}">
        <input type="hidden" name="familyname" value="{familyname}"> 
        <input type="hidden" name="nationality" value="{nationality}"> 
        <input type="hidden" name="phonenumber" value="{phonenumber}">
        <input type="hidden" name="homenumber" value="{homenumber}">
        <input type="hidden" name="nationality" value="{nationality}"> 
        <input type="hidden" name="ssn" value="{ssn}">

        </form>

    </div>

    <div id="employeeForm" style="display:none;">
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

                <input type="text" name="firstName" placeholder="First name">

                <input type="text" name="lastName" placeholder="Last name">

                <input type="text" name="familyName" placeholder="Family Name">

                <input type="radio" name="gender" value="Male"/>  Male 
                <input type="radio" name="gender" value="Female"/>  Female 

                <input type="text" name="nationality" placeholder="Nationality">

                <input type="date" name="dateOfBirth" placeholder="Date of Birth">

                <input type="number" name="phoneNumber" placeholder="Phone Number">

                <input type="number" name="HomeNumber" placeholder="Home Number">

                <input type="number" name="ssn" placeholder="SSN">

                <input type="button" name="backE" id="backE" value="Get Back">      

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

                <input type="text" name="email" id="email" placeholder="Email" onBlur="checkAvailability()">
                <div id="msg"></div>

                <input type="password" name="password" placeholder="Password">

                <input type="password" name="confirmPassword" placeholder="Confirm Password">

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

      <!--/////////////////////////////////////////////////////////////////////////-->
      <style>
          form {
02
	    background-color: #555;
03
	    display: block;
04
	    padding: 15px;
05
	}
06
	input[type=text], input[type=submit] {
07
	    -moz-border-radius: 2px;
08
	    -ms-border-radius: 2px;
09
	    -o-border-radius: 2px;
10
	    -webkit-border-radius: 2px;
11
	    border-radius: 2px;
12
	}
13
	input[type=text], input[type=password], select {
14
	    background-color: rgb(246, 254, 231);
15
	    border-color: rgb(180, 207, 94);
16
	    border-style: solid;
17
	    border-width: 1px;
18
	    font-size: 16px;
19
	    height: 25px;
20
	    margin-right: 10px;
21
	    width: 200px;
22
	}
23
	input[type=submit]{
24
	    cursor: pointer;
25
	    font-size: 16px;
26
	    height: 35px;
27
	    padding: 5px;
28
	}
29
	input.wrong {
30
	    border-color: rgb(180, 207, 94);
31
	    background-color: red;
32
	}
33
	input.correct {
34
	    border-color:green);
35
	    background-color: rgb(220, 251, 164);
36
	}
      </style>

</html>
