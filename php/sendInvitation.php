<?php 

date_default_timezone_set('Africa/Cairo');
 

echo "<form id='invitationForm' method='post'  action='messages.php'>";
 
	 
 echo '<input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'">';
 
 echo "</form>";
 $date=$_POST['date'];
   if (isset($_POST['submit'])) {
 $sqlInvitation='INSERT INTO `messagetest` (`id`, `message`,`userId`,`toUserId`,`date`,`seen`)
  VALUES ("","Invitation","'.$_SESSION["userId"].'","'.$_SESSION["toUserId"].'","'.$date.'",0)
  ';
    $resultInvitation = mysqli_query($conn,$sqlInvitation);
	 if(mysqli_num_rows($resultInvitation) > 0)
	{	
		echo  $sqlInvitation;
				echo  "In";

	}
	else
	{
		echo  $sqlInvitation;
				echo  "not IN";

	}
	
echo  "not IN1";
   }
		
	//echo  "not IN2";
	echo 	'<div class="send-invitation"><button type="button"  name="sendInvitation" 
			id="sendingInvitation"  onclick="submitform()">send Invitation</button></div>';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Nursery </title>
  </head>
  <body>

  </body>


  <script type="text/javascript">
    
  			  $(document).ready(function(){
          $("#sendingInvitation").click(function(){

              $.ajax({
                  type: 'POST',
                  url: 'sendInvitation.php',
                  success: function(data) {
					  
                      $("#msg").html(data);
		
				
                  }
              });
     });
  });
  function submitform()
{
 document.getElementById('invitationForm').submit();

}



  </script>

	</html>		


