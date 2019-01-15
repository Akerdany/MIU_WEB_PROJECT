<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel='stylesheet' href='../css/style1.css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style media="screen"  >
  *{margin: 0px; padding:0px;}
  #main{ width: 100%; height: 570px; margin: 40px auto}
    #result-message-area{width: 100%; padding: 0% 1%; height: 90%;}
  #message_area{width:98%;  height:10%; }
  .email-ok{color:#2FC332;}
  .email-taken{color:#D60202;}


</style>
  <body>


<?php
//to hide send appointment
date_default_timezone_set('Africa/Cairo');

  session_start();
    include("Database_Connection.php");
function displayAppointmentDetails($conn,$toUserId)
{
  $sqlDisplayAppointmentDetails="  SELECT messagetest.InvitationDate
   FROM user INNER JOIN messagetest
  ON user.id=messagetest.userId AND '".$_SESSION["userId"]."'=messagetest.userId 
   AND '".$_SESSION["toUserId"]."'=messagetest.toUserId
   AND messagetest.message='Invitation'
   ";
  $resultDisplayAppointmentDetails= mysqli_query($conn,$sqlDisplayAppointmentDetails);

 
  while ($row= mysqli_fetch_assoc($resultDisplayAppointmentDetails)) {
  echo '  
      <div class="container">
  
      
      <button type="button"  data-toggle="modal" data-target="#myModal" style="  Background-color:yellow;
      border-radius: 15px; 
       padding: 5px; ">details</button>
    
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Appointment Details</h4>
            </div>
            <div class="modal-body">
              <p>"'.$row['InvitationDate'].'"</p>
              <p>The nursery invite you
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
      </div>';//////////////////////////////////////////here////////////////////////////////////////////////////////////
  }
}
function displayAppointmentInvitation($conn,$toUserId)
{
  $sqlDisplayInvitationDetails="  SELECT messagetest.InvitationDate
   FROM user INNER JOIN messagetest
  ON user.id=messagetest.userId AND '".$_SESSION["userId"]."'=messagetest.userId 
   AND '".$_SESSION["toUserId"]."'=messagetest.toUserId
   AND messagetest.message='Interview For Child'
   ";
  $resultDisplayInvitationDetails= mysqli_query($conn,$sqlDisplayInvitationDetails);

 
  while ($row= mysqli_fetch_assoc($resultDisplayInvitationDetails)) {
  echo '  
      <div class="container">
  
      
      <button type="button"  data-toggle="modal" data-target="#myModal" style="  Background-color:yellow;
      border-radius: 15px; 
       padding: 5px; ">Invitation </button>
    
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Interview Details</h4>
            </div>
            <div class="modal-body">
              <p>"'.$row['InvitationDate'].'"
              </p><br>
              <p>The nursery invite your child
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
      </div>';//////////////////////////////////////////here////////////////////////////////////////////////////////////
  }
}
function getMessages($conn,$toUserId)
{
	
  $sql1="  SELECT user.email,user.id,messagetest.message,
  messagetest.date,messagetest.userId FROM user INNER JOIN messagetest
  ON user.id=messagetest.userId AND '".$_SESSION["userId"]."'=messagetest.userId
  ORDER BY messagetest.date ";
  $result1= mysqli_query($conn,$sql1);


  while ($row= mysqli_fetch_assoc($result1)) {
      $message=$row['message'];
      $email= $row['email'];
      $date=$row['date'];
      $sql4="SELECT messagetest.toUserId FROM messagetest";
      $result4=mysqli_query($conn,$sql4);
	  
      while ($row4= mysqli_fetch_assoc($result4)) {

      $toUserId=$row4['toUserId'];
 
      if ((isset($_SESSION['TheEmail'])) && ($_SESSION['toUserId']==$toUserId))
      {
     echo "<div class='comment-box'><p>";
      echo '<h4 style="color:blue">'.$email.' to '.$_SESSION['TheEmail'].'</h4>';
      echo '<p>'.$message.'</p><br>';
      echo '<p>'.$date.'</p>';
      echo "</p></div>";
	  break;
    }
	
  }
 

}

}
 // invitationSql
 function sendAppointment($conn,$toUserId)
 {
 if(isset($_POST['Send_Appointment']))
 {
   $_SESSION['SETPOST']=true;
   $sqlInvitation='INSERT INTO `messagetest` (`id`, `message`,`userId`,`toUserId`,`date`,`InvitationDate`,`seen`)
   VALUES ("","Invitation","'.$_SESSION["userId"].'","'.$_SESSION["toUserId"].'","'.date('Y-m-d H:i:s').'","'.$_POST["dateOfAppointment"].'",0)
   ';
   if(mysqli_query($conn,$sqlInvitation))
   {
   
 
   }
 }
}
//check this
function sendInvitation($conn,$toUserId)
 {
 if(isset($_POST['Send_Invitation']))
 {
   $_SESSION['SETPOST']=true;
   $sqlInvitation='INSERT INTO `messagetest` (`id`, `message`,`userId`,`toUserId`,`date`,`InvitationDate`,`seen`)
   VALUES ("","Interview For Child","'.$_SESSION["userId"].'","'.$_SESSION["toUserId"].'","'.date('Y-m-d H:i:s').'","'.$_POST["dateOfInvitation"].'",0)
   ';
   if(mysqli_query($conn,$sqlInvitation))
   {
   
 
   }
 

 }
}
 //invitationSql ends
function setMessages($conn,$toUserId)
{
  $date=$_POST['date'];
  $message=$_POST['message'];
  $id = $_SESSION['userId'];
 
  $sql='INSERT INTO `messagetest` (`id`, `message`,`userId`,`toUserId`,`date`,`seen`)
  VALUES ("","'.$message.'","'.$id.'","'.$toUserId. '","' .$date. '",0)
  ';
  if(mysqli_query($conn,$sql))
  {
    echo "<div class='comment-box'><p>";
    echo '<h4 style="color:blue">'.$_SESSION['username'].' to '.$_SESSION['TheEmail'].' </h4>';

    echo '<p>'.$message.'</p></div>';


    echo "</p></div>";

  }
}
function displayResult1()
{

  echo "<div class='comment-box'><p>";
  echo $_SESSION['username'].'  <span  style="color: green; background-color:yellow; padding-top:10px;">Messages</span> <br>';
  echo'
  <input type="text" name="email" id="email" placeholder="Email" onkeyup="checkFounded()"/><br>
	
  <div id="msg"></div><br>';
  
echo'
     <button onclick="ReloadingPage()">Reload page</button>';
     echo"
     <a href='logOut.php' style=' color: white; text-align: center; text-decoration: none;  display: inline-block;'><button type='button' name='logOut'>Logout</button></a>
     <a href='../html/Nursery Website.php'  style=' color: white; text-align: center; text-decoration: none;  display: inline-block;'><button type='button' name='Home'>Home</button></a>

     ";
     echo "</p></div>";
  echo '<div id="main">
  <div id="result-message-area">
  ';
}

function displayResult2($conn,$toUserId)
{

  echo "<div class='comment-box'><p>";
  echo $_SESSION['username'].'  <span  style="color: green; background-color:yellow; padding-top:10px;">Messages</span> <br>';
  echo'
  <input type="text" name="email" id="email" placeholder="Email" onkeyup="checkFounded()"/><br>
	
  <div id="msg"></div><br>';
  if(isset($_SESSION['toUserId']))
  {
  //include 'sendInvitation.php';
 // if($_SESSION['SETPOST']==true){
  echo"<form id='formSendAppointment' method='post' action=''>";
  echo'<input type="date" name="dateOfAppointment" placeholder="Date of Appointment" >'; 
  echo"<td><input type='submit' id='Send_Appointment' name='Send_Appointment'  form='formSendAppointment' value='Send Appointment'><td>";

  // echo' <button type="button"  name="sendInvitation" 
  //     id="sendingInvitation"  onclick="submitform()">send Invitation</button>';
      echo"</form>";
 // }
  echo"<form id='formSendInvitation' method='post' action=''>";
  echo'<input type="date" name="dateOfInvitation" placeholder="Date of Invitation" >'; 
  echo"<td><input type='submit' id='Send_Invitation' name='Send_Invitation'  form='formSendInvitation' value='Send Invitation'><td>";

  // echo' <button type="button"  name="sendInvitation" 
  //     id="sendingInvitation"  onclick="submitform()">send Invitation</button>';
      echo"</form>";
  //echo $_SESSION['SETPOST'];
  displayAppointmentInvitation($conn,$toUserId);
  displayAppointmentDetails($conn,$toUserId);
  }
echo'
     <button onclick="ReloadingPage()">Reload page</button>';
     echo"
     <a href='logOut.php' style=' color: white; text-align: center; text-decoration: none;  display: inline-block;'><button type='button' name='logOut'>Logout</button></a>
     <a href='../html/Nursery Website.php'  style=' color: white; text-align: center; text-decoration: none;  display: inline-block;'><button type='button' name='Home'>Home</button></a>

     ";
     echo "</p></div>";
  echo '<div id="main">
  <div id="result-message-area">
  ';
}
function getOthersMessages($conn,$toUserId) //to get other messages from other users
{
  $sql2="  SELECT user.email,user.id,messagetest.message,messagetest.date,messagetest.toUserId FROM user INNER JOIN messagetest ON user.id=messagetest.toUserId AND '".$_SESSION["userId"]."'=messagetest.toUserId ORDER BY messagetest.date ";
  $result2= mysqli_query($conn,$sql2);

  while ($row2= mysqli_fetch_assoc($result2)) {
      $message=$row2['message'];
      $email= $row2['email'];
      $date=$row2['date'];

      $sql4="SELECT messagetest.toUserId FROM messagetest";
      $result4=mysqli_query($conn,$sql4);
      while ($row4= mysqli_fetch_assoc($result4)) {

      $toUserId=$row4['toUserId'];

      if ((isset($_SESSION['TheEmail'])) && ($_SESSION['toUserId']==$toUserId))
      {
      echo "<div class='comment-box'><p>";
      echo '<h4 style="color:blue"> '.$_SESSION['TheEmail'].' to '.$email.' </h4>';
      echo '<p>'.$message.'</p><br>';
      echo '<p>'.$date.'</p>';
      echo "</p></div>";
	   break;
    }
}
  }
}

function displayMessageArea()
{
  echo '
  <div id="message_area">
  <form id="invitationForm"  method="post">
  </div>
    <br>


  <input type="text" name="message" style="width:80%; height:10%;" placeholder="Type your message" required/>
   <input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'">
  <button type="submit" name="submit" onclick="ReloadingPage()"  style="width:10%; height:10%;" >Send</button>

  </form>
</div>
  </div>';
}
if (isset($_SESSION['username']))

{ 
  if($_SESSION['toUserId']==0)
  displayResult1();
  else if($_SESSION['toUserId']!=0){
    $toUserId= $_SESSION['toUserId'];
    
   
  displayResult2($conn,$toUserId);
  sendInvitation($conn,$toUserId);
  sendAppointment($conn,$toUserId);
    getMessages($conn,$toUserId);
    getOthersMessages($conn,$toUserId);
   
      if (Isset($_POST['submit']))
       {
        setMessages($conn,$toUserId);

       }

      }
    
      displayMessageArea();
 

// $_SESSION['page'] ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
/*if( $_SESSION['page'] =="http://127.0.0.1:8080/MIU_Web_Project/php/DisplayingMessageToManager.php"){
  $sql300 = "UPDATE `message` SET `seen` = '1'";
   $result300= mysqli_query($conn,$sql300);

}*/

}



else
{
  header("location:logOut.php");
}

?>


  

</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/Reload.js"></script>
<script src="../js/ajax.js"></script>
<script>
//   function submitform()
// {

//   document.getElementById('invitationForm').submit();

// }

 $(document).ready(function(){
   $("#sendingInvitation").click(function(){

       $.ajax({
           type: 'POST',
           url: 'sendInvitation.php',
           success: function() {
    
              
  

           },
           error:function()
           {
            alert("error");
           }
       });
 });
 });

</script>
</html>
<?php
mysqli_close($conn);

// $('#newForm').submit(function(e)
//  { // handle the submit event
//   e.preventDefault();
//   let formData = $(this).serialize();

//   $.post({
//     type: 'POST',
//     url: '/api/pois/',
//     data: formData
//   })
// })

// $('#sendingInvitation').click(function() {
//   // $('#confirm-object').modal('hide');
//   $('#invitationForm').submit(); // trigger the submit event
// });


 ?>

