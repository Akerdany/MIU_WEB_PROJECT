<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/ContactUs.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
    <title> Nursery</title>
</head>

<body>
    
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
<div class="Middle_Of_Page">
        <div id="GambIcons">
            <p1>Keep in touch with us on:</p1>
</div>
     <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
    </div>

    <div class="Footer">

</div>

</body>
<style>
        .fa {
          padding: 20px;
          font-size: 30px;
          width: 50px;
          text-align: center;
          text-decoration: none;
          margin: 1px 2px;
       
          position: relative;
          left: -210px;
          bottom: -425px;
          border: 3px solid  white;

        }
        p1
{
    float:left ;
    margin-top:50%;
}
        
        .fa:hover {
            opacity: 0.7;
        }
        
        .fa-facebook {
          background: #3B5998;
          color: white;
        }
        
        .fa-twitter {
          background: #55ACEE;
          color: white;
        }
        
        .fa-google {
          background: #dd4b39;
          color: white;
        }
        
        </style>
</html>