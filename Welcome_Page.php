<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/Welcome_Page.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">


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
        <div class="Buttons"><!-- <span> deh 3chn t2bal eleffects 3leha bt3et el arrow-->
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
        <div class="Left_Bar">

        </div>
    </div>

    <div class="Rest_Of_Page">
       <div class="slideshow-container">

              <div class="mySlides fade">
                <div class="numbertext"></div>
                <img src="../pictures/nursery.jpg" style="width:100%" style="height:1300px">
            </div>
        <div class="mySlides fade">
                <div class="numbertext"></div>
                <img src="../pictures/Preschool 5.jpg" style="width:100%" style="height:1300px">
            </div>

       <div class="mySlides fade">
                <div class="numbertext"></div>
               <!-- <img src="../pictures/Children2.jpg" style="width:100%" style="height:1305px">-->
            </div>

        <div class="mySlides fade">
                <div class="numbertext"></div>
              <!--  <img src="../pictures/Children.jpg" style="width:100%" style="height:1305px">-->
            </div>
     

    </div>
    

    <script>
    var slideIndex = 0;
        showSlides();

        function showSlides() 
		{
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>

    <!-- End of the slideshow -->

</body>

</html>