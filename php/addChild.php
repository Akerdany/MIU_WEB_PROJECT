<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Child</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
    <script src="main.js"></script>
</head>
<body>
    <?php
        session_start();
        require_once("Database_Connection.php");

        if(isset($_POST['submit'])){
            $photo = addslashes($_FILES['photo']['tmp_name']);
            //$childPhoto = addslashes($_FILES['photo']['name']);
            $photo = file_get_contents($photo);
            $photo = base64_encode($photo);

            $sql = "INSERT INTO `child` (`id`, `photo`,`name`, `hobbies`,`medicalProblems`,`disability`,`parentId`)
                    VALUES (NULL, '".$photo."','".$_POST['name']."','".$_POST['hobbies']."','".$_POST['medicalProblem']."','".$_POST['disabilty']."','".$_SESSION["parentId"]."')";

            if (mysqli_query($conn,$sql)) {
                header("location:child.php");
            }
            else {
                echo $sql;
                echo"<br>";
                
                //Underconstructing the error table for IT department
                printf("Errormessage: %s\n", mysqli_error($conn));
            }
        }
        mysqli_close($conn);
    ?>
   
   <div id="AddChildForm">
    <form name="childForm" action="" method="post" enctype="multipart/form-data">
        
        <fieldset>

            <h2 class="Form_Title"> Child Information</h2>
        <input type="text" name="name" placeholder="Child Name" required>
        Photo:
        <input type="file" name="photo" required>
        <input type="text" name="hobbies" placeholder="Hobbies" required>
        <input type="text" name="medicalProblem" placeholder="Medical Problems" required>
        <input type="text" name="disabilty" placeholder="Disabilty" required> 
        <input type="submit" name="Submit"  value="Add Child" id="Submit_Button" required> 
        
    </fieldset>
    </form>
    </div>
</body>
</html>
<style> 
body
{
    background-image: url("../pictures/kid.jpg" );
    background-position-x: 1000px;
    background-position-y:-50px;
    background-size: 550px;
    background-color:coral;
    background-attachment: static;
    background-repeat: no-repeat;
    font-family: montserrat, arial, verdana;

}   
#Form_Title
{
    color:black;
    font-style:center;
} 
#AddChildForm fieldset 
{
	background: linen;
    border: none;
    top:50px;
    left:50px;
	border-radius: 10px;
	padding: 20px 30px;/*centering of objects inside the fieldset*/
	box-sizing: border-box;
    width: 40%;
	position: static; 
}
#AddChildForm input  /*inside text fields colors*/
{
	padding: 15px;
	border: 1px solid #ccc;/*border of textfields*/
	border-radius: 10px;/*curves of edges */
	margin-bottom: 20px;/*space between textfields*/
	width: 100%;/*scale of objects inside the beige color*/
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
#AddChildForm .action-button
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

