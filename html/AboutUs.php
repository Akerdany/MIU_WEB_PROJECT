<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/AboutUs.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Nursery </title>
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
    <img id="Kids_Pictures" src="../pictures/kids1.jpg" alt="kids" height="500" width="900"> 
    <p style="Background-color:white; border-radius: 15px;  padding: 5px; "><b>Activities:</b></P>
    <p1>Kids have to use their energy in useful way.</P1>
    <p2>Next</P2>
    
    <img id="Kids_Pictures" src="../pictures/kids3.jpg" alt="kids" height="500" width="900"> 
    <p>Socialization:</P>
    <p3>We improve the kids communication skills.</P3>
    <p4>Next</P4>
    <img id="Kids_Pictures" src="../pictures/kids4.jpg" alt="kids" height="500" width="900"> 
    <p>Learning and gaining confidence:</P>
    <p5>We insist to deliver the information clearly.</P5>
    <p6>Next</P6>
    <img id="Kids_Pictures" src="../pictures/kids5.jpg" alt="kids" height="500" width="900"> 
    <p>Fun time:</P>
    <p7>Making sure that the kids enjoy their time.</P7>
    <p8>Next</P8>
    <img id="Kids_Pictures" src="../pictures/kids6.jpg" alt="kids" height="500" width="900"> 
    <p>Class picture:</P>
    <p9>Nice way to express our harmony together.</P9>
    <p10>Next</P10>
    <img id="Kids_Pictures" src="../pictures/kids7.jpg" alt="kids" height="500" width="900"> 
    <p>Lunch break time:</P> 
    <p11>Healthy meal to improve the kids progress.</P11>
    </div>
    
     
    <div class="Footer"> 
    <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>       
    </div>
</body>
<style>
body 
{
    font-family: Verdana, sans-serif;
    background-image: linear-gradient(pink,snow);
 
}
.Middle_Of_Page
{
    background-color: snow;  
    width: 1250px; 
    height: static;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
p
{
    float:left ;
    margin-top:20%;
}
p1
{
    float:left ;
    margin-top:-12%;
}
p2
{
    float:left ;
    margin-top:-1%;
}
p3
{
    float:left ;
    margin-top:-12%;
}
p4
{
    float:left ;
    margin-top:-1%;
}
p5
{
    float:left ;
    margin-top:-12%;
}
p6
{
    float:left ;
    margin-top:-1%;
}
p7
{
    float:left ;
    margin-top:-12%;
}
p8
{
    float:left ;
    margin-top:-1%;
}
p9
{
    float:left ;
    margin-top:-12%;
}
p10
{
    float:left ;
    margin-top:-1%;
}
p11
{
    float:left ;
    margin-top:-12%;
}

#Kids_Pictures
{
    float:right;
    border-radius:50px;
    margin-left:20px;
    margin-bottom:10px;
    margin-bottom:10px;
}
h1
{
   font-size:30px; 
   text-align: center;
}
.Image_Options
{ 
     margin-left: 30px;/*starst from left and add 10 pixels to the start */
     float : right;
}
p
{
    font-size:15px;
    text-align:left;/*text starts from left */
    margin-left: 22.5px;/*starst from left and add 10 pixels to the start */
}
.topnav/*setting of navbar place */
{
    overflow: hidden;
    background-color :indigo;
    border-radius: 10px;
    width: 1520px;  
    height: 50px;
    position:relative;
    left: -10px;/*starts after 1000pixel */
    top: -10px;
}

.topnav a /*inside the world font settings*/
{
    float: right;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover /*lma 2a2af 3ala elbutton feh eltopnav*/
{
    background-color:none;
    color: white;
}
.Footer/*setting of nagbar place */
{
    overflow: hidden;
    background-color:indigo;
    border-radius:20px;
    width: 1520px;  
    height: 120px;
    position:relative;/*bt-apply width height top left position*/
    left: -10px;/*sratrs after 1000pixel */
    top: 30px; 
}

.Footer a /*inside the world font settings*/
{
    float: right;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

</body>
<style>
    body 
{
    font-family: Verdana, sans-serif;
    background-image: linear-gradient( snow,pink);
 
}
.Schedules
{
    background-color: pink;  
    width: 1200px; 
    height: 650px;
    border-radius: 20px;
    margin: center;   
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0%;
    top: 0%;
}
h1
{
   font-size:30px; 
   text-align: center;
}
.Image_Options
{ 
     margin-left: 30px;/*starst from left and add 10 pixels to the start */
     float : right;
}
p
{
    font-size:15px;
    text-align:left;/*text starts from left */
    margin-left: 22.5px;/*starst from left and add 10 pixels to the start */
}
.topnav/*setting of navbar place */
{
    overflow: hidden;
    background-color :indigo;
    border-radius: 10px;
    width: 1520px;  
    height: 50px;
    position:relative;
    left: -10px;/*starts after 1000pixel */
    top: -10px;
}

.topnav a /*inside the world font settings*/
{
    float: right;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover /*lma 2a2af 3ala elbutton feh eltopnav*/
{
    background-color:none;
    color: white;
}
.Footer/*setting of nagbar place */
{
    overflow: hidden;
    background-color:indigo;
    border-radius:20px;
    width: 1520px;  
    height: 120px;
    position:relative;/*bt-apply width height top left position*/
    left: -10px;/*sratrs after 1000pixel */
    top: 30px; 
}

.Footer a /*inside the world font settings*/
{
    float: right;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.Footer a:hover {
    background-color:none;
    color: white;
}  
.Header
{
    background-image: transparent;
    width: 700px; 
    height: 50px;
    text-align-last: justify;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    left: 0px;
    top: 0px;
}
#Buttons/* mkan buttons feen feh header*/
{
    width: 510px;  
    height: 50px;
    position:relative;
    left: 15px;
    top: 15px;
  
}
#Home_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color:hotpink;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 75px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}

#Home_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
  
#Home_Button span:after /* lma 2a2af 3ala elbutton eleffects elly bttla3*/
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
  
#Home_Button:hover span 
{
    padding-right: 25px;
}
  
#Home_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
#Aboutus_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color: darkgreen;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 100px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}

#Aboutus_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
  
#Aboutus_Button span:after 
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
  
#Aboutus_Button:hover span 
{
    padding-right: 25px;
}
  
#Aboutus_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
#Contactus_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color: violet;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 120px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}

#Contactus_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
  
#Contactus_Button span:after 
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
  
#Contactus_Button:hover span 
{
    padding-right: 25px;
}
  
  #Contactus_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
#Branches_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color: teal;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 90px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}
#Branches_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
#Branches_Button span:after 
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
#Branches_Button:hover span 
{
    padding-right: 25px;
}
  
#Branches_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
#Ourteam_Button /*Button Settings*/
{
    border-radius: 5px;/*smooth of edges*/
    background-color:  deeppink;
    color: #FFFFFF;
    border: none;
    text-align: middle;
    font-size: 15px;
    padding: 5px;
    width: 120px;
    transition: all 0.5s;/*23taked dah leh 3laka bel word motion*/
    cursor: auto;/*shape of cursor lma mouse you2af 3ala button*/
    margin: 5px;
}

#Ourteam_Button span 
{
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}
  
#Ourteam_Button span:after 
{
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -15px;/*arrow motion starts mn feen */
    transition: 0.5s;
}
  
#Ourteam_Button:hover span 
{
    padding-right: 25px;
}
  
#Ourteam_Button:hover span:after 
{
    opacity: 5;
    right: 5px;/*arrow ha-y-stop feen*/
}
    </style>
</html>