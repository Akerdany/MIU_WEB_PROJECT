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
        <div class="Left_Bar">

        </div>
    </div>
<p><b>Student Registration:</b>  It helps in easy registration of students and effectively maintaining the record of the same. </p>
<img src="https://www.skolaro.com/wp-content/uploads/2017/08/phone.png" alt="Phone" /></span></a>

<p><img src="http://www.myischool.in/wp-content/uploads/2015/05/norton-safe-web.png" alt="norton-safe-web"width="100" height="65"/></p>

<div class="call_section">
	<div class="container">
    	<div class="row">
            
            
        </div>
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