<?php 

date_default_timezone_set('Africa/Cairo');
 


 
	 
session_start();
include("Database_Connection.php");

 $sqlInvitation='INSERT INTO `messagetest` (`id`, `message`,`userId`,`toUserId`,`date`,`seen`)
  VALUES ("","Invitation","'.$_SESSION["userId"].'","'.$_SESSION["toUserId"].'","'.date('Y-m-d H:i:s').'",0)
  ';
  if(mysqli_query($conn,$sqlInvitation))
  {
  echo 'done';

  }

		
	//echo  "not IN2";
	// echo 	'<div class="send-invitation"><button type="button"  name="sendInvitation" 
	// 		id="sendingInvitation"  onclick="submitform()">send Invitation</button></div>';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <title></title>
  </head>
  <body>

  </body>


  <script type="text/javascript">
    
//   			  $(document).ready(function(){
//           $("#sendingInvitation").click(function(){

//               $.ajax({
//                   type: 'POST',
//                   url: 'sendInvitation.php',
//                   success: function(data) {
					  
//                       $("#msg").html(data);
		
				
//                   }
//               });
//      });
//   });
//   //////////////////////////////////////////////////////////////////
//   $(document).ready(function(){
//           $("#sendingInvitation").click(function(){
// $('form').on('submit', function (e) {

//   e.preventDefault();

//   $.ajax({
//     type: 'post',
//     url: 'messages.php',
//     data: $('form').serialize(),
//     success: function () {
//       alert('form was submitted');
//     }
//   });

// });

// });
// //   function submitform()
// // {
// //  document.getElementById('invitationForm').submit();

// // }



  </script>

	</html>		


