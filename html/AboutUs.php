<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/AboutUs.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Nursery </title>
</head>

<body>
    <div class="topnav">
    <?php
    session_start();
    if(empty($_SESSION['loggedIn'])){
        echo"<div class='topnav'>
                <a href='../php/logIn.php'> <span>Login</span></a>
                <a href='../php/registration.php'><span>Sign Up</span></a>
            </div>";
    }
    else if($_SESSION['loggedIn']==1){
        echo"<div class='topnav'>";
            require("../php/sidebar.php");
        echo"</div>";
    }
    ?>

    <div class="Header">
        <div class="Buttons">
            <!-- <span> deh 3chn t2bal eleffects 3leha bt3et el arrow-->
           
                <button id="Home_Button" onclick="window.location.href='../html/Welcome_Page.php'">
                    <span>Home</span>
               </button>      
               
               <button id="Branches_Button" onclick="window.location.href='../html/Branches.php'" >
                   <span>Branches</span>
               </button>          

               <button id="Ourteam_Button" onclick="window.location.href='../html/OurTeam.php'" >
                   <span>Our Team</span>
               </button>
               
               <button id="Aboutus_Button" onclick="window.location.href='../html/AboutUs.php'" > 
                   <span>About Us</span> 
               </button>
   
               <button id="Contactus_Button" onclick="window.location.href='../html/ContactUs.php'" > 
                   <span>Contact Us</span>
               </button>
        </div>
    </div>

    <div class="Schedules">
        <h1> <i> This is sample of our kids Schedules </i> </h1>
        <p> <i> This is how our kids spent their day in our Nursery </i><br>
        </p>
        <img id="Image_Options" src="../pictures/Schedule.PNG" alt="Manager Picture"width="1100" height="550" > 

    </div>

    <div class="Footer">
        <!--Social media button classes-->
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
    </div>

</body>

</html>