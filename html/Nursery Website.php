<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
  body {
font-family: Arial, Helvetica, sans-serif;
}

.notification
{

color: black;
text-decoration: none;
padding: 15px 26px;
position: relative;
display: inline-block;
border-radius: 2px;
}



.notification .badge {
position: absolute;
top: -10px;
right: -10px;
padding: 5px 10px;
border-radius: 50%;
background-color: red;
color: white;
}
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Verdana, sans-serif;
    }

    .mySlides {
        display: none;
    }

    img {
        vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }
</style>

</head>

<body>

     <h2>Nursery Website</h2>

       <?php
         include '../php/connection1.php';
       session_start();
     if (isset($_SESSION['email']))
     {
    echo '<a style="position: absolute;right: 100px; top: 10px"';
    echo 'href="../php/DisplayingMessageToManager.php" class="notification">';
    echo '<i class="material-icons">&#xe7f4;</i>';





    $sql="SELECT * FROM `message`";
    $result= mysqli_query($conn,$sql);
    $i=0;
    while ($row= mysqli_fetch_assoc($result)) {
        $i++;
        $seen=$row['seen'];



    }

      if($seen!=1){
      echo '<span id="Count" class="badge">'.$i.'</span>';
}

      echo '</a>';



echo "My last visited page is:".$_SESSION['page'];
  }






  ?>


    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img  src="../pictures/Welcome.png" style="width:100%; height:100px; width: 100%;
            height: 25%;
            object-fit: contain;">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img class="object-fit-cover" src="../pictures/nursery.jpg" style="width:100%; height:100px; width: 100%;
            height: 25%;
            object-fit: contain;">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img class="object-fit-cover" src="../pictures/Preschool 5.jpg" style="width:100%; height:100px; width: 100%;
            height: 25%;
            object-fit: contain;">
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <script src="js/countNotifications.js"></script>
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>

    <!-- End of the slideshow -->
    <p>Click Here To Start With Us Your Journey <br></p>

    <form action="Manager-Parent Page.html">
        <!--get the next page-->
        <button> <b>Start!</b> </button>
        <a href='../php/comments.php' style=' color: white; text-align: center; text-decoration: none;  display: inline-block;'><button type='button' name='commentSection'>comments</button></a>
        <a href='../php/logout1.php' style=' color: white; text-align: center; text-decoration: none;  display: inline-block;'><button type='button' name='logOut'>Logout</button></a>

    </form>

</body>

</html>
