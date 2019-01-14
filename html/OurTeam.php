<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/OurTeam.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!-- <h1>Little Kids Nursery</h1>-->
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
            <button id="Home_Button" onclick="window.location.href='../html/Welcome_Page.php'">
                <span>Home</span>
           </button>      
           
           <button id="Branches_Button" onclick="window.location.href='../html/Branches.html'" >
               <span>Branches</span>
           </button>          
           <button id="Ourteam_Button" onclick="window.location.href='../html/OurTeam.html'" >
               <span>Our Team</span>
           </button>

           
           <button id="Aboutus_Button" onclick="window.location.href='../html/AboutUs.html'" > 
               <span>About Us</span> 
           </button>

           <button id="Contactus_Button" onclick="window.location.href='../html/ContactUs.html'" > 
               <span>Contact Us</span>
           </button>
        </div>
    </div>
    
    
    <div class="Manager_Div">
        <h1> <i>Our Manager </i></h1> <!--title-->
        <p>Name : Liza Makram  <br>
            Target : <br> <br>
              Contact Manager : <br>

        </p>
        <img id="Image_Options" src="../pictures/Manager.jpg" alt="Manager Picture" width="200" height="200"> 
       
    </div>

    <div class="Teacher1_Div">
        <h1> <i> Our English Teacher </i></h1> <!--title-->
        <p>Name : Nadia Mohamed Ahmed <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher1.jpg" alt="Manager Picture" width="150" height="200" > 

    </div>

    <div class="Teacher2_Div">
        <h1> <i> Our French Teacher </i></h1> <!--title-->
        <p>Name : Sophia Martinez <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher2.jpg" alt="Manager Picture" width="180" height="200"> 
           
    </div>

    <div class="Teacher3_Div">
        <h1> <i> Our Arabic Teacher </i></h1> <!--title-->
        <p>Name : Hassan Mohamed Ibrahim <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher3.jpg" alt="Manager Picture"width="150" height="200" > 
         
    </div>

    <div class="Teacher4_Div">
        <h1> <i> Our Science Teacher </i></h1> <!--title-->
        <p>Name : Sherin Khaled Gamil  <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher4.jpg" alt="Manager Picture"width="200" height="200" > 
         
    </div>

    <div class="Teacher5_Div">
        <h1> <i> Our Math Teacher </i></h1> <!--title-->
        <p>Name : <br>
        Target : <br>
        Contact Teacher : <br>

        </p>
        <img id="Image_Options" src="../pictures/Teacher5.jpg" alt="Manager Picture"width="200" height="200" > 
         
    </div>

    <div class="Doctor_Div">
        <h1> <i>Our Doctor </i></h1> <!--title-->
        <p>Name : <br>
        Target : <br>
        Contact Doctor : <br>

        </p>
         <img id="Image_Options" src="../pictures/Doctor.jpg" alt="Manager Picture"width="200" height="200" > 
            
    </div>

    <div class="Footer">
            <!--Social media button classes-->
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
    </div>

</body>

</html>